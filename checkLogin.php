<?php 
    session_start();

    if(empty($_POST['userLogin']) && empty($_POST['userPassword']))
    {
        $_SESSION['errorMsg'] = $errorMsg;
        header('Location: login.php');
        
        exit();
    }
    else
    {
        require_once "connect.php";

        $db_connection = mysqli_connect($host, $db_user, $db_password, $db_name);

        if($db_connection->connect_errno!=0)
        {
            echo "Error: " . $db_connection->connect_errno;
            $db_connection->close();
        }
        else
        {

            $login = $_POST['userLogin'];
            $password = $_POST['userPassword'];

            $sql = "SELECT * FROM users WHERE user='$login' AND pass='$password'";

            $result = @$db_connection->query($sql);

            if($result)
            {

                if($result->num_rows>0)
                {
                    $data = $result->fetch_assoc();

                    $_SESSION['login'] = $data['user'];
                    $_SESSION['userLogged'] = true;

                    //Przekierowanie do chat.php
                    echo "Pomyslnie zalogowano!";

                    $result->free_result();
                }
                else
                {
                    $errorMsg = "<p style='color: red;'>Podano złe dane logowania!</p>";

                    $_SESSION['errorMsg'] = $errorMsg;
                
                    header('Location: login.php');
                }
            }
            
            $db_connection->close();
        }


    }


?>
