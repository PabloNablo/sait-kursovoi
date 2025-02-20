// Получаем элементы модальных окон
var loginModal = document.getElementById("loginModal");
var registerModal = document.getElementById("registerModal");

// Получаем кнопки, которые открывают модальные окна
var loginBtn = document.getElementById("loginBtn");
var registerBtn = document.getElementById("registerBtn");

// Получаем элементы <span>, которые закрывают модальные окна
var spans = document.getElementsByClassName("close");

// Открываем модальное окно при нажатии на кнопку "Войти"
loginBtn.onclick = function() {
    loginModal.style.display = "block";
}

// Открываем модальное окно при нажатии на кнопку "Регистрация"
registerBtn.onclick = function() {
    registerModal.style.display = "block";
}

// Закрываем модальное окно при нажатии на <span> (x)
for (var i = 0; i < spans.length; i++) {
    spans[i].onclick = function() {
        loginModal.style.display = "none";
        registerModal.style.display = "none";
    }
}

// Закрываем модальное окно при нажатии вне его
window.onclick = function(event) {
    if (event.target == loginModal) {
        loginModal.style.display = "none";
    }
    if (event.target == registerModal) {
        registerModal.style.display = "none";
    }
}
