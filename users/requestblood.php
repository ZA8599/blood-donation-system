<?php
$i = 0;
if (isset($_POST['searchBtn'])) {
    require_once 'php/DBConnect.php';
    $db = new DBConnect();

    $bloodType = $_POST['blood_group'];
    $chooseState = $_POST['state'];
    $donors = $db->getDonorsByBloodType($bloodType, $chooseState);
    // $donors = $db->getDonorsByState($chooseState);
}
$title = "Blood Availability";
$setAvailabilityActive = "active";
include 'layout/_header.php';

include 'layout/navbar.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <form class="form-inline" role='form' method="post" action="requestblood.php">
                <label class="form-label">Select Blood Group: </label>
                <select name="blood_group" class="form-control">
                    <option value="SELECT STATE">SELECT BLOOD TYPE</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>
                <label class="form-label">Select State: </label>
                <select name="state" class="form-control">
                    <option value="SELECT STATE">SELECT STATE</option>
                    <option value="Johor">Johor</option>
                    <option value="Kedah">Kedah</option>
                    <option value="Kelantan">Kelantan</option>
                    <option value="Kuala Lumpur">Kuala Lumpur</option>
                    <option value="Labuan">Labuan</option>
                    <option value="Melaka">Melaka</option>
                    <option value="Negeri Sembilan">Negeri Sembilan</option>
                    <option value="Pahang">Pahang</option>
                    <option value="Penang">Penang</option>
                    <option value="Perak">Perak</option>
                    <option value="Perlis">Perlis</option>
                    <option value="Putrajaya">Putrajaya</option>
                    <option value="Sabah">Sabah</option>
                    <option value="Sarawak">Sarawak</option>
                    <option value="Selangor">Selangor</option>
                    <option value="Terengganu">Terengganu</option>
                </select>
                <button type="submit" class="btn btn-success" name="searchBtn">Check Availability</button>
            </form>
            <br>
            <div class="form-group">
                <?php if (isset($donors[0])) : ?>
                    <label>Total number of donors with <?= $donors[0]['b_type']; ?> AND from <?= $donors[0]['city']; ?> </label>
                    <div class="emphasize"><?= count($donors); ?> Donors</div>
                    <table class="table table-condensed">
                        <thead>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>D.O.B</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Blood Group</th>
                            <th>Distance</th>
                        </thead>

                        <?php foreach ($donors as $d) : $i++; ?>

                            <tr class="<?php if ($i % 2 == 0) {
                                            echo 'bg-danger';
                                        } else {
                                            echo 'bg-success';
                                        } ?>">
                                <td><a href="../viewDonor.php?id=<?= $d['id']; ?>"><?= $d['fname'] . " " . $d['mname'] . " " . $d['lname']; ?></a></td>
                                <td><?= $d['sex']; ?></td>
                                <td><?= $d['bday']; ?></td>
                                <td><?= wordwrap($d['h_address'], 26, '<br>'); ?></td>
                                <td><?= $d['city']; ?></td>
                                <td><?= $d['b_type']; ?></td>
                                <td><?= $d['distance']; ?>km</td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>