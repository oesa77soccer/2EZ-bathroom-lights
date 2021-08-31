var red = 0;
var blue = 0;
var green = 0;
var mode = "rainbow";

var red_slider = document.getElementById("red_slider");
var green_slider = document.getElementById("green_slider");
var blue_slider = document.getElementById("blue_slider");

var red_val = document.getElementById("red_val");
var green_val = document.getElementById("green_val");
var blue_val = document.getElementById("blue_val");

red_val.innerHTML = red_slider.value;
green_val.innerHTML = green_slider.value;
blue_val.innerHTML = blue_slider.value;

document.getElementById("wipe_btn").addEventListener("click", function() {
  mode = "wipe";
  send();
});

document.getElementById("rainbow_btn").addEventListener("click", function() {
  mode = "rainbow";
  send();
});

// TODO: update only after last touch
// Update the current slider value (each time you drag the slider handle)
red_slider.oninput = function() {
  red = this.value;
  red_val.innerHTML = red;
  send();
}

green_slider.oninput = function() {
  green = this.value;
  green_val.innerHTML = green;
  send();
}

blue_slider.oninput = function() {
  blue = this.value;
  blue_val.innerHTML = blue;
  send();
}

function send() {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", 'index.php', true);

  //Send the proper header information along with the request
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function() { // Call a function when the state changes.
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      // Request finished. Do processing here.
    }
  }
  var st = "red="+red + "&green="+green + "&blue"+blue + "&mode"+mode;
  xhr.send(st);
  console.log(st);
}
