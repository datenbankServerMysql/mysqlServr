<?php

require("includes/common.inc.php");
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("UTF8");

 ?>
 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <title>SHOW TABLES</title>
   </head>
   <body>
     <ul>
   	<form method="get" action="ubung03.php">
   		 <input type="hidden" name="datenbankname" value="<?php echo($_GET["datenbankname"]); ?>"> 
   		<?php
   		if(count($_GET)>0) {
   			ta($_GET);
   			$sql = "
   				SHOW TABLES FROM " . $_GET["datenbankname"] . "
   			";
   			$tables = $conn->query($sql) or die("Fehler in der Query: " . $conn->error);
   			while($table = $tables->fetch_object()) {
   				ta($table);
   			$tab = "Tables_in_" . $_GET["datenbankname"];
   				echo('<li><input type="submit" name="tabellenname" value="' . $table->$tab . '"></li><br>');
   			}
   		}
   		else {
   		 	echo('<p class="error">Es wurde keine Datenbank ausgewählt.</p>');
   		 }
   		?>
   	</form>
     </ul>
   </body>
   </html>
