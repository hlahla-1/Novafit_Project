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
      <a href="ovzinstructeur.php" >Instructeur</a>
	  <a href="managementinfo.php" style="color: #f06292">Management Info</a>
	  <a href="queries.php" style="float: right">Overzichten</a>
 	  <a href="contact.html" style="float: right">Contact</a>
	  <a href="registreren.php" style="float: right">Registreer</a>
    </div>

    <div class="row">
		<div class="card" style="background-color: #cfd8dc">
		
			<form action="managementinfo.php" method="post">
				<div class="container">
                    <input type="submit" name="gemiddeldlesenprijsperinstructeur" value="Gemiddeld lessen en prijs per instructeur" class="overzichtbutton" />
					<input type="submit" name="aantalpersonperinstructeur" value="Aantal person per instructeur" class="overzichtbutton" />
					<input type="submit" name="totaalprijspergroeples" value="Totaalprijs per groeples" class="overzichtbutton" />
	                <input type="submit" name="totaalprijsperwoonplaats" value="Totaalprijs per woonplaats" class="overzichtbutton" />
					<input type="submit" name="aantalpersonpergroeples" value="Aantal personen per groeples" class="overzichtbutton" />
					<input type="submit" name="prijsperinstructeur" value="Prijs per instructeur" class="overzichtbutton" />
					<input type="submit" name="personperwoonplaats" value="Personen per woonplaats" class="overzichtbutton" />
				</div> <!-- einde container -->
			</form>
			
			<?php	
				if (isset($_POST['gemiddeldlesenprijsperinstructeur'])){
					$connection = mysqli_connect("localhost","root","","webshop");
					$select = "SELECT instructeur,AVG(aantallessen) AS gemiddeld_aantallessen ,AVG(prijsperles) AS gemiddeld_prijs , SUM((aantallessen*prijsperles)) AS total_prijs from inschrijvingen GROUP BY instructeur;";
					$result = mysqli_query($connection,$select);
					echo "<table>";
					while ($row = mysqli_fetch_array($result)){
							
						$instructeur	= $row['instructeur'];
						$aantallessen	= $row['gemiddeld_aantallessen'];
                        $prijsperles	= $row['gemiddeld_prijs'];
                        $totalprijs	= $row['total_prijs'];
		                        echo	"<tr>".
                                        "<td>".
                                        "Instructeur: ".$instructeur.
                                        "</td>".
                                        "<td>".
                                        "Gemiddeld Aaatallessen: ".$aantallessen.
                                        "</td>".
                                        "<td>".
                                        "Gemiddeld prijs: ".$prijsperles.
                                        "</td>".
                                        "<td>".
                                        "Totaal prijs: ".$totalprijs.
                                        "</td>".
                                        "</tr>";
					}
					echo "</table>";
				}

                if (isset($_POST['aantalpersonperinstructeur'])){
					$connection = mysqli_connect("localhost","root","","webshop");
					$select = "SELECT instructeur, COUNT(*) AS aantal_personen FROM inschrijvingen GROUP BY instructeur";
					$result = mysqli_query($connection,$select);
					echo "<table>";
					while ($row = mysqli_fetch_array($result)){
							
						$instructeur	= $row['instructeur'];
						$aantalpersonen		= $row['aantal_personen'];

						echo 	"<tr>".
								"<td>".
								"Instructeur: ".$instructeur.
								"</td>".
								"<td>".
								"Aantal Personen: ".$aantalpersonen.
								"</td>".
								"</tr>";
					}
					echo "</table>";
				}

                if (isset($_POST['totaalprijspergroeples'])){
					$connection = mysqli_connect("localhost","root","","webshop");
                    $select = "SELECT soortgroepsles, SUM((aantallessen*prijsperles)) AS total_prijs FROM inschrijvingen GROUP BY soortgroepsles;";
					$result = mysqli_query($connection,$select);
					echo "<table>";
					while ($row = mysqli_fetch_array($result)){
							
						$soortgroepsles	= $row['soortgroepsles'];
						$totalprijs		= $row['total_prijs'];

						echo 	"<tr>".
								"<td>".
								"Soortgroeples: ".$soortgroepsles.
								"</td>".
								"<td>".
								"Totaalprijs: ".$totalprijs.
								"</td>".
								"</tr>";
					}
					echo "</table>";
				}

                if (isset($_POST['totaalprijsperwoonplaats'])){
					$connection = mysqli_connect("localhost","root","","webshop");
                    $select = "SELECT woonplaats, SUM((aantallessen*prijsperles)) AS total_prijs FROM inschrijvingen GROUP BY woonplaats;";
					$result = mysqli_query($connection,$select);
					echo "<table>";
					while ($row = mysqli_fetch_array($result)){
							
						$woonplaats	= $row['woonplaats'];
						$totalprijs		= $row['total_prijs'];

						echo 	"<tr>".
								"<td>".
								"Woonplaats: ".$woonplaats.
								"</td>".
								"<td>".
								"Totaalprijs: ".$totalprijs.
								"</td>".
								"</tr>";
					}
					echo "</table>";
				}

                if (isset($_POST['aantalpersonpergroeples'])){
					$connection = mysqli_connect("localhost","root","","webshop");
					$select = "SELECT soortgroepsles,COUNT(*) AS aantal_personen FROM inschrijvingen GROUP BY soortgroepsles;";
					$result = mysqli_query($connection,$select);
					echo "<table>";
					while ($row = mysqli_fetch_array($result)){
							
						$soortgroepsles	= $row['soortgroepsles'];
						$aantalpersonen		= $row['aantal_personen'];

						echo 	"<tr>".
								"<td>".
								"Soortgroepsles: ".$soortgroepsles.
								"</td>".
								"<td>".
								"Aantalpersonen: ".$aantalpersonen.
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
								"</td>".
								"<td>".
								"Aantal lessen: ".$aantallessen.
								"</td>".
								"<td>".
								"Prijsperles: ".$prijsperles.
								"</td>".
								"<td>".
								"Totaal prijs: ".$totalprijs.
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
								"Woonplaats: ".$woonplaats.
								"</td>".
								"<td>".
								"Soortgroepsles: ".$soortgroepsles.
								"</td>".
								"<td>".
								"Aantalpersonen: ".$aantalpersonen.
								"</td>".
								"</tr>";
					}
					echo "</table>";
				}
			?>
		</div> <!-- einde card -->
     </div> <!-- einde row -->
  
  </body>
</html>
