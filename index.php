<?php
// meme uploader for discord which prevents rudimentary meme theft

//get website config from config.php
include 'config.php';

// checks if the request even contains a meme in the first place
if (!isset($_GET['meme'])) {
    header("HTTP/1.0 400 Bad Request");
    die("HTTP/1.0 400 Bad Request");
}
// checks if the meme file exists
// if (!file_exists("./content" . $_GET['meme'])) {
//     echo ($website . "content/" . $_GET['meme']);
//     header("HTTP/1.0 400 Bad Request");
//     die("HTTP/1.0 400 Bad Request");
// }

// gets the browser user agent
$browser = $_SERVER['HTTP_USER_AGENT'];

// Checks if the user agent is a discord bot or discord's server, might crossfire some false positives but no clue how else to do it, they seem to run their servers on macs
if ((strpos($browser, "Discordbot/2.0") == true) || (strpos($browser, "Intel Mac OS X 11.6") == true)) {
    header("Location: " . $website . "content/" . $_GET['meme']);
    die();
} else {
    // user attempted meme steal
    die();
    echo ('Pls no meme theft. ');
}

die();
