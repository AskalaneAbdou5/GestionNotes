<?php
require_once(__DIR__ . '/config_mysql.php');
require_once(__DIR__ . '/INSERT.php');
require_once(__DIR__ . '/DELETE.php');
require_once(__DIR__ . '/SUBMIT_UPDATE.php');
require_once(__DIR__ . '/SELECT.php');
Ajoute_une_note();
supprime_une_note();
Modifie_une_note();
$notes=Selectionne_les_notes();
$eleves=Selectionne_les_eleves();
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
    <h1>Back-office - Notes</h1>
    <nav>
        <a href="index.php">Dashboard</a>
        <a href="classes.php">Classes</a>
        <a href="eleves.php">Élèves</a>
        <a href="matieres.php">Matières</a>
        <a href="notes.php">Notes</a>
    </nav>

    <h2>Ajouter une note</h2>

    <?php if (isset($_GET['id_update_note']) && isset($_GET['update_eleve']) && isset($_GET['update_note']) && isset($_GET['update_date']) && isset($_GET['update_matiere'])) {
        
    require_once(__DIR__ . '/update_note.php');
    
    } else { ?>

    <form action="notes.php" method="post">
        <label for="eleve">Élève</label>
        <select name="eleve" >
            <?php for ($i=0; $i < count($eleves); $i++) { ?>
            <option value="<?php echo $eleves[$i]['Id'] ?>"><?php echo $eleves[$i]['Prenom']." ".$eleves[$i]['Nom']; ?></option>
            <?php } ?>
        </select>

        <label for="matiere">Matière</label>
        <select name="matiere">
            <?php for ($i=0; $i < count($matieres); $i++) { ?>
            <option value="<?php echo $matieres[$i]['Id'] ?>"><?php echo $matieres[$i]['Nom_Matiere'] ?></option>
            <?php } ?>
        </select>

        <label for="note">Note(0-20) </label>
        <input type="number" name="note" min="0" max="20" value="10" step="0.5">

        <label for="date">Date </label>
        <input type="date" name="date" >

        <input type="submit" value="Ajouter">
    </form>

    <?php } ?>

    <h2>Liste des notes</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Élève</th>
            <th>Matière</th>
            <th>Note</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
        <?php for ($i=0; $i <count($notes); $i++) { ?>

        <tr>
            <?php
            echo "<td>".$i."</td>";
            echo "<td>".$notes[$i]['Nom']." ".$notes[$i]['Prenom']."</td>";
            echo "<td>".$notes[$i]['Nom_Matiere']."</td>";
            echo "<td>".$notes[$i]['Note']."</td>";
            echo "<td>".$notes[$i]['Date']."</td>";
            ?>

            <td>
                <button>
                    <a href="notes.php?id_update_note=<?php echo $notes[$i]['Id']; ?>&update_eleve=<?php echo $notes[$i]['Id_Eleve'] ?>&update_note=<?php echo $notes[$i]['Note'] ?>&update_date=<?php echo $notes[$i]['Date'] ?>&update_matiere=<?php echo $notes[$i]['Id_Matiere'] ?>">Éditer
                </button> 
                <button><a href="notes.php?id_del_note=<?php echo $notes[$i]['Id']; ?>">Supprimer</a></button>
            </td>
            
        </tr>
        <?php } ?>
    </table>
    <br>


    
</body>
<footer>© 2025 - Mini-projet SLAM</footer>
</html>