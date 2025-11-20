<?php 
$upt=$_GET['update_classe'];
$id_upt=$_GET['id_update']

?>

<form method="GET" action="classes.php" >
    <label for="classe_updated">Libellé</label>
    <input type="hidden" name="id_update" value="<?php echo $id_upt ?>" >
    <input type="text" name="classe_updated" value="<?php echo $upt ?>" >
    <button type="submit" >Modifier</button>
</form>

 