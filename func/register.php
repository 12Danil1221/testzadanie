<?php
/*Принимаем поля с формы со значением POST. С помощью метода trim удаляем лишние пробелы 
и метод filter_var используем для фильтрации наших значений */
$name = trim(filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS));
$tel = trim(filter_var($_POST['tel'], FILTER_SANITIZE_SPECIAL_CHARS));
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS));
$password = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));
$password_success = trim(filter_var($_POST['password_success'], FILTER_SANITIZE_SPECIAL_CHARS));

/*Подключение к БД*/
require_once "../db/connect.php";

/*Проверка что поле: 'Пароля' не совпадает с полем: 'Повторите пороль' иначе сообщение об ошибке*/
if($password != $password_success){
    echo "Поле пароль не совпадает с полем повторите пороль!";
}else{

/*Через stmt проверяем возможный дубликат в базе данных, 
а через prepare отправляем sql запрос */
$stmt = $pdo->prepare("SELECT 1 FROM users WHERE Email = :email");
/*Через bindParam делаем сравнение БД и нашей записи с формы*/
$stmt->bindParam(':email', $email);
$stmt->execute();
/* Через метод fetch обращаемся к классу PDO которое в свою очередь обращается 
к преобразованию FETCH_NUM результата в bool значение */
$result = $stmt->fetch(PDO::FETCH_NUM);
/*Делаем проверку на дубликат почты и выводом сообщения с ошибкой*/
if($result){
    echo "Такой емаил уже существует";
    exit;
}else{ 
    /* Также с полем логина и номера телефона */
    $stmt = $pdo->prepare("SELECT 1 FROM users WHERE Name = :name");
    $stmt->bindParam(':name',$name);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_NUM);
    if($result){
        echo "Такой логин уже существует";
        exit;
    }else{
    $stmt = $pdo->prepare("SELECT 1 FROM users WHERE Tel = :tel");
    $stmt->bindParam(':tel',$tel);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_NUM);
    if($result){
        echo "Такой номер телефона уже существует";
        exit;
    }else{
        /* После всех проверок на дубликат происходит запрос sql на вставку данных 
        и в VALUES вставляю ? которые содержат какую-то запись
        значения передаю не сразу, а через метод execute */
        $sql = 'INSERT INTO users(name, tel, email, password, password_success) VALUES(?,?,?,?,?)';
        $query = $pdo->prepare($sql);
        $query->execute([$name,$tel,$email,$password,$password_success]);
        setcookie('name', $name, time() + 3600 * 24 * 30, "/");
        /*header перенаправляет на страницу авторизации*/
        header('Location: ../public/auth.php');
    }
    }
}
}




?>