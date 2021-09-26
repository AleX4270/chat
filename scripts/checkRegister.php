<?php 
    session_start();

    if($_SESSION['userLogged'] && $_SESSION['userLogged'] == true)
    {
        header('Location: chat.php');
    }

    if(empty($_POST['username']) && empty($_POST['password']) && empty($_POST['passwordRepeat']) && empty($_POST['firstname']))
    {
        $_SESSION['allFieldsEmpty'] = true;
        header('Location: ../register.php');
        exit();
    }
?>