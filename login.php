<?php


if($_POST && $_SESSION["login_user"]=="")
 {
$conn= new mysqli('localhost','root','','iwp');
if($conn->connect_error)
{
	die("connection failed:". $conn->connect_error);
}


if(true)
{
	$username=mysqli_real_escape_string($conn,$_POST['username']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);
	echo $username." ".$password;
	$sel_user="SELECT * from users where username='$username' and password='$password'";
	$run_user=mysqli_query($conn,$sel_user);
	$check_user=mysqli_num_rows($run_user);
	$row=mysqli_fetch_array($run_user);
	if($check_user>0)
	{
		session_register("username");
		$_SESSION['login_user']=$username;
		header("location: events.php");


	}
	else
	{
		echo"Username or Password incorrect  !!!!";

	}
}

}
?>