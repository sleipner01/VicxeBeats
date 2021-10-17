<?php
    $page = 'Beat manager';

    require 'includes/user-authentication.php';
    require "includes/header.php";
    require "includes/nav.php";
?>



    <div class="main-panel">
      <?php
        require "includes/toolbar.php";
      ?>
        <div class="content">
            <div class="container-fluid">

            <?php
                require '../database-login/dbh.inc.php';

                // Checks if admin wants to edit info.
                if(isset($_GET['edit'])) { ?>
                    
                    <div class="col-md-12">
                    <div class="card card-plain">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title mt-0"> Edit Beat information</h4>
                        <p class="card-category"> When you are finished, click the cloud to update the information</p>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <form method='POST' action='admin-PHP-scripts/update-beat-info.php'>
                        <table class="table table-hover">
                        <thead class="">
                            <th>Beat ID</th>
                            <th>Title</th>
                            <th>Duration</th>
                            <th>BPM</th>
                            <th>Hashtags</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Avatar file name</th>
                            <th>Audio file name</th>
                            <th>Youtube ID</th>
                            <th></th>
                        </thead>
                        <tbody>

                    <?php

                    if(isset($_GET['id'])) { $beatId = $_GET['id']; }
                    $sql = "SELECT * FROM beats WHERE beatId='$beatId';";
                 
                    $result = mysqli_query($conn, $sql);

                    if(!$result) {
                        die("Did not retrieve any data: " . mysql_error());
                    }   else {
                            if(mysqli_num_rows($result) > 0) {

                                while($row = mysqli_fetch_array($result)) {
                                    $beatId = $row["beatId"];
                                    $title = $row["title"];
                                    $duration = $row["duration"];
                                    $bpm = $row["bpm"];
                                    $youtube_id = $row["youtube_id"];
                                    $hashtags = $row["hashtags"];
                                    $avatar_file = $row["avatar_file"];
                                    $price = $row["price"];
                                    $discount = $row["discount"];
                                    $audio_file = $row["audio_file"];
                                    $downloads = $row["downloads"];

                                    echo "<tr>";
                                        echo "<td><input type='number' name='beatId' value='$beatId' style='display:none;'>$beatId</td>";
                                        echo "<td><input type='text' class='form-control' name='title' value='$title'></td>";
                                        echo "<td><input type='number' class='form-control' name='duration' value='$duration'></td>";
                                        echo "<td><input type='number' class='form-control' name='bpm' value='$bpm'></td>";
                                        echo "<td><input type='text' class='form-control' name='hashtags' value='$hashtags'></td>";
                                        echo "<td><input type='number' step='.01' class='form-control' name='price' value='$price'></td>";
                                        echo "<td><input type='number' step='.01' class='form-control' name='discount' value='$discount'></td>";
                                        echo "<td><input type='text' class='form-control' name='avatar_file' value='$avatar_file'></td>";
                                        echo "<td><input type='text' class='form-control' name='audio_file' value='$audio_file'></td>";
                                        echo "<td><input type='text' class='form-control' name='youtube_id' value='$youtube_id'></td>";
                                        echo "<td><button name='submit' style='border: none; background: none;'><i class='material-icons'>cloud_upload</i></button></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<td>No beats were found in the database</td>";
                            }
                            
                        }
                        }

                // If not, proceed to standard managing page
                else { ?>

                <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header card-header-primary">
                    <h4 class="card-title mt-0"> Review all beats</h4>
                    <p class="card-category"> All stored data connected to your beats will be printed below
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <form action="admin-PHP-scripts/update-beat-info.php" method="POST">
                        <table class="table table-hover">
                        <thead class="">
                            <th>Avatar</th>
                            <th>Beat ID</th>
                            <th>Title</th>
                            <th>Duration</th>
                            <th>BPM</th>
                            <th>Hashtags</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Total downloads</th>
                            <th>Avatar file name</th>
                            <th>Audio file name</th>
                            <th>Youtube ID</th>
                            <th></th>
                        </thead>
                        <tbody>

                    <?php
    
                    $sql = "SELECT * FROM beats";
                 
                    $result = mysqli_query($conn, $sql);

                    if(!$result) {
                        die("Did not retrieve any data: " . mysql_error());
                    }   else {
                            if(mysqli_num_rows($result) > 0) {

                                while($row = mysqli_fetch_array($result)) {
                                    $beatId = $row["beatId"];
                                    $title = $row["title"];
                                    $duration = $row["duration"];
                                    $bpm = $row["bpm"];
                                    $youtube_id = $row["youtube_id"];
                                    $hashtags = $row["hashtags"];
                                    $avatar_file = $row["avatar_file"];
                                    $price = $row["price"];
                                    $discount = $row["discount"];
                                    $audio_file = $row["audio_file"];
                                    $downloads = $row["downloads"];

                                    echo "<tr>";
                                        echo "<td style='padding: 5px;'><img src='../client/beatAvatars/$avatar_file' alt='$avatar_file' width='50px' style=''></td>";
                                        echo "<td><input type='number' name='beatId' value='$beatId' style='display:none;'>$beatId</td>";
                                        echo "<td>$title</td>";
                                        echo "<td>$duration</td>";
                                        echo "<td>$bpm</td>";
                                        echo "<td>#$hashtags</td>";
                                        echo "<td>$$price</td>";
                                        echo "<td>$discount%</td>";
                                        echo "<td>$downloads</td>";
                                        echo "<td>$avatar_file</td>";
                                        echo "<td>$audio_file</td>";
                                        echo "<td>$youtube_id</td>";
                                        echo "<td class='td-actions'><a rel='tooltip' title='Edit' class='btn btn-white btn-link btn-sm' href='beat-manager.php?edit&id=$beatId'><i class='material-icons'>edit</i></a>
                                              <a rel='tooltip' title='Remove' class='btn btn-white btn-link btn-sm' href='admin-PHP-scripts/update-beat-info.php?id=$beatId'><i class='material-icons'>close</i></button></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<td>No beats were found in the database</td>";
                            }
                            
                        }
                        }
                        mysqli_close($conn);
                        ?>



                        </tbody>
                        </table>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>



<?php
    require "includes/suffix-bottom.php";
    require "includes/fixed-plugin.php";
    require "includes/scripts-footer.php";
?>