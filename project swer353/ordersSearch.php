<html>

<head>
<style>
    td, tr, th {
        border: 1px solid black;
        padding: 8px; /* Adjust padding as needed */
    }

    table {
      font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 70%; /* Set table width to 100% */
        margin-top: 20px; /* Add spacing between the table and other elements */
    }

    th {
        background-color: #D00D11; /* Optional: Add background color to header cells */
    }
     tr:nth-child(odd){background-color: #f2f2f2;}

 tr:hover {background-color: #ddd;}

</style>
</head>
<?php


session_start();
if(isset($_SESSION['name'])){

}
else{
  header ('Location: log.php');
}

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

$sql = "SELECT * FROM orders where id ='". $name ."' " ;}
else{
    $sql = "SELECT * FROM orders " ;
}
$result = $conn->query($sql);

echo "<table>";

if ($result->num_rows > 0) {
  
  
  echo "<table>";
  echo "<tr><th>ID</th><th>Date</th><th>Customer</th><th>Car</th></tr>";
  
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
      echo "<td>". $row["id"]. "</td><td>   " . $row["date"]. " </td><td>  " . $row["customer"]. "  </td><td> " . $row["car"]. "</td>";
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