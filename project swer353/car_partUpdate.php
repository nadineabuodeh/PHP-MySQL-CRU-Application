<?php



session_start();
if(isset($_SESSION['name'])){

}
else{
  header ('Location: log.php');
}


$first = $_POST['updatefirst'];
$part = $_POST['updatepart'];



$isInt1 = (is_numeric($part) && (int)$part == $part);

if ($isInt1 == false ) {
    echo '<script>alert("Part must be integer")</script>';
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

$check_sql = "SELECT * FROM car_part WHERE car = '$first'";
$check_result = $conn->query($check_sql);

if ($check_result->num_rows > 0) {
    $check_sql_1 = "SELECT * FROM device WHERE no = '$part'";
    $check_result_1 = $conn->query($check_sql_1);

     if ($check_result_1->num_rows == 0 ) {
        echo '<script>alert("The Part does not exist")</script>';
    }  else {
        // The else should be here
        echo '<script>alert("Update successfully")</script>';
        $sql = "UPDATE car_part SET car='$first', part='$part'WHERE car='$first'";

        $result = $conn->query($sql);

        if (!$result) {
            die("Error executing query: " . $conn->error);
        } else {
            echo '<script>alert("Update successfully")</script>';
        }
    }
}
 else {
    echo '<script>alert("The car does not exist")</script>';
}

$conn->close();

exit();
?>
