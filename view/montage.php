<?php
    if (empty($_SESSION['logged'])) {
        header('Location: ../index.php');
    }
	include_once "layout/header.php";
?>

<div class="montage-container">
    <div class="column montage-main">
        <form class="montage-form">
            <div>
                <input type="radio" name="img-superpose" checked value="lorem"> lorem
            </div>
            <div>
                <input type="radio" name="img-superpose" value="ipsum"> ipsum
            </div>
            <div>
                <input type="radio" name="img-superpose" value="loremipsuk"> loremipsuk
            </div>
        </form>
        <div style="flex-grow: 3;display: flex;flex-direction: column;">
            <div class="image-container">
                <video crossorigin="anonymous" style="height: 500px; width: 500px;"autoplay="true" id="videoElement"></video>
                <button class="mon-button">Upload image</button>
            </div>
            <button id="button" class="fullsize-button">montage</button>    
        </div>
        <!-- <video autoplay="true" id="videoElement"></video>
        <button id="button"></button> -->
        <img id="result"></img\>
        <canvas crossorigin="anonymous" id="canvas" height="300px" width="300"></canvas>
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
        //   console.log(window);
         var video = document.getElementById("videoElement");
         video.src = window.URL.createObjectURL(stream);
        //  console.log(video.src);
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
        //  sleep(2);
         setTimeout(function(){
         ctx.drawImage(video, 0, 0);
    //do what you need here
}, 2000);
         var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            // Typical action to be performed when the document is ready:
                    
            var canvas = document.getElementById("result");
                canvas.src = "/camagru/test.php";
                canvas.height = 300;
                canvas.width = 300;
            
            console.log(this.responseText);
            }
        };
        // promise(canvas).then(successCallback, failureCallback);
        var i = canvas.toDataURL("image/jpeg");
        // var i = a;
        console.log(i);
        const src = i;
        xhttp.open("POST", "../test.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("image="+src);
        // xhttp.send({"hello": "a"});
    });
</script>
<?php include_once "layout/footer.php"; ?>
