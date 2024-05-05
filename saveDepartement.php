<?php
require_once 'dbconnect.php';
session_start();

if (isset($_POST['saveDepartement'])) {
    $sql = 'INSERT INTO departement( name, idadmin) VALUES(:n,:ida)';

    $statement = $conn->prepare($sql);

    $statement->execute([
        ':n' => $_POST['name'],
        ':ida' => $_SESSION['iduser']
    ]);
}


if (isset($_POST['updateDepartement'])) {
    echo 'ana hna';
    $sql = 'update departement set name=:n where id=:i';

    $statement = $conn->prepare($sql);
    echo 'ana lwast';
    $statement->execute([
        ':n' => $_POST['name'],
        ':i' => $_GET['id']
    ]);
    echo 'ana lhih';
}

header('Location: departements.php');
