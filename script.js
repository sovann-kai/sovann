const quotes = [" I'm Morm LeapSovann, a developer and your guide to our website. I'm excited to introduce you to the wonders of our platform, where we celebrate Cambodia's rich culture, natural beauty, and achievements. Let's explore together!",	
" I'm thrilled to have you on our website. As a developer, I'm passionate about creating a user-friendly experience that highlights Cambodia's unique culture, heritage, and accomplishments. Let's dive in and discover all that our site has to offer!",
"I'm delighted to greet you on our platform. As a developer, I'm committed to bringing you an exceptional online experience that showcases Cambodia's beauty, culture, and achievements. Come along and join me on this journey of discovery!"];

const quoteElement = document.getElementById("quote");

function generateQuote() {
	const randomNumber = Math.floor(Math.random() * quotes.length);
	quoteElement.innerHTML = quotes[randomNumber];
}

// generate a new quote every 4 seconds
setInterval(generateQuote, 4000);

// generate a random quote when the page loads
generateQuote();



//--------------------------------------------------------------------------

// scroll to top
const scrollTopBtn = document.querySelector('.scroll-top-btn');

window.addEventListener('scroll', function() {
  if (window.pageYOffset > 200) {
    scrollTopBtn.style.display = 'block';
  } else {
    scrollTopBtn.style.display = 'none';
  }
});

scrollTopBtn.addEventListener('click', function() {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
});

//---------------------------------------------------------------------------------

