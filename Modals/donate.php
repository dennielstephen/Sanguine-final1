
<?php
session_start();
?>
<?php
if(!isset($_SESSION['umail'])){ //if login in session is not set
    header("Location:../Users/login.php");
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
<b>Beneficiary Info:</b>
<br>
<b>Name:</b> <?php
$conn=mysqli_connect('localhost','root','','powerbank');
$sql = "SELECT * FROM users WHERE umail='".$_SESSION["umail"]."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc())
	{
		echo $row['fname']." ".$row['lname'];
	}
}
?>
<br>
<b>Account Number:</b> <?php
$conn=mysqli_connect('localhost','root','','powerbank');
$sql = "SELECT * FROM users WHERE umail='".$_SESSION["umail"]."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc())
	{
		echo $row['accnum'];
	}
}
?>
<br>
<b>Sponsor's Account Name:</b> <input type="text" name="sname">
<br>
<b>Sponsor's Account Number:</b> <input type="text" name="sano">
<br>
<b>Amount:</b> <input type="text">
<br> 	
<button name="btn-donate">DONATE</button>
</form>
<?php
if(isset($_POST['btn-donate'])){
	
	$curl = curl_init();

	curl_setopt_array($curl, array(
	CURLOPT_URL => "https://api.us.apiconnect.ibmcloud.com/ubpapi-dev/sb/api/RESTs/transfer",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_SSL_VERIFYPEER => false,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => "{\"channel_id\":\"BLUEMIX\",\"transaction_id\":\"1ewwer4\",\"source_account\":\"101237493942\",\"source_currency\":\"php\",\"target_account\":\"100802852304\",\"target_currency\":\"php\",\"amount\":1500.5}",
	  CURLOPT_HTTPHEADER => array(
		"accept: application/json",
		"content-type: application/json",
		"x-ibm-client-id: 3cf10ff2-99f2-4476-8f8f-f170f9b6e552",
		"x-ibm-client-secret: E0eS2xQ1hG6lB1pX6pQ3pW4qR5yL7hW3sJ3yY1tB8cB2aG3wC4"
	  ),
	));
	
	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  echo $response;
	}
}
?>

<?php
include("../includes/scripts.php");
?>
</body>
</html>
