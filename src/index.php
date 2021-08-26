<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" type="text/css" href="/var/www/html/2EZ-bathroom-lights/src/css/style.css">
<script src="/var/www/html/2EZ-bathroom-lights/src/js/javascript-stuff.js"></script>

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

<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>

</body>
</html>