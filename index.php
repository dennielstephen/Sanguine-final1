<?php
session_start();
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <title>SANGUINE</title>
  <link rel="shortcut icon" href="assets/img/sanguine.png">

  <!-- Page styles -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">

  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body >
  <!-- Always shows a header, even in smaller screens. -->
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header nav">
      <div class="mdl-layout__header-row">
        <!-- Title -->
        <span class="mdl-layout-title"><img src="assets/img/sanguine.png"  height="80" width="80"></span>
        <!-- Add spacer, to align navigation to the right -->
        <div class="mdl-layout-spacer"></div>
        <!-- Navigation. We hide it in small screens. -->
        <nav class="mdl-navigation">

        <a class="mdl-navigation__link" href="Users/AboutUs.php">About Us</a>

      <!-- Right aligned menu below button -->
            <button id="demo-menu-lower-right"
                    class="mdl-button mdl-js-button mdl-button--icon">
              <i class="material-icons">more_vert</i>
            </button>
            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                for="demo-menu-lower-right">
              <li class="mdl-menu__item"><a class="mdl-navigation__link" href="Users/signup.php"><i class="material-icons">person_add</i>Sign Up</a></li>
              <li class="mdl-menu__item"><a class="mdl-navigation__link" href="Users/login.php"><i class="material-icons">account_circle</i>Login</a></li>
            </ul>
        </nav>
      </div>
    </header>
  
    <main class="mdl-layout__content">
	    <div class="page-content">
         <div class="home-header">
            <div class="title">
              <h1>Turn you dreams into reality</h1>
            </div>
            <!-- Colored raised button -->
               <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-btn">
                <a href="Users/login.php">Be A Scholar Now!</a>
               </button>
         </div>
	     </div>
	  </main>
	  </div>

    <script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.6.3/firebase.js"></script>
    <script>
      // Initialize Firebase
      var config = {
        apiKey: "AIzaSyDW9DbVWK9kzqAzDx2x4aIvjTCXv1Mj0e4",
        authDomain: "sample-11d2d.firebaseapp.com",
        databaseURL: "https://sample-11d2d.firebaseio.com",
        storageBucket: "sample-11d2d.appspot.com",
        messagingSenderId: "105637292347"
      };
      firebase.initializeApp(config);
    </script>

</body>
</html>
