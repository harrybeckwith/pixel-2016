$(document).ready(function () {

    /* Add active class to menu */
    // Get current path and find target link
    var path = window.location.pathname.split("/").pop();

    // Account for home page with empty path
    if (path === '') {
        path = 'index.php';
    }

    var target = $('nav ul li a[href="' + path + '"]');
    // Add active class to target link
    target.addClass('nav__item--active');





});
