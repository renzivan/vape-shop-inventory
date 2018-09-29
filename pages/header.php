<?php
	function mr_head(){
		$output = "
		    <meta charset='utf-8'>
		    <meta name='viewport' content='width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no' />
		    <meta name='description' content=''>
		    <meta name='author' content=''>
			
		    <title>Uptown Vape and Accessories</title>

		    <!-- Bootstrap core CSS -->
		    <link href='../vendor/bootstrap/css/bootstrap.min.css' rel='stylesheet'>

		    <!-- Custom styles for this template -->
		    <link href='../css/simple-sidebar.css' rel='stylesheet'>
		    <link href='../css/mobile.css' rel='stylesheet'>
		    <link href='../css/inventory.css' rel='stylesheet'>
	    ";
	    echo $output;
	}

	function mr_nav(){
		$logged_in_user = "nikki lim";
		$output = "
			<div id='sidebar-wrapper'>
	            <ul class='sidebar-nav'>
	                <li class='sidebar-brand'>
	                    <a href='inventory.php'>
	                        <strong>uptown</strong>vape<img src='../img/logo.png'/>
	                    </a>
	                </li>
	                <li>
	                    <span>Main Navigation</span>
	                </li>
	                <li>
	                    <a href='inventory.php'>inventory</a>
	                </li>
	                <li>
	                    <a href='log.php'>logs</a>
	                </li>
	            </ul>
	        </div>

	        <div id='menu-toggle-wrapper1'>
    		</div>
		        <div id='menu-toggle-wrapper'>
		        	<div id='menu-toggle-box'>
		        		<a href='#menu-toggle' class='' id='menu-toggle'>
		        			<div>
		        				<hr><hr><hr>
		        			</div>
		        		</a>
	        		</div>
	        		<div id='user-toggle-dropdown'>
	        			<div class='btn dropdown-toggle' id='menu1'  data-toggle='dropdown'>
	        				<span class='user_name'>" . $logged_in_user . "</span>
	        				<ul class='dropdown-menu' role='menu' aria-labelledby='menu1'>
								<a role='menuitem' tabindex='-1' href='#'><li role='presentation'>Change Password</li></a>
								<a role='menuitem' tabindex='-1' href='#'><li role='presentation'>Sign Out</li></a>
				            </ul>
	        			</div>
	        		</div>
	    		</div>
		";
		echo $output;
	}
	
	function connection(){
		$con = mysqli_connect("localhost","root","","uptown");

		// Check connection
		if (mysqli_connect_errno())
		{
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		echo $con;
		  
	}

?>