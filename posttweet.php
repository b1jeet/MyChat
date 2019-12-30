<script>
	

function k()
{
alert("Your post was posted successfullly");
window.location = "y.php";
}

</script>
<?php

$con=mysqli_connect("localhost","root","","twitter");
$tweetcontent=mysqli_real_escape_string($con,$_POST['tweetcontent']);
$loginid=mysqli_real_escape_string($con,$_POST['loginid']);
echo $loginid;
$sql = "INSERT INTO tweets (tweet,userid,datetime) VALUES ('$tweetcontent','$loginid',now())";
if(mysqli_query($con, $sql)){
    echo "<script>k()</script>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
?>