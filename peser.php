<?php
$identification_rebut = str_split($_POST["identification_rebut"]);
$poids_brut_rebut = str_split($_POST["poids_brut_rebut"]);
$tare_caissette = str_split($_POST["tare_caissette"]);
echo "**************** POST ****************<br>";
var_dump($_POST);

for($i=count($identification_rebut)-1; $i >= 0 ; $i--)
{
	if($identification_rebut[$i] == " ")
	{
		$identification_rebut2 = "";
		for($i=$i+1; $i < count($identification_rebut); $i++)
		{
			$identification_rebut2 .= $identification_rebut[$i];
		}
		$_POST["identification_rebut"] = $identification_rebut2;
		$i = -1;
	}
}

$j = 0;
for($i=count($poids_brut_rebut)-1; $i >= 0 ; $i--)
{
	if($poids_brut_rebut[$i] == ".")
	{
		$j = 3-$j;
		for ($k=1; $k <= $j; $k++)
		{
			$poids_brut_rebut[] = "0";
		}
	}
	$j++;
	if(!is_numeric($poids_brut_rebut[$i]) && !($poids_brut_rebut[$i] == "."))
	{
		$poids_brut_rebut2 = "";
		for($i=$i+1; $i < count($poids_brut_rebut); $i++)
		{
			$poids_brut_rebut2 .= $poids_brut_rebut[$i];
		}
		$_POST["poids_brut_rebut"] = $poids_brut_rebut2;
		$i = -1;
	}
}

$j = 0;
for($i=count($tare_caissette)-1; $i >= 0 ; $i--)
{
	if($tare_caissette[$i] == ".")
	{
		$j = 3-$j;
		for ($k=1; $k <= $j; $k++)
		{
			$tare_caissette[] = "0";
		}
	}
	$j++;
	if(!is_numeric($tare_caissette[$i]) && !($tare_caissette[$i] == "."))
	{
		$tare_caissette2 = "";
		for($i=$i+1; $i < count($tare_caissette); $i++)
		{
			$tare_caissette2 .= $tare_caissette[$i];
		}
		$_POST["tare_caissette"] = $tare_caissette2;
		$i = -1;
	}
}
// Calcule de poids_brut_rebut - tare_caissette
$resultat = str_split($_POST["poids_brut_rebut"]-$_POST["tare_caissette"]);
$j = 0;
for ($i=count($resultat)-1; $i >= 0; $i--)
{
	if($resultat[$i] == ".")
	{
		$j = 3-$j;
		for ($i=1; $i <= $j; $i++)
		{
			$resultat[] = "0";
		}
		$i = -1;
	}
	$j++;
}
$poidsNetRebut = implode($resultat);
// Connexion à la base de données
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
$req = $bdd->prepare('INSERT INTO code_barre (identification_rebut, tare_caissette, poids_brut_rebut, poids_net_rebut) VALUES(?, ?, ?, ?)');
$req->execute(array($_POST['identification_rebut'], $_POST['tare_caissette'], $_POST['poids_brut_rebut'], $poidsNetRebut));
$req->closeCursor();


// Redirection du visiteur vers la page principale
header('Location: index.php');

?>
