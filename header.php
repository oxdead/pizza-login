   <nav class="z-depth-0 grey darken-4">
        <div class="container">
            <ul id="nav-mobile" class="left hide-on-small-and-dow">
                <li >
                    <a href="<?php echo $rooturl?>/index.php">
                        <img src="<?=$rooturl?>/img/mikey_icon.png" alt="Mikey's Pizza!" width="44px" height="44px" style="vertical-align:middle"> 
                        <p class="logolabel grey-text text-lighten-2">MIKEY's PIZZA!</p>
                    </a>
                </li>
            </ul>

            <ul id="nav-mobile" class="right hide-on-small-and-down">
                <li class="grey-text"> Привіт, <?php echo htmlspecialchars($name); ?> </li>
                <li class=grey-text> <?php echo htmlspecialchars($gender); ?> </li>
                <li> <a href="<?=$rooturl?>/login/login.php" class="btn brand z-depth-0">Ввійти </a> </li>
                <li> <a href="<?=$rooturl?>/login/register.php" class="btn brand z-depth-0">Реєстр..</a> </li>
            </ul>
        </div>
    </nav>

    
