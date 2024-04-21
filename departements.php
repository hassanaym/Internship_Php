<?php
require_once 'dbconnect.php';
$sql = 'Select * from departement';
$statement = $conn->query($sql);
$deps = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>List of departemets</title>
</head>
<body>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($deps as $d) {
                        echo '<tr>';
                            echo '<td>' . $d['id'] . '</td>';
                            echo '<td>' . $d['name'] . '</td>';
                            echo '<td>' . '<a href="deleteDepartement.php?id='. $d['id'] .'"  >Supprimer</a>'. '</td>';
                            echo '<td>' . '<a href="updateDepartement.php?id='. $d['id'] .'"  >Modifier</a>'. '</td>';
                            echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>