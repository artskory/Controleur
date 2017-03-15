<?php foreach ($articles as $key=>$article): ?>
<article class="row mb30">
        <div class="col-lg-8">
            <h1>
                <a href='<?php echo Lib\Application::RACINE; ?>blog/detail/<?php echo $article->getSlug() . '-' . $article->getId(); ?>'><?php echo $article->getTitre(); ?></a>
            </h1>
            <p>
                Ecrit le <?php echo $article->getDate()->format('d-m-Y'); ?> par <?php echo $article->getAuteur(); ?>
            </p>
            <p>
                <?php echo $article->getExtrait($article->getContenu()); ?>
            </p>
        </div>
        <div class="col-lg-4">
            <?php if ($article->getImage() == null): ?>
            <?php else : ?>
            <img class="blogimg" src="<?php echo Lib\Application::RACINE_IMAGE; ?><?php echo $article->getImage(); ?>" alt="">
            <?php endif; ?>
        </div>
    </article>
<?php endforeach; ?>
