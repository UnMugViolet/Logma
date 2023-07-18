
var video = document.getElementById("myvideo");

function toggleControls() {
  if (video.hasAttribute("controls")) {
     video.removeAttribute("controls")   
  } else {
     video.setAttribute("controls","controls")   
  }
}

function removeControls() {
    video.removeAttribute("controls")   
  }
