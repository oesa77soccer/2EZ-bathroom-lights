var red = 0;

var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
  red = this.value;
  output.innerHTML = red;
  send(red);
}

function send(c) {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", 'index.php', true);

  //Send the proper header information along with the request
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function() { // Call a function when the state changes.
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      // Request finished. Do processing here.
    }
  }
  xhr.send("red="+c);
}
