<!DOCTYPE html>
<html>
<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="website/images">
	  <link type="text/css" rel="stylesheet" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		  <title>Legrand</title>

		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

	<fieldset id="base">

	<div class="container">

			<div class="col-md-6">

				<div>
						<br><img class="legrandlogo" src="photos/legrandlogo.png" alt="legrandlogo"/></br>
						<br><h1>Application "peser des rebuts"</h1></br>
				</div>

				<form action="peser.php" method='POST'>
				<div class="form-group">
			     <label for="exampleInputName2">Code_barre_production :</label>
			     <input type="text" class="form-control" id="exampleInputName2" placeholder="Code_barre_production" name="code_barre_production">
			   </div>
				 <div class="form-group">
		 	     <label for="exampleInputName2">Code_barre_caisse :</label>
		 	     <input type="text" class="form-control" id="exampleInputName2" placeholder="Code_barre_caisse " name="code_barre_caisse">
		 	   </div>
				 <div class="form-group">
						<label for="exampleInputName2"> Code_barre_peser : </label>
						<input type="text" class="form-control" id="exampleInputName2" placeholder=" Code_barre_peser "name="code_barre_peser">
					</div>
					<div class="form-group">
						<label for="exampleInputName2">Peser :</label>
						<input type="text" class="form-control" id="exampleInputName2" placeholder="kg" name="peser">
					</div>
				<button type="submit" class="btn btn-default">Submit</button>
				</form>

			</div>

			<div class="col-md-6">

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

					<h3>
							<em>le <?php echo $donnees['date_peser']; ?></em>
					</h3>

					<p>
					<em>Kg : <?php echo nl2br(htmlspecialchars($donnees['peser'])); ?></em>
					<br />
					 <em> Code barre de production : <?php echo htmlspecialchars($donnees['code_barre_production']); ?></em>
					 <br />
					 <em> Code barre de caisse : <?php echo htmlspecialchars($donnees['code_barre_caisse']); ?></em>
					<br />
					<em> Code barre de peser : <?php echo htmlspecialchars($donnees['code_barre_peser']); ?></em>
					</p>

			<?php
			}
			$reponse->closeCursor();
			?>

		</div>

	</div>

  </fieldset>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
