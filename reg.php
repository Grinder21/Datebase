
<?php
// подключаемся к серверу
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'password');
define('DB_NAME', 'team');


$name = $_POST['last_name'];
$surname = $_POST['first_name'];
$email = $_POST['email'];
$password = $_POST['password'];



$mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if($mysqli->connect_errno) exit ('Ошибка соединения с базой');
$mysqli->set_charset('utf-8');


$mysqli->query("INSERT INTO users (first_name, last_name, email, password) VALUES ('{$name}', '{$surname}', '{$email}', MD5({$password}));");


if(isset($_POST['reg'])) {
	$name = $mysqli->real_escape_string(htmlspecialchars($_POST['first_name']));
	$surname = $mysqli->real_escape_string(htmlspecialchars($_POST['last_name']));
	$email = $mysqli->real_escape_string(htmlspecialchars($_POST['email']));
	$password = $mysqli->real_escape_string(htmlspecialchars($_POST['password']));
	$query = "INSERT INTO `users`
	(`first_name`, `last_name`, `email`, `password`)
	VALUES ('$name', '$surname', '$email', MD5('$password'))";
	$result = $mysqli->query($query);
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


	
<form name='reg' action='reg.php' method='post'>
	<p>
		Имя: <input type="text" name="first_name" />
	</p>
	<p>
		Фамилия: <input type="text" name="last_name" />
	</p>
	<p>
		Email: <input type="text" name="email" />
	</p>
	<p>
		Password: <input type="password" name="password" />
	</p>
	<input type="submit" name="submit" value="Отправить">
</form>
