

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
$nameList = array();
$sql = "SELECT id FROM customer";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    $nameList[] = $row["id"];
}

$addressList = array();
$sql1 = "SELECT id FROM address";
$result1 = $conn->query($sql1);
while($row1 = $result1->fetch_assoc()) {
    $addressList[] = $row1["id"];
}
?>



<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="steel.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <title>Customer</title>
</head>

<body>
    <div id="head">
<a  href="mainpage.php" id="back">Back</a>
<br>
    <h1>Welcome to Customer table</h1></div>

    <div class="container">
        <div class="search">
            <h4>Search</h4>
            <label>Customer ID</label>
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
                <label>F_Name</label>
                <input type="text" name="f_name" >
                <br>
                <label>L_Name</label>
                <input type="text" name="l_name" >
                <br>
                <label>Address</label>
                <select id="insertaddress" name="address">
        <option value="" disabled selected></option>
        <?php foreach($addressList as $address): ?>
            <option value="<?php echo $address; ?>"><?php echo $address; ?></option>
        <?php endforeach; ?>
        </select>
                <br>
                <label>Job</label>
                <input type="text" name="job" >
                <br>
                
                <button type="submit" id="insertButton">Insert</button>
            </form>
        </div>
        <div class="update">
            <form id="updateForm">
            <h4>Update</h4>
            <label>ID</label>
            <input type="number"  name="updatefirst">
            <br>
            <label>F_Name</label>
            <input type="text" name="updatef_name">
            <br>
            <label>L_Name</label>
            <input type="text" name="updatel_name">
            <br>
            <label>Address</label>
            <input type="number" name="updateaddress">
            <br>
            <label>Job</label>
            <input type="text" name="updatejob">
            <br>
            
            <button type="submit" id="updateButton">Update</button>
        </form>
        </div>
        <div id="searchDiv"></div>
    
    </div>

    <script>
        $(document).ready(function () {
            $.post("customer.php", function (data, status) {
                $("#searchDiv").html(data);
            });



            $("#searchButton").click(function () {
                $.post("customerSearch.php", {
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
                $.post("customerInsert.php", formData, function (data, status) {
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

            $.post("customerUpdate.php", formData, function (data, status) {
                $("#searchDiv").html(data);
            });
        });

    

        });
    </script>
</body>

</html>
