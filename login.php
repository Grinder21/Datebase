
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
$rez = mysqli_query("SELECT * FROM users WHERE email=$email");
if ($_POST['login'] != "" && $_POST['password'] != "") {
if (mysql_num_rows($rez) == 1) {
	$row = mysql_fetch_assoc($rez);
	if(md5(md5($password).$row['salt']) == $row['password'])
	{
		setcookie ("email", $row['email'], time() + 50000); 						
		setcookie ("password", md5($row['email'].$row['password']), time() + 50000); 					
		$_SESSION['id'] = $row['id'];			

		$id = $_SESSION['id']; 				
		lastAct($id); 				
		return $error; 		
	}
	else {
		$error[] = "Неверный пароль"; 										
		return $error;
	}

} else {
		$error[] = "Неверный логин и пароль"; 			
		return $error; 
	}
}
else {
	$error[] = "Поля не должны быть пустыми!"; 				
		return $error;
}





/*
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: ". "<br>" . $row["first_name"]. " " . $row["last_name"]. "<br>" . " Email: " . $row["email"]. "<br>" . " Password: " . $row["password"]. "<br>";
  }
} else {
  echo "0 results";
}
*/
$mysqli->close();

?>

<?php if (isset($result)) { ?>
	<?php if($result) { ?>
		<p>Регистрация прошла успешна!</p>;
		<?php header('Refresh: 2; url=index.php') ?>
		<?php } else { ?>
			<p>Ошибка регистрации</p>
			<?php header('Refresh: 2; url=index.php') ?>
		<?php } ?>
			<?php } ?>


	
<form name='log' action='login.php' method='post'>
	<p>
		Email: <input type="text" name="email" />
	</p>
	<p>
		Password: <input type="password" name="password" />
	</p>
	<input type="submit" name="submit" value="Отправить">
</form>