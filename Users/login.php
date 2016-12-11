<?php
session_start();
require("../database/dbconfig.php");
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
<title>SANGUINE</title>
<link rel="shortcut icon" href="../assets/img/sanguine.png">

<!-- Page styles -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
 <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">

<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
	<!-- Always shows a header, even in smaller screens. -->
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
		<header class="mdl-layout__header nav">
			<div class="mdl-layout__header-row">
				<!-- Title -->
				<span class="mdl-layout-title"> SANGUINE</span>
				<!-- Add spacer, to align navigation to the right -->
				<div class="mdl-layout-spacer"></div>
				<!-- Navigation. We hide it in small screens. -->
				<nav class="mdl-navigation">
					<!-- Right aligned menu below button -->
		            <button id="demo-menu-lower-right"
		                    class="mdl-button mdl-js-button mdl-button--icon">
		              <i class="material-icons">more_vert</i>
		            </button>
		            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
		                for="demo-menu-lower-right">
		             <li class="mdl-menu__item"><a class="mdl-navigation__link" href="signup.php"><i class="material-icons">person_add</i></a></li>
		              <li class="mdl-menu__item"><a class="mdl-navigation__link" href="login.php"><i class="material-icons">account_circle</i></a></li>
		            </ul>
				</nav>
			</div>
		</header>
		<!--<div class="mdl-layout__drawer">
			<span class="mdl-layout-title"><img src="assets/img/sanguine.png"  height="90" width="90">SANGUINE</span>
			<nav class="mdl-navigation">
				<a class="mdl-navigation__link" href="">Link</a>
				<a class="mdl-navigation__link" href="">Link</a>
				<a class="mdl-navigation__link" href=""><i cla  ss="material-icons">person_add</i> Sign Up</a>
				<a class="mdl-navigation__link" href=""><i class="material-icons">account_circle</i> Login</a>
			</nav>
		</div>-->
	  <main class="mdl-layout__content">
	    <div class="page-content">
		<form  method="POST">
        <img class="img-logo" src="../assets/img/sanguine.png" >
        <div class="mdl-box">
				<div class="mdl-textfield mdl-js-textfield">
		    <input class="mdl-textfield__input" type="text"  placeholder="E-mail" name="txt_uname_email" id="email" autofocus>
		    <label class="mdl-textfield__label" for="sample1">E-mail</label>
		  </div>

		<br>
					<div class="mdl-textfield mdl-js-textfield">
					<input class="mdl-textfield__input" type="password" placeholder="Password" name="txt_password" id="password">
					<label class="mdl-textfield__label" for="sample1">Password</label>
				</div>

				 <br>
					<select class="mdl-button  mdl-js-ripple-effect" id="type" name="slc">
					<option  value="FSO" selected="selected">---</option>
					<option value="Scholar">Scholar</option>
					<option value="Sponsor">Sponsor</option>
					</select>
				 <br><br>
				 <button type="submit" name="btn-login" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" id="btn">
		       LOGIN
		     </button>&nbsp;&nbsp;&nbsp;
				 <a href="signup.php"><button type="button" name="btn-reg" id="btn" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
					 Sign Up
				 </button></a><br><br>
				 <a href="fp.php">
					 Forgot Password
				 </a>
    </div>
		</form>
	</div>
	  </main>
	</div>
	<!-- MDL Spinner Component -->
<?php
$conn=mysqli_connect('localhost','root','','powerbank') ;

if(!$conn){
	die("Connection Failed: ".mysqli_connect_error());
}
if(isset($_POST['btn-login'])){
	$slc = $_POST['slc'];
	$user_email = strip_tags($_POST['txt_uname_email']);
	$user_password = strip_tags($_POST['txt_password']);

if($slc == 'Scholar'){
	$sql="SELECT * FROM users WHERE (umail='$user_email' AND upass='$user_password')";
	$res = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($res);
	$id=$row[0];
	$user_email=$row[1];
	if($row[0] > 0){


		$_SESSION["umail"]=$user_email;
		$_SESSION["uid"]=$id;
		if($row['utype']=="Scholar"){
			header('location:profile.php');
		}
	}
	else{
		echo "<script>alert('Your email or password is incorrect.');window.location.href='login.php'</script>";
	}
}
if($slc == 'Sponsor'){
	$sql="SELECT * FROM users WHERE (umail='$user_email' AND upass='$user_password')";
	$res = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($res);
	$id=$row[0];
	$user_email=$row[1];
	if($row[0] > 0){
		session_start();
		$_SESSION["umail"]=$user_email;
		$_SESSION["uid"]=$id;
		if($row['utype']=="Sponsor"){
			header('location:profile2.php');
		}
	}
	else{
		echo "<script>alert('Your email or password is incorrect.');window.location.href='login.php'</script>";
	}
}
}
 include("../includes/scripts.php");
?>

</body>
</html>
