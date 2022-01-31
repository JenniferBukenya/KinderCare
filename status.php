<?php
include"connection.php";

if(isset($_POST['deactivate'])){
    $userCode=mysqli_real_escape_string($link, $_POST['usercode']);
    $query5="UPDATE pupils SET mystatus='DEACTIVATED' WHERE user_code='$userCode';";
    mysqli_query($link, $query5);
}
if(isset($_POST['activate'])){
    $userCode=mysqli_real_escape_string($link, $_POST['usercode']);
    $query6="UPDATE pupils SET mystatus='ACTIVATED' WHERE user_code='$userCode';";
    mysqli_query($link, $query6);

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
        .content label{
            margin-bottom: 10px;
        }

        .content form div{
            margin: 30px auto;
        }
    </style>
    <title>KCES</title>
</head>
<body>
    <?php require ("header.php"); ?>


    <div class="wrapper">
        <div class="dash-board">
            
                <a href="register.php"><div>Register Pupil</div></a>
                <a href="assign.php"><div>Post Assignment</div></a>
                <a href="status.php"><div>Change Pupil's Status</div></a>
                <a href="reports.php"><div>Reports</div></a>
        </div>

        <div class="content">

            <form action="status.php" method ="POST">
                <h2>Status page</h2>
                <label for="usercode">USER CODE</label>
                <input type="text" name="usercode" placeholder="Enter user code here...">
                <div>
                <button class = "btn" type="submit" name="activate">ACTIVATE </button>
                <button  class = "btn" type="submit" name="deactivate">DEACTIVATE </button>
                <div>
            </form>

        </div>
    </div>
    

        
</body>
</html>