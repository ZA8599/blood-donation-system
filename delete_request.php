<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "donor";
$conn = mysqli_connect($host, $user, $password, $dbname);

$sql = "DELETE FROM requests WHERE id='" . $_GET["userid"] . "'";
if (mysqli_query($conn, $sql)) {

?>
    <script>
        alert('Record has been successfully deleted');
        window.location.replace("viewRequests.php");
    </script>

<?php
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);

?>