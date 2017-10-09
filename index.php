<!DOCTYPE html>
<html lang="fr">
<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="website/images">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="css/style.css" />
		<title>Legrand</title>
</head>

<body onkeydown="affKeyCode(event)">
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

				<form action="peser.php" method='POST' onsubmit='return verif_champ(document.form1.mots_cles.value);'>
				<div class="form-group">
			     <label for="exampleInputName2">Code_barre_production:</label>
			     <input type="text" size="10" tabindex="1" class="form-control" id="code_barre_production" placeholder="Code_barre_production" name="code_barre_production" maxlength="10" onkeydown="focusNext(elmnt,content)">
			   </div>
				 <div class="form-group">
		 	     <label for="exampleInputName2">Code_barre_caisse :</label>
		 	     <input type="text" size="10" tabindex="2" class="form-control" id="code_barre_caisse" placeholder="Code_barre_caisse " name="code_barre_caisse" maxlength="10" onkeyup="toUnicode(this,this.value)">
		 	   </div>
				 <div class="form-group">
						<label for="exampleInputName2"> Code_barre_peser : </label>
						<input type="text" size="10" tabindex="3" class="form-control" id="code_barre_peser" placeholder=" Code_barre_peser "name="code_barre_peser" maxlength="10" onkeyup="toUnicode(this,this.value)">
					</div>
					<div class="form-group">
						<label for="exampleInputName2">Peser :</label>
						<input type="text" class="form-control" id="peser" placeholder="kg" name="peser">
					</div>

			</div>

			<div class="col-xs-6 col-sm-6">
				<br><button type="submit" name="valider" class="btn btn-default">Valider</button></br>
				<br><button type="reset" name="reset" class="btn btn-default">Annuler</button></br>
			</div>

		</div>
			</form>
			</div>

			<div class="container-fluid">
				<div class="row col-md-12">
			<div class="col-xs-12 col-sm-12">

				<div class="bs-example">
						<table class="table table-bordered">
						<caption>Nomenclature</caption>
						<thead>
						<tr>
						<th>ID</th>
						<th>Date de peser </th>
						<th>Heure de peser </th>
						<th>Code barre de production </th>
						<th>Code barre de caisse </th>
						<th>Code barre de peser </th>
						<th>Kg</th>
						</tr>
						</thead>
						<tbody>

			<?php
		// Affiche les Billets
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=legrand;charset=utf8', 'root', 'wucly1978');
			}
			catch(Exception $e)
			{
							die('Erreur : '.$e->getMessage());
			}

			$reponse = $bdd->query('SELECT * FROM info_donnees info
															INNER JOIN apres_peser ap
															ON info.code_barre_peser = ap.code_barre_peser
															ORDER BY ap.id DESC ');

			while ($donnees = $reponse->fetch()){
			?>
						<tr>

					<th scope="row"><?php echo $donnees['id']; ?></th>
					<td><?php echo $donnees['date_peser']= date("Y-m-d"); ?></td>
					<td><?php echo $donnees['date_peser']= date("H:i:s"); ?></td>
					<td><?php echo htmlspecialchars($donnees['code_barre_production']); ?></td>
					<td><?php echo htmlspecialchars($donnees['code_barre_caisse']); ?></td>
					<td><?php echo htmlspecialchars($donnees['code_barre_peser']); ?></td>
					<td><?php echo nl2br(htmlspecialchars($donnees['peser'])); ?></td>
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

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	<!-- include jQuery via CDN -->
	 <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
	<!-- your own file in your project folder -->
	<script language="javascript" src="js/scan.js"></script>
</body>
</html>
