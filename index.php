<?php
// подключаемся к серверу
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");
error_log( "Hello, errors!" );
$$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "team";

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
    echo "id: " . $row["id"]. " - Name: " . $row["first_name"]. " " . $row["last_name"]. "<br>"  " Email: " . $row["email"]. "<br>" " Password: " . $row["password"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>