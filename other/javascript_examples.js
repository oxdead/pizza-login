
// foreach example
var bla = {"id": 2, "sz": "m"};
var yo = [
    {"id": 1, "sz": "s"},
    {"id": 2, "sz": "m"},
    {"id": 2, "sz": "m"},
    {"id": 3, "sz": "l"},
]

function isObjExistPredicate(item, index) {
    if(item["id"] === bla["id"])
    {
        if(item["sz"] === bla["sz"])
        {
        }
    }
    
} 
yo.forEach(isObjExistPredicate);