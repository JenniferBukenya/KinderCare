<?php
include "connection.php";

$query1 = "SELECT COUNT(AssignmentID) FROM assignments;";
$results = mysqli_query($link, $query1);
// $res=mysqli_fetch_all($results);

// $query2 = "SELECT COUNT(AssignmentID) FROM score INNER JOIN assignments ON score.AssignmentID=assignments.AssignmentID ;";
//$attempts = (int)mysqli_query($link, $query2);

//SUBMITTED ASSIGNMENTS
$query3 = "SELECT COUNT(AssignmentID) AS submits FROM assignments;";
$submits = mysqli_query($link, $query3);
$submit = mysqli_fetch_assoc($submits);
//BEST STUDENTS
$query4 = "SELECT COUNT(scoreId) AS best FROM scores WHERE scores>=70;";
$best = mysqli_query($link, $query4);
$bestPupil = mysqli_fetch_assoc($best);
//ATTEMPTED ASSIGNMENTS
$query5 = "SELECT COUNT(DISTINCT AssignmentID) AS attempts FROM scores ;";
$res = mysqli_query($link, $query5);
$attempts = mysqli_fetch_assoc($res);



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="css/bootstrap.css">

    <title>KCES</title>

    <style>
        .content {
            padding: 50px;
        }

        .reports {
            display: flex;
            justify-content: space-between;
            width: 100%;
            height: 250px;
            text-align: center;

            /* margin: 10px; */
        }

        .content .report {
            margin: 10px;
            background-color: burlywood;
            border-radius: 10px;
            width: 800px;
            height: 150px;
        }
    </style>
</head>

<body>

    <?php include "header.php" ?>
    <div class="wrapper">
        <div class="dash-board">
            <a href="pupils.php">
                <div class="p-4"> <img src="activation2.png" alt=""> Pupil's Details</div>
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
                <div style=" background-color: cadetblue;" class="p-4"><img src="report.png" alt="">Reports</div>
            </a>
            <a href="requests.php">
                <div class="p-4"> <img src="activation2.png" alt=""> Activation Requests</div>
            </a>
        </div>

        <div class="content">
            <div class="reports">
                <div class="report">
                    <h5>Submitted Assignments</h5>
                    <hr>
                    <h6><?php echo $submit['submits']; ?></h6>
                    <a href="assignmentreport.php" style="color:beige; background-color:black;">View Details</a>

                </div>

                <div class="report">
                    <h5>Attempted Assignments</h5>
                    <hr>
                    <h6><?php echo $attempts['attempts']; ?></h6>
                    <a href="attemptsreport.php" style="color:beige; background-color:black;">View Details</a>

                </div>

                <div class="report">
                    <h5>Assignments Missed</h5>
                    <hr>
                    <h6><?php echo "these attempts"; ?></h6>
                    <a href="attemptsreport.php" style="color:beige; background-color:black;">View Details</a>

                </div>

                <div class="report">
                    <h5>Best Students</h5>
                    <hr>
                    <h6><?php echo $bestPupil['best']; ?></h6>
                    <a href="bestpupil.php" style="color:beige; background-color:black;">View Details</a>

                </div>
            </div>

            <!-- PHP CODE FOR CHART DATA -->
            <?php

            include "connection.php";
            //query
            $query = "SELECT user_code, scores FROM scores ORDER BY scores;";

            $result = mysqli_query($link, $query);
            foreach ($result as $row) {
                $usercode[] = $row['user_code'];
                $score[] = $row['scores'];
            }
            ?>

            <div>
                <canvas width="620" height="380" id="chartcanvas"></canvas>
            </div>
        </div>

    </div>

    <!-- JAVA SCRIPT FOR CHARTS -->
    <script>
        const labels = <?php echo json_encode($usercode); ?>;
        const data = {
            labels: labels,
            datasets: [{
                label: 'SCORE',
                data: <?php echo json_encode($score); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132 )',
                    // 'rgba(255, 159, 64)',
                    // 'rgba(255, 205, 86,)',
                    'rgba(75, 192, 192)',
                    'rgba(54, 162, 235)',
                    'rgba(153, 102, 255)',
                    // 'rgba(201, 203, 207)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    // 'rgb(255, 159, 64)',
                    // 'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    // 'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };

        //THE CONFIGURATION.
        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };

        const myChart = new Chart(
            document.getElementById('chartcanvas'),
            config
        );
    </script>

    <?php include "footer.php"; ?>

</body>

</html>