<!DOCTYPE html>
<html lang="fr">
<head>
		<meta charset="UTF-8">
    	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="css/style.css">
		<title>Legrand</title>
</head>

<body>
	<div class="container" id="main">
		<div class="header clearfix">
	        <nav>
	          <ul class="nav nav-pills pull-left">
	            <li role="presentation" ><img class="logo" src="photos/logo.jpg" alt="logo"/></li>
				<li role="presentation" ><h1>Application impression étiquette rebut</h1></li>
				<li role="presentation" ><img class="legrandlogo" src="photos/legrandlogo.png" alt="legrandlogo"/></li>
	          </ul>
			</nav>
		</div>
		<div class="container-fluid">
			<div class="row col-md-12">
				<div class="col-xs-12 col-sm-12">
					<h2 class="page-header">Déclaration des rebuts</h2>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row col-xs-12 col-md-12">
				<div class="col-xs-6 col-sm-6">
					<form action="peser.php" method='POST'  onsubmit="return submitControl(false)">
						<div class="form-group">
							<label for="InputName1">Identification rebut :</label>
							<input type="text" class="form-control" id="InputName1" placeholder="identification_rebut" name="identification_rebut" disabled>
						</div>

						<div class="form-group">
							<label for="InputName2">Poids brut rebut :</label>
							<input type="text" class="form-control" id="InputName2" placeholder="poids_brut_rebut" name="poids_brut_rebut" disabled>
						</div>

						<div class="form-group">
							<label for="InputName3">Tare caissette :</label>
							<input type="text" class="form-control" id="InputName3" placeholder="tare_caissette" name="tare_caissette" disabled>
						</div>
				</div>
						<div class="col-xs-6 col-sm-6">
							<br><button type="submit" name="valider" class="btn btn-default" disabled>Valider saisie</button></br>
							<br><button type="reset" name="reset" class="btn btn-default">Réinitialiser</button></br>
						</div>
					</form>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row col-md-12">
				<div class="col-xs-12 col-sm-12">
					<div class="bs-example">
						<table class="table table-bordered">
							<caption>Nomenclature</caption>
							<thead>
								<tr>
									<th>Identification rebut</th>
									<th>Poids net rebut</th>
									<th>Poids brut rebut</th>
									<th>Tare caissette</th>
									<th>Date de peser</th>
									<th>Heure de peser</th>
								</tr>
							</thead>
							<tbody>
							<?php
								// Affiche les Billets
								try
								{
									$bdd = new PDO('mysql:host=developont.fr;dbname=developonteur;charset=utf8mb4', 'developonteur', 'G4rdeP0n!');
								}
								catch(Exception $e)
								{
									die('Erreur : '.$e->getMessage());
								}
								$reponse = $bdd->query('SELECT * FROM code_barre ORDER BY date_peser DESC ');
								while ($donnees = $reponse->fetch()){
							?>
								<tr>
									<td scope="row"><?php echo htmlspecialchars($donnees['identification_rebut']); ?></td>
									<td><?php echo calculeNetRebut($donnees['poids_brut_rebut'],$donnees['tare_caissette']) ?></td>
									<td><?php echo htmlspecialchars($donnees['poids_brut_rebut']); ?></td>
									<td><?php echo htmlspecialchars($donnees['tare_caissette']); ?></td>
									<td><?php echo $donnees['date_peser'] ?></td>
									<td><?php echo $donnees['date_peser'] ?></td>
								</tr>
							<?php
								}
								$reponse->closeCursor();

								function calculeNetRebut($chiffre1,$chiffre2)
								{
									$arr1 = str_split($chiffre1);
									$arr2 = str_split($chiffre2);
									for($i=count($arr1)-1; $i >=0 ; $i--)
									{
										if(!is_numeric($arr1[$i]) && !($arr1[$i] == "."))
										{
											$arr1Final = "";
											for($i=$i+1; $i < count($arr1); $i++)
											{
												$arr1Final .= $arr1[$i];
											}
											$i = -1;
										}
									}
									for($i=count($arr2)-1; $i >=0 ; $i--)
									{
										if(!is_numeric($arr2[$i]) && !($arr2[$i] == "."))
										{
											$arr2Final = "";
											for($i=$i+1; $i < count($arr2); $i++)
											{
												$arr2Final .= $arr2[$i];
											}
											$i = -1;
										}
									}
									if(is_numeric($arr1Final) && is_numeric($arr2Final))
									{
										return $arr1Final - $arr2Final;
									}
									return "Erreur;)";
								}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
	<script language="javascript" src="js/scan.js"></script>
</body>
</html>
<!--$reponse = $bdd->query('SELECT * FROM code_barre info
						INNER JOIN peser pe
						ON info.identification_rebut = pe.identification_rebut
						ORDER BY pe.date_peser DESC ');-->
