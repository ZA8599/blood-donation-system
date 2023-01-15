<?php
// Connect to the database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "donor";
$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the form data
$donorID = $_POST['donorID'];
$reqName = $_POST['reqName'];
$reqBlood = $_POST['reqBlood'];
$reqUnit = $_POST['reqUnit'];
$reqPhone = $_POST['reqPhone'];

// Insert the data into the database
$sql = "INSERT INTO requests (donorID,reqName,reqBlood,reqUnit,reqPhone) VALUES ('$donorID', '$reqName', '$reqBlood', '$reqUnit', '$reqPhone')";
if (mysqli_query($conn, $sql)) {
    echo "New request created successfully";
    header("Location: http://localhost/online-blood-bank-management-system-in-php-master/users/requestblood.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);
