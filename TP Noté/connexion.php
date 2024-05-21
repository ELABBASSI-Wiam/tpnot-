<?php
$host = 'localhost';
$dbname = 'gestionstagiaire_v1';
$user ='root';
$password ='';
try {
    $pdo = new PDO ("mysql:host=$host;dbname=$dbname;charset=Utf8",$user,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: ". $e->getMessage());
}
?>