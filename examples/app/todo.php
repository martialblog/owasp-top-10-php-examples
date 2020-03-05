<?php

session_start();

if(!isset($_SESSION['user'])) {
	header("Location: index.php");
}

define('DB_SERVER', 'database');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'example');
define('DB_NAME', 'example');

// Delete Task
if (isset($_GET['delete'])) {
	$pdo = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_NAME, DB_USERNAME, DB_PASSWORD);

	$id = $_GET['delete'];
	$sql = 'DELETE FROM Todo WHERE id='.$id;
	$pdo->exec($sql);

	header('location: todo.php');
}

// New Task
if($_SERVER["REQUEST_METHOD"] == "POST") {

	if (isset($_REQUEST['logout'])) {
		session_destroy();
		header("location: index.php");
	}

	$pdo = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_NAME, DB_USERNAME, DB_PASSWORD);

	if (isset($_POST['task'])) {
		$task = $_POST['task'];
		$statement = $pdo->prepare('INSERT INTO Todo (text) VALUES (?)');
		$statement->execute([$task]);
		header('location: todo.php');
	}
}

?>

<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="pure-min.css">
 <title>TODO List</title>
</head>
<body>
 <div style="width: 50%; margin: 0 auto">
 <h2>TODO List</h2>

 <form action="" method="post">
 <fieldset>
 <input type="submit" name="logout" value="Logout" class="pure-button">
 </fieldset>
 </form>

 <form action="" method="post">
 <fieldset>
  <label>New Task</label>
  <input type="text" name="task">
  <input type="submit" name="todo" value="Add Task" class="pure-button pure-button-primary">
 </fieldset>
 </form>
 <br>

<table class="pure-table">
<thead>
 <tr>
  <th>ID</th>
  <th>Task</th>
  <th>Action</th>
 </tr>
</thead>

<tbody>
 <?php
   $pdo = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_NAME, DB_USERNAME, DB_PASSWORD);
   $sql = 'SELECT * FROM Todo';
   $data = $pdo->query($sql);

   if ($data) {
    while ($row = $data->fetch()) {
     echo '<tr>';
     echo '<td>'. $row['id'] .'</td>';
     echo '<td>'. $row['text'] .'</td>';
     echo '<td><a href="todo.php?delete='.$row['id'].'">X</a></td>';
     echo '</tr>';
    }
   }
 ?>
</tbody>
</table>
</div>
</body>
</html>
