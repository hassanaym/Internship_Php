<?php
require_once 'session.php';
require_once 'dbconnect.php';
$sql = 'Select d.*, firstname, lastname from departement as d inner join admin as a on a.id = d.idadmin';
$statement = $conn->query($sql);
$deps = $statement->fetchAll(PDO::FETCH_ASSOC);
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>List of departemets</title>
</head>

<body>
    <main>
        <header>
            <div class="container">

                <div class="header-content">
                    <div class="logo">
                        IMS
                    </div>
                    <nav>
                        <ul>
                            <li>
                                <a href="home.php">home</a>

                            </li>
                            <li>
                                <a href="newDepartement.php">new</a>
                            </li>
                            <li>
                                more
                            </li>
                        </ul>
                    </nav>
                    <div class="logged">
                        <span><?php echo $_SESSION['firstname'] . ' ' .  $_SESSION['lastname']; ?></span>
                        <span class="logout"><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a></span>
                    </div>
                </div>

            </div>
        </header>
        <div class="container">


            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>admin</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($deps as $d) {
                        echo '<tr>';
                        echo '<td>' . $d['id'] . '</td>';
                        echo '<td>' . $d['name'] . '</td>';
                        echo '<td>' . $d['firstname'] . ' ' . $d['lastname'] .  '</td>';
                        echo '<td>' . '<a href="deleteDepartement.php?id=' . $d['id'] . '"  ><i class="fa fa-trash" aria-hidden="true"></i></a>' . '</td>';
                        echo '<td>' . '<a href="updateDepartement.php?id=' . $d['id'] . '"  ><i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>' . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>