function toggleDropdown() {
    var dropdown = document.getElementById("dropdownMenu");
    dropdown.classList.toggle('hidden');
}

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

document.addEventListener("DOMContentLoaded", function () {
    const words = ["gerencia", "otimiza", "analisa", "pivota", "domina"];
    let currentWordIndex = 0;
    let currentCharIndex = 0;
    let isDeleting = false;
    const typingSpeed = 150;
    const deletingSpeed = 100;
    const delayBetweenWords = 2000;
    const targetElement = document.querySelector("#text-animation");

    function updateText() {
        const currentWord = words[currentWordIndex];
        if (isDeleting) {
            targetElement.textContent = currentWord.substring(0, currentCharIndex--);
            if (currentCharIndex < 0) {
                isDeleting = false;
                currentWordIndex = (currentWordIndex + 1) % words.length;
                setTimeout(() => requestAnimationFrame(updateText), typingSpeed);
                return;
            }
        } else {
            targetElement.textContent = currentWord.substring(0, currentCharIndex++);
            if (currentCharIndex > currentWord.length) {
                isDeleting = true;
                setTimeout(() => requestAnimationFrame(updateText), delayBetweenWords);
                return;
            }
        }
        const speed = isDeleting ? deletingSpeed : typingSpeed;
        setTimeout(() => requestAnimationFrame(updateText), speed);
    }

    requestAnimationFrame(updateText);
});

document.addEventListener("DOMContentLoaded", function () {
    const menuButton = document.getElementById('menuButton');
    const mobileMenu = document.getElementById('mobileMenu');

    menuButton.addEventListener('click', function () {
        mobileMenu.classList.toggle('hidden');
    });
});

