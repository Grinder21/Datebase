<?php
require_once 'mysql.php'; // подключаем скрипт
 
// подключаемся к серверу
$link = mysqli_connect('localhost', 'root', 'password', 'team') 
    or die("Ошибка " . mysqli_error($link));
 
// выполняем операции с базой данных
$query ="SELECT * FROM users";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    echo "Выполнение запроса прошло успешно";
}
 
// закрываем подключение
mysqli_close($link);
?>