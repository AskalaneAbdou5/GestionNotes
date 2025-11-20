<?php
require_once(__DIR__ . '/configmysql.php');



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des notes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
     <ul>
        <li><a href="index.html">Accueil</a></li>
        <li><a href="eleves.php">Note des élèves</a></li>
    </ul>

    <form method="get" action="eleves.php" >
        <label for="eleve">Veuillez selectionner l'élève que vous souhaitez voir ses notes :</label>

        <select name="eleve" >
            <?php 
            
            for ($i=0; $i < count($eleves) ; $i++) { 
                if($eleves[$i]['Id'] === intval($_GET['eleve'])){
                    echo "<option value=".$eleves[$i]['Id']." selected>".$eleves[$i]['Nom']." ".$eleves[$i]['Prenom']."</option>";
                }
                else{
                    echo "<option value=".$eleves[$i]['Id']." >".$eleves[$i]['Nom']." ".$eleves[$i]['Prenom']."</option>";
                }
            
            }

            ?>

        </select>
        <button type="submit" >Raffraichir</button>
    </form>
    <?php 
    if (isset($_GET['eleve'])){ 
        if (eleve_a_des_notes($_GET['eleve'],$etudiants)){
    ?>
        
        <table>
            <thead>
                 <tr>
                    <th>Matière</th>
                    <th>Classe</th>
                    <th>Note</th>
                    <th>Date</th>
                </tr>
            </thead>
           
            <tbody>
                <?php
                for ($i=0; $i < count($etudiants) ; $i++) { 

                if ($etudiants[$i]['Id_Eleve'] === intval($_GET['eleve'])){
                ?>
                <tr>
                    <?php
                        echo "<td>".$etudiants[$i]['Nom_Classe']."</td>";
                        echo "<td>".$etudiants[$i]['Nom_Matiere']."</td>";
                        echo "<td>".$etudiants[$i]['Note']."</td>";
                        echo "<td>".$etudiants[$i]['Date']."</td>";
                    ?>
                
                </tr>
                <?php
                        }
                } 
                ?>
            </tbody>
            
        </table>
    <?php }else {
        echo "L'élève n'a pas de note pour l'instant.";
    }
    } ?>
    
</body>
</html>

