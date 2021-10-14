<?php
include("includes/common.inc.php");
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
     <title>SHOW COLUMNS</title>
   </head>
   <body>
     <ul>
       <?php
        if (count($_GET)>0) {
          //ta($_GET);
         $sql="
SHOW COLUMNS FROM " . $_GET['datenbankname']." . ". $_GET['tabellenname']."

         ";

      $columns = $conn->query($sql)or die("Fehler in der query:" . $conn->error);
      if ($columns->num_rows > 0) {
        // output data of each row
        while($column = $columns->fetch_assoc()) {
          //ta($column);
         echo '<li>Spalte: '. $column['Field'].'</li>
         <ul>
         <li>Typ - Länge: '.$column['Type'].'</li>
          <li>Null erlaubt : '.$column['Null'].'</li>
          <li>Schlüssel: '.$column['Key'].'</li>
          <li>Default: '.$column['Default'].'</li>
          <li>Extra: '.$column['Extra'].'</li>
         </ul>
         ';
        }
      } else {
        echo "<p>Es werde keine Tabelle ausgewählt</p>";
      }
        }

        ?>
     </ul>

   </body>
 </html>
