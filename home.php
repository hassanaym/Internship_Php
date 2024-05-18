<?php
require_once 'session.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Welcome page</title>
</head>

<body>

    <main>
        <a class="home-logout" href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        <div class="container">
            <h1 class="welcome-text">Welcome <?php echo $_SESSION['firstname'] ?></h1>
        </div>
        <section class="nav-items-container">
            <a href="departements.php" class="nav-item">
                <section>
                    <img src="" alt="">
                    <h3>departements</h3>
                </section>
            </a>

            <a href="interns.php" class="nav-item">
                <section>
                    <img src="" alt="">
                    <h3>interns</h3>
                </section>
            </a>

            <a href="internships.php" class="nav-item">
                <section>
                    <img src="" alt="">
                    <h3>internships</h3>
                </section>
            </a>

            <a href="more.php" class="nav-item">
                <section>
                    <img src="" alt="">
                    <h3>more</h3>
                </section>
            </a>


        </section>
    </main>
</body>

</html>