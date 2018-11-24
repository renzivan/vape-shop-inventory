
<?php
/*
// Enter your Host, username, password, database below.
// I left password empty because i do not set password on localhost.
$con = mysqli_connect("localhost","root","","red");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
*/


  	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "uptown";
	$con = mysqli_connect($servername,$username,$password,$dbname);
	//check conn
	if ($con->connect_error){
		die("Connection Failed: " . $con->connect_error);
	}

?>
