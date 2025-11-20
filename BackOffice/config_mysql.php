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




?>

