<?php
require_once 'connexion.php';

if($_SERVER['REQUEST_METHOD']== "POST"){
  $login=$_POST['login'];
  $motpasse=$_POST['mp'];

  if(!empty($login) && !empty($motpasse)){
    try {
        $sql="SELECT * FROM compte WHERE login = ? AND motpasse = ?";
        $stmt = $pdo->prepare($sql);
        $stmt -> execute([$login,$motpasse]);
         $user = $stmt->fetch();
            
            if ($user) {
                echo "Connexion réussie.";
                 //session
                 $_SESSION['login'] = $login;
                header("Location: espaceprivee.php");
                exit();
            } else {
                $error = "Les données d’authentification sont incorrectes.";
                header("Location: authentifier.php");
                exit();
            }
    } catch (PDOException $e) {
       echo "Erreur".$e->getMessage(); 
        }           
  }
 else {
      echo "les données d'authentification sont obligatoires.";
     }
    
    }

    
    

    




?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <fieldset>
        <h1>Authentification</h1>
        <div>
            <form action="" method="post">
            <label for="login">Login</label><br>
            <input type="text" name="login" id="login"><br>
            <label for="mp">Mot de passe</label><br>
            <input type="password" name="mp" id="mp"><br>
            <input type="submit" value="Se connecter" id="btn">
            </form>
        </div>
    </fieldset>
</body>
</html>


