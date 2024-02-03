

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
$madeList = array();
    $sql1 = "SELECT name FROM manufacture";
    $result1 = $conn->query($sql1);
    while($row1 = $result1->fetch_assoc()) {
        $madeList[] = $row1["name"];
    }

    ?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="steel.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>car</title>
</head>

<body>
    <div id="head">
<a  href="mainpage.php" id="back">Back</a>
<br>
    <h1>Welcome to Car table</h1></div>

    <div class="container">
        <div class="search">
            <h4>Search</h4>
            <label>Car Name</label>
            <input type="text" id="carName">
            <br>
            <button id="searchButton">Search</button>
            <br><br>
        </div>
        <div class="insert">
            <form id="insertForm">
                <h4>Insert</h4>
                <label>Name</label>
                <input type="text" name="first" >
                <br>
                <label>Model</label>
                <input type="text" name="model" >
                <br>
                <label>year</label>
                <input type="number" name="year" >
                <br>
                <label>made</label>
                <select id="insertmade" name="made">
                <option value="" disabled selected></option>
        <?php foreach($madeList as $made): ?>
            <option value="<?php echo $made; ?>"><?php echo $made; ?></option>
        <?php endforeach; ?>
        </select>
                <br>
                
                <button type="submit" id="insertButton">Insert</button>
            </form>
        </div>
        <div class="update">
            <form id="updateForm">
            <h4>Update</h4>
            <label>Name</label>
            <input type="text"  name="updatefirst">
            <br>
            <label>Model</label>
            <input type="text" name="updatemodel">
            <br>
            <label>Year</label>
            <input type="number" name="updatesyear">
            <br>
            <label>Made</label>
            <select id="insertmade" name="updatemade">
                <option value="" disabled selected></option>
        <?php foreach($madeList as $made): ?>
            <option value="<?php echo $made; ?>"><?php echo $made; ?></option>
        <?php endforeach; ?>
        </select>
            <br>
            
            <button type="submit" id="updateButton">Update</button>
        </form>
        </div>
        <div id="searchDiv"></div>
    
    </div>

    <script>
        $(document).ready(function () {
            $.post("car.php", function (data, status) {
                $("#searchDiv").html(data);
            });



            $("#searchButton").click(function () {
                $.post("carSearch.php", {
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
                $.post("carInsert.php", formData, function (data, status) {
                    $("#searchDiv").html(data);
                });
            });

          

            $("#updateButton").click(function (event) {
            var formData = $("#updateForm").serialize();

            // Check if the ID is provided
            if ($("#updateForm input[name='updatefirst']").val().trim() === "") {
                alert("Please fill in the name");
                return;
            }

            $.post("carUpdate.php", formData, function (data, status) {
                $("#searchDiv").html(data);
            });
        });
          

    

        });
    </script>
</body>

</html>