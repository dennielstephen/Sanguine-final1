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
button {
	width: 25%;
	font-size: 6px;
}
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}
</style>
</head>
<body>
<?php
	include("../includes/nav.php");
?>
<br>
<br>
<center>
<img src="../users/uploads/user.jpg" alt="" width=175 height=175 style="border-radius: 25%;" border="3"/>
<?php
echo "<br>"."<b>"."Jaycee Mandap"."</b>"."<br>";
echo "Lorem ipsum dolor sit amet,"."<br>"."consectetur adipiscing elit. Proin"."<br>"."tincidunt, odio et eleifend fringilla,"."<br>"."urna ex euismod orci, eget feugiat"."<br>"."est lacus in erat.";
?>
<!-- Trigger/Open The Modal -->
<div>
<button id="myBtn" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">View More</button>
<a href="donate.php"><button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Sponsor</button></a>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
	  <img src="../users/uploads/user.jpg" alt="" width=100 height=100 style="border-radius: 25%;" border="3"/>
      <h2>Jaycee L. Mandap</h2>
    </div>
    <div class="modal-body">
      <p><b>Contact Number:</b> 0910-988-6496</p>
      <p><b>Location:</b> Quezon City, Philippnes</p>
	  <p><b>Gender:</b> Male</p>
	  <p><b>Birthdate:</b> 05-20-1998</p>
	  <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"><p>Go To Profile</p></button>
	  <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"><p>Sponsor</p></button>
    </div>
    <!--<div class="modal-footer">
      <h3>Modal Footer</h3>
    </div>-->
  </div>

</div>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<br>
<img src="../users/uploads/user.jpg" alt="" width=175 height=175 style="border-radius: 25%;" border="3"/>
<?php
echo "<br>"."<b>"."Stephen Mordeno"."</b>"."<br>";
echo "Lorem ipsum dolor sit amet,"."<br>"."consectetur adipiscing elit. Proin"."<br>"."tincidunt, odio et eleifend fringilla,"."<br>"."urna ex euismod orci, eget feugiat"."<br>"."est lacus in erat.";
?>
<!-- Trigger/Open The Modal -->
<div>
<button id="myBtn2" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">View More</button>
<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Sponsor</button>
<br>
<br>
<img src="../users/uploads/user.jpg" alt="" width=175 height=175 style="border-radius: 25%;" border="3"/>
<?php
echo "<br>"."<b>"."Jayr Oprin"."</b>"."<br>";
echo "Lorem ipsum dolor sit amet,"."<br>"."consectetur adipiscing elit. Proin"."<br>"."tincidunt, odio et eleifend fringilla,"."<br>"."urna ex euismod orci, eget feugiat"."<br>"."est lacus in erat.";
?>
<!-- Trigger/Open The Modal -->
<div>
<button id="myBtn2" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">View More</button>
<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Sponsor</button>
<br>
<br>
<img src="../users/uploads/user.jpg" alt="" width=175 height=175 style="border-radius: 25%;" border="3"/>
<?php
echo "<br>"."<b>"."Eugene Ravina"."</b>"."<br>";
echo "Lorem ipsum dolor sit amet,"."<br>"."consectetur adipiscing elit. Proin"."<br>"."tincidunt, odio et eleifend fringilla,"."<br>"."urna ex euismod orci, eget feugiat"."<br>"."est lacus in erat.";
?>
<!-- Trigger/Open The Modal -->
<div>
<button id="myBtn2" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">View More</button>
<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Sponsor</button>

<?php
include("../includes/scripts.php");
?>
</center>
</body>
</html>
