<style>
header {
    position: fixed;
    width: 100%;
    background-color: gray;
}

a {
    text-decoration: none;
    color: black;
}
</style>
<header>
    <!-- Шапка наших страниц -->
    <nav>
        <ul style="display:flex; align-items:center;">
            <li><a href="">Главная</a></li>
            <?php 
            /*Проверка на наличие COOKIE email для выхода*/
            if(isset($_COOKIE['email']))
                echo '<li style="margin-left:100px"><a href="../func/logout.php">Выход</a></li>';
            ?>
            <?php
            if(!isset($_COOKIE['email']))
                echo '<li style="margin-left:10%;"><a href="../public/register.php">Регистрация</a></li>
            <li style="margin-left:10%;"><a href="../public/auth.php">Авторизация</a></li>';
            ?>

        </ul>
    </nav>
</header>
<br><br><br>