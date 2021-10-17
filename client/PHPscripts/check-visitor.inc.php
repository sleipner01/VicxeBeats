<?php
    /*Check to see if $_SESSION['visited'] has already been set during this users visit.
    Store the result of that check in to the variable $visited.
    */
    $visited = isset($_SESSION['visited']);
    if($visited == false) {
        require '../database-login/dbh.inc.php';

        $date = date("Y/m/d");

        $sql = "INSERT INTO new_visit(visit_date) VALUES ('$date')";

        if($conn->query($sql)) {
            //If something else should be done
        }else{
            //If something should be done
        }

        mysqli_close($conn);
    }
    /* Set $_SESSION['visited'] so that the above check will return true on future visits. */
    $_SESSION['visited'] = true;