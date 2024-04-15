<?php
function database(){
    $host="localhost";
    $user="root";
    $pass="busquito05";
    $base="Revision";
    $con=new mysqli($host,$user,$pass,$base);
    if($con->connect_errno){
        $db=$con->connect_error;
    }
    else{
        $db=new mysqli($host,$user,$pass,$base);
    }
    return $db;
}
function inscrire($pre,$nom,$adr,$tel,$ema,$mot,$profil)
{
    $db = database();
    $ver = "select * from Personne where email='".$ema."'";
    $result = $db->query($ver);
    $nb = $result->num_rows;
    if($nb == 1)
    {
        echo "Cette adresse email est deja prise";
    }
    else
    {
        $motCrypte = sha1($mot);
        $ins = "insert into Personne
        (prenom,nom,adresse,telephone,email,profil,motPass) values
        ('".$pre."','".$nom."','".$adr."','".$tel."','".$ema."','".$profil."','".$motCrypte."')";
        $result = $db->query($ins);
        if($result == true)
        {
           header("location:index.php?msg=Compte bien cree");
        }
        else
        {
            echo "echec d'enregistrement";
        }
    }
}
function listeCompte()
{
    $db = database();
    $info = "select * from Personne";
    $res = $db->query($info);
    echo "<table border='1' align='center' rules='all'>";
    echo "<tr>";
        echo "<th>Prenom</th>";
        echo "<th>Nom</th>";
        echo "<th>Adresse</th>";
        echo "<th>Telephone</th>";
        echo "<th>Email</th>";
        echo "<th>Profil</th>";
    echo "</tr>";
    while($liste = $res->fetch_row())
    {
        echo "<tr>";
            echo "<td>".$liste[0]."</td>";
            echo "<td>".$liste[1]."</td>";
            echo "<td>".$liste[2]."</td>";
            echo "<td>".$liste[3]."</td>";
            echo "<td>".$liste[4]."</td>";
            echo "<td>".$liste[5]."</td>";
        echo "</tr>";
    }
    echo "</table>";
}
function authentification($email, $mot)
{
    $db = database();
    $motC = sha1($mot);
    $ver = "select * from Personne where email='".$email."' and motPass='".$motC."'";
    $res = $db->query($ver);
    $nb = $res->num_rows;
    if($nb == 1)
    {
        while($info = $res->fetch_row())
        {
            session_start();
            $_SESSION["prenom"] = $info[0];
            $_SESSION["nom"] = $info[1];
            $_SESSION["email"] = $email;
            header("location:pages/espace.php");
        }
        
    }
    else
    {
        echo "Ce compte n'existe pas";
    }
}
function ajoutUFR($code,$nom,$desc)
{
    $db= database();
    $ver = "select * from ufr where codeUFR='".$code."'";
    $res = $db->query($ver);
    $nb = $res->num_rows;
    if($nb == 1)
    {
            echo "cette UFR est deja ajouter";
    }
    else
    {
        $ins = "insert into ufr values('".$code."','".$nom."','".$desc."')";
        $Rres = $db ->query($ins);
        if($res == true)
        {
            echo "Enregistrement de l'UFR bien effectuer";
        }
    }
}
function recupererInfoUFR()
{
    $db = database();
    $info = "select * from ufr";
    $res = $db->query($info);
    echo "<select name='codeufr'>";
    while($inf = $res->fetch_row())
    {
        echo "<option value=".$inf[0].">".$inf[1]."</option>";
    }
    echo "</select>";
}
function ajoutFormation($code,$nom,$desc,$codeufr)
{
    $db = database();
    $ver = "select * from Formation where codeFormation'".$code."'";
    $res = $db->query($ver);
    $nb = $res->num_row;
    if($nb == 1)
    {
        echo "Ce code de formation est deja ajouter";
    }
    else
    {
        $ins = "insert into formation values('".$code."','".$nom."','".$desc."','".$codeufr."')";
        $res = $db->query($ins);
        if($res == true)
        {
            echo "Formation bien ajouter";
        }
    }
}