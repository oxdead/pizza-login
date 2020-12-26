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


// // hack to reload entire stylesheet, tries to trick caching, can be visual artefacts, no need to use
// refreshCSS = () => { 
//             let links = document.getElementsByTagName('link'); 
//             for (let i = 0; i < links.length; i++) { 
//                 if (links[i].getAttribute('rel') == 'stylesheet') { 
// 					let href = links[i].getAttribute('href').split('?')[0];
// 					if (href == location.protocol + '//' + location.hostname + '/pizza_login/stylesheet.css') { 
// 						let newHref = href + '?version=' + new Date().getMilliseconds();
// 						links[i].setAttribute('href', newHref);
// 					}
//                 } 
//             } 
//         } 

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

///////////////////////////////////////


function menuBehaviour()
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


function cartClean()
{
	var cooStr = getCookie("mikeypizzacart");
	var coo = cooStr ? JSON.parse(cooStr) : [];
	if(coo && coo.length > 0)
	{
		var init_len = coo.length
		var i = init_len;

		while (i-- && i >= 0) 
		{
			if (coo[i].q < 1) 
			{ 
				coo.splice(i, 1);
			} 
		}

		if(coo.length !== init_len)
		{
			setCookie("mikeypizzacart", JSON.stringify(coo), 30); 
			return true;
		}
	}
	return false;
}

function cartTotalUpdate()
{
	var cartPriceList = document.querySelectorAll("[id^='order-price']");
	var totalPrice = 0;
	for(let cartPrice of cartPriceList)
	{
		totalPrice += parseFloat(cartPrice.innerText);
	}
	var cartPriceTotal = document.querySelector("#order-total-price");
	cartPriceTotal.innerText = totalPrice.toFixed(2).toString(10) + " грн.";

}

function cartIconBehaviour() {

	var cartnumbg = document.querySelector('#showcartnumber1');
	var cartnumtext = document.querySelector('#showcartnumber2');
	if(!cartnumbg || !cartnumtext) { return; }
	
	cooStr = getCookie("mikeypizzacart");
	coo = cooStr ? JSON.parse(cooStr) : [];
	if(coo && coo.length > 0)
	{
		var num_items = 0;
		for(let item of coo)
		{
			num_items += parseInt(item["q"], 10);
		}

		if(num_items > 0)
		{
			cartnumbg.style.display = "inline";
			cartnumtext.innerHTML = num_items;
			return;
		}
	}

	cartnumbg.style.display = "none";
	cartnumtext.innerHTML = 0;

}



function load()
{
	footerBehaviour();
	cartIconBehaviour();
}





function cartAdd(pid, psz)
{
	var cooStr = getCookie("mikeypizzacart");
	var coo = cooStr ? JSON.parse(cooStr) : [];
	if(coo && coo.length > 0)
	{
		var isFound = false;
		for (let item of coo) {
			if(item["id"] == pid.toString() && item["sz"] == psz)
			{
				item["q"]++;
				isFound = true;
				console.log("ADDED ITEM")
				break;
			}
		}
		
		if(!isFound)
		{
			coo.push({"id": pid, "sz": psz, "q": "1"});
			console.log("CREATED ITEM")
		}

		setCookie("mikeypizzacart", JSON.stringify(coo), 30); 
		//window.location = event.target.href + "?id=" + pid + "&sz=" + psz;
	}
	else // create cookie
	{
		var cvalue = [];
		cvalue.push({"id": pid, "sz": psz, "q": "1"});
		setCookie("mikeypizzacart", JSON.stringify(cvalue), 30); 
		//window.location = event.target.href + "?id=" + pid + "&sz=" + psz;
		console.log("CREATED COOKIE")
	}
}

function cartFeedback(event)
{
	event.target.innerHTML = "Додано!";
	setTimeout(() => {
		event.target.innerHTML = "В кошик";
	}, 3000);
}

window.addEventListener("load", () => {
	document.body.addEventListener('click', (event) => {

		if (event.target.id.startsWith("addpizza")) {
			
			event.preventDefault(); // cancel the event (do not go to destination page)

			var pid = event.target.id.replace("addpizza", "");

			var psmall = document.querySelector('#isactvsmall'.concat(pid));
			var pmedium = document.querySelector('#isactvmedium'.concat(pid));
			var plarge = document.querySelector('#isactvlarge'.concat(pid));

			var psz = null;
			if(psmall && psmall.className.includes(" active")) { psz = 's'; }
			else if(pmedium && pmedium.className.includes(" active")) { psz = 'm'; }
			else if(pmedium && plarge.className.includes(" active")) { psz = 'l'; }

			cartAdd(pid, psz);
			cartFeedback(event);
			cartIconBehaviour();
		}
	});
});


var nodeList = document.querySelectorAll(".prevent-collapse");
for (let node of nodeList) {
	node.addEventListener("click", (event) => {
		event.stopPropagation(); // prevent sending event to parent element "collapsible" (do not collapse/expand)
		if(event.target.id.startsWith("order-q-minus"))
		{
			var pid = event.target.id.match(/[0-9]+/);
			var psz = event.target.id.match(/s?m?l?$/);
			var cooStr = getCookie('mikeypizzacart');
			var coo = cooStr ? JSON.parse(cooStr) : [];
			for(let [i, order] of coo.entries())
			{
				if(order['id'] == pid && order['sz'] == psz)
				{
					if(order['q'] > 1) //update input field
					{ 
						var price_elm = document.body.querySelector("#order-price" + pid + "-" + psz);
						var item_price = (price_elm.innerHTML)/(order['q']);

						order['q']--; 
						price_elm.innerHTML = (item_price*order['q']).toFixed(2);
						
						var input_elm = document.body.querySelector("#order-q-input" + pid + "-" + psz);
						input_elm.innerHTML = order['q'];
					}
					else //remove order row if quantity is 0
					{
						coo.splice(i, 1);
						var li_elm = document.body.querySelector("#li" + pid + "-" + psz);
						//console.log(li_elm.children[0].children[0].children[4].innerHTML);
						li_elm.remove();
					}
					setCookie("mikeypizzacart", JSON.stringify(coo), 30); 
					console.log(document.cookie)
					console.log(document.cookie)
					cartClean(); // clean all orders with quantity = 0
					cartIconBehaviour();
				}
			}
		}
		else if(event.target.id.startsWith("order-q-input"))
		{
			//console.log("INPUT TODO");
		}
		else if(event.target.id.startsWith("order-q-plus"))
		{
			var pid = event.target.id.match(/[0-9]+/);
			var psz = event.target.id.match(/s?m?l?$/);
			var cooStr = getCookie('mikeypizzacart');
			var coo = cooStr ? JSON.parse(cooStr) : [];
			for(let order of coo)
			{
				if(order['id'] == pid && order['sz'] == psz)
				{
					if(order['q'] >= 0) //update input field
					{ 
						var price_elm = document.body.querySelector("#order-price" + pid + "-" + psz);
						var item_price = (price_elm.innerHTML)/(order['q']);

						order['q']++; 
						price_elm.innerHTML = (item_price*order['q']).toFixed(2); // .toFixed(2) round to float with 2 decimal places

						var input_elm = document.body.querySelector("#order-q-input" + pid + "-" + psz);
						input_elm.innerHTML = order['q'];
					}

					setCookie("mikeypizzacart", JSON.stringify(coo), 30); 
					cartClean(); // clean all orders with quantity = 0
					cartIconBehaviour();
				}
			}
		}

		cartTotalUpdate();
		

	});
}





/////////////////////////////////////////////////
// details.php
function expandableBehaviour() {
	document.addEventListener('DOMContentLoaded', function() {
		var elems = document.querySelectorAll('.collapsible');
		var instances = M.Collapsible.init(elems, {"accordion" : false});
	});
}


/////////////////////////////////////////////////
// run
expandableBehaviour(); // details.php
menuBehaviour(); // header

</script>

