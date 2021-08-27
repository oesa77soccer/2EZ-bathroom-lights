<!DOCTYPE html>
<html>
<body>

<div class="slidecontainer">
  Red
  <input type="range" min="0" max="255" value="0" class="slider" id="red_slider">
  <span id="red_val">0</span>
</div>

<div class="slidecontainer">
  Green
  <input type="range" min="0" max="255" value="0" class="slider" id="green_slider">
  <span id="green_val">0</span>
</div>

<div class="slidecontainer">
  Blue
  <input type="range" min="0" max="255" value="0" class="slider" id="blue_slider">
  <span id="blue_val">0</span>
</div>

<button class="modebtn" id="wipe_btn">Wipe</button>
<button class="modebtn" id="rainbow_btn">Rainbow</button>

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