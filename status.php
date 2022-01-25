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
    <title>KCES</title>
</head>
<body>
    <?php require ("header.php"); ?>
    <h2>Status page</h2>

    <div>
<form action="status.php" method ="POST">

<label for="usercode">USER CODE</label>
<input type="text" name="usercode">
<button type="submit" name="activate">ACTIVATE </button>
<button type="submit" name="deactivate">DEACTIVATE </button>
</form>
    </div>
</body>
</html>