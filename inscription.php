<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <form method="POST" action="">
        <table>
            <tr>
                <td><input type="text" name="prenom" placeholder="Votre prenom" required/></td>
                <td><input type="text" name="nom" placeholder="Votre nom" required/></td>
            </tr>
            <tr>
                <td><input type="text" name="adresse" placeholder="Votre adresse" required/></td>
                <td><input type="text" name="telephone" placeholder="Votre telephone" required/></td>
            </tr>
            <tr>
                <td><input type="email" name="email" placeholder="Votre email" required/></td>
                <td>
                    <select name="profil" required>
                        <option>Senegalais</option>
                        <option>Etranger</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="password" name="motDePasse" placeholder="Votre mot de passe" required/></td>
                <td><input type="password" name="confPasse" placeholder="Confirmer votre mot de passe" required/></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="inscrire" value="Inscription">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php
    if(isset($_POST["inscrire"]))
    {
        extract($_POST);
        require "fonction.php";
        inscrire($prenom,$nom,$adresse,$telephone,$email,$motDePasse,$profil);
    }
?>