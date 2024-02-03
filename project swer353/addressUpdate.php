<?php

session_start();
if(isset($_SESSION['name'])){

}
else{
  header ('Location: log.php');
}




$first = $_POST['updatefirst'];
$building = $_POST['updatebuilding'];
$street = $_POST['updatestreet'];
$city = $_POST['updatecity'];
$country = $_POST['updatecountry'];

$isInt1 = is_numeric($first) ;

if ($isInt1==false 
 ) {
    echo '<script>alert("ID must be an integer")</script>';
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ass2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$check_sql = "SELECT * FROM address WHERE id = '$first'";

$check_result = $conn->query($check_sql);

if ($check_result->num_rows >0) {
    while ($row = $check_result->fetch_assoc()) {
        // Access the data for each row
        $id = $row['id'];
        $building1 = $row['buidling'];
        $street1 = $row['street'];
        $city1 = $row['city'];
        $country1 = $row['country'];
        
    }
    if($building==null){
        $building=$building1;

    } if($street==null){
        $street=$street1;

    } if($city==null){
        $city=$city1;

    } if($country==null){
        $country=$country1;

    }
    $isInt2 =  (int) $building == $building;

if ($isInt2==false ) {
    echo '<script>alert("Building  must be an integer")</script>';
    exit();
}
    
   
    $sql = "UPDATE address SET id='$first', buidling='$building', street='$street', city='$city', country='$country' WHERE id='$first'";

    $result = $conn->query($sql);

    if (!$result) {
        die("Error executing query: " . $conn->error);
    } else {
        echo '<script>alert("Update successfuly")</script>';
       
    }
    
} else {echo '<script>alert("ID does not exist")</script>';
}

$conn->close();

exit();
?>
