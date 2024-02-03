<html>

<head>
<style>
    td,tr{
     border: 1px solid black;

    }
    table {
  border-collapse: collapse;
}

</style>
</head>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ass2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$name=$_POST['carName'];



if($name!=null){

$sql = "SELECT * FROM car where name ='". $name ."' " ;}
else{
    $sql = "SELECT * FROM car " ;
}
$result = $conn->query($sql);

echo "<table>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
      echo "<td>". $row["name"]. "</td><td>   " . $row["model"]. " </td><td>  " . $row["year"]. "  </td><td> " . $row["made"]. "</td>";
      echo "</tr>";
    }
    echo "</table>";
  } else {
    echo "0 results";
  }
  $conn->close();

?>
<br>

</html>