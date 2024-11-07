<?php 
require_once '../blocks/header.php'; //Подключаем модуль header шапки
?>

<style>
hr {
    width: 20%;
    margin-right: 100%;
}
</style>
<div class="container">
    <h2>Регистрация</h2>

    <!-- Форма принимает метод POST с переодрисацией на обработку отправленных полей регистрации -->
    <form style="margin:auto;" action="../func/register.php" method="post">
        <label>Имя</label>
        <input type="text" name="name">
        <hr>
        <label>Телефон</label>
        <input type="phone" name="tel">
        <hr>
        <label>Почта</label>
        <input type="email" name="email">
        <hr>
        <label>Пароль</label>
        <input type="text" name="password">
        <hr>
        <label>Повторите пароль</label>
        <input type="text" name="password_success">
        <hr>
        <button type="submit">Зарегестрироваться</button>
        <a href="../public/auth.php">Вы уже зарегестрированы?</a>
    </form>
</div>
<?php  
require_once '../blocks/footer.php'; //Подключаем модуль footer подвал
?>