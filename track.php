<?php
 
$conn= new mysqli('localhost','root','','iwp');
if($conn->connect_error)
{
	die("connection failed:". $conn->connect_error);
}
/*
$ID = $_POST['user'];
$Password = $_POST['pass'];
*/
function check_user($username)
{
	if (mysqli_num_rows(mysqli_query($conn,"Select * from users where username=$username"))==1)
		return true;
	return false;
}




?>