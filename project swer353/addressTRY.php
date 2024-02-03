

<?php

session_start();
if(isset($_SESSION['name'])){

}
else{
  header ('Location: log.php');
}

?>



<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="steel.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>



    <title>address</title>

</head>

<body>
    
<a  href="mainpage.php" id="back">Back</a>
<br>
    <h1>Welcome to Address table</h1>

    <div class="container">
        <div class="search">
            <h4>Search</h4>
            <label>Address ID</label>
            <input type="text" id="carName">
            <br>
            <button id="searchButton">Search</button>
            <br><br>
        </div>
        <div class="insert">
            <form id="insertForm">
                <h4>Insert</h4>
                <label>ID</label>
                <input type="text" name="first" >
                <br>
                <label>building</label>
                <input type="text" name="building" >
                <br>
                <label>street</label>
                <input type="text" name="street" >
                <br>
                <label>city</label>
                <input type="text" name="city" >
                <br>
                <label>country</label>
                <input type="text" name="country" >
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
            <label>building</label>
            <input type="number" name="updatebuilding">
            <br>
            <label>street</label>
            <input type="text" name="updatestreet">
            <br>
            <label>city</label>
            <input type="text" name="updatecity">
            <br>
            <label>country</label>
            <input type="text" name="updatecountry">
            <br>
            <button type="submit" id="updateButton">Update</button>
        </form>
        </div>
        <div id="searchDiv"></div>
    
    </div>

    <script>
        $(document).ready(function () {
            $.post("address.php", function (data, status) {
                $("#searchDiv").html(data);
            });



            $("#searchButton").click(function () {
                $.post("addressSearch.php", {
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
                $.post("addressInsert.php", formData, function (data, status) {
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

            $.post("addressUpdate.php", formData, function (data, status) {
                $("#searchDiv").html(data);
            });
        });
          


        });
    </script>
</body>

</html>
