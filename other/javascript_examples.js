
// foreach example
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