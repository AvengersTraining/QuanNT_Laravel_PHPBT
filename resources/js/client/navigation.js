(function () {
    let toggleButton = document.querySelector('.toggle-navigation svg');
    let navigationContainer = document.querySelector('.main-navigation ul.navbar');
    toggleButton.addEventListener('click', function () {
        navigationContainer.classList.toggle('active');
    });

    let menuItems = document.querySelectorAll('.main-navigation ul a');
    for (let i = 0; i < menuItems.length; i++) {
        menuItems[i].addEventListener('click', function () {
            navigationContainer.classList.remove('active');
        });
    }
})();
