<?php
include "connection.php";
$message = "";
if (isset($_POST['register'])) {
    $firstName = mysqli_real_escape_string($link, $_POST['fname']);
    $lastName = mysqli_real_escape_string($link, $_POST['lname']);
    $usercode = mysqli_real_escape_string($link, $_POST['usercode']);
    $ssimu = mysqli_real_escape_string($link, $_POST['phone']);

    $query3 = "INSERT INTO pupils (user_code, first_name, last_name, phone_number) VALUES('$usercode', '$firstName', '$lastName', '$ssimu');";

    if (mysqli_query($link, $query3)) {
        $message='<h5 style= "background-color:cadetblue; font-size:20px; 
        text-align:center; padding:10px 0px;">'.$firstName.' '.'has been registered'.'</h5>';
        // header("Location:register.php");
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        label{
            color: white;
        }
    </style>
    <title>KCES</title>
</head>

<body>
    <?php require("header.php"); ?>


    <div class="wrapper">
        <div class="dash-board">
            <a href="pupils.php">
                <div class="p-4"> <img src="activation2.png" alt=""> Pupil's Details</div>
            </a>
            <a href="register.php">
                <div style=" background-color: cadetblue;" class="p-4"><img src="register.jpg" alt="">Register Pupil</div>
            </a>
            <a href="assign.php">
                <div class="p-4"> <img src="assignment.png" alt="">Post Assignment</div>
            </a>
            <a href="scores.php">
                <div class="p-4"> <img src="activation2.png" alt=""> Pupil Scores</div>
            </a>
            <a href="status.php">
                <div class="p-4"> <img src="status.jpg" alt="">Change Pupil's Status</div>
            </a>
            <a href="reports.php">
                <div class="p-4"><img src="report.png" alt="">Reports</div>
            </a>
            <a href="requests.php">
                <div class="p-4"> <img src="activation2.png" alt=""> Activation Requests</div>
            </a>
        </div>

        <div class="content ">
            <form class="bg-secondary " action="register.php" method="POST" class = "">

<h5 >
<?php echo $message?>
</h5>
                <h2>Pupil's registration page</h2>
                <label class="form-label" for="fname">FIRST NAME</label>
                <input class="form-control" type="text" name="fname" required>
                <label class="form-label" for="lname">LAST NAME</label>
                <input class="form-control" type="text" name="lname" required>
                <label class="form-label" for="usercode">USER CODE</label>
                <input class="form-control" type="text" name="usercode" required>
                <label class="form-label" for="phone">PHONE NUMBER</label>
                <input class="form-control" type="tel" name="phone" required>
                <button type="submit" name="register" class="btn">REGISTER </button>
                <!-- <button class = "btn"> <a href="#"> HOME</a> </button> -->
            </form>


        </div>
    </div>

    <?php include "footer.php"; ?>

</body>

</html>