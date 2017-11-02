<?php
function redirect($statusCode = 303)
{	
   $url="index.html";
   echo "<script type='text/javascript'>alert ('Successfull Signup!');window.location = 'index.html';</script>"; 
   
   die();
}
if($_POST)
{
$conn= new mysqli('localhost','root','','iwp');
if($conn->connect_error)
{
	die("connection failed:". $conn->connect_error);
}
//echo"db connected successfully";
//echo"\n db is selected as test successfully";
$fname=$_POST["first_name"];
$lname=$_POST["last_name"];
$email=$_POST["email"];
$username=$_POST["username"];
$password=$_POST["password"];
$gender=$_POST["sex"];
$bday=$_POST["birthdate"];

$age=$_POST["age"];

$sql="INSERT INTO `users` (`firstname`, `lastname`, `email`, `username`, `password`, `gender`, `bday`, `age`) VALUES ('$fname','$lname','$email','$username','$password','$gender','$bday','$age')";
$xyz=mysqli_query($conn,$sql);

if($xyz==true)
{
	

	redirect();

}
else{

	$error="<br>Error :".mysqli_error($conn);
	if (strpos($error,"Duplicate")!==false) 
		{ echo "<script type='text/javascript'>alert ('User already Exists!');window.location = 'index.html';</script>"; 
		die();
		}
	else
	{
		echo $error;
	}
	
   
}
$conn->close();
}
?>