<?php

define('DB_SERVER', 'database');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'example');
define('DB_NAME', 'example');

session_start();

if(isset($_SESSION['user'])) {
	header("Location: todo.php");
}

// DB Connection
if($_SERVER["REQUEST_METHOD"] == "POST") {
	$pdo = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_NAME, DB_USERNAME, DB_PASSWORD);

	$username = $_POST["username"];
	$password = $_POST["password"];

	$sql = 'SELECT * FROM Users WHERE username ="' . $username . '" AND password ="' . $password . '"';
	$result = $pdo->query($sql)->fetchColumn();

	if ($result) {
		$_SESSION['user'] = $username;
		header("location: todo.php");
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="pure-min.css">
 <title>Login</title>
</head>
<body>
<div style="width: 50%; margin: 0 auto">
 <h2>Login</h2>
  <form action="" method="post" class="pure-form pure-form-stacked">
   <fieldset>
    <label>Username</label>
    <input type="text" name="username">
    <label>Password</label>
    <!-- Should be password, but better for demo-->
    <input type="text" name="password">
    <input type="submit" value="Submit" class="pure-button">
   </fieldset>
  </form>
</div>
</body>
