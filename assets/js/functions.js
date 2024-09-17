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