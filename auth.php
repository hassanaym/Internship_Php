
<?php
require_once('dbconnect.php');

 if (isset($_POST['username']) &&  isset($_POST['password'])) {
    
    $stmt = $conn->prepare("Select * from admin where username=:u");

    $stmt->execute(['u' => $_POST['username']]
                    ); 

    $user = $stmt->fetch();


    if($user['username']!=""){
        if($user['password']!=$_POST['password']){
            header ('location:index.php?err=2');
        }else{
            header ('location:home.php');
        }
    }else{
        header ('location:index.php?err=1');
    }

    session_start();
    $_SESSION['username']= $user['username'];

    $conn=null;

    
    
     
 }
 ?>