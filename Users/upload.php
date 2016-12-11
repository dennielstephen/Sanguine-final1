<?php
session_start();
?>
<?php
if(!isset($_SESSION['umail'])){ //if login in session is not set
    header("Location:login.php");
}
?>
<?php
$conn=mysqli_connect('localhost','root','','powerbank');
$sql = "SELECT * FROM uploads";
$result = $conn->query($sql);
?>
<?php
if($_FILES['file']['size']>0){
	$imgFile = $_FILES['file']['name'];
	$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
	$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
	$conn=mysqli_connect('localhost','root','','powerbank');
	$imageName = mysqli_real_escape_string($conn,$_FILES["file"]["name"]);
	
	if(in_array($imgExt, $valid_extensions)){
	if($_FILES['file']['size']<=5000000){
		if(move_uploaded_file($_FILES['file']['tmp_name'],"uploads/".$_FILES['file']["name"])){
		//files uploaded
		$sql = "INSERT INTO uploads(pic_name) VALUES ('$imageName')";
		$res = mysqli_query($conn,$sql);
		
		$conn=mysqli_connect('localhost','root','','powerbank');
		$sql3 = "SELECT uid FROM users WHERE umail='".$_SESSION["umail"]."'";
		$result = $conn->query($sql3);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc())
			{
				$sql2 = "UPDATE uploads SET uid=$row[uid]";
				$res2 = mysqli_query($conn,$sql2);
			}
		}
		header ('location:profile.php')
		?>
		<script type="text/javascript">
		parent.document.getElementById("message").innerHTML="<font color='#ff0000'>Success!!</font>";
		parent.document.getElementById("file").value="";
		window.parent.updatepicture("<?php echo 'uploads/'.$_FILES['file']["name"];?>");
		</script>
		<?php
		
	}else{
		//upload failed
		?>
		<script type="text/javascript">
		parent.document.getElementById("message").innerHTML="<font color='#ff0000'>there was an error uploading your image. please try agan later.</font>";
		</script>
		<?php
	}
	}else{
		//the file is too big
		?>
		<script type="text/javascript">
		parent.document.getElementById("message").innerHTML="<font color='#ff0000'>your file is larger than 5mb. please try agan later.</font>";
		</script>
		<?php
	}
} else {
	//the file is not an image
	?>
	<script>
	alert("Please select an image file.");
	</script>
	<?php
	header('Location:profile.php');
}
}


?>