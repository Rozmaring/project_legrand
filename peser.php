<?php
// Connexion à la base de données
var_dump($_POST);
try
{
	$bdd = new PDO('mysql:host=developont.fr;dbname=developonteur;charset=utf8mb4', 'developonteur', 'G4rdeP0n!');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// 1 - Enregistrement dans la base
$req = $bdd->prepare('INSERT INTO peser (code_barre_production, poid_total) VALUES(?, ?)');
$req->execute(array($_POST['code_barre_production'], $_POST['peser_totale']));
$req->closeCursor();

// 2 - lier la pesée à la production et à la caisse de pesée
$req = $bdd->prepare('INSERT INTO code_barre (code_barre_production, code_barre_caisse, code_barre_peser) VALUES(?, ?, ?)');
$req->execute(array($_POST['code_barre_production'], $_POST['code_barre_caisse'], $_POST['code_barre_peser']));
$req->closeCursor();


// Redirection du visiteur vers la page principale
header('Location: index.php');
?>
