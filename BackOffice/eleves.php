<?php
require_once(__DIR__ . '/config_mysql.php');
require_once(__DIR__ . '/DELETE.php');
require_once(__DIR__ . '/SUBMIT_UPDATE.php');
require_once(__DIR__ . '/INSERT.php');
require_once(__DIR__ . '/SELECT.php');
supprime_un_eleve();
Modifie_un_eleve();
Ajoute_un_eleve();
$eleves=Selectionne_les_eleves();
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
    <h1>Back-office - Élèves</h1>
    <nav>
        <a href="index.php">Dashboard</a>
        <a href="classes.php">Classes</a>
        <a href="eleves.php">Élèves</a>
        <a href="matieres.php">Matières</a>
        <a href="notes.php">Notes</a>
    </nav>

    <h2>Ajouter un élève</h2>

    <?php if (isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['id_classe']) && isset($_GET['id_eleve'])) {
        
    require_once(__DIR__ . '/update_eleve.php');
    
    } else { ?>

    <form action="eleves.php" method="post">
        <label for="prenom">Prénom </label>
        <input type="text" name="prenom" placeholder="ex: Alice">

        <label for="nom">Nom </label>
        <input type="text" name="nom" placeholder="ex: Durand">

        <label for="classe">Classe</label>

        <select name="id_classe" >

        <?php foreach ($classes as $classe) { ?>
            <option value="<?php echo $classe['Id'];?>"><?php echo $classe['Nom_Classe']?></option>
        <?php } ?>
        
        </select>

        <input type="submit" value="Ajouter">
    </form>
    
    <?php }?>

    <h2>Liste des élèves</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Classe</th>
            <th>Actions</th>
        </tr>
        <?php for ($i=0; $i <count($eleves) ; $i++) { ?>
        <tr>
            <?php
            echo "<td>".$i."</td>";
            echo "<td>".$eleves[$i]['Nom']."</td>";
            echo "<td>".$eleves[$i]['Prenom']."</td>";
            echo "<td>".$eleves[$i]['Nom_Classe']."</td>";
            ?>

            <td>
                <button><a href="eleves.php?nom=<?php echo $eleves[$i]['Nom'];?>&prenom=<?php echo $eleves[$i]['Prenom'];?>&id_classe=<?php echo $eleves[$i]['Id_Classe']; ?>&id_eleve=<?php echo $eleves[$i]['Id']; ?>">Éditer</button>
                <button><a href="eleves.php?id_del_eleve=<?php echo $eleves[$i]['Id']; ?>">Supprimer</a></button>
            </td>
            
        </tr>
        <?php } ?>

    </table>
    <br>

    
</body>
<footer>© 2025 - Mini-projet SLAM</footer>
</html>