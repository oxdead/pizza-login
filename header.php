<?php 
require_once 'session_ease.php';
$shead = new SessionEase();
$rooturl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'].'/pizza_login';

$btnLogin = [
    ($shead->valid()) ? "out" : "in",
    ($shead->valid()) ? "ВИЙТИ" : "ВВІЙТИ"
];
?>



<div id="nav">
    <div class="navbar-fixed">
        <nav class="z-depth-0 grey darken-4">
            <div class="nav-wrapper container">
                <div class="row">
                    <div class="col s12">
                        <ul class="left hide-on-small-and-down">
                            <li >
                                <a href="<?=$rooturl?>/index.php">
                                    <img src="<?=$rooturl?>/img/mikey_icon.png" alt="Mikey's Pizza!" width="44px" height="44px" style="vertical-align:middle;"> 
                                    <p class="logolabel grey-text text-lighten-2">MIKEY's PIZZA!</p>
                                </a>
                            </li>
                        </ul>

                        <ul id="nav-mobile" class="right">
                            <li class="grey-text hide-on-small-and-down"> Привіт, <?php echo htmlspecialchars($shead->name()); ?>!&nbsp&nbsp</li>
                            <li> 
                                <a href="<?=$rooturl?>/details.php" class="no-padding transparent my-relative">
                                    <img src="<?=$rooturl?>/img/shopping-cart-icon.png" alt="Shopping cart" width="36px" height="36px" style="vertical-align:middle;">
                                    <div id="showcartnumber1">
                                        <span id="showcartnumber2"></span>
                                    </div>
                                </a>
                            </li>

                            <li class="hide-on-small-and-down"> 
                                <a href="<?=$rooturl?>/login/log<?=$btnLogin[0]?>.php" class="btn brand z-depth-0" style="margin-right:0px;">
                                    <?=$btnLogin[1]?>
                                </a> 
                            </li>
                            <li> 
                                <a href="#!" data-target="mobile-menu-open" class="sidenav-trigger show-on-large no-padding transparent">
                                    <img src="<?=$rooturl?>/img/menu-icon.png" alt="Side menu" width="36px" height="36px" style="vertical-align:middle;">
                                </a>
                            </li>
                                
                        </ul>
                    </div>			
                </div>
            </div>
        </nav>
    </div>
</div>


<ul id="mobile-menu-open" class="sidenav">
    <li>
        <div class="user-view">
            <div class="background grey darken-2">

            </div>
            <a href="#!"><img class="circle" src="<?=$rooturl?>/img/avatar-placeholder.png"></a>
            <a href="#!"><span class="white-text name"><?php echo htmlspecialchars($shead->fullname()); ?></span></a>
            <a href="#!"><span class="white-text email"><?php echo htmlspecialchars($shead->email()); ?></span></a>
        </div>
    </li>    
    <li><a href="<?=$rooturl?>/index.php" target="_self">Головна</a></li>
    <li><a href="<?=$rooturl?>/login/register.php" target="_self">Реєстрація</a></li>
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
