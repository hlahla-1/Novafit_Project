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
      <a href="ovzinstructeur.php">Instructeur</a>
	  <a href="managementinfo.php">Management Info</a>
      <a href="login.php"  style="color: #f06292">Login</a>
	  <a href="queries.php" style="float: right">Overzichten</a>
 	  <a href="contact.html" style="float: right">Contact</a>
	  <a href="registreren.php" style="float: right">Registreer</a>
    </div>

    <div class="row">
		<div class="card" style="background-color: #cfd8dc">
		
			<h1>Inloggen op onze website</h1>
			<form action="login.php" method="post">
				<div>
					<label>Inlognaam</label></br>
					<input type="text" name="inlognaam" /></br></br>
				</div>
				<div>
					<label>Wachtwoord</label></br>
					<input type="password" name="wachtwoord" /></br></br>
				</div>
				<div>
					<label>Email</label></br>
					<input type="text" name="email" /></br></br>
				</div>
				<div>
					<button type="submit" name="login" class="submitbutton">Login</button>
				</div>
				<p>
				Nog geen vaste klant ? <a href="registreren.php">Registreer hier</a>
				</p>
			
			</form>
			
			<?php	
				$inlognaam = "";
				$achternaam = "";
				$watchwoord = "";
				// $dbservername = "localhost";
				// $dbusername = "root";
				// $dbpassword = "";
				// $database   = "webshop";
			

			// Database connectie opbouwen
			$connection = new mysqli("localhost","root","","webshop");

			// Connectie controleren
			if($connection->connect_error){
				die("Connection failed: " .$connection->connect_error);
			}
			echo "Connected successfully. <br>";

			// Indien inloggen
			if (isset($_POST['login'])){

				//ophalen gegevens bij Login met real_escape_string
				$inlognaam = $connection -> real_escape_string($_POST['inlognaam']);
				$watchwoord = $connection -> real_escape_string($_POST['wachtwoord']);
			}	


			$select = "SELECT inlognaam,email from gebruikers where inlognaam='".$inlognaam."' AND wachtwoord='".$watchwoord."'";
			$result = $connection->query($select);
			//$result = mysqli_query($connection,$select);
			// $gevonden=false;
			
			if($result -> num_rows > 0)
			{
				//Tableinhoud laten zien
				while($row = $result->fetch_assoc())
				{
					echo "Welkom gebruiker: " . $row["inlognaam"]. " - email: ". $row["email"]. "<br>";;
				}
			}
			else{
				echo "Uw inlog-gegevens zijn niet juist";
			}

			/*while ($row = mysqli_fetch_array($result)){
				$achternaam 	= $row['achterncaam'];
				echo "U bent geregistreerd in de database met achternaam:".$achternaam;
				$gevonden=true;
			}
			if ($gevonden==false){
				echo "Combinatie van inlognaam en wachtwoord onbekend. Ga eventueel registreren.";
			}*/

			//Voorbereiden prepared statement i.v.m SQL injection
			$sqlLogin = $connection->prepare("SELECT inlognaam,watchwoord,email FROM gebruikers WHERE inlognaam = ? AND watchwoord = ?");
			// $sqlLogin = $connection->prepare("SELECT inlognaam,watchwoord,email FROM gebruikers WHERE inlognaam='".$inlognaam."' AND wachtwoord='".$watchwoord."'");

			//Prepare and bind van de zoekopdracht
			$sqlLogin->bind_param('ss', $inlognaam,$watchwoord);

			//interpreteren van de SQL
			$sqlLogin->execute();

			//Bind van kolommen aan variabelen
			$sqlLogin->bind_result($inlognaam,$watchwoord,$email);

			$resultaatset = $sqlLogin->get_result();

			if($sqlLogin->affected_rows === 1) //Controleren of de rij gevonden is 
			{
				while($row = $resultaatset->fetch_assoc()){
					echo "Prepared Welkom gebruiker: " .$row['inlognaam']. " - email: ". $row['email']. "<br>";
				}
			}
			else{
				echo "FOUTIEVE INLOGNAAM/PASSWORD COMBINATIE!";
			}
			$sqlLogin->close();
				
			?>
		</div> <!-- einde card -->
     </div> <!-- einde row -->
  
  </body>
</html>
