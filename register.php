<?php 
    session_start();

    if(isset($_SESSION['userLogged']) && $_SESSION['userLogged'] == true)
    {
        header('Location: chat.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>Zarejestruj się</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="styles/style.css">
    </head>

    <body>
        <h1>Zarejestruj się</h1>
        <form action="scripts/checkRegister.php" method="POST">
            <label for="username">Nazwa użytkownika</label>
            <p><input type="text" name="username" placeholder="Nazwa użytkownika"></p>
            <p class="errorMessage" id="usernameError">Musisz podać nazwę użytkownika!</p>

            <label for="password">Hasło</label>
            <p><input type="password" name="password" placeholder="Hasło"></p>
            <p class="errorMessage" id="passwordError">Musisz podać hasło!</p>

            <label for="passwordRepeat">Powtórz hasło</label>
            <p><input type="password" name="passwordRepeat" placeholder="Powtórz hasło"></p>
            <p class="errorMessage" id="passwordRepeatError">Musisz podać swoje hasło ponownie!</p>

            <label for="firstname">Imię</label>
            <p><input type="text" name="firstname" placeholder="Imię"></p>
            <p class="errorMessage" id="firstnameError">Musisz podać swoje imię!</p>

            
            <p><label><input type="checkbox" name="rules" placeholder="Imię">Potwierdzam, że zapoznałam/em się z <a href="rules.php">regulaminem</a>.</label></p>
            <p class="errorMessage" id="rulesError">Musisz zapoznać się z regulaminem.</p>

            <!-- <label for="email">Adres e-mail</label>
            <p><input type="text" name="email" placeholder="e-mail" disabled></p> -->
            <!-- Error message for email -->

            <input type="submit" name="submitRegForm" value="Zarejestruj">
            <p class="errorMessage" id="emptyFieldsError">Musisz uzupełnić wszystkie pola!</p>
            <?php 
                if(isset($_SESSION['allFieldsEmpty']))
                {
                    echo "<p class='errorMessage' id='emptyFieldsError' style='display: block;'>Musisz uzupełnić wszystkie pola!</p>";
                    unset($_SESSION['allFieldsEmpty']);
                }
            ?>
        </form>

        <script>
            var usernameField = $("input[name='username']");
            var passwordField = $("input[name='password']");
            var passwordRepeatField = $("input[name='passwordRepeat']");
            var firstnameField = $("input[name='firstname']");
            var registerBtn = $("input[name='submitRegForm']");
            var rulesCheckbox = $("input[name='rules']");

            usernameField.blur(function(){
                if(this.value == '')
                {
                   $("#usernameError").css("display", "block");  
                   
                }
                else 
                {
                   $("#usernameError").css("display", "none");  
                 
                }
            });

            passwordField.blur(function(){
                if(this.value == '')
                {
                   $("#passwordError").css("display", "block");  
                  
                }
                else 
                {
                   $("#passwordError").css("display", "none");  
                  
                }
            });

            passwordRepeatField.blur(function(){
                if(this.value == '')
                {
                   $("#passwordRepeatError").css("display", "block");  
                 
                }
                else 
                {
                   $("#passwordRepeatError").css("display", "none");  
                
                }
            });

            firstnameField.blur(function(){
                if(this.value == '')
                {
                   $("#firstnameError").css("display", "block");  
                
                }
                else 
                {
                   $("#firstnameError").css("display", "none");  
                  
                }
            });

           registerBtn.click(function(e){
            if(usernameField.val() == '' || passwordField.val() == '' || passwordRepeatField.val() == '' || firstnameField.val() == '')
            {
                
                
                if(!rulesCheckbox.is(":checked"))
                {
                    $("#rulesError").css("display", "block");  
                }
                else
                {
                    $("#rulesError").css("display", "none"); 
                }

                $("#emptyFieldsError").css("display", "block");  

                e.preventDefault();
            }
            else
            {
                $("#emptyFieldsError").css("display", "none");  
            }
           });

        </script>
    </body>
</html>
