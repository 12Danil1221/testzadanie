<?php
/*Принимаем поля с формы со значением POST. С помощью метода trim удаляем лишние пробелы 
и метод filter_var используем для фильтрации наших значений */  
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS));
$password = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));

if(strlen($email) < 2){
    echo "Email error"; 
    exit;
}

if(strlen($password) < 2){
    echo "Password error";
    exit;
}
/*Подключение к БД*/
require_once "../db/connect.php";

/* Происходит запрос sql на проверку введённых значений и этих полей в БД
        в WHERE вставляю ? которые содержат нашу запись
        значения передаю не сразу, а через метод execute */
$sql = 'SELECT id FROM users WHERE email = ? AND password = ?';
$query = $pdo->prepare($sql); /*Обрабатываем наш запрос через метод prepare */
$query->execute([$email, $password]);
/*Проверка на наличие совпадений, а в случае 0 совпадений выводится ошибка о том, 
что такого пользователя не существует*/
if($query->rowCount() == 0){
    echo "Такого пользователя нет";
}else{
    /*При успешном прохождении условия устанавливаем куки по которой будем проверять заходил ли пользователь*/
    setcookie('email', $email, time()+ 3600 * 24 * 30, "/");
    header('Location: ../public/dashboard.php');
}


?>