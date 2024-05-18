<?php
require_once 'dbconnect.php';
session_start();

if (isset($_POST['saveInternship'])) {
    $sql = 'INSERT INTO internship VALUES(:d,:i,:ad,:s,:e)';

    $statement = $conn->prepare($sql);

    $statement->execute([
        ':d' => $_POST['departement'],
        ':i' => $_POST['intern'],
        ':ad' => $_SESSION['iduser'],
        ':s' => $_POST['startsat'],
        ':e' => $_POST['endsat']
    ]);
}


if (isset($_POST['updateIntern'])) {
    $sql = 'update internship set starts=:s, endsat=:e where iddep=:d and idadmin=:a and idintern=:i';

    $statement = $conn->prepare($sql);
    $statement->execute([
        ':d' => $_POST['departement'],
        ':i' => $_POST['intern'],
        ':a' => $_SESSION['iduser'],
        ':i' => $_POST['startsat'],
        ':i' => $_POST['endsat']
    ]);
}


header('Location: internships.php');
