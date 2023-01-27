<?php
require_once 'php/DBConnect.php';
$db = new DBConnect();

$success = NULL;
$message = NULL;
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $flag = $db->NewPassword($username,$password);

    if ($flag) {
        $success = "User has been updated successfully!";
    } else {
        $message = "Error updating the employee to the database!";
    }
    header("Location: index.php");
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
                    <label for="password">Username: </label>
                    <input type="username" name="username" id="username" required>
                    <label for="password">New Password:</label>
                    <input type="password" name="password" id="password" required>
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