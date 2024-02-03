<?php
session_start();
if(isset($_SESSION['name'])){

}
else{
  header ('Location: log.php');
}


$first = $_POST['updatefirst'];
$date = $_POST['updatedate'];
$customer = $_POST['updatecustomer'];
$car = $_POST['updatecar'];

$isInt1 = (is_numeric($first) && (int)$first == $first);

if ($isInt1 == false ) {
    echo '<script>alert("ID must be integer")</script>';
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

$check_sql = "SELECT * FROM orders WHERE id = '$first'";
$check_result = $conn->query($check_sql);

if ($check_result->num_rows > 0) {


    
    while ($row = $check_result->fetch_assoc()) {
        // Access the data for each row
        $first1 = $row['id'];
        $date1 = $row['date'];
        $customer1= $row['customer'];
        $car1= $row['car'];
    
        
    }


    if($date==null){
        $date=$date1;

    } if($customer==null){
        $customer=$customer1;

    } if($car==null){
        $car=$car1;

    }







    $isInt2 = (is_numeric($date) && (int)$date == $date);
    $isInt3 = (is_numeric($customer) && (int)$customer == $customer);
    
    if ( $isInt2 == false || $isInt3 == false) {
        echo '<script>alert(" date and Customer must be integers")</script>';
        exit();
    }
    








    $check_sql_1 = "SELECT * FROM customer WHERE id = '$customer'";
    $check_result_1 = $conn->query($check_sql_1);

    $check_sql_2 = "SELECT * FROM car WHERE name = '$car'";
    $check_result_2 = $conn->query($check_sql_2);

    if ($check_result_1->num_rows == 0 && $check_result_2->num_rows == 0) {
        echo '<script>alert("The Customer and the Car do not exist")</script>';
    } else if ($check_result_1->num_rows == 0) {
        echo '<script>alert("The Customer does not exist")</script>';
    } else if ($check_result_2->num_rows == 0) {
        echo '<script>alert("The Car does not exist")</script>';
    } else {
        // The else should be here
        echo '<script>alert("Update successfully")</script>';
        $sql = "UPDATE orders SET id='$first', date='$date', customer='$customer', car='$car' WHERE id='$first'";

        $result = $conn->query($sql);

        if (!$result) {
            die("Error executing query: " . $conn->error);
        } else {
            echo '<script>alert("Update successfully")</script>';
        }
    }
} else {
    echo '<script>alert("The ID does not exist")</script>';
}

$conn->close();

exit();
?>
