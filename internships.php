<?php
require_once 'session.php';
require_once 'dbconnect.php';
$sql = 'Select i.id `i.id`,i.firstname `i.firstname`, i.lastname `i.lastname`, d.name `d.name`, d.id `d.id`, a.firstname  `a.firstname`, a.lastname `a.lastname`,startsat, endsat from internship it
inner join intern i on i.id = it.idintern 
inner join departement d on it.iddep = d.id 
inner join admin a on a.id = it.idadmin';

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
                                <a href="newInternship.php">new</a>
                            </li>
                            <li>
                                <a href="#">More &dtrif;</a>
                                <ul class="dropdown">
                                    <li><a href="interns.php">Interns</a></li>
                                    <li><a href="departements.php">Departements</a></li>
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
            <h1>List of internships</h1>

            <table>
                <thead>
                    <tr>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Departement</th>
                        <th>Admin</th>
                        <th>Starts at</th>
                        <th>Ends at</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($interns as $i) {
                        echo '<tr>';
                        echo '<td>' . $i['i.firstname'] . '</td>';
                        echo '<td>' . $i['i.lastname'] .  '</td>';
                        echo '<td>' . $i['d.name'] .  '</td>';
                        echo '<td>' . $i['a.firstname'] . ' ' . $i['a.firstname'] . '</td>';
                        echo '<td>' . $i['startsat'] .  '</td>';
                        echo '<td>' . $i['endsat'] .  '</td>';
                        echo '<td>' . '<a href="deleteInternship.php?iddep=' . $i['d.id'] . '&idintern=' . $i['i.id'] . '"  onclick="return confirm(\'Are you sure you want to delete this internship?\');"><i class="fa fa-trash" aria-hidden="true"></i></a>' . '</td>';
                        echo '<td>' . '<a href="updateInternship.php?iddep=' . $i['d.id'] . '&idintern=' . $i['i.id'] . '"  ><i class="fa fa-pencil" aria-hidden="true"></i>
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