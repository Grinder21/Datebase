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

if (isset($_POST['submit'])) {
	if ($_POST['login'] != "" && $_POST['password'] != "") {
		 $mysqli->query("INSERT INTO users (email, password) VALUES ({$email}', MD5({$password}));");
		  if($data['user_password'] === md5(md5($_POST['password']))) {
    			setcookie("id", $data['user_id'], time()+60*60*24*30, "/");
        		setcookie("hash", $hash, time()+60*60*24*30, "/", null, null, true);
        		header("Location: index.php"); exit();
    		} else {
        		print "Вы ввели неправильный логин/пароль";
    		}
	}
}

$mysqli->close();

?>
