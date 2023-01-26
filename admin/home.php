<?php
require_once 'php/DBConnect.php';
$db = new DBConnect();
$db->auth();

$success = NULL;
$message = NULL;
if (isset($_POST['submit'])) {
    /* removed first and last name, replaced with fullname */
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $designation = $_POST['designation'];
    $landline = $_POST['landline'];
    $mobile = $_POST['mobile'];
    $employeeID = $_POST['employeeID'];

    /* replaced with employeeID */
    $flag = $db->addEmployee($username, $password, $fullname, $employeeID, $designation, $landline, $mobile, $dob);

    if ($flag) {
        $success = "User has been added to the database successfully!";
    } else {
        $message = "Error adding the employee to the database!" . $flag;
    }
}
$title = "Admin Home";
$setHomeActive = "active";
include_once 'layout/_header.php';
include_once 'layout/navbar.php';
?>

<div class="container">
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
                <h3>Add Employee</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" name="addEployee" role="form" method="post" action="home.php">
                    <div class="form-group">
                        <label class="col-md-3">Name:</label>
                        <div class="col-sm-9"> <input type="text" name="fullname" class="form-control" placeholder="Full Name" required="true"> </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3">Username:</label>
                        <div class="col-sm-9"><input type="text" name="username" class="form-control" required="true" placeholder="staff@blood.com"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3">Password:</label>
                        <div class="col-sm-9"><input type="password" name="password" class="form-control" required="true"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3">Date of Birth:</label>
                        <div class="col-sm-9"><input type="date" name="dob" class="form-control" required="true"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3">Designation:</label>
                        <!-- added dropdown, with unique id onchange -->
                        <select class="comboBox" name="designation" id="designation" required="true" onchange="generateID()">
                            <option value="admin">Admin</option>
                            <option value="staff">Staff</option>
                            <option value="doctor">Doctor</option>
                            <option value="nurse">Nurse</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3">Landline:</label>
                        <div class="col-sm-9"><input type="number" min="0" max="10000000000" name="landline" class="form-control" required="true" placeholder="office number"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3">Mobile:</label>
                        <div class="col-sm-9"><input type="number" min="0" max="10000000000" name="mobile" class="form-control" required="true"></div>
                    </div>
                    <input type="hidden" id="employeeID" name="employeeID" value="">
                    <div class="form-group">
                        <label class="col-md-3"></label>
                        <button type="submit" class="btn btn-success btn-md" name="submit">Add Employee</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>

    <script>
        //create unique id for employee
        function uniqueID(designation) {
            const employeeID = "";

            // random 9 digits, non alphabetical
            const digits = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
            const rndDigits = digits.sort(() => Math.random() - 0.5).slice(0, 5).join(''); 

            if (designation == "admin") {
                return "A" + rndDigits;
            } else if (designation == "staff") {
                return "S" + rndDigits;
            } else if (designation == "doctor") {
                return "D" + rndDigits;
            } else if (designation == "nurse") {
                return "N" + rndDigits;
            } else {
                //return error message
                return "error";
            }
        }

        function generateID() {
            const designation = document.getElementById("designation").value;
            const employeeID = uniqueID(designation);
            
            const input = document.querySelector('#employeeID');

            input.value = employeeID;
        }

        generateID();
    </script>
</div>

<?php include 'layout/_footer.php'; ?>