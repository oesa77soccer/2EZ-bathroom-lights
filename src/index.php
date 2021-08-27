<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <input type="submit" value="rainbow" name="rainbow">
</form>

<div class="slidecontainer">
  Red
  <input type="range" min="0" max="255" value="0" class="slider" id="red_slider">
  <span id="red_val"></span>
</div>

<div class="slidecontainer">
  Green
  <input type="range" min="0" max="255" value="0" class="slider" id="green_slider">
  <span id="green_val"></span>
</div>

<div class="slidecontainer">
  Blue
  <input type="range" min="0" max="255" value="0" class="slider" id="blue_slider">
  <span id="blue_val"></span>
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