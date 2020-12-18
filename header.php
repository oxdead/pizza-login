    <nav class="z-depth-0 grey darken-4">
        <div class="container">
            <!--<a href="index.php" class="brand-logo brand-text">Pizza, dude!</a>-->
            <ul id="nav-mobile" class="left hide-on-small-and-down">
                <li> <a href="<?php echo $rooturl?>/index.php" class="btn brand z-depth-0">Mikey's Pizza!</a> </li>
            </ul>

            <ul id="nav-mobile" class="right hide-on-small-and-down">
                <li class="grey-text"> Hello<?php echo htmlspecialchars($name); ?> </li>
                <li class=grey-text> (<?php echo htmlspecialchars($gender); ?>) </li>
                <li> <a href="<?php echo $rooturl?>/login/login_index.php#openlogin" class="btn brand z-depth-0" onclick="toggleLogin()">Login</a> </li>
                <li> <a href="<?php echo $rooturl?>/login/login_index.php#openreg" class="btn brand z-depth-0" onclick="toggleRegister()">Register</a> </li>
            </ul>
        </div>
    </nav>