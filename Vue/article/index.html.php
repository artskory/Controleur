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
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
</ul>