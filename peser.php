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
/*$req = $bdd->prepare('INSERT INTO peser (identification_rebut) VALUES(?)');
$req->execute(array($_POST['identification_rebut']));
$req->closeCursor();*/

// 2 - lier la pesée à la production et à la caisse de pesée
$req = $bdd->prepare('INSERT INTO code_barre (identification_rebut, tare_caissette, poids_brut_rebut) VALUES(?, ?, ?)');
$req->execute(array($_POST['identification_rebut'], $_POST['tare_caissette'], $_POST['poids_brut_rebut']));
$req->closeCursor();


// Redirection du visiteur vers la page principale
header('Location: index.php');
?>
