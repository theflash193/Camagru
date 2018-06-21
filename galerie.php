<?php
	include_once "view/layout/header.php";
    ?>
        <div class="container-image">
            <img id="ImageShow" class="galerie-ImageShow" style="height: 500px;width: 700px;">
            <!-- <img style="height: 500px;widt: 700px;" src="public/image/ff15.jpg" alt=""> -->
        </div>
        <div class="container-like">
            <button class="like">Like</button>
        </div>
        <div class="commentaire">
            <div class="liste-commentaire">
                <div class="container-commentaire">
                    <p>Hello. How are you today ?</p>
                </div>
                <div class="container-commentaire">
                    <p>Hello. How are you today ?</p>
                </div>
                <div class="container-commentaire">
                    <p>Hello. How are you today ?</p>
                </div>
            </div>    
                <textarea class="container-publication" name="" id=""></textarea>
                <div class="container-bouton-publish">
                    <button class="mon-button">Commenter</button>
                </div>
            </div>
        </div>
        <div style="display: flex;justify-content: space-around;align-item: center;">
            <div class="pagination">
                <a href="#">&laquo;</a>
                <a href="#">1</a>
                <a class="active" href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">6</a>
                <a href="#">&raquo;</a>
            </div>
        </div>
        <div class="galerie-thumnail" id="galerie-thumnail">
            <div>
                <a class="thumbnail" target="_blank" href="img_forest.jpg">
                    <img class="thumbnail" src="http://via.placeholder.com/350x150" alt="Forest">
                </a>
            </div>
            <div>
                <a class="thumbnail" target="_blank" href="img_forest.jpg">
                    <img class="thumbnail" src="http://via.placeholder.com/350x150" alt="Forest">
                </a>
            </div>
        </div>
</div>
<script>
    let photos;
    let nbPagination;
    console.log(photos);
    // upload photo galerie from database
    function onLoad() {
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            photos = JSON.parse(this.responseText);
            // document.getElementById("galerie-thumnail").innerHTML = "<div style=\"background-color: red;\">hello</div>"
            console.log(photos.length);
            DefaultPhoto();
            }
        };
        xhttp.open("GET", "loadPhotos.php", true);
        xhttp.send();
        // document.getElementById("galerie-thumnail").appendChild = 
    }

    function DefaultPhoto() {
        if (photos !== 'undefined') {
            let title = photos[0].title;
            document.getElementById("ImageShow").src = "img/" + title;
            document.getElementById("galerie-thumnail").appendChild(createThumbnail());
        }
    }

    function createThumbnail(title, i) {
        let a = document.createElement("a");
        let img = document.createElement("img");
        let div = document.createElement("div");

        a.target = "_blank";
        img.setAttribute("class", "thumbnail");
        img.src = "img/" + photos[0].title;
        a.appendChild(img);
        div.appendChild(a);
        return (a);
    }

    function changeImage(id, title) {
        document.getElementById("ImageShow").src = "img/" + title;
    }

    function changePagination(id) {
        
    }

    function PaginationNext(id) {
        if (pagination )
    }

    function PaginationPrev(id) {

    }
</script>
<?php
	include_once "view/layout/footer.php";
?>