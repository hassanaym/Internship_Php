<?php
require_once 'session.php';
require_once 'dbconnect.php';
$sql = 'Select i.id `i.id`, i.firstname `i.firstname`, 
i.lastname `i.lastname`, i.birthday `i.birthday`, 
a.firstname `a.firstname`, a.lastname `a.lastname`  
from intern i 
inner join admin a on a.id = i.idadmin';
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
                                <a href="newIntern.php">new</a>
                            </li>
                            <li>
                                <a href="#">More &dtrif;</a>
                                <ul class="dropdown">
                                    <li><a href="departements.php">Departements</a></li>
                                    <li><a href="internships.php">Internships</a></li>
                                    <li><a href="home.php">Home</a></li>
                                </ul>
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
                        <th>Admin</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($interns as $i) {
                        echo '<tr>';
                        echo '<td>' . $i['i.id'] . '</td>';
                        echo '<td>' . $i['i.firstname'] . '</td>';
                        echo '<td>' . $i['i.lastname'] .  '</td>';
                        echo '<td>' . $i['i.birthday'] .  '</td>';
                        echo '<td>' . $i['a.firstname'] . ' ' . $i['a.lastname'] . '</td>';
                        echo '<td>' . '<a href="deleteIntern.php?id=' . $i['i.id'] . '"  onclick="return confirm(\'Are you sure you want to delete intern?\');"><i class="fa fa-trash" aria-hidden="true"></i></a>' . '</td>';
                        echo '<td>' . '<a href="updateIntern.php?id=' . $i['i.id'] . '"  ><i class="fa fa-pencil" aria-hidden="true"></i>
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