<?php
session_start();
?>
<?php
if(!isset($_SESSION['umail'])){ //if login in session is not set
    header("Location:login.php");
}
?>
<html>
<head>
<?php
  include("../includes/header.php");
?>
<script>
	function myFunction() {
		var r = confirm ("Are you sure?");
		if(r == true){
			document.getElementById("form").action = "picupload.php";
		}
	}
</script>
</head>
<body>
<?php
	include("../includes/nav.php");
?>
<main class="mdl-layout__content">
<div class="page-content">
<form method="POST">
<?php
$conn=mysqli_connect('localhost','root','','powerbank');
$sql = "SELECT * FROM users WHERE umail='".$_SESSION["umail"]."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc())
	{
?>
<div class="mdl-textfield mdl-js-textfield">
<img src="uploads/<?php echo $row['pic'];?>" alt="" width=175 height=175 style="border-radius: 25%;" border="3"/>
</div>
<br>
<div class="mdl-textfield mdl-js-textfield">
<input class="mdl-textfield__input" name="fname" id="fname" type="text" value="<?php echo $row['fname']; ?>">
<label class="mdl-textfield__label" for="sample1">First Name</label>
</div>
<br>
<div class="mdl-textfield mdl-js-textfield">
<input class="mdl-textfield__input" name="lname" id="lname" type="text" value="<?php echo $row['lname']; ?>">
<label class="mdl-textfield__label" for="sample1">Last Name</label>
</div>
<br>
<div class="mdl-textfield mdl-js-textfield">
<input class="mdl-textfield__input" name="loc" id="loc" type="text" value="<?php echo $row['location']; ?>">
<label class="mdl-textfield__label" for="sample1">Location</label>
</div>
<br>
<div class="mdl-textfield mdl-js-textfield">
<input class="mdl-textfield__input" name="bday" id="bday" type="date" value="<?php echo $row['bday']; ?>">
<label class="mdl-textfield__label" for="sample1">Birthday</label>
</div>
<br>
<div class="mdl-textfield mdl-js-textfield">
<select class="mdl-textfield__input" name="gen" id="gen">
<option>Male</option>
<option>Female</option>
</select>
<label class="mdl-textfield__label" for="sample1">Gender</label>
</div>
<br>
<div class="mdl-textfield mdl-js-textfield">
<input class="mdl-textfield__input" name="cont" id="cont" type="text" value="<?php echo $row['contno']; ?>">
<label class="mdl-textfield__label" for="sample1">Contact Number</label>
</div>
<br>
<button type="submit" name="btn-update" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">UPDATE</button>
<a href="profile.php"><button type="button" name="btn-cancel" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">CANCEL</button></a>
</form>
</form>
</div>
</main>
<?php
	}
}
?>
<?php
include("../includes/scripts.php");
?>
<?php
if(isset($_POST['btn-update'])){
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$loc=$_POST['loc'];
	$bday=$_POST['bday'];
	$gen=$_POST['gen'];
	$cont=$_POST['cont'];
	$sql = "UPDATE users SET fname='$fname',lname='$lname',location='$loc',bday='$bday',gender='$gen',contno='$cont' WHERE umail='".$_SESSION["umail"]."'";
	$res = mysqli_query($conn,$sql);
	header("Location: settings.php");
}
?>
</body>
</html>