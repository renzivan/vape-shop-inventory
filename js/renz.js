$(document).ready(function(){

    /* set class active for navigation */
	$(function () {
	    var url = window.location.pathname; //sets the variable 'url' to the pathname of the current window
	    var activePage = url.substring(url.lastIndexOf('/') + 1); //sets the variable 'activePage' as the substring after the last '/' in the 'url' variable
        $('.sidebar-nav li a').each(function () { //looks in each link item within the primary-nav list
            var linkPage = this.href.substring(this.href.lastIndexOf('/') + 1); //sets the variable 'linkPage' as the substring of the url path in each &lt;a&gt;

            if (activePage == linkPage) { //compares the path of the current window to the path of the linked page in the nav item
                $(this).parent().addClass('nav-active'); //if the above is true, add the 'active' class to the parent of the &lt;a&gt; which is the &lt;li&gt; in the nav list
            }
        });
	});	

    /* change password */
    $('#password, #confirm_password').on('keyup', function (e) {
        if ($('#password').val() == $('#confirm_password').val()) {
            $('#message').html('').css('color', 'green');
            // $('#btn_confirm_password').prop('disabled',false);
        } else 
            $('#message').html('Password does not match!').css('color', 'red');
            // $('#btn_confirm_password').prop('disabled',true);
    });
});


/* Menu Toggle Script */
$(document).ready(function(){
    $('#page-nav ul li .ellipse').unbind(); //disable ellipse onclick in pagination
	browserWidth = $(window).width();
	if(browserWidth<768){
    	$('#wrapper').toggleClass('toggled');
    	console.log(browserWidth);
	}
    $('#wrapper').toggleClass('toggled');
    $('#menu-toggle').click(function(e) {
        // e.preventDefault();
        $('#wrapper').toggleClass('toggled');
    });
    $('#user-toggle-dropdown .btn').click(function(e){
       console.log(browserWidth);
    	if(browserWidth<1366){
    		// e.preventDefault();
        	$('#wrapper').removeClass('toggled');	
    	}
    }); 
});

/* live search function */
$('#search_input').keyup(function(){
	var input, filter, table, tr, td, i;
	input = document.getElementById('search_input');
	filter = input.value.toUpperCase();
	table = document.getElementById('myTable');
	tr = table.getElementsByTagName('tr');
	for (i = 0; i < tr.length; i++) {
		td = tr[i].getElementsByTagName('td')[0];
		td2 = tr[i].getElementsByTagName('td')[1];
		if (td || td2) {
			if (td.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = '';
			}else {
				tr[i].style.display = 'none';
			}
		} 
	}
    if(filter.length < 1){
        $('#myTable tr').hide().slice(0,10).show();
        console.log("slice");
    }
});


$(window).on("load", function(){
    /* hide sold/restock column */
    $('.qty-sold').hide();
    $('#search_input').focus();
});

$('.edit-button').on('click',function(){
    console.log('edit');
    $('.edit-mode').prop('type','hidden');
    $('.qty-sold').fadeIn(1000);
    $('.display_data').show();
    $(this).closest('tr').find('td > input.edit-mode').prop('type','text');
    $(this).closest('tr').find('td > .display_data').hide();
    $(this).closest('tr').find('#product_qty_sold').focus();
});

/* add new product button AJAX */
$('#add_button').click(function(){
    var xname = $('#add_name').val();
    var xcateg = $('#add_category').val();
    var xprice = $('#add_price').val();
    var xqty = $('#add_quantity').val();
    var data = { name: xname, categ: xcateg, price: xprice, qty: xqty};
    console.log(data);
    $.post('../query/add_product.php', { name: xname, categ: xcateg, price: xprice, qty: xqty }, function(data){
        console.log(data);
        $('#table-add').append(data);
        $('.alert-dismissible').fadeOut(4000);
        // $('.alert-dismissible').hide().fadeIn(1000);
        $('#myTable').load(window.location + " #myTable");
        $('#myTable tr').hide().slice(0,10).show();

    }).fail(function() {
        // just in case posting your form failed
        alert( "Server Error." );
    });
});

/* save product changes button AJAX */
$('.save_changes_button').click(function(){
    console.log("sex");
    var xid = $(this).closest('tr').find('.get-id').val();
    var xname = $(this).closest('tr').find('.product_name').val();
    var xcateg = $(this).closest('tr').find('.product_category').val();
    var xprice = $(this).closest('tr').find('.product_price').val();
    var xqty = $(this).closest('tr').find('.product_qty').val();
    var xqty_sold = $(this).closest('tr').find('.product_qty_sold').val();
    var xrestock = $(this).closest('tr').find('.product_restock').val();

    /* display changes using this script so refreshing the page is unnecessary */
    /* reinitialize to prevent calculation twice */
    var xqty2 = parseInt(xqty);
    var xrestock2 = parseInt(xrestock);
    if(!$.isNumeric(xqty_sold) || xqty_sold==''){
        xqty_sold = 0;
    }else{
        xqty2 -= xqty_sold;
    }
    if(!$.isNumeric(xrestock) || xrestock==''){
        xrestock2 = 0;
    }else{
        xqty2 += xrestock2;
    }
    $(this).closest('tr').find('td > .product_name').next('.display_data').html(xname);
    $(this).closest('tr').find('td > .product_category').next('.display_data').html(xcateg);
    $(this).closest('tr').find('td > .product_price').next('.display_data').html(xprice);
    $(this).closest('tr').find('td > .product_qty').next('.display_data').html(xqty2);
    $(this).closest('tr').find('td > .product_name').val(xname);
    $(this).closest('tr').find('td > .product_category').val(xcateg);
    $(this).closest('tr').find('td > .product_price').val(xprice);
    $(this).closest('tr').find('td > .product_qty').val(xqty2);
    $(this).closest('tr').find('td > input.edit-mode').prop('type','hidden');
    $(this).closest('tr').find('td > .display_data').show();
    $('.qty-sold').fadeOut(1000);


    var data = { id: xid, name: xname, categ: xcateg, price: xprice, qty: xqty, qty_sold: xqty_sold, restock: xrestock };
    $.post('../query/save_changes.php', { id: xid, name: xname, categ: xcateg, price: xprice, qty: xqty, qty_sold: xqty_sold, restock: xrestock }, function(data){
        console.log("true or false");
        console.log(data);
        // $('#myTable').prepend(data);
        // $('tr#' + xid).addClass('success-row');
        if(data==1){
            $('tr#' + xid).css('backgroundColor','#b7dfc0');
            $('tr#' + xid).animate({
                'opacity': '0.7'
            }, 2000, function (){
                $('tr#' + xid).css({
                    'backgroundColor': '#fff',
                    'opacity': '1'
                });
            });
        }else{
            $('tr#' + xid).css('backgroundColor','#f8d7da');
            $('tr#' + xid).animate({
                'opacity': '0.5'
            }, 2000, function (){
                $('tr#' + xid).css({
                    'backgroundColor': '#fff',
                    'opacity': '1'
                });
            });
        }

        $('.alert-dismissible').fadeOut(2000);
        // location.reload(true); //reload page
        // $('#myTable_wrapper').load(window.location.href + " #myTable");

    }).fail(function() {
        // just in case posting your form failed
        alert( "Server Error." );
    });
});

$('#btn_confirm_password').click(function(){
    var xget_id_password = $('.get_id_password').val();
    var xget_old_password = $('.get_old_password').val();
    var xold_pass = $('.old_pass').val();
    var xnew_pass = $('.new_pass').val();
    var xnew_pass_confirm = $('.new_pass_confirm').val();
    $.post('../query/change_password.php', { get_id_password: xget_id_password, get_old_password: xget_old_password, old_pass: xold_pass, new_pass: xnew_pass, new_pass_confirm: xnew_pass_confirm }, function(data){
        $('#message').append(data);
        console.log(data);
        if(data==1){
            $('#message').html("<div class='alert alert-success alert-dismissible' style=''> <strong>Succes!</strong> Password changed.</div>");
            $('#message').append("Redirecting page...");
             $('.alert-dismissible').fadeOut(2000, function(){
                window.location.href = '../pages/inventory.php';
            });
        }else{
            $('#message').html("<div class='alert alert-danger alert-dismissible' style=';'><strong>Error!</strong> Password unchanged.</div>");
        }
        //
        // location.reload(true); //reload page
        // $('#myTable_wrapper').load(window.location.href + " #myTable");

    }).fail(function() {
        // just in case posting your form failed
        alert( "Server Error." );
    });
});


/* pagination */
$(function($){
        var pageParts = $(".paginate"); // Grab whatever we need to paginate
        var numPages = pageParts.length; // How many parts do we have?
        var perPage = 10;// How many parts do we want per page?
        pageParts.slice(perPage).hide(); // When the document loads we're on page 1 // So to start with... hide everything else
        $("#page-nav").pagination({ // Apply simplePagination to our placeholder
            items: numPages,
            itemsOnPage: perPage,
            cssStyle: "light-theme",
            displayedPages: '3',
            prevText: '<',
            nextText: '>',
            ellipsePageSet: 'false',
            onPageClick: function(pageNum) { // We implement the actual pagination in this next function. It runs on the event that a user changes page
                $('#page-nav ul li .ellipse').unbind();
                var start = perPage * (pageNum - 1); // Which page parts do we show?
                var end = start + perPage;
                // First hide all page parts
                // Then show those just for our page
                pageParts.hide().slice(start, end).show();
            }
        });
    });