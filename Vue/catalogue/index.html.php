<?php foreach ($categories as $categorie): ?>
    <h1>
        <a href='<?php echo Lib\Application::RACINE; ?>catalogue/categorie/<?php echo $categorie->getSlug() . '-' . $categorie->getId(); ?>'><?php echo $categorie->getTitre(); ?></a>
    </h1>
    <hr>
<?php endforeach; ?>

