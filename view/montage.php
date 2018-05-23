<?php
	include_once "layout/header.php";
?>

<div class="montage-container">
    <div class="column montage-main">
        <!-- <video autoplay="true" id="videoElement"></video>
        <button id="button"></button>
        <canvas id="canvas"></canvas>
        <div id="result"></div> -->
    </div>
    <div class="column montage-side">
        <div class="row overflow img-padding">
            <?php
                $i = 0;
                while ($i < 15) {
                    echo "<div class=\"img-column\">";
                    echo "<img src=\"http://via.placeholder.com/350x150\" style=\"width: 250px;\">";
                    echo "<button class=\"delete\" style=\"margin-top: 0px;padding: 2px;cursor: pointer;text-align: center;\">Delete</button>";
                    echo "</div>";
                    $i++;       
                } 
            ?>
            </div>
        </div>
    </div>
</div>

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
<?php include_once "layout/footer.php"; ?>
</body>
</html>