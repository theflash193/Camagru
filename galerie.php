<?php
	include_once "view/layout/header.php";
    ?>
        <div class="container-image">
            <img style="height: 500px;widt: 700px;" src="public/image/ff15.jpg" alt="">
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
        <div class="galerie-thumnail">
            <div>
                <a class="thumbnail"target="_blank" href="img_forest.jpg">
                <img class="thumbnail" src="http://via.placeholder.com/350x150" alt="Forest">
                </a>
            </div>
        </div>
</div>
<?php
	include_once "view/layout/footer.php";
?>