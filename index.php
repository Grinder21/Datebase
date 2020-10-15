<?php
require_once 'mysql.php'; // подключаем скрипт
// подключаемся к серверу
$link = mysqli_connect('localhost', 'root', 'password', 'team') 
    or die("Ошибка " . mysqli_error($link));
// выполняем операции с базой данных
$query ="SELECT * FROM users";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
do{
    echo "ID - ".$myrow['id']."<br>";
    echo "Заголовок - ".$myrow['title']."<br>";
    echo "Текст - ".$myrow['text']."<br>";
}while ($myrow = mysql_fetch_array($result)); 
if($result)
{
    echo "Выполнение запроса прошло успешно";
}
// закрываем подключение
mysqli_close($link);
?>