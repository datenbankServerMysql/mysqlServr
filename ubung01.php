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
 <html lang="de">
   <head>
     <meta charset="utf-8">
     <title>SHOW DAtABASE</title>
   </head>
   <body>
      <ul>
     <form class="" action="ubung02.php" method="get">
       <?php
       $sql="
      			SHOW DATABASES
       ";
       $dbs = $conn->query($sql)or die("Fehler in der Query:" . $conn->error);
       if ($dbs->num_rows > 0) {
         // output data of each row
         while($db = $dbs->fetch_assoc()) {
           ta($db);
	echo('<li><input type="submit" name="datenbankname" value="' . $db['Database'] . '"></li><br>');         }
        }
       else {
         echo "keine datenbankname gefunden";
       }

        ?>

     </form>


     </ul>

   </body>
 </html>
