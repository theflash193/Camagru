<?php
    if (empty($_SESSION['logged'])) {
        header('Location: index.php');
    }
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
            <div id="liste-commentaire" class="liste-commentaire">
            </div>
                <textarea class="container-publication" name="" id="comment"></textarea> 
                    <div class="container-bouton-publish">
                        <button onClick= "postComment()" class="mon-button">Commenter</button>
                    </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
            </div>
        </div>
        <div style="display: flex;justify-content: space-around;align-item: center;">
            <div id="pagination" class="pagination">
            </div>
        </div>
        <div class="galerie-thumnail" id="galerie-thumnail">
        </div>
</div>
<script>
    let photos;
    let nbPagination;
    let currentPagination;
    let ppp;
    let savePagination;
    let currentPhoto;
    let comments;
    
    currentPhoto = 0;
    ppp = 20;
    savePagination = document.getElementById("pagination");
    var body = document.body;
    var s = document.body;
    // upload photo galerie from database
    function onLoad() {
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                photos = JSON.parse(this.responseText);
                nbPagination = Math.ceil(photos.length / ppp);
                currentPagination = 1;
                DefaultPhoto();
                createGalerie();
                createPagination();
                if (photos !== undefined && photos.length != 0) {
                    LoadComment(photos[currentPhoto].id);
                }
            }
        };
        xhttp.open("GET", "loadPhotos.php", true);
        xhttp.send();
    }

    function DefaultPhoto() {
        let title;

        if (photos !== 'undefined') {
            title = photos[0].title;
            document.getElementById("ImageShow").src = "img/" + title;
        }
    }

    // gestion photo et thumbnail
    function changeImage(title, id) {
        document.getElementById("ImageShow").src = "img/" + title;
        currentPhoto = id;
        updateComments();
    }

    function createGalerie() {
        let start;

        start = (currentPagination - 1) * ppp;
        for (let i = start; (i < start + ppp) && i < photos.length; i++) {
            var title = photos[i].title; 
            document.getElementById("galerie-thumnail").appendChild(createThumbnail(title, i));
        }
    }

    function createThumbnail(title, i) {
        let a = document.createElement("a");
        let img = document.createElement("img");
        let div = document.createElement("div");

        a.target = "_blank";
        img.setAttribute("class", "thumbnail");
        img.src = "img/" + title;
        a.appendChild(img);
        a.addEventListener("click", function(){ changeImage(title, i); });
        div.appendChild(a);
        return (div);
    }

    // Pagination
    function createPagination() {
        let pagination;
        let prev;
        let next;
        let page;

        pagination = savePagination;
        if (currentPagination != 1) {
            prev = document.createElement("a");
            prev.innerHTML = "&laquo;";
            prev.href = "#";
            prev.addEventListener("click", function() {PaginationPrev()})
            pagination.appendChild(prev);
        }
        for (let i = 0;i < nbPagination;i++) {
            page = document.createElement("a");
            page.href = "#";
            page.innerHTML = i + 1;
            page.addEventListener("click", function() {changePagination(i + 1)})
            if (currentPagination == i + 1) {
                page.className = "active";
            }
            pagination.appendChild(page);
        } 
        console.log(currentPagination);
        console.log(nbPagination);
        if (currentPagination != nbPagination) {
            pagination = document.getElementById("pagination");
            next = document.createElement("a");
            next.innerHTML = "&raquo;";
            next.href = "#";
            next.addEventListener("click", function() {PaginationNext()})
            pagination.appendChild(next);
        }
    }

    function changePagination(id) {
        currentPagination = id;
        let pagination = document.getElementById("pagination");
        let allPage = document.querySelectorAll(".pagination a");
        for (let i = 0;i < allPage.length; i++) {
            pagination.removeChild(allPage[i]);
        }
        createPagination();
    }

    function PaginationNext() {
        currentPagination++;
        let pagination = document.getElementById("pagination");
        let allPage = document.querySelectorAll(".pagination a");
        for (let i = 0;i < allPage.length; i++) {
            pagination.removeChild(allPage[i]);
        }
        createPagination();
    }

    function PaginationPrev() {
        currentPagination--;
        let pagination = document.getElementById("pagination");
        let allPage = document.querySelectorAll(".pagination a");
        for (let i = 0;i < allPage.length; i++) {
            pagination.removeChild(allPage[i]);
        }
        createPagination();
    }

    // create Commentaire
    function LoadComment(id) {
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                comments = JSON.parse(this.responseText);
                CreateComments();
            }
        };
        xhttp.open("GET", "loadComment.php?id=" + id, true);
        xhttp.send();
    }

    function updateComments() {
        let comment = document.getElementById("liste-commentaire");
        let allComments = document.querySelectorAll("#liste-commentaire div");
        for (let i = 0;i < allComments.length; i++) {
            comment.removeChild(allComments[i]);
        }
        console.log("regarde");
        LoadComment(photos[currentPhoto].id);
    }

    function postComment() {
        let input = document.getElementById("comment");
        let comment = input.value;
        if (comment == "") {
            return ;
        }
        let id_photo = photos[currentPhoto].id;

        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("comment").value = "";
                updateComments();
            }
        }
        xhttp.open("POST", "send_comment.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("comment=" + comment + "&id_photo=" + id_photo);
    }

    function CreateComment(comment) {
        let div;
        let p;

        p = document.createElement("p")
        div = document.createElement("div")
        div.className = "container-commentaire";
        p.innerText = comment['message'];
        div.appendChild(p);
        return (div);
    }

    function CreateComments() {
        let commentaire;

        commentaire = document.getElementById("liste-commentaire");
        for (var i = 0; i < comments.length; i++) {
            commentaire.appendChild(CreateComment(comments[i]));
        }
    }
</script>
<?php
	include_once "view/layout/footer.php";
?>