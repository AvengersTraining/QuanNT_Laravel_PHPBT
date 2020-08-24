(function(){
    var toggleButton = document.querySelector('.toggle-navigation svg');
    var navigationContainer = document.querySelector('.main-navigation ul.navbar');
    toggleButton.addEventListener('click', function(){
        navigationContainer.classList.toggle('active');
    });

    var menuItems = document.querySelectorAll('.main-navigation ul a');
    for(var i = 0; i < menuItems.length; i++){
        menuItems[i].addEventListener('click', function(){
            navigationContainer.classList.remove('active');
        });
    }
})();
