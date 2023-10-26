<?php
function uploadImage($file)
{
    $target_dir = "upload/";
    $target_file = $target_dir . basename($file["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (file_exists($target_file)) {
        return "Sorry, file already exists.";
    }

    $check = getimagesize($file["tmp_name"]);
    if ($check !== false && isset($check["mime"])) {
        $uploadOk = 1;
    } else {
        return "File is not an Image";
    }

    if ($uploadOk == 1) {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return basename($file["name"]);
        } else {
            return "Sorry, there was an error uploading your file.";
        }
    }
}
