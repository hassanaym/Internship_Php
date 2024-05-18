<?php
require_once 'dbconnect.php';
session_start();

if (isset($_POST['saveIntern'])) {
    $sql = 'INSERT INTO intern( firstname, lastname, birthday,idadmin) VALUES(:fn,:ln,:b,:ida)';

    $statement = $conn->prepare($sql);

    $statement->execute([
        ':fn' => $_POST['firstname'],
        ':ln' => $_POST['lastname'],
        ':b' => $_POST['birthday'],
        ':ida' => $_SESSION['iduser']
    ]);
}


if (isset($_POST['updateIntern'])) {
    $sql = 'update intern set firstname=:fn, lastname=:ln, birthday=:b where id=:i';

    $statement = $conn->prepare($sql);
    $statement->execute([
        ':fn' => $_POST['firstname'],
        ':ln' => $_POST['lastname'],
        ':b' => $_POST['birthday'],
        ':i' => $_GET['id']
    ]);
}

header('Location: interns.php');
