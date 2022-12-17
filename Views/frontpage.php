<?php
session_start();
ob_start();

include '../Includes/inc.php';
include './auth/redirect.php';

$sessionid = $_SESSION['id'];
$userInfo = $userInstance->getuserinfo($sessionid);
$email = $userInfo['email'];
$firstname = $userInfo['firstname'];
$lastname = $userInfo['lastname'];
$registered_date = $userInfo['date'];

$name = $firstname . $lastname;


// include './components/activity.php';
//ob_end_clean(); 
?>
<!doctype html>
<html lang="en">

<head>
  <title>Announcement</title>
  <?php include '../Includes/metatags.php'; ?>

  <link rel="stylesheet" type="text/css" href="../Resources/css/left.css">
  <link rel="stylesheet" type="text/css" href="../Resources/css/app.css">
  <link rel="stylesheet" type="text/css" href="../Resources/css/dropdown.css">
  <link rel="stylesheet" type="text/css" href="../Resources/css/table.css">
  <link rel="stylesheet" type="text/css" href="../Resources/css/dashboard.css">
</head>

<body>
  <?php include './components/header.php'; ?>
  <main>
    <div class="container">
      <?php include './components/left.php'; ?>

      <?php
                        $arr=[ 1=>'red', 2=>'orange', 3=>'yellow', 4=>"green", 5=>"blue", 6=>"indigo", 7=>"violet", 8=>"orangered", 9=>"#cecece", 9=>"black" ];
                        $key=array_rand($arr);

                        $arraycolor=[ 1=>'red', 2=>'orange', 3=>'yellow', 4=>"green", 5=>"blue", 6=>"indigo", 7=>"violet", 8=>"orangered", 9=>"#cecece", 9=>"black" ];
                        $keycolor=array_rand($arraycolor);

                        $arraycolora=[ 1=>'red', 2=>'orange', 3=>'yellow', 4=>"green", 5=>"blue", 6=>"indigo", 7=>"violet", 8=>"orangered", 9=>"#cecece", 9=>"black" ];
                        $keycolora=array_rand($arraycolora);
                        ?>

      <div class="middle">
        <div class="middle-header"> <button class="editbtn">MANAGE FRONTPAGE</button> </div>

        <div class="middle-content">

          <div class="box">
            <button class="editbtn" style="background-color: <?php echo "{$arr[$key]}" ; ?>;">Manage Sermon</button>
          </div>

          <div class="box">
            <button class="editbtn" style="background-color: <?php echo "{$arraycolor[$keycolor]}" ; ?>;">Add to Photo Gallery</button>
          </div>

          <div class="box">
            <button class="editbtn" style="background-color: <?php echo "{$arraycolora[$keycolora]}" ; ?>;">Manage officers in  charge</button>
          </div>

          <div class="box">
            <button class="editbtn" style="background-color: <?php echo "{$arraycolor[$keycolor]}" ; ?>;">Manage Blogs Post</button>
          </div>

          <div class="box">
            <button class="editbtn" style="background-color: <?php echo "{$arr[$key]}" ; ?>;">Register FFC Members</button>
          </div>
          
          <div class="box">
            <button class="editbtn" style="background-color: <?php echo "{$arraycolora[$keycolora]}" ; ?>;">Edit first Header</button>
          </div>

          <div class="box">
            <button class="editbtn" style="background-color: <?php echo "{$arraycolor[$keycolor]}" ; ?>;">Edit Second Header</button>
          </div>

          <div class="box">
            <button class="editbtn" style="background-color: <?php echo "{$arraycolor[$keycolor]}" ; ?>;">Edit History</button>
          </div>

          <div class="box">
            <button class="editbtn" style="background-color: <?php echo "{$arraycolora[$keycolora]}" ; ?>;">Manage Advertisement</button>
          </div>

          <div class="box">
            <button class="editbtn" style="background-color: <?php echo "{$arraycolor[$keycolor]}" ; ?>;">Others</button>
          </div>











        </div>


      </div>


    </div>
  </main>
  <script src="../Resources/js/app.js"></script>
  <script src="../Resources/js/sidebar.js"></script>
  <script src="../Resources/js/createannounce.js"></script>

  <script type="text/javascript">
    function trigger(e) {
      document.querySelector("#capture").click();
    }

    function displayImage(e) {
      if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
      }
    }
  </script>
</body>

</html>