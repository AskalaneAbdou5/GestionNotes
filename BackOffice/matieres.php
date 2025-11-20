<?php
require_once(__DIR__ . '/config_mysql.php');
require_once(__DIR__ . '/DELETE.php');
require_once(__DIR__ . '/SUBMIT_UPDATE.php');
require_once(__DIR__ . '/INSERT.php');
require_once(__DIR__ . '/SELECT.php');
supprime_une_matiere();
Modifie_une_matiere();
Ajoute_une_matiere();
$matieres=Selectionne_les_matieres();
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Back-office - Matières</h1>
    <nav>
        <a href="index.php">Dashboard</a>
        <a href="classes.php">Classes</a>
        <a href="eleves.php">Élèves</a>
        <a href="matieres.php">Matières</a>
        <a href="notes.php">Notes</a>
    </nav>

    <h2>Ajouter une matères</h2>
    <?php if (!isset($_GET['update_matiere']) && !isset($_GET['id_update_matiere']) ) { ?>

    <form action="matieres.php" method="post">
        <label for="matiere">Libellé </label>
        <input type="text" name="matiere" placeholder="ex: Maths">

        <input type="submit" value="Ajouter">
    </form>

    <?php 
    }else {
        require_once(__DIR__ . '/formulaire_upd_matiere.php');
    }
    ?>

    <h2>Liste des Matières</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Libellé</th>
            <th>Actions</th>
        </tr>
        <?php 
        for ($i=0; $i < count($matieres) ; $i++) { 
        ?>
        <tr>
            <?php
            echo "<td>".($i+1)."</td>";
            echo "<td>".$matieres[$i]['Nom_Matiere']."</td>"
            ?>
            <td>
                <button><a href="matieres.php?id_update_matiere=<?php echo $matieres[$i]['Id']; ?>&update_matiere=<?php echo $matieres[$i]['Nom_Matiere'] ?>">Éditer</button> 
                <button><a href="matieres.php?id_del_matiere=<?php echo $matieres[$i]['Id']; ?>">Supprimer</a></button>
            </td>
        </tr>
        <?php }?>
        
    </table>
    <br>

    
</body>
<footer>© 2025 - Mini-projet SLAM</footer>
</html>