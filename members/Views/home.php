<?php
  session_start();  
  ob_start();

  include '../Includes/autoload.php';
  include './auth/redirect.php';

    $sessionid=$_SESSION['id'];   
    $userInfo=$userInstance->getmemberinfo($sessionid);
    $email =$userInfo['email'];
    $firstname=$userInfo['firstname'];
    $lastname= $userInfo['lastname'];
    $registered_date=$userInfo['date'];
    $mobile= $userInfo['mobile'];
    $birthday= $userInfo['birthday'];
    $department= $userInfo['department'];
    $fellowship= $userInfo['fellowship'];
    $birthday= $userInfo['birthday'];
    $birthmonth= $userInfo['birthmonth'];
    $rollid= $userInfo['rollid'];

   
   // include './components/activity.php';
//ob_end_clean(); 
?>
<!doctype html>
<html lang="en">
<head>
    <title>Home,welcome <?php echo "{$firstname} {$birthday} ";?></title>
    <?php include '../Includes/metatags.php' ; ?>

              <link rel="stylesheet" type="text/css" href="../Resources/css/left.css"> 
              <link rel="stylesheet" type="text/css" href="../Resources/css/app.css">
              <link rel="stylesheet" type="text/css" href="../Resources/css/dropdown.css">
              <link rel="stylesheet" type="text/css" href="../Resources/css/form.css">
              <link rel="stylesheet" type="text/css" href="../Resources/css/home.css">
              <link rel="stylesheet" type="text/css" href="../Resources/css/dashboard.css">
</head>
<body>
   <?php include './components/header.php' ; ?>
    <main>
        <div class="container">
        <?php include './components/left.php' ; ?>
        <?php
                        $arr=[
                            1=>'red',
                            2=>'orange',
                            3=>'yellow',
                            4=>"green",
                            5=>"blue",
                            6=>"indigo",
                            7=>"violet",
                            8=>"orangered",
                            9=>"#cecece"
                        ];
                     
                        $key=array_rand($arr);
                        ?>

        <div class="middle">
            <h3>DASHBOARD OVERVIEW</h3>
         	
				<section class="see-container" id="container">

<div class="see-landing-image">
    <img src="images/bucuxxb.jpg" class="profile-photo" alt="">
</div>

<!-- ----details abotut me---------->
<div class="see-landing-details">
       <p class="profile-name" > Welcome ,  <?php echo ucfirst("{$firstname}");?> <?php echo ucfirst("{$lastname}");?> </p> 
       <!--  <p class="about" id="about">Digital Entrepreneur,Fullstack web developer developer & Software Engineer</p>
       
        social media connections
       <div class="see-connect"> 
           <a href="https://mobile.facebook.com/bukunmi.olarinde.9" ><i class="fa fa-facebook-f"></i></a>
           <a href="https://www.Instagram.com/bukunmiiie" ><i class="fa fa-instagram"></i></a> 
           <a href="https://github.com/Bukunmi-sketch"> <i class="fa fa-github"></i></a> 
           <a href="https://www.linkedin.com/in/bukunmiiie" ><i class="fa fa-linkedin"></i></a> 
           <a href="https://www.twitter.com/bukunmiiie" ><i class="fa fa-twitter"></i></a> 
           <a href="https://www.pinterest.com/bukunmiiie" ><i class="fa fa-pinterest"></i></a> 
           <a href="mailto:Olarindebukunmi@gmail.com" ><i class="fa fa-google"></i></a>
     </div>
-->
     <div class="see-info"> 
    
    <p class="locate"><i class="fa fa-map-marker"></i> Ibadan,Nigeria </p>
    <p class="locate"><i class="fa fa-phone"></i> +2348051942341</p> 
    <p class="locate"><i class="fa fa-envelope"></i> Olarindebukunmi@gmail.com</p>
    <p class="locate"><i class="fa fa-globe"></i> http://www.bucuzzi.dx.am/b</p>
    <p class="locate"><i class="fa fa-birthday-cake"></i> September 12 </p> 
    <p class="locate"><i class="fa fa-heart"></i>music ,football,coding</p>
    
    </div>
</div>
<!------------- ----end of details about me---------->
</section>
       
</div>



        </div>
   </main>
           <script src="../Resources/js/app.js"></script>
           <script src="../Resources/js/sidebar.js"></script>
     </body>

</html>
