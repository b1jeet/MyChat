<script type="text/javascript">
function x()
	{
		
		window.location="y.php";
	  
	}
	</script>
<?php
 $con=mysqli_connect("localhost","root","","twitter");

$userid=mysqli_real_escape_string($con,$_POST['userId']);
$id=mysqli_real_escape_string($con,$_POST['id']);

$sql = "INSERT INTO isfollowing (follower,isfollowing) VALUES ('$userid','$id')";
if(mysqli_query($con, $sql)){
    echo "<script>x();</script>";
}
?>