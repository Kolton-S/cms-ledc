$(document).ready(function() {

  var d = new Date();
    var n = d.getHours();
    if (n > 19 || n < 6)
      $("#contentChange").innerHTML = "Night night! Sleep tight!";
    else if (n > 16 && n < 19)
      $("#contentChange").innerHTML = "The sun is setting! Get inside!";
    else
      $("#contentChange").innerHTML = "Have a great day! You deserve it.";

});
