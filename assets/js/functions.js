function toggleDropdown() {
    var dropdown = document.getElementById("dropdownMenu");
    dropdown.classList.toggle('hidden');
}

// Close dropdown if clicked outside
window.onclick = function(event) {
    if (!event.target.matches('#dropdownButton')) {
        var dropdown = document.getElementById("dropdownMenu");
        if (!dropdown.classList.contains('hidden')) {
            dropdown.classList.add('hidden');
        }
    }
}

$('.sliderHome').slick({
    slidesToShow: 2,
    dots: true,
    arrows: true,
    responsive: [
        {
          breakpoint: 1024,
          settings: {
            arrows: false,
            slidesToShow: 1
          }
        },
      ]
  });