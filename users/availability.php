<?php
$i=0;
if(isset($_POST['searchBtn'])){
    require_once 'php/DBConnect.php';
    $db = new DBConnect();
    
    $bloodType = $_POST['blood_group'];
    $donors = $db->getDonorsByBloodType($bloodType);
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
            <form class="form-inline" role='form' method="post" action="availability.php">
                <label class="form-label">Select Blood Group: </label>
                <select name="blood_group" class="form-control">
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>
                <button type="submit" class="btn btn-success" name="searchBtn">Check Availability</button>
            </form>
            <br>
            <div class="form-group">
                <?php if(isset($donors[0])): ?>
                <label>Total number of donors with <?= $donors[0]['b_type']; ?> </label><div class="emphasize"><?= count($donors); ?> Donors</div>
                <table class="table table-condensed">
                    <thead> // DELETE ROW FOR DOB, ADDRESS
                    <th>Name</th>
                    <th>Gender</th>
                    <th>City</th>
                    <th>Blood Group</th>
                    </thead>
                    
                    <?php foreach($donors as $d): $i++;?>
                    
                    <tr class="<?php if($i%2==0){echo 'bg-danger';} else{echo 'bg-success';} ?>">
                        <td><?= $d['fname'] ." ".$d['mname']." ".$d['lname']; ?></td> // DELETE DIRECT LINK TO USERS PROFILE
                        <td><?= $d['sex']; ?></td>
                        <td><?= $d['city']; ?></td>
                        <td><?= $d['b_type']; ?></td>
                    </tr>
                    <?php endforeach;?>
                </table>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
<center>
<a href="index.php"><button>HOME</button></a> <!-- ADD HOME BUTTON-->
</center>
<?php include 'layout/_footer.php'; ?>
