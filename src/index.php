<!DOCTYPE html>
<html>
<body>

<div class=bodycontainer>
    <div class="banner">
    <span class="bannertext">2EZ Lights</span>
    </div>

    <div class="slidecontainer">
    <input type="range" min="0" max="255" value="0" class="slider" id="red_slider">
    <div class="valtext">Red: <span id="red_val">0</span></div>
    </div>

    <div class="slidecontainer">
    <input type="range" min="0" max="255" value="0" class="slider" id="green_slider">
    <div class="valtext">Green: <span id="green_val">0</span></div>
    </div>

    <div class="slidecontainer">
    <input type="range" min="0" max="255" value="0" class="slider" id="blue_slider">
    <div class="valtext">Blue: <span id="blue_val">0</span></div>
    </div>

    <div class="btncontainer">
    <button class="modebtn" id="wipe_btn">Wipe</button>
    <button class="modebtn" id="rainbow_btn">Rainbow</button>
    </div>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $red = $_POST['red'];
    $blue = $_POST['blue'];
    $green = $_POST['green'];
    $mode = $_POST['mode'];

    exec("python send.py " . $red . " " . $green . " " . $blue . " " . $mode);
}
?>

<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="js/javascript-stuff.js"></script>
</body>
</html>