<h1>
    <?php echo $article->getTitre(); ?></a>
</h1>
<p>
    Ecrit le <?php echo $article->getDate()->format('d-m-Y'); ?> par <?php echo $article->getAuteur(); ?>
</p>
<p>
    <?php echo $article->getContenu(); ?>
</p>
<img class="blogimg" src="<?php echo Lib\Application::RACINE_IMAGE; ?><?php echo $article->getImage(); ?>" alt="">