<script type='text/javascript'>
	function c()
	{
		alert('Username and/or Password incorrect.\\nTry again.');
		window.location = "sign_up.html";
	}
		function c1()
	{
		alert('WELCOME '.$first_name);
		window.location = "y.php";
	}
</script>
<?php

$first_name=$_POST['user'];
$password=$_POST['pass'];
$first_name = stripcslashes($first_name);
$password = stripcslashes($password);
session_start();
$_SESSION['varname']=$first_name;
$con=mysqli_connect("localhost","root","","twitter");

$result = mysqli_query($con," select * from login where first_name='$first_name' and password='$password'")
or die("Failed to query database".mysqli_error());
$row=mysqli_fetch_array($result);
if($row['first_name'] == $first_name && $row['password'] == $password){
	$message1 = "WELCOME ".$first_name;
  echo "<script>c1();</script>";

}else{
	$message = "Username and/or Password incorrect.\\nTry again.";
  echo "<script>c();</script>";
   $_SESSION['id']=mysqli_query($link,"SELECT id FROM login WHERE first_name=".$first_name);
}
?>
