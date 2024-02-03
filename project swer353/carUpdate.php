<?php
session_start();
if(isset($_SESSION['name'])){

}
else{
  header ('Location: log.php');
}


$first = $_POST['updatefirst'];
$model = $_POST['updatemodel'];
$year = $_POST['updatesyear'];
$made = $_POST['updatemade'];




$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ass2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$check_sql = "SELECT * FROM car WHERE name = '$first'";
$check_result = $conn->query($check_sql);

if ($check_result->num_rows >0) {
    
    while ($row = $check_result->fetch_assoc()) {
        // Access the data for each row
        $first1 = $row['name'];
        $model1 = $row['model'];
        $year1= $row['year'];
        $made1= $row['made'];
        
    }


    if($model==null){
        $model=$model1;

    } if($year==null){
        $year=$year1;

    } if($made==null){
        $made=$made1;
    }

    $isInt1 = (is_numeric($year) && (int) $year == $year);


    if ($isInt1==false ) {
        echo '<script>alert("year must be an integer")</script>';
        exit();
    }



    $check_sql_1 = "SELECT * FROM manufacture WHERE name = '$made'";
    $check_result_1 = $conn->query($check_sql_1);
    
    if ($check_result_1->num_rows == 0) {
    
      
    echo '<script>alert("The manufacture made is not exist")</script>';
    
    
    }
    else{
    
        echo '<script>alert("Update successfuly")</script>';
    $sql = "UPDATE car SET name='$first', model='$model', year='$year', made='$made' WHERE name='$first'";

    $result = $conn->query($sql);

    if (!$result) {
        die("Error executing query: " . $conn->error);
    } else {
        echo '<script>alert("Update successfuly")</script>';
       
    }
}

} else {echo '<script>alert("Name does not exist")</script>';
}

$conn->close();

exit();
?>
