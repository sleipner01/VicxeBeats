<div class="sidebar" data-color="purple" data-background-color="black" data-image="./assets/img/sidebar-2.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
          <a href="../client/index.php" class="simple-text logo-normal">
            MartinsBeats <br>
            <?php
                echo '<span style="font-size: 14px;">Welcome, '.$_SESSION['fName'].' '.$_SESSION['sName'].'</span>';
            ?>
          </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item  <?php if($page == 'Dashboard') {echo 'active';}?>   ">
            <a class="nav-link" href="./dashboard.php">
              <i class="material-icons">home</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item  <?php if($page == 'Beat manager') {echo 'active';}?>   ">
            <a class="nav-link" href="./beat-manager.php">
              <i class="material-icons">library_music</i>
              <p>Beat manager</p>
            </a>
          </li>
          <li class="nav-item  <?php if($page == 'File manager') {echo 'active';}?>   ">
            <a class="nav-link" href="./file-manager.php">
              <i class="material-icons">folder</i>
              <p>File manager</p>
            </a>
          </li>
        </ul>
      </div>
    </div>