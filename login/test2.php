<!DOCTYPE html>
<html>
<head>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>



</head>
<body>






<nav>
	<div class="nav-wrapper">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <ul class="left hide-on-small-and-down">
                        <li><a href="https://github.com/dogfalo/materialize/" target="_blank">Github</a></li>
                        <li><a href="https://twitter.com/MaterializeCSS" target="_blank">Twitter</a></li>
                    </ul>
                    

                    <ul id="nav-mobile" class="right">
                        <li class="grey-text hide-on-small-and-down"> Привіт</li>
                        <li class="grey-text hide-on-small-and-down"> <?php echo "" ?> </li>
                        <li class="hide-on-small-and-down">> <a href="<?=$rooturl?>/login/login.php" class="btn brand z-depth-0">Ввійти </a> </li>
                        
                        <li> <a href="#!" data-target="mobile-menu" class="right sidenav-trigger show-on-large"><i class="material-icons">menu</i></a>  </li>
                          
                    </ul>
                </div>			
            </div>
        </div>
	</div>
</nav>




<ul id="mobile-menu" class="sidenav">

	<li>
		<div class="user-view">
            <div class="background">
                <img src="http://placehold.it/640/555">
            </div>
            <a href="#!"><img class="circle" src="http://placehold.it/640/333"></a>
            <a href="#!"><span class="white-text name">John Doe</span></a>
            <a href="#!"><span class="white-text email">jdandturk@gmail.com</span></a>
        </div>
    </li>    
    <li><a href="https://github.com/dogfalo/materialize/" target="_blank">Github</a></li>
	<li><a href="https://twitter.com/MaterializeCSS" target="_blank">Twitter</a></li>
	<li><a href="http://next.materializecss.com/getting-started.html" target="_blank">Docs</a></li>

	<li><div class="divider"></div></li>
	<li><a class="subheader">Subheader</a></li>
	<li class="no-padding">
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
	</li>
	<li class="no-padding">
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
	</li>
</ul>




</body>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>



<script>

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, {edge:'right'});
  });

var sidenavs = document.querySelectorAll('.sidenav')
for (var i = 0; i < sidenavs.length; i++){
	M.Sidenav.init(sidenavs[i]);
}
var dropdowns = document.querySelectorAll('.dropdown-trigger')
for (var i = 0; i < dropdowns.length; i++){
	M.Dropdown.init(dropdowns[i]);
}
var collapsibles = document.querySelectorAll('.collapsible')
for (var i = 0; i < collapsibles.length; i++){
	M.Collapsible.init(collapsibles[i]);
}
var featureDiscoveries = document.querySelectorAll('.tap-target')
for (var i = 0; i < featureDiscoveries.length; i++){
	M.FeatureDiscovery.init(featureDiscoveries[i]);
}
var materialboxes = document.querySelectorAll('.materialboxed')
for (var i = 0; i < materialboxes.length; i++){
	M.Materialbox.init(materialboxes[i]);
}
var modals = document.querySelectorAll('.modal')
for (var i = 0; i < modals.length; i++){
	M.Modal.init(modals[i]);
}
var parallax = document.querySelectorAll('.parallax')
for (var i = 0; i < parallax.length; i++){
	M.Parallax.init(parallax[i]);
}
var scrollspies = document.querySelectorAll('.scrollspy')
for (var i = 0; i < scrollspies.length; i++){
	M.ScrollSpy.init(scrollspies[i]);
}
var tabs = document.querySelectorAll('.tabs')
for (var i = 0; i < tabs.length; i++){
	M.Tabs.init(tabs[i]);
}
var tooltips = document.querySelectorAll('.tooltipped')
for (var i = 0; i < tooltips.length; i++){
	M.Tooltip.init(tooltips[i]);
}
</script>


</html>