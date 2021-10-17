<?php
$path = "../../beats/"; //file to place within the server
$valid_formats1 = array("mp3", "ogg", "flac", "wav"); //list of file extention to be accepted
$audiofile = $_FILES['audiofile']['name']; //input file name in this code is audiofile
$size = $_FILES['audiofile']['size'];

if(strlen($audiofile)) {
        list($txt, $ext) = explode(".", $audiofile);

        if(in_array($ext,$valid_formats1)) {
                $actual_image_name = $txt.".".$ext;
                $tmp = $_FILES['audiofile']['tmp_name'];

                if(move_uploaded_file($tmp, $path.$actual_image_name)){
                        $audio_file = $audiofile;
                } else
                    echo "<script>console.error('Something went wrong!');</script>";              
            }
}