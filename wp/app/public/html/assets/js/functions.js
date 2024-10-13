function toggleDropdown() {
    const dropdown = document.getElementById("dropdownMenu");
    dropdown.classList.toggle('hidden');
}

document.addEventListener("click", function(event) {
    const dropdownButton = document.getElementById("dropdownButton");
    const dropdownMenu = document.getElementById("dropdownMenu");

    if (!dropdownButton.contains(event.target)) {
        if (!dropdownMenu.classList.contains('hidden')) {
            dropdownMenu.classList.add('hidden');
        }
    }
});

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
        }
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

        targetElement.textContent = isDeleting
            ? currentWord.substring(0, currentCharIndex--)
            : currentWord.substring(0, currentCharIndex++);

        if (!isDeleting && currentCharIndex > currentWord.length) {
            isDeleting = true;
            setTimeout(() => requestAnimationFrame(updateText), delayBetweenWords);
        } else if (isDeleting && currentCharIndex < 0) {
            isDeleting = false;
            currentWordIndex = (currentWordIndex + 1) % words.length;
            setTimeout(() => requestAnimationFrame(updateText), typingSpeed);
        } else {
            const speed = isDeleting ? deletingSpeed : typingSpeed;
            setTimeout(() => requestAnimationFrame(updateText), speed);
        }
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
