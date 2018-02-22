$(document).ready(function() {
  var content = document.querySelector("#contentChange");
  var d = new Date();
    var n = d.getHours();
    if (n > 19 || n < 6)
      content.innerHTML = "It's dark outside, make sure you have your flashlight.";
    else if (n > 16 && n < 19)
      content.innerHTML = "The sun is setting, get inside.";
    else
      content.innerHTML = "Have a great day, you deserve it.";
});
