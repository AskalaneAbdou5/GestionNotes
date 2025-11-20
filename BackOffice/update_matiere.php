<?php
$update_nom_matiere=$_GET['update_matiere'];
$id_update_matiere = $_GET['id_update_matiere'];

?>


<form action="matieres.php" method="GET">
        <label for="matiere">Libellé </label>
        <input type="hidden" name="id_matiere_updated" value="<?php echo $id_update_matiere ; ?>">
        <input type="text" name="matiere_updated" value="<?php echo $update_nom_matiere ;?>">

        <input type="submit" value="Modifier">
</form>