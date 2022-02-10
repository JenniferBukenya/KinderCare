<?php

include "connection.php";

$query = "SELECT * FROM pupils;";
$result = mysqli_query($link, $query);
//$res = mysqli_fetch_assoc($result);







?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>PUPIL'S DETAILS</title>
</head>

<body>

    <?php include "header.php" ?>
    <div class="wrapper">
        <div class="dash-board">
            <a href="pupils.php">
                <div style=" background-color: cadetblue;" class="p-4"> <img src="activation2.png" alt=""> Pupil's Details</div>
            </a>
            <a href="register.php">
                <div class="p-4"><img src="register.jpg" alt="">Register Pupil</div>
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


        <div class="content">

            <div class="container mt-0 mr-5 d-block">
                <p class="text-center my-2 lead">REGISTERED PUPILS</p>
                <div class="container">
                    <table class="table table-bordered table-hover m-5 table-sm">
                        <tr>
                            <th>USER CODE</th>
                            <th>FIRST NAME</th>
                            <th>LAST NAME</th>
                            <th>PHONE NUMBER</th>
                            <th>STATUS</th>
                        </tr>
                        <?php foreach ($result as $r) { ?>
                            <tr>
                                <td><?php echo $r['user_code']; ?></td>
                                <td><?php echo $r['first_name']; ?></td>
                                <td><?php echo $r['last_name']; ?></td>
                                <td><?php echo $r['phone_number']; ?></td>
                                <td><?php echo $r['mystatus']; ?></td>
                            </tr>
                        <?php   } ?>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>

</body>

</html>