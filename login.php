<form name='log' action='login.php' method='post'>
	<p>
		Email: <input type="text" name="email" />
	</p>
	<p>
		Password: <input type="password" name="password" />
	</p>
	<input type="submit" name="submit" value="Отправить">
</form>


<?php
// подключаемся к серверу
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'password');
define('DB_NAME', 'team');

$email = $_POST['email'];
$password = $_POST['password'];


$mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if($mysqli->connect_errno) exit ('Ошибка соединения с базой');
$mysqli->set_charset('utf-8');
$error = array();
$result = mysqli_query("SELECT * FROM users WHERE email={$email}");

if ($_POST['login'] != "" && $_POST['password'] != "") {
	if (mysql_num_rows($result) == 1) {
		$row = mysql_fetch_assoc($result);
		print_r($row);
		if(md5(md5($password).$row['salt']) == $row['password'])
		{
			setcookie ("email", $row['email'], time() + 50000); 						
		 	setcookie ("password", md5($row['email'].$row['password']), time() + 50000); 					
			$_SESSION['id'] = $row['id'];			

			$id = $_SESSION['id']; 				
			lastAct($id);
			echo 'Вы зарегистрированы!';
			header('Refresh: 3; url=index.php'); 				
			return $error;	
		} else {
			$error[] = "Неверный пароль"; 										
			return $error;
		}
	} else {
		$error[] = "Неверный логин и пароль"; 			
		return $error; 
	}
} else {
	$error[] = "Поля не должны быть пустыми!"; 				
		return $error;
}



$mysqli->close();

?>