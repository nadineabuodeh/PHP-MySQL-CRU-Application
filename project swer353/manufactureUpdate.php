<?php
session_start();
if(isset($_SESSION['name'])){

}
else{
  header ('Location: log.php');
}



$first=$_POST['updatefirst'];
$type=$_POST['updatetype'];
$city=$_POST['updatecity'];
$country=$_POST['updatecountry'];



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ass2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$check_sql = "SELECT * FROM manufacture WHERE name = '$first'";
$check_result = $conn->query($check_sql);

if ($check_result->num_rows >0) {

    
    while ($row = $check_result->fetch_assoc()) {
        // Access the data for each row
        $first1 = $row['name'];
        $type1 = $row['type'];
        $city1= $row['city'];
        $country1= $row['country'];
      
        
    }


    if($type==null){
        $type=$type1;

    } if($city==null){
        $city=$city1;

    } if($country==null){
        $country=$country1;

    } 











   
    
        echo '<script>alert("Update successfuly")</script>';
    $sql = "UPDATE manufacture SET name='$first', type='$type', city='$city', country='$country' WHERE name='$first'";
    $result = $conn->query($sql);

    if (!$result) {
        die("Error executing query: " . $conn->error);
    } else {
        echo '<script>alert("Update successfuly")</script>';
       
    }


} else {echo '<script>alert("The Name does not exist")</script>';
}

$conn->close();

exit();
?>
