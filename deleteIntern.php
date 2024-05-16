<?php
require_once 'dbconnect.php';

$sql = 'Delete From intern where id=:a';

$statement = $conn->prepare($sql);

$statement->execute([
	':a' => $_GET['id'],
]);


header('Location: interns.php');
