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
<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->

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

menuBehavior();



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


function load()
{
	footerBehaviour();
}



// window.addEventListener('load', function()
// {
//     var xhr = null;

//     getXmlHttpRequestObject = function()
//     {
//         if(!xhr)
//         {               
//             // Create a new XMLHttpRequest object 
//             xhr = new XMLHttpRequest();
//         }
//         return xhr;
//     };

//     function evenHandler()
//     {
//         // Check response is ready or not
//         if(xhr.readyState == 4 && xhr.status == 200)
//         {
//             dataDiv = document.getElementById('liveData');
//             // Set current data text
//             dataDiv.innerHTML = xhr.responseText;
//             // Update the live data every 1 sec
//             setTimeout(updateLiveData(), 1000);
//         }
//     }

//     updateLiveData = function()
//     {
//         var now = new Date();
//         // Date string is appended as a query with live data 
//         // for not to use the cached version 
//         var url = 'livefeed.txt?' + now.getTime();
//         xhr = getXmlHttpRequestObject();
//         xhr.onreadystatechange = evenHandler;
//         // asynchronous requests
//         xhr.open("GET", url, true);
//         // Send the request over the network
//         xhr.send(null);
//     };

//     updateLiveData();


// });



// window.addEventListener("load", () => {
//         document.querySelector('[class^="addpizza"]').addEventListener("click", e => {
//             console.log("HERE");
// 			// alert("Clicked!");
//             // Can also cancel the event and manually navigate
//             e.preventDefault();
//             // window.location = e.target.href;
//         });
//     });


// set listener wrapper for body and go to details.php with GET['id'] and GET['sz'] set.
// window.addEventListener("load", () => {
// 	document.body.addEventListener('click', event => {
// 		console.log(event);

// 		if (event.target.id.startsWith("addpizza")) {
			
// 			event.preventDefault();

// 			var pid = event.target.id.replace("addpizza", "");

// 			var psmall = document.querySelector('#isactvsmall'.concat(pid));
// 			var pmedium = document.querySelector('#isactvmedium'.concat(pid));
// 			var plarge = document.querySelector('#isactvlarge'.concat(pid));

// 			// do check typeof psmall != "undefined" or not necessary ??
// 			if(psmall && psmall.className.includes(" active"))
// 			{
// 				window.location = event.target.href + "?id=" + pid + "&sz=" + "s";
// 			}
// 			else if(pmedium && pmedium.className.includes(" active"))
// 			{
// 				window.location = event.target.href + "?id=" + pid + "&sz=" + "m";
// 			}
// 			else if(pmedium && plarge.className.includes(" active"))
// 			{
// 				window.location = event.target.href + "?id=" + pid + "&sz=" + "l";
// 			}

// 		}
// 	});
// });

function isCookieExist(name)
{
	// unserialize cookie to object
	var cooObj = document.cookie.split(';').reduce((res, c) => {
		const [key, val] = c.trim().split('=').map(decodeURIComponent)
		try {
			return Object.assign(res, { [key]: JSON.parse(val) })
		} catch (e) {
			return Object.assign(res, { [key]: val })
		}
	}, {});

	return (cooObj && cooObj.hasOwnProperty(name));

}


function getCookie(name) {
	const value = `; ${document.cookie}`;
	const parts = value.split(`; ${name}=`);
	if (parts.length === 2) 
	{ 
		return parts.pop().split(';').shift(); 
	}
}

function setCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays*24*60*60*1000));
	var expires = "expires="+ d.toUTCString();
	document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}






window.addEventListener("load", () => {
	document.body.addEventListener('click', event => {
		console.log(event);

		if (event.target.id.startsWith("addpizza")) {
			
			event.preventDefault();

			var pid = event.target.id.replace("addpizza", "");

			var psmall = document.querySelector('#isactvsmall'.concat(pid));
			var pmedium = document.querySelector('#isactvmedium'.concat(pid));
			var plarge = document.querySelector('#isactvlarge'.concat(pid));

			// do check typeof psmall != "undefined" or not necessary ??
			if(psmall && psmall.className.includes(" active"))
			{

				var cname = "cart";
				var cvalue = {"id": pid, "sz": "s"};
				var exdays = 30;
				setCookie(cname, JSON.stringify(cvalue), exdays);
				//window.location = event.target.href + "?id=" + pid + "&sz=" + "s";
			}
			else if(pmedium && pmedium.className.includes(" active"))
			{

				//var getting = document.cookie;
				//console.log(getting);

				var cooStr = getCookie("mikeypizzacart");
				//console.log(coo["id"]);
				var coo = [];
				if(cooStr)
				{	
					coo = JSON.parse(cooStr);
				}

				if(coo)
				{
					coo.push({"id": pid, "sz": "m"});
					setCookie("mikeypizzacart", JSON.stringify(coo), 30); 
					console.log("PUSHED")
					console.log(document.cookie);
				}
				else
				{
					var cvalue = [];
					cvalue.push({"id": pid, "sz": "m"});
					setCookie("mikeypizzacart", JSON.stringify(cvalue), 30); 
					console.log("CREATED")
				}
	

				

				//todo: get cookie cart, json decode, append new added item instead of creating new one
				

				

				
				//window.location = event.target.href + "?id=" + pid + "&sz=" + "m";
			}
			else if(pmedium && plarge.className.includes(" active"))
			{
				var cname = "cart";
				var cvalue = {"id": pid, "sz": "l"};
				var exdays = 30;
				setCookie(cname, JSON.stringify(cvalue), exdays);
				//window.location = event.target.href + "?id=" + pid + "&sz=" + "l";
			}

		}
	});
});






// var el = document.querySelector('.tabs');
// var instance = M.Tabs.init(el, {});

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

