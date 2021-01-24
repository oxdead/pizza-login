
function getCurTime(isMs = false)
{
    let currentDate = new Date();
    return currentDate.getHours() + ":" + currentDate.getMinutes() + ":" + currentDate.getSeconds() + (isMs ? (":" + currentDate.getMilliseconds()) : "");
}

// up to body tag (excluding body)
function getParentById(parent, predicateFunc)
{
	if(!parent) { return null; }
	let tagName = new String(parent.tagName);
	if(tagName.toUpperCase() === "BODY") { return null; }

	if(predicateFunc(parent.id)) { return parent; }

	return getParentById(parent.parentNode, predicateFunc)
}


// works if there are no interactable elements which can change docunebt height (like accordion for example)
// function footerBehaviourInit()
// {
// 	var f = document.getElementsByTagName('footer')[0];
// 	if(!f) { return; }
	
// 	if(document.body.clientHeight < window.innerHeight)
// 	{
// 		f.style.position = "absolute";
// 		f.style.bottom = "0";
// 		f.style.width = "100%";
// 	}
// 	else
// 	{
// 		f.style.position = "static";
// 		f.style.bottom = "";
// 	}

// 	window.removeEventListener("resize", footerBehaviourInit);
// 	window.addEventListener("resize", footerBehaviourInit);
// }


// loop way of creating callbacks
// window.addEventListener("load", () => {
// 	document.body.addEventListener('click', (event) => {

// 		if (event.target.id.startsWith("addpizza")) {
			
// 			event.preventDefault(); // cancel the event (do not go to destination page)

// 			var pid = event.target.id.replace("addpizza", "");

// 			var psmall = document.querySelector('#isactvsmall'.concat(pid));
// 			var pmedium = document.querySelector('#isactvmedium'.concat(pid));
// 			var plarge = document.querySelector('#isactvlarge'.concat(pid));

// 			var psz = null;
// 			if(psmall && psmall.className.includes(" active")) { psz = 's'; }
// 			else if(pmedium && pmedium.className.includes(" active")) { psz = 'm'; }
// 			else if(pmedium && plarge.className.includes(" active")) { psz = 'l'; }

// 			cartAdd(pid, psz);
// 			cartFeedback(event);
// 			cartIconBehaviour();
// 		}
// 	});
// });
