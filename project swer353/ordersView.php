

<?php

session_start();
if(isset($_SESSION['name'])){

}
else{
  header ('Location: log.php');
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ass2";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch IDs for ComboBox
$idList = array();
$sql = "SELECT id FROM orders";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    $idList[] = $row["id"];
}
$carList = array();
$sql22 = "SELECT name FROM car";
$result22 = $conn->query($sql22);
while($row22 = $result22->fetch_assoc()) {
    $carList[] = $row22["name"];
}

$noList = array();
$sql1 = "SELECT id FROM customer";
$result1 = $conn->query($sql1);
while($row1 = $result1->fetch_assoc()) {
    $noList[] = $row1["id"];
}
?>



<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="steel.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>



    <title>Customer</title>
<body>
    <div id="head">
<a  href="mainpage.php" id="back">Back</a>
<br>
    <h1>Welcome to Orders table</h1></div>

    <div class="container">
        <div class="search">
            <h4>Search</h4>
            <label>Order ID</label>
            <input type="text" id="carName">
            <br>
            <button id="searchButton">Search</button>
            <br><br>
        </div>
        <div class="insert">
            <form id="insertForm">
                <h4>Insert</h4>
                <label>ID</label>
                <input type="number" name="first" >
                <br>
                <label>Date</label>
                <input type="number" name="date" >
                <br>
                <label>Customer</label>
                <select id="insertcustomer" name="customer">
        <option value="" disabled selected></option>
            <?php foreach($noList as $id): ?>
                <option value="<?php echo $id; ?>"><?php echo $id; ?></option>
            <?php endforeach; ?>
        </select>
                <br>
                <label>Car</label>
                <select id="insertcar" name="car">
        <option value="" disabled selected></option>
            <?php foreach($carList as $id): ?>
                <option value="<?php echo $id; ?>"><?php echo $id; ?></option>
            <?php endforeach; ?>
        </select>
                <br>
                
                <button type="submit" id="insertButton">Insert</button>
            </form>
        </div>
        <div class="update">
            <form id="updateForm">
            <h4>Update</h4>
             <label>ID</label>
                <input type="number" name="updatefirst" >
                <br>
                <label>Date</label>
                <input type="number" name="updatedate" >
                <br>
                <label>Customer</label>
                <input type="number" name="updatecustomer" >
                <br>
                <label>Car</label>
                <input type="text" name="updatecar" >
                <br>
            <button type="submit" id="updateButton">Update</button>
        </form>
        </div>
        <div id="searchDiv"></div>
    
    </div>

    <script>
        $(document).ready(function () {
            $.post("orders.php", function (data, status) {
                $("#searchDiv").html(data);
            });



            $("#searchButton").click(function () {
                $.post("ordersSearch.php", {
                        carName: $("#carName").val()
                    },
                    function (data, status) {
                        $("#searchDiv").html(data);
                    });
            });

            $("#insertButton").click(function (event) {
       
        var formData = $("#insertForm").serialize();

        // Check if any of the form fields are empty
        if ($("#insertForm input").filter(function () {
            return $(this).val().trim() === "";
        }).length > 0) {
            alert("Please fill in all the information");
            return;
        }
                $.post("ordersInsert.php", formData, function (data, status) {
                    $("#searchDiv").html(data);
                });
            });

          

            $("#updateButton").click(function (event) {
            var formData = $("#updateForm").serialize();

            // Check if the ID is provided
            if ($("#updateForm input[name='updatefirst']").val().trim() === "") {
                alert("Please fill in the ID");
                return;
            }

            $.post("ordersUpdate.php", formData, function (data, status) {
                $("#searchDiv").html(data);
            });
        });
    

        });
    </script>
</body>

</html>
