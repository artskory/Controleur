<?php
echo $contenu;
?>

<form method="POST">
    <input type="hidden" value="<?php echo $token; ?>" name="token">
    <input type="text" name="login" >
    <input type="text" name="pwd" >
    <input type="submit" name="ok" class="btn btn-default" >
</form>


