<?php 
	$host = 'localhost'; // адрес сервера 
	$database = 'team'; // имя базы данных
	$user = 'Grinder21'; // имя пользователя
	$password = 'password'; // пароль
?>
<?php
require_once 'mysql.php'; // подключаем скрипт
 
// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));
 	echo 'Connect open';
// выполняем операции с базой данных
     
// закрываем подключение
mysqli_close($link);
?>