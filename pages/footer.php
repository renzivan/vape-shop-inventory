<?php

	function mr_foot(){
		$output = "

			<!-- copyright shit -->
            <div id='footer-wrapper'>
                <hr>
                <div id='details-wrapper'>
                    <span>
                        <strong>Copyright © DeeZee</strong> All rights reserved.
                    </span>
                    <!--<span>
                        <strong>Version</strong> 1.0.0
                    </span>-->
                </div>
        	</div>


			<!-- Bootstrap core JavaScript -->
		    <script src='../vendor/jquery/jquery.min.js'></script>
		    <script src='../vendor/bootstrap/js/bootstrap.bundle.min.js'></script>
		    <script src='../js/renz.js'></script>

		    <!-- Menu Toggle Script -->
		    <script>
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

			    
			    <!-- live search function -->
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
		    </script>
		";
		echo $output;
	}

?>