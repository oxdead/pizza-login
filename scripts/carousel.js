//auto carousel

var slideId = 0;
var currentTimerId = 0;


function CreateCarouselContent(slides)
{
	//add "<div class="numbertext">1 / 4</div>" for showing numbers of slides
	var carouselContent = "";
	for (let slide of slides)
	{
		carouselContent = carouselContent + `<div class="my-slides fade"><img src="${slide.img}" class="crsl-img"><div class="captiontext">${slide.caption}</div></div>`;
	}

	document.querySelector('.slideshow-container').insertAdjacentHTML('afterbegin', carouselContent);
}


function updateSlides()
{
	var slides = document.getElementsByClassName("my-slides");
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
		
	var slides = document.getElementsByClassName("my-slides");
	slideId = n;
	if (slideId > slides.length) { slideId = 1 }
	if (slideId < 1) { slideId = slides.length }

	updateSlides();
	updateDots();

	currentTimerId = setTimeout(showSlides, 5000); // Change image every 8 seconds
}

function showSlides() 
{
	var slides = document.getElementsByClassName("my-slides");
	slideId++;
	if (slideId > slides.length) { slideId = 1; }

	updateSlides();
	updateDots();
	
	currentTimerId = setTimeout(showSlides, 5000); // Change image every 8 seconds
}

function prevSlide() 
{
	clearTimeout(currentTimerId); // cancel current timer before creating another
	var slides = document.getElementsByClassName("my-slides");
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


// push our carousel
window.document.addEventListener('DOMContentLoaded', function() {

	fetch(window.location.origin + '/scripts/carousel.json')
	.then(response => response.json())
	.then(slidesData => {
		CreateCarouselContent(slidesData);
		showSlides();
	})
	.catch(err => console.log(err));

});

