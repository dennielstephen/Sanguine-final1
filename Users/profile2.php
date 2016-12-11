<?php
session_start();
?>
<?php
if(!isset($_SESSION['umail'])){ //if login in session is not set
    header("Location:Users/login.php");
}
?>
<html>
<head>
<?php
  include("../includes/header.php");
?>
</head>
<body>
<?php
	include("../includes/nav.php");
?>
<main class="mdl-layout__content">
<div class="page-content">

<form method="post">
LOGIN SUCCESS!
<button name="btn-logout">LOGOUT</button>
</form>
<?php
if(isset($_POST['btn-logout'])){
	header("Location:logout.php?logout=true");
}
?>

<?php
include("../includes/scripts.php");
?>
</body>
</html>
