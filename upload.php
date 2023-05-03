<?php
if (isset($_POST["submit"])) {
    $targetDirectory = "uploads/";  // Directory to store uploaded files
    $targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file is a valid image
    if (isset($_FILES["fileToUpload"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "No Provs.";
            $uploadOk = 1;
        }
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 1;
    }

    // Check file size (limit it to 2MB)
    if ($_FILES["fileToUpload"]["size"] > 2 * 1024 * 1024) {
        echo "Sorry, your file is too large. It should be under 2MB.";
        $uploadOk = 1;
    }

    // If all checks pass, upload the file
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
