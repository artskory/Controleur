<a class="btn btn-default" href='?action=add_article'>+ Ajouté</a>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Titre</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($articles as $article): ?>
            <tr>
                <td><?php echo $article->getId(); ?></td>
                <td><?php echo $article->getTitre(); ?></td>
                <td><?php echo $article->getDate(); ?></td>
                <td><a class="btn btn-primary" href='?action=edit_edito&id=<?php echo $article->getId(); ?>'>Edité</a>
                    <a class="btn btn-warning" href='?action=delet_edito&id=<?php echo $article->getId(); ?>' onclick="return confirm(' Sur ?')">Supprimé</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<ul class="pagination">

    <?php $i = 1; ?>
    <?php if ($page > 1): ?>


        <li><a href='<?php echo \Lib\Application::RACINE ?>admin?page=<?php echo $page - 1; ?>' class="glyphicon glyphicon-menu-left"></a></li>
        <?php
    endif;
    while ($i <= $nbPages):
        if ($page == $i):
            ?>
            <li class="active" ><a href="<?php echo \Lib\Application::RACINE ?>admin?page=<?php echo $i; ?>"><?php
                    echo $i;
                    $i++;
                    ?></a></li>
        <?php else: ?>
            <li><a href="<?php echo \Lib\Application::RACINE ?>admin?page=<?php echo $i; ?>"><?php
                    echo $i;
                    $i++;
                    ?></a></li>
        <?php endif; ?>
    <?php endwhile; ?>
    <?php if ($page < $nbPages): ?>
        <li><a href='<?php echo \Lib\Application::RACINE ?>admin?page=<?php echo $page + 1; ?>' class="glyphicon glyphicon-menu-right"></a></li>
        <?php endif; ?>
</ul>
