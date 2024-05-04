<?php
require_once 'dbconnect.php';

$sql = 'INSERT INTO departement( name, idadmin) VALUES(:n,:ida)';

$statement = $conn->prepare($sql);

$statement->execute([
	':n' => $_POST['name'],
    ':ida' => 1,//a rempaler par le id dans la session
]);

//$departement_id = $conn->lastInsertId();

header('Location: departements.php');

?>