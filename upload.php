<?php
//get config
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die('You shouldn\'t be here.');
}

if (isset($_POST['password'])) {
    if ($_POST['password'] == $password) {
        $filename    = RandomString($length);
        $target_file = $_FILES['file']['name'];
        $fileType    = pathinfo($target_file, PATHINFO_EXTENSION);
        if (move_uploaded_file($_FILES['file']['tmp_name'], "content/" . $filename . '.' . $fileType)) {
            echo $website . "?meme=" .  $filename . "." . $fileType;
        } else {
            echo 'File upload failed.';
        }
    } else {
        echo 'Wrong password.';
    }
} else {
    echo 'No POST data received.';
}

function RandomString($length)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
