<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta content="stuff, to, help, search, engines, not" name="keywords">
<meta content="What this page is about." name="description">
<meta content="Display Webcam Stream" name="title">
<title>Display Webcam Stream</title>
  
<style>
.main {
   width: 100%;
   height: 500px;
   display: flex;
   background-color: red;
}

.a {
   width: 100%;
   height: auto; 
}

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

.header {
    background-color: #F1F1F1;
    text-align: center;
    padding: 20px;
}

</style>
</head>
  
<body>
<div class="header">
    
</div>
<div id="container">
    <video autoplay="true" id="videoElement"></video>
        <button id="button"></button>
    <canvas id="canvas"></canvas>
</div>
<div id="result"></div>
<script>
    navigator.getUserMedia = navigator.getUserMedia ||
                         navigator.webkitGetUserMedia ||
                         navigator.mozGetUserMedia;

if (navigator.getUserMedia) {
   navigator.getUserMedia({ audio: false, video: { width: 500, height: 375 } },
      function(stream) {
          console.log(window);
         var video = document.getElementById("videoElement");
         video.src = window.URL.createObjectURL(stream);
         console.log(video.src);
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
         var i = canvas.toDataURL("image/jpeg");
         console.log(i);

         var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            console.log(this);
            if (this.readyState == 4 && this.status == 200) {
            // Typical action to be performed when the document is ready:
                document.getElementById("result").innerHTML = this.responseText;
            console.log(this);
            console.log(this.responseText);
            console.log("hey !");
            }
        };
        xhttp.open("POST", "../test.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        const src = video.src;
        console.log(canvas);
        xhttp.send("image="+src);
    });
</script>
</body>
</html>