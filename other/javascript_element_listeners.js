// Say you want to add an event listener to multiple elements in JavaScript. How can you do so?
//https://flaviocopes.com/how-to-add-event-listener-multiple-elements-javascript/


//How to call addEventListener() on multiple elements at the same time?

////////////////////////////////////////////////////
//1 way: The loop is the simplest one conceptually.
//You can call querySelectorAll() on all elements with a specific class, then use forEach() to iterate on them:
document.querySelectorAll('.some-class').forEach(item => {
  item.addEventListener('click', event => {
    //handle click
  })
})

//If you don’t have a common class for your elements you can build an array on the fly:
[document.querySelector('.a-class'), document.querySelector('.another-class')].forEach(item => {
  item.addEventListener('click', event => {
    //handle click
  })
})

//////////////////////////////////////
//2nd way: Using event bubbling
//Another option is to rely on event bubbling and attach the event listener on the body element.
//The event is always managed by the most specific element, so you can immediately check if that’s one of the elements that should handle the event:

const element1 = document.querySelector('.a-class')
const element2 = document.querySelector('.another-class')
body.addEventListener('click', event => {
  if (event.target !== element1 && event.target !== element2) {
    return
  }
  //handle click
})
