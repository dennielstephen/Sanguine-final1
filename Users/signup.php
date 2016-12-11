<?php
session_start();



require('class_user.php');
$user = new USER();

if(isset($_POST['btn-signup'])){
	$FN = strip_tags($_POST['fname']);
	$LN = strip_tags($_POST['lname']);
	$UMail = strip_tags($_POST['umail']);
	$UPass = strip_tags($_POST['upass']);
	$RUPass = strip_tags($_POST['rupass']);
	$UType = strip_tags($_POST['utype2']);
	$BDay = strip_tags($_POST['bday']);
	$Gen = strip_tags($_POST['gender2']);
	$Cont = strip_tags($_POST['cont']);
/*----------------------FULL     NAME-------------------------------------*/
	if($FN=="")	{
		$error[] = "provide First Name!";
	}
	else if($LN=="")	{
		$error[] = "provide Last Name!";
	}
/*--------------------------USER------------------------------------------*/
	if($UType=="")	{
		$error[] = "Select User Type!";
	}
	if($BDay=="") {
		$error[] = "Provide Birthday!";
	}
	if($Gen=="") {
		$error[] = "Select Gender!";
	}
	if($Cont=="") {
		$error[] = "Select Contact Number!";
	}
/*----------------------USER EMAIL/PASS-----------------------------------*/
	if($UMail=="")	{
		$error[] = "provide E-Mail!";
	}
	else if(!filter_var($UMail, FILTER_VALIDATE_EMAIL))	{
	    $error[] = 'Please enter a valid email address!';
	}
	if($UPass=="")	{
		$error[] = "provide Password!";
	}
	else if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z]{6,}$/', $UPass))
	{
		?>
		<script type='text/javascript'>
    	alert("The password does not meet the requirements!\nPassword Requirements:\n* Must include at least one letter.\n* Must include at least one number.\n* Must not contain any special characters.\n* Must not be less than 6 characters.")
		</script>
		<?php
	}
	if($RUPass!=$UPass)	{
		?>
		<script>
		alert("Wrong password");
		</script>
		<?php
	}

	else
	{
		try
		{
			$sql = "SELECT fname,lname,umail,upass,utype,bday,gender,contno FROM users WHERE umail=:ue";
			$stmt = $user->runQuery($sql);
			$stmt->execute(array(':ue'=>$UMail));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);

			if($row['umail']==$UMail) {
				$error[] = "E-Mail already used";
			}
			else{
				if($user->register($FN,$LN,$UMail,$UPass,$UType,$BDay,$Gen,$Cont)){
					$user->redirect('signup.php?joined');
					?>
					<script>
						alert("You are now registered!");
					</script>
					<?php
					header("Location: login.php");
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}
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

<script>
  $(document).ready(function() {
    $("#utype2").change(function(){
      $("#utype_hidden").val(("#utype2").find(":selected").text());
    });
  });
</script>
<script>
  $(document).ready(function() {
    $("#gender2").change(function(){
      $("#gender_hidden").val(("#gender2").find(":selected").text());
    });
  });
</script>
</head>
<body>
  <!-- Always shows a header, even in smaller screens. -->
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header nav">
      <div class="mdl-layout__header-row">
        <!-- Title -->
        <span class="mdl-layout-title nav"> SANGUINE</span>
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
                  <li class="mdl-menu__item"><a class="mdl-navigation__link" href="signup.php"><i class="material-icons">person_add</i>Sign Up</a></li>
                  <li class="mdl-menu__item"><a class="mdl-navigation__link" href="login.php"><i class="material-icons">account_circle</i>Login</a></li>
                </ul>
        </nav>
      </div>
    </header>
  <main class="mdl-layout__content">
    <div class="page-content">

  <form method="POST">
      <img class="img-logo2" src="../assets/img/sanguine.png" ><br>
    <div class="mdl-box-su">
		<div class="mdl-textfield mdl-js-textfield">
		<input class="mdl-textfield__input" type="text"  placeholder="First Name" name="fname" id="fname">
		<label class="mdl-textfield__label" for="First Name">First Name</label>
		</div>
		<br>
	<div class="mdl-textfield mdl-js-textfield">
		<input class="mdl-textfield__input" type="text"  placeholder="Last Name" name="lname" id="lname">
		<label class="mdl-textfield__label" for="sample1">Last Name</label>
		</div>
	<br>
		<div class="mdl-textfield mdl-js-textfield">
		<input class="mdl-textfield__input" type="email"  placeholder="E-mail" name="umail" id="email">
		<label class="mdl-textfield__label" for="sample1">E-mail</label>
		</div>
		<br>
        <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="password" placeholder="Password" name="upass" id="password">
        <label class="mdl-textfield__label" for="sample1">Password</label>
		</div>
    <br>
        <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="password" placeholder="Re-type Password" name="rupass" id="password2">
        <label class="mdl-textfield__label" for="sample1">Re-type Password</label>
		</div>
		<br>

		<div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="date" name="bday" placeholder="Birthday" id="bday">
        <label class="mdl-textfield__label" for="sample1">Birthday</label>
		</div>

		<br>

		<select class="mdl-button  mdl-js-ripple-effect" name="gender2" id="gender2">
		<option value="FSO" selected="selected">---Gender---</option>
		<option value="Male">Male</option>
		<option value="Female">Female</option>
		</select>

		<br>

		<div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" placeholder="Contact Number" name="cont" id="cont">
        <label class="mdl-textfield__label" for="sample1">Contact Number</label>
		</div>

		<br>
    <input type="hidden" name="gender" id="gender_hidden">
    <br>
		<select class="mdl-button  mdl-js-ripple-effect" name="utype2" id="utype2">
		<option value="FSO" selected="selected">---</option>
		<option value="Scholar">Scholar</option>
		<option value="Sponsor">Sponsor</option>
		</select>
		<input type="hidden" name="utype" id="utype_hidden">

       <br>
       <button type="submit" name="btn-signup" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
         REGISTER
       </button>&nbsp;&nbsp;&nbsp;
       <a href="login.php"><button type="button" name="btn-back" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
         BACK
       </button></a><br><br>
    </div>
  </form>
</div>
  </main>
</div>
<?php
include("../includes/scripts.php");
?>
</body>
</html>
