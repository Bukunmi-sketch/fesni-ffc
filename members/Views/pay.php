<?php
session_start();
ob_start();

include '../Includes/autoload.php';
include './auth/redirect.php';

$sessionid = $_SESSION['id'];
$userInfo = $memberInstance->getmemberinfo($sessionid);
$email = $userInfo['email'];
$firstname = $userInfo['firstname'];
$lastname = $userInfo['lastname'];
$registered_date = $userInfo['date'];
$mobile = $userInfo['mobile'];
$birthday = $userInfo['birthday'];
$department = $userInfo['department'];
$fellowship = $userInfo['fellowship'];
$birthday = $userInfo['birthday'];
$birthmonth = $userInfo['birthmonth'];
$rollid = $userInfo['rollid'];
$residence = $userInfo['residence'];
$origin = $userInfo['origin'];
$ministry = $userInfo['ministry'];


// include './components/activity.php';
//ob_end_clean(); 
?>
<!doctype html>
<html lang="en">

<head>
    <title> Pay Tithe / Make Donation </title>
    <?php include '../Includes/metatags.php'; ?>

    <link rel="stylesheet" type="text/css" href="../Resources/css/left.css">
    <link rel="stylesheet" type="text/css" href="../Resources/css/app.css">
    <link rel="stylesheet" type="text/css" href="../Resources/css/dropdown.css">
    <link rel="stylesheet" type="text/css" href="../Resources/css/form.css">
    <link rel="stylesheet" type="text/css" href="../Resources/css/home.css">
    <link rel="stylesheet" type="text/css" href="../Resources/css/dashboard.css">
</head>

<body>
    <?php include './components/header.php'; ?>
    <main>
        <div class="container">
            <?php include './components/left.php'; ?>

            <div class="middle">
                <h3>BIRTHDAY CELEBRANT IN YOUR LEVEL THIS MONTH ( <?php echo date('M') ; ?> ) </h3>

                <div class="middle-content">

                 <button> Pay with Flutterwave </button>


                </div>
            </div>


            </div>
    </main>
    <script src="../Resources/js/app.js"></script>
    <script src="../Resources/js/sidebar.js"></script>
</body>

</html>