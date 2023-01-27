<?php

$title="Members Area";$setMemberActive="active";$bg_background="bg-warning";
include 'layout/_header.php';
include 'layout/_top_nav.php';

$dbhost = 'localhost';
$dbname = 'donor';
$username = 'root';
$password ="";

$conn = mysqli_connect($dbhost, $username, $password, $dbname);
$id=$_REQUEST['id'];
$query = "SELECT * FROM donors where id='".$id."'";
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>

<DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title> View Donor Detail</title>
    </head>

    <body>
    <div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            
        <?php 
            if (isset($_GET['submitBtn'])) {
                $fname = $_GET['fName'];
                $mname = $_GET['mName'];
                $lname = $_GET['Name'];
                $sex = $_GET['sex'];
                $bType = $_GET['b_type'];
                $dob = $_GET['dob'];
                $address = $_GET['address'];
                $city = $_GET['city'];
                $mobile = $_GET['mobile'];
                $phone = $_GET['phone'];
                //Medical Information
                $donationDate = $_GET['don_date'];
                $stats = $_GET['stats'];
                $temp = $_GET['temp'];
                $pulse = $_GET['pulse'];
                $bp = $_GET['bp'];
                $weight = $_GET['weight'];
                $hemoglobin = $_GET['hemoglobin'];
                $hbsag = $_GET['hbsag'];
                $aids = $_GET['aids'];
                $malariaSmear = $_GET['malariaSmear'];
                $hematocrit = $_GET['hematocrit'];

                $query =mysqli_query("UPDATE donors SET fname = '$fname', mname='$mname', lname='$lname', sex='$sex',
                b_type='$b_type', dob='$dob', address='$address', city='$city', mobile='$mobile', phone='$phone', 
                don_date='$don_date', stats='$stats', temp='$temp', pulse='$pulse', bp='$bp', weight='$weight', 
                hemoglobin='$hemoglobin', hbsag='$hbsag', malariaSmear='$malariaSmear', hematocrit='$hematocrit' 
                WHERE id='$id' ", $conn);
            }
        ?>
            
            <div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            
            <?php if(isset($success)): ?>
            <div class="alert-success fade-out-5"><?= $success; ?></div>
            <?php endif; ?>
            <?php if(isset($message)): ?>
            <div class="alert-danger fade-out-5"><?= $message; ?></div>
            <?php endif; ?>
            
            <form method="post" class="form-horizontal" role="form" action="donor.php">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5>Donor Basic Info</h5>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-3">Name</label>
                            <div class="col-sm-3">
                                <input type="text" name="firstName" class="form-control" required="true" value="<?php echo $row["fname"]; ?>">
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="middleName"  class="form-control" value="<?php echo $row["mname"]; ?>">
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="lastName" class="form-control" required="true" value="<?php echo $row["lname"]; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Gender</label>
                            <div class="col-sm-4 radio-inline"  value="<?php echo $row["sex"]; ?>">
                                <input type="radio" value="male" name="sex" checked="true">Male                         
                            </div>
                            <input type="radio" value="female" name="sex">Female                          

                        </div>
                        <div class="form-group" >
                            <label class="col-sm-4">Blood Type:</label>
                            <div class="col-sm-8">
                                <select name="b_type" class="form-control" value="<?php echo $row["b_type"]; ?>">
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">D.O.B</label>
                            <div class="col-sm-8">
                                <input type="date" name="dob" class="form-control" required="true" value="<?php echo $row["dob"]; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Address</label>
                            <div class="col-sm-8">
                                <textarea rows="8" name="address" class="form-control" required="true"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">City</label>
                            <div class="col-sm-8">
                                <input type="text" name="city" class="form-control" required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Mobile</label>
                            <div class="col-sm-8">
                                <input type="number" min="0" max="10000000000" name="mobile" class="form-control" required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Phone</label>
                            <div class="col-sm-8">
                                <input type="number" min="0" max="10000000000" name="phone" class="form-control">
                            </div>
                        </div>           
                    </div>
                    <div class="panel-heading">
                        <h5>Donor Medical Info</h5>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-4">Date of Donation</label>
                            <div class="col-sm-8">
                                <input type="date" name="don_date" value="" required="true" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Statistics</label>
                            <div class="col-sm-8">
                                <input type="text" name="stats" value="" required="true" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Temperature</label>
                            <div class="col-sm-8">
                                <input type="decimar" name="temp" value="" required="true" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Pulse</label>
                            <div class="col-sm-8">
                                <input type="number" min="0" max="300" name="pulse" value="" class="form-control" required="true"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Blood Pressure</label>
                            <div class="col-sm-8">
                                <input type="text" name="bp" value="" class="form-control" required="true"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Weight</label>
                            <div class="col-sm-8">
                                <input type="decimal" name="weight" value="" required="true" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Hemoglobin</label>
                            <div class="col-sm-8">
                                <input type="text" name="hemoglobin" value="" required="true" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">HBsAg </label>
                            <div class="col-sm-8">
                                <input type="text" name="hbsag" value="" required="true" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Aids </label>
                            <div class="col-sm-8">
                                <input type="text" name="aids" value="" required="true" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Malaria Smear </label>
                            <div class="col-sm-8">
                                <input type="text" name="malariaSmear" value="" required="true" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Hematocrit </label>
                            <div class="col-sm-8">
                                <input type="text" name="hematocrit" value="" required="true" class="form-control"/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-4"> </label>
                            <div class="col-sm-8">
                                <button class="btn btn-success" type="submit" name="submitBtn" >Add Donor</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
