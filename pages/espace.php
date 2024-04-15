<?php
    session_start();
    if(!isset($_SESSION['email']))
    {
        header("location:../index.php?msg=Veillez s'authentifier");
    }
    else
    {
        echo "<p align='right'>".$_SESSION["prenom"]." ".$_SESSION["nom"]." | ";
        echo "<a href='?action=listeCompte'>Liste des comptes</a> | ";
        echo "<a href='?action=ajoutUFR'>Ajout UFR<?a> | ";
        echo "<a href='?action=listeUFR'> Liste des UFR</a> | ";
        echo "<a href='?action=ajoutFormation'>Ajout Formation</a> | ";
        echo "<a href='?action=listeFormation'>Liste des Formations</a> | ";
        echo "<a href='../deconnexion.php'>Deconnecter</a> | ";
        echo "</p>";

        if(isset($_GET["action"]))
        {
            require "../fonction.php";
            $action = $_GET["action"];
            if($action == "listeCompte")
            {
                listeCompte();
            }
            if($action == "ajoutUFR")
            {
                ?>
                    <form method="POST">
                        <table>
                            <tr>
                                <td>
                                    <input type="text" name="codeufr" placeholder="le le nom UFR" style="width:250px" required />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="nomufr" placeholder="le code UFR" style="width:250px" required />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <textarea cols="20" rows="10" required name="description">La description</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="ajoutufr" value="Ajouter une UFR"/>
                                </td>
                            </tr>
                        </table>
                    </form>
                <?php
                if(isset($_POST["ajoutufr"]))
                {
                    extract($_POST);
                    ajoutUFR($codeufr,$nomufr,$description);
                }
            }
            if($action == "ajoutFormation")
                {
                    ?>
                        <form method="POST">
                            <table>
                                <tr>
                                    <td>
                                        <input type="text" name="codeformation" placeholder="Code Formation" required/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name="nomformation" placeholder="Nom Formation" required/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <textarea name="description=" cols="25" rows="5" required>Description</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php recupererInfoUFR(); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" name="ajoutformation"/>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    <?php
                    if(isset($_POST["ajoutformation"]))
                    {
                        extract($_POST);
                        ajoutFormation($codeformation, $nomformation, $description, $codeufr);  
                    }
                }
        }
    }
?>