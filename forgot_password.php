<?php
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
                <form class="form-vertical" role="form" method="post" action="check_user.php">
                    <div class="form-group">
                        <form method="post" action="send_link.php">
                        <p>Enter Username to Reset Password</p>
                        <input type="text" name="username">
                        <input type="submit" name="submit_user">
                        </form>
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