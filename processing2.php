
<script>
function c2()
	{
		alert('WELCOME '.$first_name);
		window.location = "y.php";
	}
	</script>
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "twitter");
 
// Check connection
if($link == false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$city = mysqli_real_escape_string($link, $_REQUEST['city']);
$state = mysqli_real_escape_string($link, $_REQUEST['state']);
$zip = mysqli_real_escape_string($link, $_REQUEST['zip']);
$password = mysqli_real_escape_string($link, $_REQUEST['pass']); 
// Attempt insert query execution
session_start();
$_SESSION['varname']=$first_name;
$sql = "INSERT INTO login (first_name, last_name, email,city,state,zip,password) VALUES ('$first_name', '$last_name', '$email','$city','$state','$zip','$password')";
if(mysqli_query($link, $sql)){
    echo "<script>c2();</script>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 $_SESSION['id']=mysqli_query($link,"SELECT id FROM users WHERE email=".$email);
// Close connection
mysqli_close($link);
?>