// Мобильное навигационное меню

(function($) { // Begin jQuery
    $(function() { // DOM ready
        // If a link has a dropdown, add sub menu toggle.
        $('nav ul li a:not(:only-child)').click(function(e) {
            $(this).siblings('.nav-dropdown').toggle();
            // Close one dropdown when selecting another
            $('.nav-dropdown').not($(this).siblings()).hide();
            e.stopPropagation();
        });
        // Clicking away from dropdown will remove the dropdown class
        $('html').click(function() {
            $('.nav-dropdown').hide();
        });
        // Toggle open and close nav styles on click
        $('#nav-toggle').click(function() {
            $('nav ul').slideToggle();
        });
        // Hamburger to X toggle
        $('#nav-toggle').on('click', function() {
            this.classList.toggle('active');
        });
    }); // end DOM ready
})(jQuery); // end jQuery


// Активная страница

var links = document.getElementsByClassName("navbar-link");
var URL = String(window.location.href);

for (let i = 0; i < links.length; i++) {
    if (URL.includes(links[i].getAttribute("data-link")) || URL.includes(links[i].getAttribute("href").substring(links[i].getAttribute("href").lastIndexOf('/')))) {
        links[i].id = "active";
    }
}