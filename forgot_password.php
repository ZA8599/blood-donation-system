<?php
require_once 'php/DBConnect.php';
$db = new DBConnect();


if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $result = $db->CheckPassword($username);
    if ($result == 0) {
        echo "Invalid username.";
    } else {
        $_SESSION['username'] = $username;
        header("Location: new_password.php");
    }
}

$title="Reset Password";
include 'layout/_header.php'; 
?>

<div class="container">
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="col-md-6">
                    <img src="assets/security-icon.png" class="img img-responsive img-thumbnail">
                </div>
                <h5> Reset Password </h5>
            </div>
            <div class="panel-body">
                <form class="form-vertical" role="form" method="post" action="forgot_password.php">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username" required>
                        <input type="submit" name="submit" value="Submit">
                    </div>
                </form>
            </div>
			</div>
        </div>
    </div>
    <div class="col-md-4">
        <img src="assets/left-index-logo.jpg" class="img img-responsive">
    </div>
</div>