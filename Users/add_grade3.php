<?php
include('check.php');
?>
<?php
require_once('cs/class_students3.php');
$user = new USER();

if(isset($_POST['btn-signup']))
{
	$gid = strip_tags($_POST['grade_id']);
	$sid = strip_tags($_POST['stud_id']);
	$LN = strip_tags($_POST['last_name']);
	$FN = strip_tags($_POST['first_name']);
	$Sect = strip_tags($_POST['section_id']);
	$UMail = strip_tags($_POST['user_email']);
	$UPass = strip_tags($_POST['user_pass']);
/*----------------------GRADE      ID-------------------------------------*/
	if($gid=="")	{
		$error[] = "provide Grade ID !";	
	}
	else if(strlen($gid) > 3){
		$error[] = "ID should be less than 3 digits !";
	}
/*----------------------STUDENT    ID-------------------------------------*/
	if($sid=="")	{
		$error[] = "provide Student ID !";	
	}
	else if(strlen($sid) > 3){
		$error[] = "ID should be less than 3 digits !";
	}
/*----------------------FULL     NAME-------------------------------------*/
	else if($LN=="")	{
		$error[] = "provide Last Name !";	
	}
	else if($FN=="")	{
		$error[] = "provide First Name !";	
	}
/*----------------------USER EMAIL/PASS-----------------------------------*/
	else if($UMail=="")	{
		$error[] = "provide E-Mail !";	
	}
	else if(!filter_var($UMail, FILTER_VALIDATE_EMAIL))	{
	    $error[] = 'Please enter a valid email address !';
	}
	else if($UPass=="")	{
		$error[] = "provide Password !";	
	}
	else if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z]{6,}$/', $UPass))
	{
    	$error[] = "The password does not meet the requirements !"."<br>"."Password Requirements: "
    	."<br>"."* &nbsp Must include at least one letter."
    	."<br>"."* &nbsp Must include at least one number."
    	."<br>"."* &nbsp Must not contain any special characters."
    	."<br>"."* &nbsp Must not be less than 6 characters.";
	}

	else
	{
		try
		{
			$sql = "SELECT grade_id,stud_id,last_name,first_name,section_id,user_email,user_pass,dec_pass FROM stud_grade_tbl WHERE stud_id=:sid OR grade_id=:gid OR user_email=:ue";
			$stmt = $user->runQuery($sql);
			$stmt->execute(array(':sid'=>$sid,':gid'=>$gid,':ue'=>$UMail));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			
			if($row['stud_id']==$sid) {
				$error[] = "Student ID already used";
			}
			else if($row['grade_id']==$gid) {
				$error[] = "Grade ID already used";
			}
			else if($row['user_email']==$UMail) {
				$error[] = "E-Mail already used";
			}
			else{
				if($user->register($sid,$gid,$LN,$FN,$Sect,$UMail,$UPass)){	
					$user->redirect('add_grade3.php?joined');
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
<!DOCTYPE html">
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sign Up</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="../images/ico/portalLogo.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>
<br>
<br>
<link rel="stylesheet" type="text/css" href="../login.css" />
    <div class="container">
		<center><img src="../pictures/head.png"></center>
		<?php
			if(isset($error))
			{
			 	foreach($error as $error)
			 	{
					 ?>
                     <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                     </div>
                     <?php
				}
			}
			else if(isset($_GET['joined']))
			{
				 ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully added data <a href='3_admin_students.php'>go back</a> here
                 </div>
                 <?php
			}
			?>
        <form class="form-signin" role="form" method="post">
        Grade ID: <input type="text" class="form-control" name="grade_id" placeholder="Enter Grade ID (00*)" value="<?php if(isset($error)){echo $gid;}?>" />
		Student ID: <input type="text" class="form-control" name="stud_id" placeholder="Enter Student ID (00*)" value="<?php if(isset($error)){echo $sid;}?>" />
        Last Name: <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" value="<?php if(isset($error)){echo $LN;}?>" />
        First Name: <input type="text" class="form-control" name="first_name" placeholder="Enter First Name" value="<?php if(isset($error)){echo $FN;}?>" />
        E-Mail: <input type="text" class="form-control" name="user_email" placeholder="Enter E-Mail" value="<?php if(isset($error)){echo $UMail;}?>" />
        Password: <input type="text" class="form-control" name="user_pass" placeholder="Enter Password" value="<?php if(isset($error)){echo $UPass;}?>" />
        <button type="submit" class="btn btn-primary" name="btn-signup">		
           	<i class="glyphicon glyphicon-open-file"></i>&nbsp;ADD
        </button>
	</div>

</body>
</html>