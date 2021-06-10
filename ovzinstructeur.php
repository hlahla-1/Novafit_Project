<!DOCTYPE html>
<html>
  <head>
    <link href="css/layout.css" rel="stylesheet" type="text/css" />
    <link href="css/form.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class="header">
      <h1>SuperFit</h1>
    </div>

    <div class="topnav">
      <a href="index.html">Thuis</a>
	  <a href="inschrijven.php" >Inschrijven</a>
      <a href="ovzinstructeur.php" style="color: #f06292">Instructeur</a>
	  <a href="managementinfo.php">Management Info</a>
	  <a href="queries.php" style="float: right">Overzichten</a>
 	  <a href="contact.html" style="float: right">Contact</a>
	  <a href="registreren.php" style="float: right">Registreer</a>
    </div>

    <div class="row">
		<div class="card" style="background-color: #cfd8dc">
		
			<form action="ovzinstructeur.php" method="post">
				<div class="container">
					<input type="submit" name="gemiddeldlesenprijs" value="Gemiddeld aantallessen en prijs" class="overzichtbutton" />
					<input type="submit" name="gemiddeldlesenprijspergroeples" value="Gemiddeld aantallessen en prijs per groeples" class="overzichtbutton" />
					<input type="submit" name="aantalpersonentotaalprijsperwoonplaats" value="Aantal personen en totaal prijs per woonplaats" class="overzichtbutton" />
					<input type="submit" name="telefoonlijstperperson" value="Telefoonlijst per person" class="overzichtbutton" />
					<!--<input type="submit" name="aantalpersonpergroeples" value="Aantal personen per groeples" class="overzichtbutton" />
					<input type="submit" name="prijsperinstructeur" value="Prijs per instructeur" class="overzichtbutton" />
					<input type="submit" name="personperwoonplaats" value="Personen per woonplaats" class="overzichtbutton" />-->
				</div> <!-- einde container -->
			</form>
			
			<?php	

				if (isset($_POST['gemiddeldlesenprijs'])){
					$connection = mysqli_connect("localhost","root","","webshop");
					$select = "SELECT AVG(aantallessen) AS gemiddeld_lessen, AVG(prijsperles) AS gemiddeld_prijs FROM inschrijvingen;";
					//$select = "SELECT soortgroepsles, AVG(aantallessen) AS gemiddeld_lessen, AVG(prijsperles) AS gemiddeld_prijs FROM inschrijvingen GROUP By soortgroepsles";
					$result = mysqli_query($connection,$select);
					echo "<table>";
					while ($row = mysqli_fetch_array($result)){
							
						//$soortgroepsles     = $row['soortgroepsles'];
						$gemiddeldlessen	= $row['gemiddeld_lessen'];
						$gemiddeldprijs		= $row['gemiddeld_prijs'];

						echo 	"<tr>".
								//"<td>".
								//"Soortgroepsles: ".$soortgroepsles.
								//"</td>".
								"<td>".
								"Gemiddeld lessen: ".$gemiddeldlessen.
								"</td>".
								"</tr>".
								"<tr>".
								"<td>".
								"Gemiddeld prijs: ".$gemiddeldprijs.
								"</td>".
								"</tr>";
					}
					echo "</table>";
				}

				if (isset($_POST['gemiddeldlesenprijspergroeples'])){
					$connection = mysqli_connect("localhost","root","","webshop");
					//$select = "SELECT AVG(aantallessen) AS gemiddeld_lessen, AVG(prijsperles) AS gemiddeld_prijs FROM inschrijvingen;";
					$select = "SELECT soortgroepsles, AVG(aantallessen) AS gemiddeld_lessen, AVG(prijsperles) AS gemiddeld_prijs FROM inschrijvingen GROUP By soortgroepsles";
					$result = mysqli_query($connection,$select);
					echo "<table>";
					while ($row = mysqli_fetch_array($result)){
							
						$soortgroepsles     = $row['soortgroepsles'];
						$gemiddeldlessen	= $row['gemiddeld_lessen'];
						$gemiddeldprijs		= $row['gemiddeld_prijs'];

						echo 	"<tr>".
								"<td>".
								"Soortgroepsles: ".$soortgroepsles.
								"</td>".
								"<td>".
								"Gemiddeld lessen: ".$gemiddeldlessen.
								"</td>".
								"<td>".
								"Gemiddeld prijs: ".$gemiddeldprijs.
								"</td>".
								"</tr>";
					}
					echo "</table>";
				}

				if (isset($_POST['aantalpersonentotaalprijsperwoonplaats'])){
					$connection = mysqli_connect("localhost","root","","webshop");
					$select = "SELECT DISTINCT(woonplaats), count(*) AS aantal_personen, SUM((aantallessen*prijsperles)) AS total_prijs FROM inschrijvingen GROUP BY woonplaats;";
					$result = mysqli_query($connection,$select);
					echo "<table>";
					while ($row = mysqli_fetch_array($result)){
						$woonplaats 	= $row['woonplaats'];
						$aantalpersonen	= $row['aantal_personen'];
						$totalprijs     = $row['total_prijs'];
						echo	"<tr>".
								"<td>".
								"Woonplaats: ".$woonplaats.
								"</td>".
								"<td>".
								"Aantalpersonen: ".$aantalpersonen.
								"</td>".
								"<td>".
								"Totaalprijs: ".$totalprijs.
								"</td>".
								"</tr>";
					}
					echo "</table>";
				}

				if (isset($_POST['telefoonlijstperperson'])){
					$connection = mysqli_connect("localhost","root","","webshop");
					$select = "SELECT DISTINCT(naam), telefoonnummer FROM inschrijvingen;";
					$result = mysqli_query($connection,$select);
					echo "<table>";
					while ($row = mysqli_fetch_array($result)){
							
						$naam	         = $row['naam'];
						$telefoonnummer	 = $row['telefoonnummer'];

						echo 	"<tr>".
								"<td>".
								"Naam: ".$naam.
								"</td>".
								"<td>".
								"Telefoonnummer: ".$telefoonnummer.
								"</td>".
								"</tr>";
					}
					echo "</table>";
				}

				/*if (isset($_POST['aantalpersonpergroeples'])){
					$connection = mysqli_connect("localhost","root","","webshop");
					$select = "SELECT soortgroepsles,COUNT(*) AS aantal_personen FROM inschrijvingen GROUP BY soortgroepsles;";
					$result = mysqli_query($connection,$select);
					echo "<table>";
					while ($row = mysqli_fetch_array($result)){
							
						$soortgroepsles	= $row['soortgroepsles'];
						$aantalpersonen		= $row['aantal_personen'];

						echo 	"<tr>".
								"<td>".
								$soortgroepsles.
								"</td>".
								"<td>".
								$aantalpersonen.
								"</td>".
								"</tr>";
					}
					echo "</table>";
				}

				if (isset($_POST['prijsperinstructeur'])){
					$connection = mysqli_connect("localhost","root","","webshop");
					$select = "SELECT instructeur,SUM(aantallessen) AS aantal_lessen , prijsperles , SUM((aantallessen*prijsperles)) AS total_prijs from inschrijvingen GROUP BY instructeur;";
					$result = mysqli_query($connection,$select);
					echo "<table>";
					while ($row = mysqli_fetch_array($result)){
						$instructeur 	= $row['instructeur'];
						$aantallessen	= $row['aantal_lessen'];
						$prijsperles    = $row['prijsperles'];
						$totalprijs     = $row['total_prijs'];
						echo	"<tr>".
								"<td>".
								"Instructeur: ".$instructeur.
								"<tr>".
								"<td>".
								"Aantallessen: ".$aantallessen.
								"</td>".
								"<td>".
								"Prijsperles: ".$prijsperles.
								"<tr>".
								"<td>".
								"totaalprijs: ".$totalprijs.
								"</td>".
								"</tr>";
					}
					echo "</table>";
				}

				if (isset($_POST['personperwoonplaats'])){
					$connection = mysqli_connect("localhost","root","","webshop");
					$select = "SELECT DISTINCT(woonplaats),soortgroepsles, COUNT(*) As aantal_personen FROM inschrijvingen GROUP BY woonplaats;";
					$result = mysqli_query($connection,$select);
					echo "<table>";
					while ($row = mysqli_fetch_array($result)){

						$woonplaats     = $row['woonplaats'];	
						$soortgroepsles	= $row['soortgroepsles'];
						$aantalpersonen = $row['aantal_personen'];

						echo 	"<tr>".
								"<td>".
								$woonplaats.
								"</td>".
								"<td>".
								$soortgroepsles.
								"</td>".
								"<td>".
								$aantalpersonen.
								"</td>".
								"</tr>";
					}
					echo "</table>";
				}*/
			?>

		</div> <!-- einde card -->
     </div> <!-- einde row -->
  
  </body>
</html>
