<?php
require_once(__DIR__ . '/config_mysql.php');
require_once(__DIR__ . '/DELETE.php');
require_once(__DIR__ . '/SUBMIT_UPDATE.php');
require_once(__DIR__ . '/INSERT.php');
require_once(__DIR__ . '/SELECT.php');
Supprime_une_classe();
Modifie_une_classe();
Ajoute_une_classe();
$classes=Selectionne_les_classes();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Back-office - Classes</h1>
    <nav>
        <a href="index.php">Dashboard</a>
        <a href="classes.php">Classes</a>
        <a href="eleves.php">Élèves</a>
        <a href="matieres.php">Matières</a>
        <a href="notes.php">Notes</a>
    </nav>

    <h2>Ajouter une classe</h2>
    <?php if (isset($_GET['update_classe'])) { 

    require_once(__DIR__ . '/formulaire_upd_classe.php');

    } 
    else{
    ?>
    <form method="POST" action="classes.php" >
        <label for="classe">Libellé</label>
        <input type="text" name="classe" placeholder="ex: SIO1">
        <button type="submit">Ajouter</button>
    </form>
    <?php }?>
    
    <h2>Liste des classes</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Libellé</th>
            <th>Actions</th>
        </tr>
        <?php 
        for ($i=0; $i < count($classes); $i++){
             
        ?>
        
        <tr>
            <?php 
            echo "<td>".($i+1)."</td>";
            echo "<td>".$classes[$i]['Nom_Classe']."</td>";
            ?>
            <td>
                <button><a href="classes.php?id_update=<?php echo $classes[$i]['Id']; ?>&update_classe=<?php echo $classes[$i]['Nom_Classe'] ?>">Éditer</button> 
                <button><a href="classes.php?id_del_classe=<?php echo $classes[$i]['Id']; ?>">Supprimer</a></button></td> 
        </tr>
        <?php } ?>
        
    </table>
    <br>

    
</body>
<footer>© 2025 - Mini-projet SLAM</footer>
</html>