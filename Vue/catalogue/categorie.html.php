<?php foreach ($produits as $produit): ?>

    <div class="col-lg-offset-4 col-lg-2">
        <?php if ($produit->getImage()): ?>
            <a href='<?php echo Lib\Application::RACINE; ?>catalogue/produit/<?php echo $produit->getSlug() . '-' . $produit->getId(); ?>'><img src="<?php echo Lib\Application::RACINE_IMAGE; ?><?php echo $produit->getImage()->getUrl(); ?>" alt="<?php echo $produit->getImage()->getAlt(); ?>"> </a>
        <?php endif ?>
    </div>
    <div class="col-lg-6">
        <h1>
            <a href='<?php echo Lib\Application::RACINE; ?>catalogue/produit/<?php echo $produit->getSlug() . '-' . $produit->getId(); ?>'><?php echo $produit->getTitre(); ?>
            </a>
        </h1>
    </div>

<?php endforeach; ?>