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


if (isset($_POST['updateInternship'])) {

    $sql = 'update internship set startsAt=:s, endsAt=:e where iddep=:d  and idintern=:i';

    $statement = $conn->prepare($sql);
    $statement->execute([
        ':d' => $_GET['iddep'],
        ':i' => $_GET['idintern'],
        ':s' => $_POST['startsat'],
        ':e' => $_POST['endsat']
    ]);
}


header('Location: internships.php');
