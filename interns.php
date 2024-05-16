<?php
require_once 'session.php';
require_once 'dbconnect.php';
$sql = 'Select * from intern';
$statement = $conn->query($sql);
$interns = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>List of interns</title>
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
                                <a href="newIntern.php">new</a>
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
            <h1>List of interns</h1>

            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Birthday</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($interns as $i) {
                        echo '<tr>';
                        echo '<td>' . $i['id'] . '</td>';
                        echo '<td>' . $i['firstname'] . '</td>';
                        echo '<td>' . $i['lastname'] .  '</td>';
                        echo '<td>' . $i['birthday'] .  '</td>';
                        echo '<td>' . '<a href="#"  onclick="return confirm(\'Are you sure you want to Remove?\');"><i class="fa fa-trash" aria-hidden="true"></i></a>' . '</td>';
                        echo '<td>' . '<a href="updateIntern.php?id=' . $i['id'] . '"  ><i class="fa fa-pencil" aria-hidden="true"></i>
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