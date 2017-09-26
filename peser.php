<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'rita', 'wucly1978');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO legrand (code_barre_production, code_barre_caisse, peser) VALUES(?, ?, ?)');
$req->execute(array($_POST['code_barre_production'], $_POST['code_barre_caisse'], $_POST['peser']));

if (!isset($_POST['code_barre_peser'])){
  $rand_code = (rand($_POST['id']);
  $req = $bdd->prepare('INSERT INTO legrand (code_barre_peser)');
  $req->execute(array($code));
}

// Redirection du visiteur vers la page du minichat
header('Location: index.php');
?>
