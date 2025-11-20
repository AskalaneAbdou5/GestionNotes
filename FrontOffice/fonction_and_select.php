<?php

function connection_bdd(){
    $dsn = 'mysql:host=localhost;dbname=gestionnotes;charset=utf8';
    $user = 'root';
    $password = '';

    try {
        return $pdo = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        echo 'Echec de la connexion : ' . $e->getMessage();
        exit;
    }

}

// SELECT pour les noms des eleves

function selectionne_les_eleves(){

    $connect=connection_bdd();
    $sql = "SELECT * FROM `eleves`";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    return $stmt->fetchall();

}



// SELECT pour les notes

function selectionne_les_notes(){

    $connect=connection_bdd();
    $sqlf = "SELECT notes.Id,
    notes.Date,
    notes.Note,
    classes.Nom_Classe,
    notes.Id_Eleve,
    matieres.Nom_Matiere 
    FROM notes 
    JOIN eleves ON notes.Id_Eleve = eleves.Id
    JOIN matieres ON notes.Id_Matiere = matieres.Id
    JOIN classes ON eleves.Id_Classe = classes.Id
    ";
    $stm = $connect->prepare($sqlf);
    $stm->execute();
    return $stm->fetchall();

}


function eleve_a_des_notes($n){

    $etudiants=selectionne_les_notes();
    $liste_eleve=[];
    foreach ($etudiants as $eleve) {
        $liste_eleve[]=$eleve['Id_Eleve'];
    }
    return in_array($n,$liste_eleve);
}

?>