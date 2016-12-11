<?php
session_start();
?>
<?php
if(!isset($_SESSION['umail'])){ //if login in session is not set
    header("Location:login.php");
}
?>
<?php
	$fname = $_POST['fname'];
	$conn=mysqli_connect('localhost','root','','powerbank');
	$sql = "UPDATE users SET fname='$fname' WHERE umail='".$_SESSION["umail"]."'";
	$res = mysqli_query($conn,$sql);
	header ('location:settings.php');
?>