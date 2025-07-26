document.addEventListener('DOMContentLoaded', function() {
    var menuToggler = document.getElementById('menu-toggler');
    var searchToggler = document.getElementById('search-toggler');
    var myNavbar = document.getElementById('mynavbar');
    var mySearchbar = document.getElementById('myseachbar');

    menuToggler.addEventListener('click', function() {
        if (mySearchbar.classList.contains('show')) {
            mySearchbar.classList.remove('show');
        }
    });

    searchToggler.addEventListener('click', function() {
        if (myNavbar.classList.contains('show')) {
            myNavbar.classList.remove('show');
        }
    });
});