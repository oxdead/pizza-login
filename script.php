<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<link rel="stylesheet" href="stylesheet_carousel.css" />
<!-- <link rel="stylesheet" href="stylesheet_local.css" /> -->

<!-- auto carousel  -->
<script>

var slideId = 0;
var currentTimerId = 0;
showSlides();

function updateSlides()
{
	var slides = document.getElementsByClassName("mySlides");
	for (let i = 0; i < slides.length; ++i) 
	{
		slides[i].style.display = "none";
	}
	slides[slideId-1].style.display = "block";
}

function updateDots()
{
	var dots = document.getElementsByClassName("dot");
	for (let i = 0; i < dots.length; ++i) 
	{
		dots[i].className = dots[i].className.replace(" active", "");
	}
	dots[slideId-1].className += " active";
}

function thumbnailSlide(n) 
{
	clearTimeout(currentTimerId); // cancel current timer before creating another
		
	var slides = document.getElementsByClassName("mySlides");
	slideId = n;
	if (slideId > slides.length) { slideId = 1 }
	if (slideId < 1) { slideId = slides.length }

	updateSlides();
	updateDots();

	currentTimerId = setTimeout(showSlides, 8000); // Change image every 8 seconds

}

function showSlides() 
{
	var slides = document.getElementsByClassName("mySlides");
	slideId++;
	if (slideId > slides.length) 
	{
		slideId = 1;
	}

	updateSlides();
	updateDots();
	
	currentTimerId = setTimeout(showSlides, 8000); // Change image every 8 seconds
}

function prevSlide() 
{
	clearTimeout(currentTimerId); // cancel current timer before creating another
	var slides = document.getElementsByClassName("mySlides");
	if(slides.length > 1)
	{
		slideId += slides.length - 2;
		slideId %= slides.length;
		
	}

	showSlides();

}

function nextSlide() 
{	
	clearTimeout(currentTimerId); // cancel current timer before creating another
	showSlides();
}





</script>




<!-- other scripts -->
<script>
function toggleLogin() 
{
	var loginSection = document.getElementById("login");
	var regSection = document.getElementById("register");
	loginSection.style.display = "block";
	regSection.style.display = "none";
} 
function toggleRegister() 
{
	var loginSection = document.getElementById("login");
	var regSection = document.getElementById("register");
    loginSection.style.display = "none";
	regSection.style.display = "block";
} 

// reload page
window.onload = function() 
{
    toggleLogin();
}









</script>