<?php

function Selectionne_les_classes(){
    $connect=connection_bdd();
    $sql = "SELECT * FROM `classes`";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    return $stmt->fetchall();;
}



function Selectionne_les_eleves(){
    $connect=connection_bdd();
    $sql = "SELECT elv.Nom,
    elv.Id,
    elv.Prenom,
    elv.Id_Classe,
    cls.Nom_Classe
    FROM eleves elv
    JOIN classes cls ON elv.Id_Classe=cls.Id";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    return $stmt->fetchall();
}



function Selectionne_les_matieres(){
    $connect=connection_bdd();
    $sql = "SELECT * FROM `matieres`";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    return $stmt->fetchall();
}



function Selectionne_les_notes(){
    $connect=connection_bdd();
    $sqlf = "SELECT notes.Id,
    notes.Date,
    notes.Note,
    classes.Nom_Classe,
    eleves.Nom,
    eleves.Prenom,
    notes.Id_Eleve,
    notes.Id_Matiere,
    matieres.Nom_Matiere 
    FROM notes 
    JOIN eleves ON notes.Id_Eleve = eleves.Id
    JOIN matieres ON notes.Id_Matiere = matieres.Id
    JOIN classes ON eleves.Id_Classe = classes.Id
    ORDER BY eleves.nom ASC
    ";
    $stm = $connect->prepare($sqlf);
    $stm->execute();
    return $stm->fetchall();
}

?>