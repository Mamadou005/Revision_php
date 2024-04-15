<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="">
        <table>
                <tr>
                    <td>
                        <input type="email" name="email" placeholder="Votre email" required/>
                    </td>
                </tr>
                <tr>
                    <td>
                    <input type="passwor" name="motPasse" placeholder="Votre mot de passe" required/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="connexion" value="Connexion"/>
                    </td>
                </tr>
        </table>
    </form>
</body>
</html>
<?php
    //recuperation message d'erreur
    if(isset($_GET["msg"]))
    {
        echo $_GET["msg"];
    }
    if(isset($_POST["connexion"]))
    {
        extract($_POST);
        require "fonction.php";
        authentification($email,$motPasse);
    }
?>