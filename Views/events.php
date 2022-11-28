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
  <link rel="stylesheet" type="text/css" href="../Resources/css/email.css">
  <link rel="stylesheet" type="text/css" href="../Resources/css/table.css">
  <link rel="stylesheet" type="text/css" href="../vendors/DataTables/datatables.min.css" />
</head>

<body>
  <?php include './components/header.php'; ?>
  <main>
    <div class="container">
      <?php include './components/left.php'; ?>

      <div class="middle">
        <div class="min-sub-container">
          <div class="spanheader">
            <span>
              <h4> Create an Announcement </h4>
              <p>Annoucement will be marked as active</p>
            </span>
            <p><?php echo date("D,F j Y",  strtotime(date('Y M d'))); ?></p>
          </div>

          <form action="#" method="POST">
            <div class="error"></div>

         
<!--
              <div class="images">
                <label for="productImage">Add Image</label>
                <div id="upload">
                  <img src="" onClick="trigger()" id="profileDisplay">
                  <input type="file" name="file_image" onchange="displayImage(this)" id="capture" style="display:none">
                  <i class="fa fa-camera" id="camera"></i>
                </div>
              </div>
-->

            <div class="inputbox-details">
              <label for="title"> Event Title</label>
              <input type="text" name="title" placeholder="" style="text-transform: uppercase;" value=" " autofocus>
            </div>

            <div class="inputbox-details">
              <label for="title">Event Location </label>
              <input type="text" name="title" placeholder="" style="text-transform: uppercase;" value=" " autofocus>
            </div>

            <div class="flex-triple-inbox">
                                <div class="inputbox-details">
                                    <label for="email"> Hour </label>
                                    <input type="email" name="email" placeholder="Email" value=" " autofocus>
                                </div>


                                <div class="inputbox-details">
                                    <label for="mobile"> Minutes </label>
                                    <input type="number" name="mobile" placeholder="Phone Number" value=" " autofocus>
                                </div>


                                <div class="inputbox-details">
                                    <label for="rollid"> am/pm </label>
                                    <input type="text" id="rollid" name="rollid" placeholder="Lastname" value="<?php echo $generatedId; ?>" autofocus readonly>
                                </div>
            </div>

            <div class="flex-inbox">
                                <div class="inputbox-details">
                                    <label for="fname"> Event Month </label>
                                    <input type="text" name="fname" placeholder="Firstname" value="  " autofocus>
                                </div>

                                <div class="inputbox-details">
                                    <label for="lname"> Event date </label>
                                    <input type="text" name="lname" placeholder="Lastname" value=" " autofocus>
                                </div>

            </div>

            <div class="button-details">
              <button class="submit" name="create">Create Event </button>
              <input type="hidden" name="creator_name" value=<?php echo $name; ?>>
              <input type="hidden" name="creator_id" value=<?php echo $sessionid; ?>>
            </div>

          </form>

        </div>

        <?php
        $stmt = $unitInstance->getunitMinistry();
        $unitData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        ?>
        <?php if ($stmt->rowCount() > 0) : ?>


          <div class="table-container">
            <table id="example">
              <tr>
                <th>Manage</th>
                <th>unit Name</th>
                <th>Created by</th>
                <th>Created_date</th>

              </tr>
              <?php foreach ($unitData as $unit) : ?>
                <tr>
                  <td> <button class="deletebtn"> Delete </button> <button class="markbtn"> Active </button></td>
                  <td> <?php echo  "{$unit['name']}"; ?> </td>
                  <td> <?php echo  "{$unit['added_by']}"; ?> </td>
                  <td> <?php echo date("D,F j Y",  strtotime($unit['created_at'])); ?> </td>
                </tr>
              <?php endforeach ?>
            </table>

          <?php else : ?>
            <div class="no-value" style="text-align:center">
              <h4>you have not created any announcement</h4>
            </div>
          <?php endif ?>

          </div>

      </div>



    </div>
  </main>
  <script src="../vendors/DataTables/datatables.min.js"></script>
  <script src="../Resources/js/app.js"></script>
  <script src="../Resources/js/sidebar.js"></script>
  <script src="../Resources/js/createannounce.js"></script>

  <script type="text/javascript">
   $(function($) {
     // $('#example').DataTable();

      $('#example').DataTable({
     //   "scrollY": "300px",
      //  "scrollCollapse": true,
        "paging": true
      });

      $('#example3').DataTable();
    });


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