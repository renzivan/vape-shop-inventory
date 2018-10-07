
$(document).ready(function(){

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

$(window).on("load", function(){
    $('.qty-sold').hide();
    console.log("sex");
});

$('.edit-button').click(function(){
    $('.edit-mode').prop('type','hidden');
    $('.qty-sold').fadeIn(1000);
    $('.display_data').show();
    $(this).closest('tr').find('td > input.edit-mode').prop('type','text');
    $(this).closest('tr').find('td > .display_data').hide();
    $(this).closest('tr').find('#product_qty_sold').focus();
});

// Menu Toggle Script -->
$(document).ready(function(){
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
function searching() {
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
}
