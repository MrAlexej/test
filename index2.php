<!DOCTYPE html>
<html lang="de">

  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="Text_Box.css">
    <script src="div_ausblenden.js"></script>
    <script src="div_einblenden.js"></script>
   <!-- <script src="rfid.js"></script>-->
   <!-- <script src="server.js"></script> -->
  </head>

  <body>
    <div class="vertikal-flex1">
    <p id="aap" style="font-size:4em;">go4cognition</p>
    </div>

    <div class="vertikal-flex2" id="container" >
    <p>Wer bist Du? <br>Bitte berühre mit dem Stab den roten Punkt</br></p>
      <script type="text/javascript">
    function show_container(){
      document.getElementById("container").style.visibility = "visible";
    }
    window.setTimeout("show_container()", 3000);
  </script>
    </div>
    
    <form action="formular-m-anzeige.php" method="get">
 
    <div class="vertikal-flex2" id="box" >
    <form action="formular-m-anzeige.php" method="get">
        <script type="text/javascript">
    function show_box(){
      document.getElementById("box").style.visibility = "visible";
    }
    window.setTimeout("show_box()", 5000);
  </script> 
 
<p style="float:left;">Name:
<input type="text" name="name" /><br />
</p>

<p>Vorname:
<input type="text" name="vorname"/><br />
</p>
<br>

<p>
<img src="Melanie.jpg">
</p>

<p>
<img src="Susanne.jpg">
</p>
</form>

  <!--  <input name="card_number" id="card_number" oninput="detectHumans();" placeholder="SCAN CARD"/> -->



<?php
// error_reporting(E_ALL);
error_reporting(0);
$db = new mysqli('localhost', 'root', 'AlexToe1988', 'Test_DB');
print_r ($db->connect_error);

if ($db->connect_errno) {
    die('Sorry - gerade gibt es ein Problem');
}
?>


<?php
require 'inc/db.php';
?>

<?php
  $db = new mysqli();
  $db = new mysqli('localhost', 'root', 'AlexToe1988', 'Test_DB');
  
  if (isset($_GET['rfid'])) {
    //Datenbankverbindung aufbauen
    $mysqli = new mysqli("localhost", "root", "AlexToe1988", "Test_DB");

    //SQL-Query zum Abfragen des rfid-tags
    //prepare bereitet ein Statement vor, das Fragezeichen wird hinterher durch einen Wert ersetzt
    if ($stmt = $mysqli -> prepare("SELECT allow FROM TAB_PHP WHERE rfid=?")) {
      $stmt -> bind_param("s", $_GET['rfid']);
      $stmt -> execute();
      $stmt -> bind_result($allow);
      if ($stmt -> fetch()) {
        echo $allow;
      } else {
        //Hier kannst du den Fall abfangen, dass kein Eintrag zu dem RFID-Tag passt
      }
    } else {
      echo $mysqli -> error;
    }
  }
?>
  </body>
</html>



