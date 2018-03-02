<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta content="stuff, to, help, search, engines, not" name="keywords">
<meta content="What this page is about." name="description">
<meta content="Display Webcam Stream" name="title">
<title>Display Webcam Stream</title>
  
<style>
#container {
    margin: 0px auto;
    width: 
    height: 1000px;
    border: 10px #333 solid;
}
#videoElement {
    width: 500px;
    height: 375px;
    background-color: #666;
}
#canvas {
    width: 500px;
    height: 375px;
    background-color: #555;
}
</style>
</head>
  
<body>
<div id="container">
    <video autoplay="true" id="videoElement"></video>
    <button id="button"></button>
    <canvas id="canvas"></canvas>
</div>
<script>
    navigator.getUserMedia = navigator.getUserMedia ||
                         navigator.webkitGetUserMedia ||
                         navigator.mozGetUserMedia;

if (navigator.getUserMedia) {
   navigator.getUserMedia({ audio: false, video: { width: 500, height: 375 } },
      function(stream) {
         var video = document.getElementById("videoElement");
         video.src = window.URL.createObjectURL(stream);
         video.onloadedmetadata = function(e) {
           video.play();
         };
      },
      function(err) {
         console.log("The following error occurred: " + err.name);
      }
   );
} else {
   console.log("getUserMedia not supported");
}

    button = document.getElementById('button');
    button.addEventListener("click", function() {
         var video = document.getElementById("videoElement");
         var canvas = document.getElementById("canvas");
         var ctx = canvas.getContext('2d');
         canvas.height = video.videoHeight;
         canvas.width = video.videoWidth;
         ctx.drawImage(video, 0, 0);
    });
</script>
</body>
</html>