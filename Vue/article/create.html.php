<h3>Ajouter un article</h3>
<form method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-9">
            <?php
            if ($this->hasFlash()) {
                echo $this->getFlash();
            }
            ?>
            <div class="form-group" >
                <input class="form-control" type="text" name="titre" placeholder="Titre">
            </div>
            <div class="form-group">
                <textarea class="form-control" type="text" name="contenu" placeholder="Contenu"></textarea>
            </div>
            <div class="form-group">
                <input type="hidden" name="MAX_FILE_SIZE" value="10000000" > <!-- Value on par en octé -->
                <input type="file" id="image" name="image">
                <p class="help-block">(format accepter .jpg/.gif/.png)</p>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <input type="submit" name="ok" class="btn btn-default ">
            </div>
        </div>
    </div>
</form>