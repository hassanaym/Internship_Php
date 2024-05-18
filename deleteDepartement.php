<?php
require_once 'dbconnect.php';

$sql = 'Delete From departement where id=:a';
echo $_GET['id'];
$statement = $conn->prepare($sql);

$statement->execute([
	':a' => $_GET['id'],
]);


header('Location: departements.php');
