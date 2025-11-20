<?php 
$id_upd_note=$_GET['id_update_note'];
$note=$_GET['update_note'];
$date=$_GET['update_date'];
$id_eleve=$_GET['update_eleve'];
$id_matiere=$_GET['update_matiere'];


?>



<form action="notes.php" method="get">
    <label for="eleve">Élève</label>
    <select name="id_eleve_updated" >
        <?php for ($i=0; $i < count($eleves); $i++) { ?>

            <?php if ($eleves[$i]['Id'] === intval($id_eleve)) { ?>

                <option value="<?php echo $eleves[$i]['Id'];?>" selected><?php echo $eleves[$i]['Prenom']." ".$eleves[$i]['Nom']; ?></option>

            <?php } else { ?>
                <option value="<?php echo $eleves[$i]['Id'];?>"><?php echo $eleves[$i]['Prenom']." ".$eleves[$i]['Nom'];?></option>
            <?php } ?>
            
        <?php } ?>
    </select>

    <label for="matiere">Matière</label>
    <select name="id_matiere_updated">
        <?php for ($i=0; $i < count($matieres); $i++) { ?>

            <?php if ($matieres[$i]['Id'] === intval($id_matiere)) { ?>

                <option value="<?php echo $matieres[$i]['Id'];?>" selected><?php echo $matieres[$i]['Nom_Matiere'] ?></option>

            <?php } else { ?>
                <option value="<?php echo $matieres[$i]['Id'];?>"><?php echo $matieres[$i]['Nom_Matiere'];?></option>
            <?php } ?>

        <?php } ?>
    </select>

    <label for="note">Note(0-20) </label>
    <input type="number" name="note_updated" min="0" max="20" value="<?php echo $note; ?>" step="0.5">

    <label for="date">Date </label>
    <input type="date" name="date_updated" value="<?php echo $date; ?>">

    <input type="hidden" name="id_note_updated" value="<?php echo $id_upd_note; ?>">

    <input type="submit" value="Modifier">
</form>