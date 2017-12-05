<!DOCTYPE html>
<html lang="fr">
<head>
	<?php date_default_timezone_set("Europe/Paris"); ?>
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
					<form id="formPeser" action="peser.php" method='POST'  onsubmit="return submitControl(false)">
						<div class="form-group">
							<label for="InputName1">Identification rebut :</label>
							<button type="button" onclick="valideCodeBarres('1-   test')" hidden>tester</button>
							<input type="text" class="form-control" id="InputName1" placeholder="identification_rebut" name="identification_rebut" disabled>
						</div>

						<div class="form-group">
							<label for="InputName2">Poids brut rebut :</label>
							<button type="button" onclick="valideCodeBarres('2-   0.155')" hidden>tester</button>
							<input type="text" class="form-control" id="InputName2" placeholder="poids_brut_rebut" name="poids_brut_rebut" disabled>
						</div>

						<div class="form-group">
							<label for="InputName3">Tare caissette :</label>
							<div><button type="button" onclick="testInputName3(this)" hidden>tester</button><input type="text" maxlength="15" value="0.000" hidden></div>
							<input type="text" class="form-control" id="InputName3" placeholder="tare_caissette" name="tare_caissette" disabled>
						</div>
						<div id="messageErreur">Veuillez scanner les <span style='color: red;'>trois codes barres</span>.</div><br>
						<button id="test" type="submit" name="valider" class="btn btn-default" onclick="this.blur();">Valider saisie</button>
						<button type="reset" name="reset" class="btn btn-default" onclick="renitMessageErreur();this.blur();">Réinitialiser</button><br>
					</form>
				</div>
				<div class="col-xs-6 col-sm-6">
					<h3>Dernière saisie :<h3>
					<pre id="derniereSaisie"></pre>
					<button type="button" onclick="window.location.assign('mysql.php');">MySQL sous CSV</button>
				</div>
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
									<th>Date de pesée</th>
									<th>Heure de pesée</th>
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
								$nombreProd = 0;
								while ($donnees = $reponse->fetch())
								{
									$nombreProd++
							?>
								<tr>
									<td scope="row"><?php echo htmlspecialchars($donnees['identification_rebut']); ?></td>
									<td><?php echo htmlspecialchars($donnees['poids_net_rebut']); ?></td>
									<td><?php echo htmlspecialchars($donnees['poids_brut_rebut']); ?></td>
									<td><?php echo htmlspecialchars($donnees['tare_caissette']); ?></td>
									<td><?php
									$db = $donnees['date_peser'];
									$timestamp = strtotime($db);
									echo date("d-m-Y", $timestamp);
									 ?></td>
									 <td><?php
 									echo date("H:i:s", $timestamp);
 									 ?></td>
								</tr>
							<?php
								}
								echo "<script>nombreProd = '$nombreProd'</script>";
								$reponse->closeCursor();
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
