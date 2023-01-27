<?php
require_once 'php/DBConnect.php';
$db = new DBConnect();
$db->auth();

$requests = $db->getRequests();

$title = "Blood Requests";
$setRequestActive = "active";
include 'layout/_header.php';
include 'layout/_top_nav.php';


?>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #dddddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #dddddd;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5>Blood Requests Info</h5>
                </div>

                <?php if (isset($requests)) : ?>
                    <table class="table table-condensed table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="">Date</th>
                                <th class="">Requester Name</th>
                                <th class="">Tel No</th>
                                <th class="">Blood Type</th>
                                <th class="">Information</th>
                                <th class="">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($requests as $req) : ?>
                                <tr>
                                    <td>
                                        <?= $req['date_created']; ?>
                                    </td>
                                    <td class="">
                                        <p> <b><?= $req['reqName']; ?></b></p>
                                    </td>
                                    <td class="">
                                        <p> <b><?= $req['reqPhone']; ?></b></p>
                                    </td>
                                    <td class="">
                                        <p> <b><?= $req['reqBlood']; ?></b></p>
                                    </td>
                                    <td class="">
                                        <p>Blood Needed: <b><?= $req['reqUnit']; ?> unit</b></p>
                                    </td>
                                    <td class=" text-center">
                                        <?php if ($req['reqStatus'] == 0) : ?>
                                            <span class="badge badge-primary">Pending</span>
                                        <?php else : ?>
                                            <span class="badge badge-success">Approved</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="update_request.php?id=<?= $req['id']; ?>" class="btn btn-warning">Edit</a>

                                        <a href="delete_request.php?userid=<?= $req['id']; ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>