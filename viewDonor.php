<?php
$success = NULL;
$message = NULL;
if (isset($_POST['submitReq'])) {
    $donorID = $_POST['donorID'];
    $reqName = $_POST['reqName'];
    $reqBlood = $_POST['reqBlood'];
    $reqUnit = $_POST['reqUnit'];
    $reqPhone = $_POST['reqPhone'];

    require_once 'php/DBConnect.php';
    $db = new DBConnect();
    $flag = $db->addRequests(
        $donorID,
        $reqName,
        $reqBlood,
        $reqUnit,
        $reqPhone
    );

    if ($flag) {
        $success = "Your request has been successfully submitted to the donor!";
    } else {
        $message = "There was some error saving the user to the database!";
    }
}

$id = $_GET['id']; // primary key for the donor in the database

require_once 'php/DBConnect.php';
$db = new DBConnect();
$flag = $db->checkAuth();
// Search by Id
$donor = $db->getDonorProfileById($id);

$title = "Donor Profile";
include 'layout/_header.php';

if ($flag) {
    include 'layout/_top_nav.php';
}

?>

<style>
    .button {
        background-color: #4CAF50;
        /* Green */
        border: none;
        color: white;
        padding: 16px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        transition-duration: 0.4s;
        cursor: pointer;
        width: 100%;
        position: center;
    }

    .button1 {
        background-color: white;
        color: black;
        border: 2px solid #4CAF50;
    }

    .button1:hover {
        background-color: #4CAF50;
        color: white;
    }

    /* Form styling */
    form {
        width: 600px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        background-color: crimson;
    }

    /* Label styling */
    label {
        font-weight: bold;
        margin-bottom: 10px;
        display: block;
    }

    /* Input and textarea styling */
    input,
    textarea {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    /* Submit button styling */
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        cursor: pointer;
    }
</style>

<script>
    function showForm() {
        document.getElementById("form").style.display = "block";
    }
</script>

<div class="container">

    <?php if (isset($success)) : ?>
        <div class="alert-success fade-out-5"><?= $success; ?></div>
    <?php endif; ?>
    <?php if (isset($message)) : ?>
        <div class="alert-danger fade-out-5"><?= $message; ?></div>
    <?php endif; ?>

    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-md-5">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h5>Basic Info</h5>
                </div>
                <div class="panel-body">
                    <table class="table table-condensed">
                        <tr>
                            <td><label>Name</label></td>
                            <td><?= $donor[0]['fname'] . " " . $donor[0]['mname'] . " " . $donor[0]['lname']; ?></td>
                        </tr>
                        <tr>
                            <td><label>Gender</label></td>
                            <td><?= $donor[0]['sex']; ?></td>
                        </tr>
                        <tr>
                            <td><label>D.O.B</label></td>
                            <td><?= $donor[0]['bday']; ?></td>
                        </tr>
                        <tr>
                            <td><label> Gender </label></td>
                            <td><?= $donor[0]['sex']; ?></td>
                        </tr>
                        <tr>
                            <td><label> Address </label></td>
                            <td><?= wordwrap($donor[0]['h_address'], 26, '<br>'); ?></td>
                        </tr>
                        <tr>
                            <td><label> City </label></td>
                            <td><?= $donor[0]['city']; ?></td>
                        </tr>
                        <tr>
                            <td><label> Distance </label></td>
                            <td><?= $donor[0]['distance']; ?>&nbsp;km</td>
                        </tr>
                        <tr>
                            <td><label> Donation Date </label></td>
                            <td><?= $donor[0]['don_date']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h5>Medical Info</h5>
                </div>
                <div class="panel-body">
                    <table class="table table-condensed">
                        <tr>
                            <td><label>Blood Type</label></td>
                            <td><?= $donor[0]['b_type']; ?></td>
                        </tr>
                        <tr>
                            <td><label>Statistics</label></td>
                            <td><?= $donor[0]['stats']; ?></td>
                        </tr>
                        <tr>
                            <td><label>Temperature</label></td>
                            <td><?= $donor[0]['temp']; ?></td>
                        </tr>
                        <tr>
                            <td><label> Pulse </label></td>
                            <td><?= $donor[0]['pulse']; ?></td>
                        </tr>
                        <tr>
                            <td><label> Blood Pressure </label></td>
                            <td><?= $donor[0]['bp']; ?></td>
                        </tr>
                        <tr>
                            <td><label> Weight </label></td>
                            <td><?= $donor[0]['weight']; ?></td>
                        </tr>
                        <tr>
                            <td><label> Hemoglobin </label></td>
                            <td><?= $donor[0]['hemoglobin']; ?></td>
                        </tr>
                        <tr>
                            <td><label> HBsAG </label></td>
                            <td><?= $donor[0]['hbsag']; ?></td>
                        </tr>
                        <tr>
                            <td><label> Aids </label></td>
                            <td><?= $donor[0]['aids']; ?></td>
                        </tr>
                        <tr>
                            <td><label> Malaria Smear </label></td>
                            <td><?= $donor[0]['malaria_smear']; ?></td>
                        </tr>
                        <tr>
                            <td><label> Hematocrit </label></td>
                            <td><?= $donor[0]['hematocrit']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-1">
        </div>
    </div>

    <button class="button button1 center" onclick="showForm()">REQUEST FOR BLOOD</button>

    <form id="form" style="display: none;" action="submit-request.php" method="post">
        <input type="hidden" name="donorID" value="<?= $donor[0]['id']; ?>">
        <label for="reqName">Requester Name:</label>
        <input type="text" id="reqName" name="reqName" placeholder="Enter your name"><br>

        <label for="reqBlood">Chosen Blood Group:</label>
        <input type="text" id="reqBlood" name="reqBlood" value="<?= $donor[0]['b_type']; ?>" readonly><br>

        <label for="reqUnit">Blood Units Required</label>
        <input type="number" name="reqUnit" min="1" placeholder="Enter Blood Units">

        <label for="reqPhone">Phone number:</label>
        <input type="tel" id="reqPhone" name="reqPhone" placeholder="Enter your phone number"><br>

        <button class="btn btn-success" type="submit" name="submitReq">Submit</button>
    </form>
</div>