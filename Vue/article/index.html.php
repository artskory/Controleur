<a class="btn btn-default" href='admin?action=create'>+ Ajouté</a>
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


        <li><a href='<?php echo \Lib\Application::RACINE ?>admin?page=<?php echo $page - 1; ?>'><img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCIgdmlld0JveD0iMCAwIDI5OC40NjUgMjk4LjQ2NSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMjk4LjQ2NSAyOTguNDY1OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxnPgoJPGc+CgkJPHBhdGggZD0iTTE2Mi44MTIsMjY1LjY5M0w0Ni4zNTMsMTQ5LjIyOUwxNjIuODEyLDMyLjc3M2MzLjYyNy0zLjYyNSw1LjYyNS04LjQ0Niw1LjYyNS0xMy41NzRzLTEuOTk4LTkuOTQ5LTUuNjI1LTEzLjU3MyAgICBjLTMuNjI3LTMuNjI4LTguNDUxLTUuNjI1LTEzLjU3OS01LjYyNWMtNS4xMjgsMC05Ljk0OCwxLjk5Ny0xMy41Nyw1LjYyNEw1LjYyNiwxMzUuNjU2QzIuMDUxLDEzOS4yMywwLDE0NC4xNzcsMCwxNDkuMjI5ICAgIHMyLjA1MSwxMCw1LjYyNiwxMy41NzNMMTM1LjY2MywyOTIuODRjMy42MjMsMy42MjcsOC40NDMsNS42MjUsMTMuNTc1LDUuNjI1YzUuMTMsMCw5Ljk1LTEuOTk4LDEzLjU3My01LjYyNSAgICBjMy42MjktMy42MjUsNS42MjctOC40NDUsNS42MjctMTMuNTc0UzE2Ni40MzksMjY5LjMxNiwxNjIuODEyLDI2NS42OTN6IiBmaWxsPSIjMzM3YWI3Ii8+CgkJPHBhdGggZD0iTTI5Mi44NCwyNjUuNjkzTDE3Ni4zODcsMTQ5LjIyOUwyOTIuODQsMzIuNzcyYzMuNjI3LTMuNjI1LDUuNjI1LTguNDQ2LDUuNjI1LTEzLjU3NHMtMS45OTgtOS45NDktNS42MjUtMTMuNTczICAgIEMyODkuMjEzLDEuOTk3LDI4NC4zODksMCwyNzkuMjYyLDBjLTUuMTI5LDAtOS45NDcsMS45OTctMTMuNTcsNS42MjRMMTM1LjY2MywxMzUuNjU2Yy0zLjYyNywzLjYyNS01LjYyNSw4LjQ0NS01LjYyNSwxMy41NzQgICAgYzAsNS4xMjcsMS45OTgsOS45NDgsNS42MjUsMTMuNTczTDI2NS42OTEsMjkyLjg0YzMuNjIzLDMuNjI3LDguNDQzLDUuNjI1LDEzLjU3NCw1LjYyNWM1LjEyNSwwLDkuOTQ3LTEuOTk4LDEzLjU3NC01LjYyNSAgICBjMy42MjctMy42MjUsNS42MjUtOC40NDUsNS42MjUtMTMuNTc0UzI5Ni40NjcsMjY5LjMxNiwyOTIuODQsMjY1LjY5M3oiIGZpbGw9IiMzMzdhYjciLz4KCTwvZz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" /></a></li>
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
        <li><a href='<?php echo \Lib\Application::RACINE ?>admin?page=<?php echo $page + 1; ?>'><img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCIgdmlld0JveD0iMCAwIDQ1NC41MiA0NTQuNTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQ1NC41MiA0NTQuNTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPGc+Cgk8cGF0aCBkPSJNMzc4LjEzNSwyMjcuMjU2TDIwNi4yMjQsNTUuMzU0Yy0xMi4zNTQtMTIuMzU5LTEyLjM1NC0zMi4zOTQsMC00NC43NDhjMTIuMzU0LTEyLjM1OSwzMi4zODgtMTIuMzU5LDQ0Ljc0NywwICAgTDQ0NS4yNTgsMjA0Ljg5YzYuMTc3LDYuMTgsOS4yNjIsMTQuMjcxLDkuMjYyLDIyLjM2NmMwLDguMDk4LTMuMDkxLDE2LjE5NS05LjI2MiwyMi4zNzJMMjUwLjk3MSw0NDMuOTEgICBjLTEyLjM1OSwxMi4zNjUtMzIuMzk0LDEyLjM2NS00NC43NDcsMGMtMTIuMzU0LTEyLjM1NC0xMi4zNTQtMzIuMzkxLDAtNDQuNzQ0TDM3OC4xMzUsMjI3LjI1NnogTTkuMjY1LDM5OS4xNjYgICBjLTEyLjM1NCwxMi4zNTQtMTIuMzU0LDMyLjM5MSwwLDQ0Ljc0NGMxMi4zNTQsMTIuMzY1LDMyLjM4MiwxMi4zNjUsNDQuNzQ4LDBsMTk0LjI4Ny0xOTQuMjgxICAgYzYuMTc3LTYuMTc3LDkuMjU3LTE0LjI3NCw5LjI1Ny0yMi4zNzJjMC04LjA5NS0zLjA4Ni0xNi4xOTItOS4yNTctMjIuMzY2TDU0LjAxMywxMC42MDZjLTEyLjM2NS0xMi4zNTktMzIuMzk0LTEyLjM1OS00NC43NDgsMCAgIGMtMTIuMzU0LDEyLjM1NC0xMi4zNTQsMzIuMzg4LDAsNDQuNzQ4TDE4MS4xOCwyMjcuMjU2TDkuMjY1LDM5OS4xNjZ6IiBmaWxsPSIjMzI4OWM3Ii8+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" /></a></li>
    <?php endif; ?>
</ul>
