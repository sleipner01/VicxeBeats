<?php
        $target_dir = "../../client/beatAvatars/";
        $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["avatar"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "This file is not a picture";
            $uploadOk = 0;
        }


        // // Check if file already exists
        // if (file_exists($target_file)) {
        //     echo "The file already exists, rename the file";
        //     $uploadOk = 0;
        // }


        // // Check file size
        // if ($_FILES["avatar"]["size"] > 500000000) {
        //     echo "The file is to big to upload.";
        //     $uploadOk = 0;
        // }


        // // Allow certain file formats
        // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        // && $imageFileType != "gif" ) {
        //     echo "Sorry, you can only upload JPG, JPEG, PNG & GIF files.";
        //     $uploadOk = 0;
        // }


        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
             echo "Something went wrong";
             die();
         // if everything is ok, try to upload file
        }else {
            if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                
                $avatar_file = $_FILES['avatar']['name'];

            } else {
                echo "The file would not upload";
            }
        }
