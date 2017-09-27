<!DOCTYPE html>
<html>
<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="website/images">
	  <link type="text/css" rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <title>Legrand</title>
</head>

<body>

<section id="formulaire">

    <fieldset>

    <legend> Peser du panier : </legend>

    <form action="peser.php" method='POST'>
      <p>
      <label for="code_barre_production"> Code_barre_production : </label><input type="text" name="code_barre_production" id="code_barre_production"/><br />
      <label for="code_barre_caisse"> Code_barre_caisse : </label><input type="text" name="code_barre_caisse" id="code_barre_caisse"/><br />
			<label for="code_barre_peser"> Code_barre_peser : </label><input type="text" name="code_barre_peser" id="code_barre_peser"/><br />
      <label for="peser"> Peser / Kg : </label><input type="text" name="peser" id="peser"/><br />
        <br><input type="submit" value="Peser"/></br>
      </p>
    </form>

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
    <div class="news">
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
    </div>
    <?php
    }
    $reponse->closeCursor();
    ?>


  </fieldset>

</section>

</body>
</html>
