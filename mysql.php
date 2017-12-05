<?php
date_default_timezone_set("Europe/Paris");
try
{
    $bdd = new PDO('mysql:host=developont.fr;dbname=developonteur;charset=utf8mb4', 'developonteur', 'G4rdeP0n!');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
$reponse = $bdd->query('SELECT * FROM code_barre ORDER BY date_peser DESC ');

$xls_output = "identification_rebut;poids_net_rebut;poids_brut_rebut;tare_caissette;date_pesée;heure_pesée";
$xls_output .= "\n";

while($donnees = $reponse->fetch())
{
    $timestamp = strtotime($donnees['date_peser']);
    $jourDate = date("d-m-Y", $timestamp);
    $heureDate = date("H:i:s", $timestamp);
    $a=$donnees['identification_rebut'];$b=$donnees['poids_net_rebut'];$c=$donnees['poids_brut_rebut'];$d=$donnees['tare_caissette'];$e=$jourDate;$f=$heureDate;
    $xls_output .= "$a;$b;$c;$d;$e;$f\n";
}

header("Content-type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=ApplicationRebutLegrandMySQL_".date("d-m-Y_Hi").".csv");
print $xls_output;
exit;
?>
