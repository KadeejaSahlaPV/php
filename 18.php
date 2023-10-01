//PHP program to store current date-time in a cookie and display the Last visited date-time on the web page upon revisiting the same web page.
<?php
date_default_timezone_set('Asia/Kolkata');
function getCurrentDateTime() {
    return date('Y-m-d H:i:s');
}
if (isset($_COOKIE['last_visited'])) {
    $lastVisited = $_COOKIE['last_visited'];
    echo "Welcome back!<br><br>You last visited on: $lastVisited";
} else {
    echo "Welcome! This is your first visit.";
}
$currentTime = getCurrentDateTime();
setcookie('last_visited', $currentTime, time() + (30 * 24 * 60 * 60));
?>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
            background:#936868;
            color: floralwhite;
            font-size: 30px;
        }          
    </style>
</head>
</html>
