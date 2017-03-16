<form class="form-signin" method="POST">
    <img class="logoimg" src="<?php echo Lib\Application::RACINE_IMAGE; ?>/youtube.svg" alt="youtube-play-button"/>
    <?php if ($this->hasflash()): ?>
        <div class="alert alert-danger"><?php echo $this->getFlash(); ?></div>
    <?php endif; ?>
    <input type="hidden" value="<?php echo $token; ?>" name="token">
    <input type="text" id="inputEmail" class="form-control" placeholder="Pseudo" name="login" autofocus>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pwd">
    <div class="checkbox">
        <label>
            <input type="checkbox" value="remember-me"> Ce souvenir de moi
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="ok">Se connecter</button>
</form>
