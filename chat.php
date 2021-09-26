<?php
    session_start();

    if(!isset($_SESSION['userLogged']) || $_SESSION['userLogged'] == false)
    {
        header('Location: login.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>Chat</title>
        <link rel="stylesheet" href="styles/style.css">
    </head>

    <body>
       <h1>Witaj! <?php echo $_SESSION['firstname']; ?></h1>

       <form action="" method="POST">
            <input type="submit" name="logout" value="Wyloguj">
       </form>

       <?php 
            if(isset($_POST['logout']))
            {
                $_SESSION['userLogged'] = false;
                header('Location: login.php');
            }
       ?>
    </body>
</html>
