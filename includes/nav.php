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
          <button id="demo-menu-lower-right" class="mdl-button mdl-js-button mdl-button--icon">
           <i class="material-icons">more_vert</i>
          </button>

         <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
            for="demo-menu-lower-right">
          <li class="mdl-menu__item"><a href="Users/login.php">Login</a></li>
          <li class="mdl-menu__item"><a href="Users/signup.php">Sign Up</li>
        </ul>
      </nav>
    </div>
  </header>
