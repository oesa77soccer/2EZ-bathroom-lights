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

function send(input) {
  $.ajax({
      type: "POST",
      url: "/var/www/html/2EZ-bathroom-lights/src/send.py",
      data: { param: input },
      success: callbackFunc
  });
}

function callbackFunc(response) {
  // do something with the response
  console.log(response);
}
