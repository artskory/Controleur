<section>
    <?php
    var_dump($_SESSION);
    ?>
    <h1 class="text-center detail mb30">
        <?php echo $produit->getTitre(); ?></a>
    </h1>
    <div class="col-offset-lg-2 col-lg-4">
        <?php if ($produit->getImage() != null): ?>
            <img src="<?php echo Lib\Application::RACINE_IMAGE . $produit->getImage()->getUrl(); ?>" alt="">
        <?php endif; ?>
        <?php
        if ($this->hasFlash()) {
            echo $this->getFlash();
        }
        ?>
    </div>
    <div class="col-lg-8">
        <h4>SYNOPSIS ET DÉTAILS</h4>
        <p>
            <?php echo $produit->getContenu(); ?>
        </p>
        <p class="prix">
            Prix <?php echo $produit->getPrix(); ?>€
        </p>
        <?php foreach ($notes as $note): ?>
            <p><?php echo $note->getValeur() ?> | <?php echo $note->getPseudo() ?> | <?php echo $note->getDate()->format('d-m-Y'); ?></p>
        <?php endforeach; ?>
        <form method="POST" action="<?php echo Lib\Application::RACINE; ?>catalogue/note" class="form-inline">
            <input type="hidden" name="produit" value="<?php echo $produit->getId(); ?>" >
            <div class="form-group">
                <input class="form-control" type="text" name="pseudo" placeholder="Pseudo" >
            </div>
            <div class="form-group">
                <!-- Notes par étoile -->
                <ul class="notes-echelle">
                    <li>
                        <label for="note01" title="Valeur&nbsp;: 1 sur 5">1</label>
                        <input type="radio" name="valeur" id="note01" value="1" />
                    </li>
                    <li>
                        <label for="note02" title="Valeur&nbsp;: 2 sur 5">2</label>
                        <input type="radio" name="valeur" id="note02" value="2" />
                    </li>
                    <li>
                        <label for="note03" title="Valeur&nbsp;: 3 sur 5">3</label>
                        <input type="radio" name="valeur" id="note03" value="3" />
                    </li>
                    <li>
                        <label for="note04" title="Valeur&nbsp;: 4 sur 5">4</label>
                        <input type="radio" name="valeur" id="note04" value="4" />
                    </li>
                    <li>
                        <label for="note05" title="Valeur&nbsp;: 5 sur 5">5</label>
                        <input type="radio" name="valeur" id="note05" value="5" />
                    </li>
                </ul>
                <!-- Fin notes par étoile -->
            </div>
            <input class="btn btn-default" type="submit" name="Votez" value="Votez" >

        </form>

    </div>
</section>



