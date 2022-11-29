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
    <title>Home,welcome <?php echo "{$firstname} {$lastname} "; ?></title>
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
            <?php
            $arr = [
                1 => 'red',
                2 => 'orange',
                3 => 'yellow',
                4 => "green",
                5 => "blue",
                6 => "indigo",
                7 => "violet",
                8 => "orangered",
                9 => "#cecece"
            ];

            $key = array_rand($arr);
            ?>

            <div class="middle">
                <h3> ALL MEMBERS IN YOUR LEVEL ( <?php echo $fellowship ; ?> ) </h3>
                 
                <?php
                    $allStmt= $memberInstance->getLevelMembers($fellowship);
                    $allData=$allStmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                       <?php  if($allStmt->rowCount() > 0 ): ?>

                <div class="middle-content">

                     <?php foreach($allData as $memberdata): ?>
                    <div class="box">
                        <div class="boxa"> <img src="" alt=""></div>
                        <div class="boxb">
                            <h4> <?php echo "{$memberdata['firstname']} {$memberdata['lastname']} "; ?> </h4>
                            <div><?php echo $memberdata['gender']; ?></div>
                            <div><?php echo $memberdata['ministry']; ?></div>
                            <div><?php echo $memberdata['department']; ?></div>
                            <div> <?php echo "{$memberdata['birthmonth']} {$memberdata['birthday']} "; ?> </div>
                        </div>
                    </div>
                    <?php endforeach ?>

                           
       <?php else: ?>
            <h4>No member for your level has been registered</h4>
       <?php endif ?>


                </div>
            </div>


            </div>
    </main>
    <script src="../Resources/js/app.js"></script>
    <script src="../Resources/js/sidebar.js"></script>
</body>

</html>