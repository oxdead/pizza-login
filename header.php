<nav class="z-depth-0 grey darken-4">
	<div class="nav-wrapper">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <ul class="left hide-on-small-and-down">
                        <li >
                            <a href="<?php echo $rooturl?>/index.php">
                                <img src="<?=$rooturl?>/img/mikey_icon.png" alt="Mikey's Pizza!" width="44px" height="44px" style="vertical-align:middle;"> 
                                <p class="logolabel grey-text text-lighten-2">MIKEY's PIZZA!</p>
                            </a>
                        </li>
                    </ul>

                    <ul id="nav-mobile" class="right">
                        <li class="grey-text hide-on-small-and-down"> Привіт, <?php echo htmlspecialchars($name); ?>!&nbsp&nbsp</li>
                        <!-- <li class="grey-text hide-on-small-and-down"> <?php echo htmlspecialchars($gender); ?> </li> -->
                        <li> 
                            <a href="details.php" class="no-padding transparent my-relative">
                                <img src="<?=$rooturl?>/img/shopping-cart-icon.png" alt="Shopping cart" width="36px" height="36px" style="vertical-align:middle;">
                                <!-- <div style="text-align:center">
                                    <span class="circle" style="position:relative;
                                                                top:-70px;left:10px;
                                                                color:white;
                                                                background-color:coral;
                                                                padding:0.2em 0.2em;
                                                                width:same-as-height;">
                                        <?php 
                                            if(count($cartroll) < 9) { echo '&nbsp'; } 
                                            echo count($cartroll);
                                        ?>
                                    </span>
                                </div> -->
                                    

                                <div id="showcartnumber1">
                                    <span id="showcartnumber2"></span>
                                </div>

                                    
                                
                            </a>

                        </li>

                        <li class="hide-on-small-and-down"> <a href="<?=$rooturl?>/login/login.php" class="btn brand z-depth-0" style="margin-right:0px;">Ввійти </a> </li>
                        <li> 
                            <a href="#!" data-target="mobile-menu-open" class="sidenav-trigger show-on-large no-padding transparent">
                                <img src="<?=$rooturl?>/img/menu-icon.png" alt="Side menu" width="36px" height="36px" style="vertical-align:middle;">
                            </a>
                        </li>
                          
                    </ul>
                </div>			
            </div>
        </div>
	</div>
</nav>


<ul id="mobile-menu-open" class="sidenav">
    <li>
        <div class="user-view">
            <div class="background">
                <img src="http://placehold.it/640/555">
            </div>
            <a href="#!"><img class="circle" src="http://placehold.it/640/333"></a>
            <a href="#!"><span class="white-text name"><?=$name;?></span></a>
            <a href="#!"><span class="white-text email"><?=$user_email;?></span></a>
        </div>
    </li>    
    <li><a href="https://github.com/dogfalo/materialize/" target="_blank">Головна</a></li>
    <li><a href="https://twitter.com/MaterializeCSS" target="_blank">Реєстрація</a></li>
    <li><div class="divider"></div></li>
    <li><a href="http://next.materializecss.com/getting-started.html" target="_blank">Залишити відгук</a></li>
    <li><a href="http://next.materializecss.com/getting-started.html" target="_blank">Про нас</a></li>

    <!-- subheader example -->
    <!-- <li><a class="subheader">Subheader</a></li> -->

    <!-- dropdown submenus: accordion example -->
    <!-- <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li>
                <a class="collapsible-header waves-effect">Dropdown<i class="material-icons">folder</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a class="waves-effect" href="#!">First</a></li>
                        <li><a class="waves-effect" href="#!">Second</a></li>
                        <li><a class="waves-effect" href="#!">Third</a></li>
                        <li><a class="waves-effect" href="#!">Fourth</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </li> -->

</ul>
