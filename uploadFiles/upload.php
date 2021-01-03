<?php

function uploadFile($file){
    $targetfolder = "../uploadFiles/uploads/";

    $targetfolder = $targetfolder . basename($file['name']);

    $file_type = $file['type'];

    if ($file_type == "application/pdf" || $file_type == "image/gif" || $file_type == "image/jpeg") {

        if (move_uploaded_file($file['tmp_name'], $targetfolder)) {
            echo "The file " . basename($file['name']) . " is uploaded";
        } else {
            echo "Problem uploading file";
        }

    } else {
        echo "You may only upload PDFs, JPEGs or GIF files.<br>";
    }
}
