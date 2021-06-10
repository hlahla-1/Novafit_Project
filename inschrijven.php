<!DOCTYPE html>
<html>
  <head>
    <link href="css/layout.css" rel="stylesheet" type="text/css" />
    <link href="css/form.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class="header">
      <h1>SuperFit</h1>
      <p>Wacht niet langer op wat gaat komen - ga erop uit en laat het gebeuren!</p>
    </div>

    <div class="topnav">
      <a href="index.html">Thuis</a>
      <a href="inschrijven.php" style="color: #f06292">Inschrijven</a>
      <a href="ovzinstructeur.php">Instructeur</a>
      <a href="managementinfo.php">Management Info</a>
      <a href="Registreren.php" style="float: right">Registreer</a>
      <a href="queries.php" style="float: right">Overzichten</a>
      <a href="contact.html" style="float: right">Contact</a>
    </div>

    <div class="row">
		<div class="leftcolumn">
			<div class="card" style="background-color: #cfd8dc">
  
				<?php
					// variabalen initialiseren ( leegmaken)
					$naam = "";
					$email = "";
					$telefoon = "";
					$adres = "";
					$postcode = "";
					$woonplaats = "";
          $groeples = "";
          $aantalles = 0;
          $instructeur = "";
          $prijsperles = 0.0;
					// array voor invoerfouten definiteren
					$invoerfouten = array();
				
					// als op registreer wordt gedrukt
					if (isset($_POST['inschrijven'])){
						$naam	    	= $_POST['naam'];
						$email 			= $_POST['email'];
						$telefoon		= $_POST['telefoon'];
						$adres 			= $_POST['adres'];
            $postcode   = strtoupper($_POST['postcode']);
						$woonplaats		= $_POST['woonplaats'];
            $groeples       = $_POST['groeples'];
            $aantalles      = $_POST['aantalles'];
            $startdatumn	= $_POST['startdatumn'];

            //Kijken welke prijs en instructeur bij de les hoort.
            if($groeples == "aerobic"){
              $instructeur = "Tom van der Plas";
              $prijsperles = 29.99 ;
            }
            else if ($groeples == "box"){
              $instructeur = "Mohamed Ali";
              $prijsperles = 49.99 ;
            }
            else if ($groeples == "bootcamp"){
              $instructeur = "Bernadet Kamp";
              $prijsperles = 24.99 ;
            }
            else if ($groeples == "bodycombat"){
              $instructeur = "Bowie aan de Vecht";
              $prijsperles = 29.99 ;
            }
            
            if (is_null($naam)){
							// als naam niet is ingevuld(leeg), dan regel toevoegen aan array invoerfouten.
							array_push($invoerfouten,"Een naam is verplicht.");
						}
						if (is_null($email)){
							array_push($invoerfouten,"Een email adres is verplicht.");
						}
            if (is_null($telefoon)){							
							array_push($invoerfouten,"Een telefoon is verplicht.");
						}
						if (is_null($adres)){
							array_push($invoerfouten,"Een adres is verplicht.");
						}
            if (is_null($postcode)){
							array_push($invoerfouten,"Een postcode is verplicht.");
						}
            if (is_null($woonplaats)){
							array_push($invoerfouten,"Een woonplaats is verplicht.");
						}
            if (is_null($groeples)){
							array_push($invoerfouten,"Een groeples is verplicht.");
						}
            if (is_null($aantalles)){
							array_push($invoerfouten,"Een aantalles is verplicht.");
						}
            if (is_null($startdatumn)){
							array_push($invoerfouten,"Een startdatumn is verplicht.");
						}
            

            /*if (isset($naam)){
							// als naam niet is ingevuld(leeg), dan regel toevoegen aan array invoerfouten.
							array_push($invoerfouten,"Dat is waar");
						}
						if (isset($email)){
							array_push($invoerfouten,"Dat is waar");
						}
            if (isset($telefoon)){							
							array_push($invoerfouten,"Dat is waar");
						}
						if (isset($adres)){
							array_push($invoerfouten,"Dat is waar");
						}
            if (is_isset($postcode)){
							array_push($invoerfouten,"Dat is waar");
						}
            if (isset($woonplaats)){
							array_push($invoerfouten,"Dat is waar");
						}
            if (isset($groeples)){
							array_push($invoerfouten,"Dat is waar");
						}
            if (isset($aantalles)){
							array_push($invoerfouten,"Dat is waar");
						}
            if (isset($startdatumn)){
							array_push($invoerfouten,"Dat is waar");
						}*/

           //Kijken of de naam uit letters bestaan.
						if (empty($naam)){
							// als naam niet is ingevuld(leeg), dan regel toevoegen aan array invoerfouten.
							array_push($invoerfouten,"Een naam is verplicht.");
						}
            else{

              if(!ctype_alpha($naam)){
                array_push($invoerfouten,"De naam mag alleen bestaan uit letters.");
              }
              else{

                if(is_numeric($naam)){
                  array_push($invoerfouten,"De naam mag alleen bestaan uit letters.");
                }
              }
            }

            //Kijken of het email geldig is.
						if (empty($email)){
							array_push($invoerfouten,"Een email adres is verplicht.");
						}
            else{

              $email = filter_var($email, FILTER_SANITIZE_EMAIL);
              if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                array_push($invoerfouten,"Deze email is geen geldig email-adres.");
              }              
            }

            //Kijken of het telefoonummer en aantal uit letters bestaan.
            if (empty($telefoon)){							
							array_push($invoerfouten,"Een telefoon is verplicht.");
						}
            else{

              if(ctype_alpha($telefoon)){
                array_push($invoerfouten,"Een telefoon mag alleen bestaan uit numeriek.");
              }
              else{

                if(is_numeric($telefoon)==false){
                  array_push($invoerfouten,"Een telefoon mag alleen bestaan uit numeriek.");
                }
              }
            }

            //Kijken of adres uit letters bestaan.
						if (empty($adres)){
							array_push($invoerfouten,"Een adres is verplicht.");
						}
            else{

              if(is_string($adres)==false){
                array_push($invoerfouten,"Een adres mag alleen bestaan uit letters.");
              }
              /*else{
                if(!ctype_alpha($adres)){
                  array_push($invoerfouten,"Een adres mag alleen bestaan uit letters.");
                }
              }*/
            }

            //Kijken of postcode geldig is.
            $masker="/^[1-9][0-9][0-9][0-9][A-Z][A-Z]$/";
            if(!preg_match($masker,$postcode)){
              array_push($invoerfouten,"Een postcode is geen geldig.");
            }

            //Kijken of woonplaats uit letters bestaan.
            if (empty($woonplaats)){
							array_push($invoerfouten,"Een woonplaats is verplicht.");
						}
            else{

              if(is_string($woonplaats)==false){
                array_push($invoerfouten,"Een woonplaats mag alleen bestaan uit letters.");
              }
              else{

                if(!ctype_alpha($woonplaats)){
                  array_push($invoerfouten,"Een woonplaats mag alleen bestaan uit letters.");
                }
              }
            }

            //Groeples
            if (empty($groeples)){
							array_push($invoerfouten,"Een groeples is verplicht.");
						}

            //Kijken of aantal lessen uit letters bestaan.
            if (empty($aantalles)){
							array_push($invoerfouten,"Een aantalles is verplicht.");
						}
            else{

                if(filter_var($aantalles,FILTER_VALIDATE_INT) == false){
                array_push($invoerfouten,"Een aantalles mag alleen numeriek.");
                }
                else{

                $min= 1;
                $max= 8;
                //$masker ="/[1-8]/";
                $masker = "/^[1-8]$/";
                if(!filter_var($aantalles,FILTER_VALIDATE_INT,array("options" => array("min_range" => $min, "max_range" => $max))) == true){
                  array_push($invoerfouten,"Een aantal lesson moet tussen 1 en 8.");
               }
               /*if(preg_match($masker , $aantal))
               {echo "goed";}
               else
               {echo "Er is een minimum van 1 en een maximum van 8 lessen";}*/

               /*if(preg_match($masker , $aantal) == false){
                array_push($invoerfouten,"Een aantal lesson moet tussen 1 en 8.");
               }
              }*/
            } 
          }
            
            // geef een start datum aan de datum variable.
            $startdatumn = (new \DateTime()) -> format('Y-m-d');
            if (empty($startdatumn)){              
							array_push($invoerfouten,"Een startdatumn is verplicht.");
						}

            
            
            
            //Kijken of prijs uit float bestaan.
            if(is_string($prijsperles)){
              array_push($invoerfouten,"Een prijsperles moet een float.");
            }
            if(is_integer($prijsperles)){            
              array_push($invoerfouten,"Een prijsperles moet een float.");
            }
            /*if(is_float($prijsperles)){
              array_push($invoerfouten,"Dat is waar.");
            }*/

						
						// als in het array invoerfouten geen regels zijn
						if (count($invoerfouten)== 0){
							//connectie met database
							$connection = mysqli_connect("localhost","root","","webshop");	
					
							// insert statement samenstellen
							$sql = "INSERT INTO `inschrijvingen`(`naam`,`adres`,`woonplaats`,`email`,`telefoonnummer`,`instructeur`,`soortgroepsles`,`startdatum`,`aantallessen`,`prijsperles`,'postcode') VALUES
              ('$naam', '$adres', '$woonplaats', '$email', '$telefoon', '$instructeur', '$groeples', '$startdatumn', '$aantalles', '$prijsperles','$postcode')";
              
              //echo $sql;
							// insert statement uitvoeren
							mysqli_query($connection, $sql);
							
							// terug naar homepagina
							header("Location:index.html");
						}
						else{
							//als er invoerfouten zijn, voor elke regel de fout tonen.
							foreach ($invoerfouten as $invoerfout){
								// voor iedere regel in het array de invoerfout tonen  tekstkleur rood.
								echo "<div style=color:red>".$invoerfout."</div>";
							}
						}
					} // einde if (isset($_POST['submit']))
			?>  <!-- einde php -->
			
			<form action="inschrijven.php" method="post">
				<div class="container">
					<label><b>Naam *</b></label>
					<input type="text" name="naam" />
					<label><b>Email *</b></label>
					<input type="text" name="email" />
					<label><b>Telefoon *</b></label>
					<input type="text" name="telefoon" />
					<label><b>Adres *</b></label>
					<input type="text" name="adres" />
          <label><b>Postcode *</b></label>
					<input type="text" name="postcode" />
					<label><b>Woonplaats *</b></label>
					<input type="text" name="woonplaats" />
          <label for="lesson"><b>Soortgroepsles *</b></label>
          <select id="lesson" name = "groeples">
            <option value="aerobic">Aerobic Fit</option>
            <option value="box">Box-Fit</option>
            <option value="bootcamp">Bootcamp</option>
            <option value="bodycombat">Body combat</option>
          </select>
          <label><b>Aantal lessen *</b></label>
					<input type="text" name="aantalles" />
          <label><b>Startdatumn *</b></label>
					<input type="date" id="start" name="startdatumn" value = "2021-04-19" min="2021-04-19" max="2022-04-19" />
                    
					<div class="clearfix">
						<button type="submit" name="inschrijven" class="submitbutton">
						Inschrijven
						</button>
					</div>
				</div> <!-- einde container -->
			</form>
       </div> <!-- einde card -->
      </div> /<!-- einde leftcolumn -->

      <div class="rightcolumn">
        <div class="card">
          <div class="news instructor"></div>
          <div class="card-content">
            <h2>Over mij</h2>
            <p>
              Hallo! Ik heet Kees en ik ben inmiddels meer dan 10 jaar
              sportinstructeur.<br /><br />
              Ik gebruik mijn ervaring graag om je beter te maken!
            </p>
          </div>
        </div>
        <div class="card">
          <div class="card-content">
            <h3>Populaire berichten</h3>
            <div class="news news1">
              <p>Waar moet je op letten als je een sportschool uitkiest?</p>
            </div>
            <div class="news news2">
              <p>10 voordelen van sporten in een sportschool</p>
            </div>
            <div class="news news3">
              <p>
                De 2 meest verwachte ‘fouten’ als de sportscholen weer open gaan
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="footer">
      <h3>
        <span class="emphasize">Nova Fit</span> - De sportschool in Haarlem |
        Tel: <span class="emphasize">06-12345678</span> | Adres:
        <span class="emphasize">Sportlaan 1, 1000AA Haarlem</span>
      </h3>
    </div>
  </body>
</html>