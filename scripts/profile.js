// Get the modal
var modal = document.getElementById("myModal");
var modall = document.getElementById("myModall");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");
var btnn = document.getElementById("myBtnn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closee")[0];
var spann = document.getElementsByClassName("closeee")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}
btnn.onclick = function() {
  modall.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
spann.onclick = function() {
  modall.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal || event.target == modall) {
    modal.style.display = "none";
    modall.style.display = "none";
  }
}

