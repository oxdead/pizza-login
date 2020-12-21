<?php 
$rooturl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'].'/pizza_login';
?>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
<!-- <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">  -->

<!-- Materialize -->
<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<!-- Local stylesheets -->
<!-- <link rel="stylesheet" href="<?=$rooturl?>/stylesheet_login.css" /> -->
<link rel="stylesheet" href="<?=$rooturl?>/stylesheet.css" />




<script type="text/javascript">

function menuBehavior()
{
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
}



function footerBehaviour()
{
	var f = document.getElementsByTagName('footer')[0];
	if(!f) { return; }
	
	if(document.body.clientHeight < window.innerHeight)
	{
		f.style.position = "absolute";
		f.style.bottom = "0";
		f.style.width = "100%";
	}
	else
	{
		f.style.position = "static";
		f.style.bottom = "";
	}

	window.removeEventListener("resize", footerBehaviour);
	window.addEventListener("resize", footerBehaviour);
}


menuBehavior();

function load()
{
	footerBehaviour();
}

// var tabs = document.querySelector('.tabs');
// tabs.style.backgroundColor = "#FFFFFF";

// var tabsi = document.querySelector('.tabs > .indicator');
// tabsi.style.backgroundColor = "#FFFFFF";
//console.log(tabsi.style);


// var nodes = document.getElementsByClassName("tabs");
// for(var i = 0; i < nodes.length; i++) 
// {
//     var node = nodes[i].getElementsByClassName("indicator");
// 	for(var j = 0; j < node.length; j++) 
// 	{
// 		node[j].style.backgroundColor = "#FFA000";
// 	}

// 	var node = nodes[i].getElementsByClassName("tab");
// 	for(var j = 0; j < node.length; j++) 
// 	{
// 		//console.log(node[j]);
		
// 		// for (let i = 0; i < dots.length; ++i) 
// 		// {
// 		// 	dots[i].className = dots[i].className.replace(" active", "");
// 		// }
// 		// dots[slideId-1].className += " active";


// 		var n_a = nodes[i].getElementsByTagName("a");
// 		for(var k = 0; k < n_a.length; k++) 
// 		{
// 			if (n_a[k].className.includes("active"))
// 			{
// 				console.log("IS");
// 				node[j].style.backgroundColor = "#FFA000";
// 				n_a[k].style.backgroundColor = "#FFA000";
// 			}
// 			else
// 			{
// 				console.log("NO");
// 				node[j].style.backgroundColor = "transparent";
// 			}
// 		}
		

// 	}

// }


// function tabSwitch(tabIndex)
// {
// 	var nodes = document.getElementsByClassName("tabs");
// 	for(var i = 0; i < nodes.length; i++) 
// 	{


// 		var node = nodes[i].getElementsByClassName("tab");
// 		for(var j = 0; j < node.length; j++) 
// 		{
// 			var n_a = nodes[i].getElementsByTagName("a");
// 			for(var k = 0; k < n_a.length; k++) 
// 			{
// 				if (n_a[k].className.includes(" active"))
// 				{
// 					n_a[k].style.backgroundColor = "";
// 					n_a[k].style.opacity = "";
// 					n_a[k].className = n_a[k].className.replace(" active", "");
// 				}
// 			}
			
// 			n_a[tabIndex-1].style.opacity = "0.1";
// 			n_a[tabIndex-1].style.backgroundColor = "#FFA000";
			
// 			n_a[tabIndex-1].className += " active";
// 		}

// 		var node = nodes[i].getElementsByClassName("indicator");
// 		for(var j = 0; j < node.length; j++) 
// 		{
// 			node[j].style.backgroundColor = "#FFA000";
// 		}

// 	}
// }



// var tabsla = document.querySelector('.tabs li a');
// tabsla.style.backgroundColor = "#FFFFFF";

//   // TAB Color
// $(".tabs" ).css("background-color", "#ee6e73");

// TAB Indicator/Underline Color
// $(".tabs>.indicator").css("background-color", '#FFF');

// // TAB Text Color
// $(".tabs>li>a").css("color", '#FFF');


</script>

