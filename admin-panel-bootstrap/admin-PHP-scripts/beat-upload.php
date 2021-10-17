<?php

if (isset($_POST['file-upload'])) {

    require '../../database-login/dbh.inc.php';

    require 'avatar-upload.php';
    require 'audio-file-upload.php';

    $title = $_POST["title"];
    $duration = $_POST["duration"];
    $bpm = $_POST["bpm"];
    $youtube_id = $_POST["youtube-id"];
    $hashtags = $_POST["hashtags"];
    $price = $_POST["price"];
    $discount = $_POST["discount"];

    $sql = "INSERT INTO beats (title, duration, bpm, youtube_id, hashtags, avatar_file, audio_file, price, discount, downloads) 
            VALUES ('$title','$duration', '$bpm', '$youtube_id', '$hashtags', '$avatar_file', '$audio_file', '$price', '$discount', '0')";

    if($conn->query($sql)) {
        header("Location: ../dashboard.php?file-upload=success");
        exit();
    }else{
        header("Location: ../dashboard.php?file-upload=failed");
        exit();
    }


    mysqli_close($conn);
}