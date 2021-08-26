<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <input type="submit" value="rainbow" name="fname">
</form>

<div class="slidecontainer">
  <input type="range" min="0" max="255" value="0" class="slider" id="myRange">
</div>

<p>Value: <span id="demo"></span></p>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = $_POST['fname'];
    if (empty($name)) {
        echo "Name is empty";
    } else {
        echo $name;
        exec("python send.py");
    }
}
?>

<link rel="stylesheet" type="text/css" href="/var/www/html/2EZ-bathroom-lights/src/css/style.css">
<script type="text/javascript" src="js/javascript-stuff.js"></script>
</body>
</html>