<?php 
require_once __DIR__.'/session_ease.php';

$btnLogin = [
    ($s->loggedIn()) ? "out" : "in",
    ($s->loggedIn()) ? "ВИЙТИ" : "ВВІЙТИ"
];
?>

<header>
    <div id="nav">
        <div class="navbar-fixed">
            <nav class="z-depth-0 grey darken-4">
                <div class="nav-wrapper container">
                    <div class="row">
                        <div class="col s12">
                            <ul class="left hide-on-small-and-down">
                                <li>
                                    <a href="<?=$rooturl?>/index.php">
                                        <img src="<?=$rooturl?>/img/mikey_icon.png" alt="Mikey's Pizza!" width="44px" height="44px" style="vertical-align:middle;"> 
                                        <p class="logolabel grey-text text-lighten-2">MIKEY's PIZZA!</p>
                                    </a>
                                </li>
                            </ul>

                            <ul id="nav-mobile" class="right row">
                                <li class="grey-text hide-on-small-only"> Привіт, <?php echo htmlspecialchars($s->name()); ?>!&nbsp&nbsp</li>
                                <li> 
                                    <div class="cart-container">
                                        <a href="<?=$rooturl?>/site/details.php">
                                            <img src="<?=$rooturl?>/img/shopping-cart-icon.png" alt="Shopping cart" width="36px" height="36px" style="vertical-align:middle;">
                                        </a>
                                        <div id="showcartnumber1">
                                            <span id="showcartnumber2"></span>
                                        </div>
                                    </div>
                                </li>

                                <li class="hide-on-small-only"> 
                                    <a href="<?=$rooturl?>/login/log<?=$btnLogin[0]?>.php" class="btn brand z-depth-0" style="margin-right:0px;margin-left:0px;">
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
                <a href="#!"><span class="white-text name"><?php echo htmlspecialchars($s->fullname()); ?></span></a>
                <a href="#!"><span class="white-text email"><?php echo htmlspecialchars($s->email()); ?></span></a>
            </div>
        </li>    
        <li><a href="<?=$rooturl?>/index.php" target="_self">Головна</a></li>
        <li><a href="<?=$rooturl?>/login/login.php" target="_self">Ввійти</a></li>
        <li><a href="<?=$rooturl?>/login/register.php" target="_self">Реєстрація</a></li>
            <!-- subheader example -->
        <li><a class="subheader">Мій профіль</a></li>
        <!-- divider example -->
        <li><div class="divider"></div></li>
        <li><a href="<?=$rooturl?>/site/dummypage.php" target="_blank">Залишити відгук</a></li>
        <li><a href="<?=$rooturl?>/site/dummypage.php" target="_blank">Про нас</a></li>



        <!-- dropdown submenus: accordion example -->
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
                <li>
                    <a class="collapsible-header waves-effect" style="padding-left:32px;">Контакти</a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a class="waves-effect" style="padding-left:50px;font-style: italic;" href="#!">info@mikespizza.ua</a></li>
                            <li><a class="waves-effect" style="padding-left:50px;font-style: italic;" href="#!">Тел. +380000000000</a></li>
                            <li><a class="waves-effect" style="padding-left:50px;font-style: italic;" href="#!">Адреса: Nostromo, LV-426</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</header>