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
<style>
.left{
	width: 50%;
}
.right{
	padding-left: 350px;
}
</style>
<script>
function myFunction() {
	var r = confirm ("Are you sure?");
	if(r == true){
		document.getElementById("form").action = "upload.php";
	}
}
</script>
</head>
<body>
<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title"><img src="">SANGUINE</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation. We hide it in small screens. -->
      <nav class="mdl-navigation">
        <!-- Right aligned menu below button -->
           <a class="mdl-navigation__link" href="logout.php">Logout</a>
      </nav>
    </div>
  </header>
   <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">SANGUINE</span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="">Link</a>
    </nav>
  </div>

<main class="mdl-layout__content">
<div class="page-content">
<div class="container">
<?php
$conn=mysqli_connect('localhost','root','','powerbank');
$sql = "SELECT * FROM users WHERE umail='".$_SESSION["umail"]."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc())
	{
		?>
		<div class="left">
		<img src="uploads/<?php echo $row['pic'];?>" alt="" width=150 height=150 style="border-radius: 25%;" border="3"/>
		</div>

        <div class="con"> 
		
		<h4><?php echo $row['fname']." ".$row['lname'];?></h4>
		
		<h4>0910-988-6496</h4><br>
		Bank Accoount:12345678
		<h4 class="donations"><b>800</b> Sponsors <b>800</b> Beneficiaries</h4>
		</div>
		<?php
	}   
}
?>

</div>

<form id="form" method="post" enctype="multipart/form-data">

<input type="file" name="file" />
<input type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" name="submit" id="submit" onClick="myFunction()" value="Upload Image"/>
</form>
<div class="container">
<?php
$image_query = mysqli_query($conn,"SELECT * FROM uploads");
$file_path = 'uploads/';
while($all_images = mysqli_fetch_assoc($image_query))
{
	$img_src = $file_path.$all_images['pic_name'];
	echo "<img src=".$img_src." alt='' width=200 height=200 border='1'>&nbsp;&nbsp;&nbsp;" ;
}
?>
</div>
<div>
<form method="post">
<button name="edit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Edit Profile</button>
<button name="btn-logout" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Log Out</button>
</form>
<?php
if(isset($_POST['btn-logout'])){
	header("Location:logout.php?logout=true");
}
if(isset($_POST['edit'])){
	header("Location: settings.php");
}
?>
</div>
</main>
<?php
include("../includes/scripts.php");
?>
</body>
</html>
