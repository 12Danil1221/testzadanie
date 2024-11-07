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

        <div id="captcha-container" class="smart-captcha"
            data-sitekey="ysc1_zCwbyhREprxHBDbEfH1Xzz2urQDVvCbaNmEJTj4j16c5741b">
            <input type="hidden" name="smart-token" value="ysc2_zCwbyhREprxHBDbEfH1XVOAQjsTd1dQeA9zD2R6g2fbd3e20">
        </div>


        <button type="submit">Авторизоваться</button>
    </form>
</div>
<script src="https://smartcaptcha.yandexcloud.net/captcha.js" defer></script>
<br>
<?php  
require_once '../blocks/footer.php'; //Подключаем модуль footer подвал
?>