<script>
function x()
	{
		window.location="y.php";
	}
	</script>
<?php
 $con=mysqli_connect("localhost","root","","twitter");

$userid=mysqli_real_escape_string($con,$_POST['userId']);
$id=mysqli_real_escape_string($con,$_POST['id']);

$sql = "DELETE FROM isfollowing WHERE follower='$userid'";
if(mysqli_query($con, $sql)){
    echo "<script>x();</script>";
}
?>