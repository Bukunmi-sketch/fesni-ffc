  <!------------------------LEFT ----------------- ---------------->
  <div class="left">
    <!------------------------for keeping profile and remove button for sidenav----------------- ---------------->
    <div class="image-removebox">

      <a href="mypage" class="profile">
           <div class="profile-photo">
              <img src="" alt=""  class="profile-photo">
           </div>
           <div class="handle">
              <h4><?php echo "{$firstname} {$lastname}"; ?> </h4>
              <h6> <?php echo "{$email}" ;?> </h6>
           </div>
       </a>

       <a href="Javascript:void(0)"  onclick="closenv()" class="remove-bar"> <i class="fa fa-remove remove"></i> </a>
     </div>


<!---------------------end for keeping profile and remove button for sidenav----------------- ---------------->


    <!------------------------SIDEBAR-------------------active--------------->
     <div class="sidebar">

        
        <a href="home"  class="menu-item">
            <h3>Home</h3>
        </a>

        <a href="levels.php"  class="menu-item">
            <h3>Members</h3>
        </a>

         <a href="birthlevel"  class="menu-item" onclick="manage()">
            <h3>Your Birthdays</h3>
        </a>

        <div id="manage" class="dropdown-content">
           <a href="units" class="menu-item"> <i class="fa fa-users" aria-hidden="true"></i> <h3>Create Units </h3> </a>
           <a href="view_ministry" class="menu-item"> <i class="fa fa-users" aria-hidden="true"></i> <h3>View Ministries</h3> </a>
           <a href="view_units" class="menu-item"> <i class="fa fa-users" aria-hidden="true"></i> <h3>View Departments</h3> </a>
         </div>

        <a href="javascript:void(0)"  class="menu-item" onclick="announce()">
            <h3>Pay Tithes and Offerings</h3>
        </a>
     
     
       
         <a href="javascript:void(0)" onclick="members()" class="menu-item">
            <h3>Upcoming Events</h3>
        </a>

        <a href="view_announce.php" onclick="members()" class="menu-item">
            <h3>Annoucements</h3>
        </a>
                  
<!---------------------------------------------------------- EDIT ADMIN ACCOUNT ------------------------------------------------------->     
        <a href="adminedit" class="menu-item">
       <!--    <span><i class="material-icons">settings</i></span> -->
            <h3>Your Details</h3>
        </a>

        <a href="home?logout=true" class="menu-item">
            <h3>Log out</h3>
        </a>


    </div>
  </div>

    <script>




    </script>
