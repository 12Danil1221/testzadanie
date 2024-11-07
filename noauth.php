<?php
require_once "../blocks/header.php";

require_once "../db/connect.php";
?>
<style>
hr {
    width: 20%;
    margin-right: 100%;
}
</style>

<body>
    <div class="container">
        <h2>Изменение данных пользователя</h2>
        <!-- Форма принимает метод POST с переодрисацией на обработку отправленных полей регистрации -->
        <form style="margin:auto;" action="../public/noauth.php" method="post">

            <hr>
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
            <input type="password" name="password">
            <hr>
            <button type="submit">Изменить данные</button>
        </form>
        <?php
/*Проверка что сервер принимает метод post и проверка через метод isset, что POST содержит следующие поля */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_COOKIE['name']) && isset($_POST['name']) && isset($_POST['tel']) && isset($_POST['email'] ) && isset($_POST['password'])) {
    
    

    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Подключитесь  к  базе  данных  и  обновите  информацию 
    $conn = new mysqli("localhost", "root", "", "tz");
    if ($conn->connect_error) {
        die("Ошибка подключения: " . $conn->connect_error);
    }
/*SQL запрос на обновление*/
    $sql = "UPDATE users SET name = '$name', tel = '$tel', email = '$email', password = '$password'";
    
    if ($conn->query($sql)) {
        echo "Данные обновлены успешно";
    } else {
        echo "Ошибка: " . $conn->error;
    }

    $conn->close();
  } else {
    // Отобразите  сообщение  об  ошибке 
  }
}

?>
    </div>
</body>

<?php
require_once "../blocks/footer.php";
?>