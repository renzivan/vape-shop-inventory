<?php

	function mr_foot(){
		$output = "
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

			    
		    </script>
		";
		echo $output;
	}

?>