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
    <h2>Авторизация</h2>
    <!-- Форма принимает метод POST с переодрисацией на обработку отправленных полей авторизации -->
    <form style="margin:auto;" action="../func/auth.php" method="post">

        <label>Email</label>
        <input type="email" name="email">
        <hr>
        <label>Пароль</label>
        <input type="text" name="password">
        <hr>



        <button type="submit">Авторизоваться</button>
    </form>
</div>

<br>
<?php  
require_once '../blocks/footer.php'; //Подключаем модуль footer подвал
?>
