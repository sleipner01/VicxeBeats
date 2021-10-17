<?php

if(isset($_POST['submit'])) {

    require '../../database-login/dbh.inc.php';

    $beatId = $_POST["beatId"];
    $title = $_POST["title"];
    $duration = $_POST["duration"];
    $bpm = $_POST["bpm"];
    $youtube_id = $_POST["youtube_id"];
    $hashtags = $_POST["hashtags"];
    $price = $_POST["price"];
    $discount = $_POST["discount"];
    $avatar_file = $_POST["avatar_file"];
    $audio_file = $_POST["audio_file"];

    $sql = "UPDATE beats SET title='$title', duration='$duration', bpm='$bpm', youtube_id='$youtube_id', hashtags='$hashtags', avatar_file='$avatar_file', audio_file='$audio_file', price='$price', discount='$discount'
            WHERE beatId='$beatId'";

    if($conn->query($sql)) {
        header("Location: ../beat-manager.php?file-update=success");
        exit();
    }else{
        header("Location: ../beat-manager.php?file-update=failed");
        exit();
    }

    mysqli_close($conn);
} 

if(isset($_GET['id'])) {
    ?>
    <script>
        var decision = prompt('Are you sure you want to delete this file? Type"YES" or "NO" with caps...');
        console.log(decision);
         
        if(decision !== "YES") {
            
        } else {
            window.location.href = "../beat-manager.php";
        }
    </script>
    <?php

}