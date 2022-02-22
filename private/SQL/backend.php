<?php
//ini_set('display_errors' , 1);
//error_reporting(E_ALL);
include __DIR__ . '/private/dbconnection.inc.php';
$zeit = $_GET['zeit'];
$platz = $_GET['platz'];

$con =  mysqli_connect($servername,$username,$password,$db);
$command=$_GET['command'];
if ( $command == 'newentry' ) {
  mysqli_query($con,'update platzbelegung set platz$platz = 'belegt' where id='$zeit'');
}

if ( $command == 'refresh' ) {
  $result = mysqli_query($con, 'select * from platzbelegung');
  echo ' <table class='table'>
    <tr>
    <th>Zeitraum</th>
    <th>Platz 1</th>
    <th>Platz 2</th>
    <th>Platz 3</th>
    <th>Platz 4</th>
    <th>Platz 5</th>
    <th>Platz 6</th>
    <th>Platz 7</th>
    <th>Platz 8</th>
    <th>Platz 9</th>
    </tr>';
  while ($row = mysqli_fetch_assoc($result)) {
    echo'<tr>
      <td class='zeiten'>{$row['zeit']}</td>
      <td>{$row['platz1']}</td>
      <td>{$row['platz2']}</td>
      <td>{$row['platz3']}</td>
      <td>{$row['platz4']}</td>
      <td>{$row['platz5']}</td>
      <td>{$row['platz6']}</td>
      <td>{$row['platz7']}</td>
      <td>{$row['platz8']}</td>
      <td>{$row['platz9']}</td>
      </tr>\n';
  }
  echo '</table>';
}
?>
