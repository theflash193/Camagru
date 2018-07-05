<?php
// print_r($_SESSION['logged']);
include_once "layout/header.php";
        if (!isset($_SESSION['logged'])) {
            header('Location: ../index.php');
        }
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
        <div id="photoCells" class="row overflow img-padding">
        </div>
    </div>
</div>

<script>
    let photos;
    let photoCells;
    
    document.getElementById("photoCells").style = "overflow: hidden;";
    function onLoad() {
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                photos = JSON.parse(this.responseText);
                console.log(photos);
                createCells();
            }
        };
        xhttp.open("GET", "../loadPhotoUser.php", true);
        xhttp.send();
    }

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
        const src = i;
        xhttp.open("POST", "../test.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("image="+src);
        // xhttp.send({"hello": "a"});
    });

    function createPhotoCell(photo) {
        let div = document.createElement("div");
        let img = document.createElement("img");
        let button = document.createElement("button");

        console.log(photo);
        div.className = "img-column";
        img.src = "/camagru/img/" + photo["title"];
        img.style = "width: 100%;height: 100%";
        button.className = "delete";
        button.addEventListener("click", function() {
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    UpdatePhoto();
                }
            };

            xhttp.open("GET", "../DeletePhotoId.php?id="+ photo['id'], true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send();
        })
        button.innerHTML = "Supprimer";
        div.appendChild(img);
        div.appendChild(button);
        return (div);
    }

    function createCells() {
        let photoCells = document.getElementById("photoCells");

        if (photos.length != 0) {
            photoCells.style = "overflow: scroll";
        } else {
            photoCells.style = "overflow: hidden";
        }
        for (let i = 0;i < photos.length;i++) {
            console.log("yolo");
            photoCells.appendChild(createPhotoCell(photos[i]));
        }
    }

    function UpdatePhoto() {
        let photoCell = document.getElementById("photoCells");
        let allPhoto = document.querySelectorAll("#photoCells div");

        for (let i = 0;i < allPhoto.length; i++) {
            photoCell.removeChild(allPhoto[i]);
        }
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                photos = JSON.parse(this.responseText);
                createCells();
            }
        };
        xhttp.open("GET", "/camagru/loadPhotoUser.php", true);
        xhttp.send();
    }
</script>
<?php include_once "layout/footer.php"; ?>

