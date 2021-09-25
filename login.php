<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>Zaloguj się</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <h1>Zaloguj się</h1>
        <form action="checkLogin.php" method="POST">
            <label for="userLogin">Login</label>
            <p><input type="text" name="userLogin" placeholder="Nazwa użytkownika" value=""></p>

            <label for="userPassword">Hasło</label>
            <p><input type="password" name="userPassword" placeholder="Hasło" value=""></p>

            <input type="submit" name="submitLogin" value="Zaloguj">

            <!-- <p id="register">Nie masz jeszcze konta? <a href="register.php">Zarejestruj się</a> teraz!</p> -->

            <?php 
                if(isset($_SESSION['errorMsg']))
                {
                    echo $_SESSION['errorMsg'];
                    unset($_SESSION['errorMsg']);
                }
            ?>
        </form>
    </body>
</html>
