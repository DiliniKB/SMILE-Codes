
var modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];
const error1 = document.getElementById("error1")


function popupError(x) {
  error1.innerText  = x;
  modal.style.display = "block";  
}

span.onclick = function() {
  modal.style.display = "none";
}


window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

