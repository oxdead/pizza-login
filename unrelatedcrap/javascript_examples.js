
//////////////////////////////////////////////
// foreach example, do not use it, foreach in javascript sucks, can't easily be breaked
// var bla = {"id": 2, "sz": "m"};
// var yo = [
//     {"id": 1, "sz": "s"},
//     {"id": 2, "sz": "m"},
//     {"id": 2, "sz": "m"},
//     {"id": 3, "sz": "l"},
// ]

// function isObjExistPredicate(item, index) {
//     if(item["id"] === bla["id"])
//     {
//         if(item["sz"] === bla["sz"])
//         {
//         }
//     }
    
// } 
// yo.forEach(isObjExistPredicate);





///////////////////////////////////////////////////////////////////////////////////////////
// // set listener wrapper for body and go to details.php with GET['id'] and GET['sz'] set.
// window.addEventListener("load", () => {
// 	document.body.addEventListener('click', event => {
// 		if (event.target.id.startsWith("addpizza")) {
// 			event.preventDefault(); 
// 			var pid = event.target.id.replace("addpizza", "");
// 			var psmall = document.querySelector('#isactvsmall'.concat(pid));
// 			// do check typeof psmall != "undefined" or not necessary ??
// 			if(psmall && psmall.className.includes(" active"))
// 			{
// 				window.location = event.target.href + "?id=" + pid + "&sz=" + "s";
// 			}
// 		}
// 	});
// });



///////////////////////////////////////////////////////////////////////////
// // send POST request from html form via javascript
// <html>
// <form action="<?=$rooturl?>/index.php" method="post" autocomplete="off">
//     <button type="submit" id="addpizza" name="register">В кошик</button>
// </form>
// </html>

// function sendData(data) 
// {
// 	console.log('Sending data');

// 	const xhr = new XMLHttpRequest();

// 	let urlEncodedData = "";
// 	let urlEncodedDataPairs = [];
// 	let name;

// 	// Turn the data object into an array of URL-encoded key/value pairs.
// 	for(name in data ) 
// 	{
// 		urlEncodedDataPairs.push(encodeURIComponent(name) + '=' + encodeURIComponent(data[name]));
// 	}

// 	// Combine the pairs into a single string and replace all %-encoded spaces to
// 	// the '+' character; matches the behavior of browser form submissions.
// 	urlEncodedData = urlEncodedDataPairs.join('&').replace(/%20/g,'+');
//     console.log(urlEncodedData);
    
// 	// Define what happens on successful data submission
// 	xhr.addEventListener('load', function(event) {
// 		alert('Yeah! Data sent and response loaded.');
// 	} );

// 	// Define what happens in case of error
// 	xhr.addEventListener( 'error', function(event) {
// 		alert('Oops! Something went wrong.');
// 	} );

// 	// Set up our request
// 	xhr.open('POST', 'index.php', true);

// 	// Add the required HTTP header for form data POST requests
// 	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

// 	// Finally, send our data.
// 	xhr.send(urlEncodedData);
// }

// window.addEventListener("load", () => {
// 	document.body.addEventListener('click', (event) => {
// 		if (event.target.id == "addpizza") {
// 			sendData({test:'ok'});
// 		}
// 	});
// });

