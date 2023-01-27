<?php
if (isset($_GET['id'])) {
    $id = $_GET['id']; // get the employee id
}

require_once 'php/DBConnect.php';
$db = new DBConnect();
$db->auth();

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $reqStatus = $_POST['reqStatus'];

    $flag = $db->updateRequest($id, $reqStatus);

    if ($flag) {
        $success = "Request has been updated successfully!";
    } else {
        $message = "Error updating the request to the database!";
    }
}

$requester = $db->getRequestById($id);

$title = "Blood Request";
$setRequestActive = "active";
include 'layout/_header.php';
include 'layout/_top_nav.php';

?>

<div class="modal fade" id="update_modal<?php $_GET['id'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="update_request.php">
                <div class="modal-header">
                    <h3 class="modal-title">Update Status</h3>
                </div>
                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group text-left">
                            <label>Requester Name</label>
                            <input type="hidden" name="id" value="$current_id" />
                            <input type="text" name="reqName" value="<?= $requester[0]['reqName']; ?>" class="form-control" readonly />
                        </div>
                        <div class="form-group text-left">
                            <label>Blood Type</label>
                            <input type="text" name="reqBlood" value="<?= $requester[0]['reqBlood']; ?>" class="form-control" readonly />
                        </div>
                        <div class="form-group text-left">
                            <label>Status</label>

                            <?php if ($requester[0]['reqStatus'] == 0) : ?>
                                <select name="reqStatus" id="" class="form-control" required>
                                    <option value="0" selected>Pending</option>
                                    <option value="1">Approved</option>
                                </select>
                            <?php else : ?>
                                <input type="text" name="reqStatus" value="Approved" class="form-control" readonly />
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <?php if ($requester[0]['reqStatus'] == 1) : ?>
                    <?php else : ?>
                        <button type="submit" name="update" class="btn btn-warning">Update</button>
                    <?php endif; ?>
                    <button class="btn btn-danger" type="submit" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <?php if (isset($success)) : ?>
                <div class="alert-success"><?= $success; ?></div>
            <?php endif ?>
            <?php if (isset($message)) : ?>
                <div class="alert-success"><?= $message; ?></div>
            <?php endif ?>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Request Info</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="post" action="update_request.php">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <div class="form-group">
                            <label class="col-md-3">Name:</label>
                            <div class="col-sm-9">
                                <input type="text" name="reqName" value="<?= $requester[0]['reqName']; ?>" class="form-control" readonly />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Blood Type:</label>
                            <div class="col-sm-9">
                                <input type="text" name="reqBlood" value="<?= $requester[0]['reqBlood']; ?>" class="form-control" readonly />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Status:</label>
                            <div class="col-sm-9">
                                <?php if ($requester[0]['reqStatus'] == 0) : ?>
                                    <input type="text" name="reqStatus" value="Pending" class="form-control" />
                                <?php else : ?>
                                    <input type="text" name="reqStatus" value="Approved" class="form-control" />
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3"></label>
                            <button type="submit" name="update" class="btn btn-primary" name="submit">Update</button>
                            <a href="viewRequests.php" class="btn btn-danger">Back</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>