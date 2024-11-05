let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}


document.getElementById('search-form').addEventListener('submit', function(event) {
  event.preventDefault();
  const query = document.getElementById('search-input').value;
  search(query);
});

function search(query) {
  const resultsDiv = document.getElementById('search-results');
  resultsDiv.innerHTML = `Hasil pencarian untuk: ${query}`;
}


document.getElementById('scroll-left').addEventListener('click', function() {
  document.getElementById('scroll-content').scrollBy({
      left: -300, // Sesuaikan jarak scroll ke kiri
      behavior: 'smooth'
  });
});

document.getElementById('scroll-right').addEventListener('click', function() {
  document.getElementById('scroll-content').scrollBy({
      left: 300, // Sesuaikan jarak scroll ke kanan
      behavior: 'smooth'
  });
});