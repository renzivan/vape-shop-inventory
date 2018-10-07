<?php
	
    include('queries.php');

    function mr_authenticator(){
    	include('connection.php');
		session_start();
		$user_check = $_SESSION['logged_user'];
		$ses_sql = mysqli_query($con,"SELECT * FROM USER WHERE username = '$user_check' ");
		$row = @mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
		$session_id = $row['id'];
		$session_name = $row['name'];

		// on all screens requiring login, redirect if NOT logged in
		if(!isset($_SESSION['logged_user'])){
			header("location: ../index.php");
			exit;
		}
		return $session_name;
    }

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
		    <link href='../css/main.css' rel='stylesheet'>
		    <link href='../css/mobile.css' rel='stylesheet'>
		    <link href='../css/inventory.css' rel='stylesheet'>

	    ";
	    echo $output;
	}

	function mr_nav(){
		$logged_in_user = $_SESSION['logged_user'];
		$output = "
			<div id='sidebar-wrapper'>
	            <ul class='sidebar-nav'>
	                <li class='sidebar-brand'>
	                    <a href='#'>
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
	        			<a href='#' class='btn dropdown-toggle' id='menu1'  data-toggle='dropdown'>
	        				<span class='user_name'>" . $logged_in_user . "</span>
	        			</a>
        				<ul class='dropdown-menu' role='menu' aria-labelledby='menu1'>
							<a href='changepassword.php'><li role='presentation'>Change Password</li></a>
							<a href='logout.php'><li>Sign Out</li></a>
			            </ul>
	        		</div>
	    		</div>
		";
		echo $output;
	}
?>