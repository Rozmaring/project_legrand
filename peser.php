<?php
function generate_codebarre($poids) {
	return '2-'.$poids;
	// A FAIRE !!!
}

// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=legrand;charset=utf8', 'root', 'wucly1978');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// 1 - Générer un code_barre
$codebarre=generate_codebarre($_POST['peser']);

// 2 - Enregistrer dans la base
$req = $bdd->prepare('INSERT INTO apres_peser (peser, code_barre_peser) VALUES(?, ?)');
$req->execute(array($_POST['peser'], $codebarre));
$req->closeCursor();

// 3 - lier la pesée à la production et à la caisse de pesée
$req = $bdd->prepare('INSERT INTO info_donnees (code_barre_production, code_barre_caisse, code_barre_peser) VALUES(?, ?, ?)');
$req->execute(array($_POST['code_barre_production'], $_POST['code_barre_caisse'], $codebarre));
$req->closeCursor();


// Redirection du visiteur vers la page du minichat
header('Location: index.php');
?>
