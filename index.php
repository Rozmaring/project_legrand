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
							<label for="InputName1">Code barre production :</label>
							<input type="text" class="form-control" id="InputName1" placeholder="Code_barre_production" name="code_barre_production" disabled>
						</div>

						<div class="form-group">
							<label for="InputName2">Code barre peser :</label>
							<input type="text" class="form-control" id="InputName2" placeholder="Code_barre_peser" name="code_barre_peser" disabled>
						</div>

						<div class="form-group">
							<label for="InputName3">Code barre caisse :</label>
							<input type="text" class="form-control" id="InputName3" placeholder="Code_barre_caisse" name="code_barre_caisse" disabled>
						</div>

						<div class="form-group">
							<input type="hidden" class="form-control" id="InputName4" placeholder="kg" name="peser_totale">
						</div>
				</div>
						<div class="col-xs-6 col-sm-6">
							<br><button type="submit" name="valider" class="btn btn-default" disabled>Valider</button></br>
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
									<th>Code barre de production</th>
									<th>Poid rebuts</th>
									<th>Date de peser</th>
									<th>Heure de peser</th>
									<th>Code barre de peser</th>
									<th>Code barre de caisse</th>
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
								$reponse = $bdd->query('SELECT * FROM code_barre info
														INNER JOIN peser pe
														ON info.code_barre_production = pe.code_barre_production
														ORDER BY pe.date_peser DESC ');
								while ($donnees = $reponse->fetch()){
							?>
								<tr>
									<td scope="row"><?php echo htmlspecialchars($donnees['code_barre_production']); ?></td>
									<td><?php echo htmlspecialchars($donnees['poid_rebut']); ?></td>
									<td><?php echo $donnees['date_peser'] ?></td>
									<td><?php echo $donnees['date_peser'] ?></td>
									<td><?php echo htmlspecialchars($donnees['code_barre_peser']); ?></td>
									<td><?php echo htmlspecialchars($donnees['code_barre_caisse']); ?></td>
								</tr>
							<?php
								}
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
