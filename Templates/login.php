<!DOCTYPE html>
<html>
<?php
include_once('defaults/head.php');
?>

<body>
<div class="container">
    <?php
    include_once('defaults/header.php');
    include_once('defaults/menu.php');
    include_once('defaults/pictures.php');
    global $product, $name;
    ?>

    <?php if(!empty($message)): ?>
        <div class="alert alert-danger text-center" role="alert">
            <?=$message?>
        </div>
    <?php endif;?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active"><a href="/login">Login</a></li>
        </ol>
    </nav>

    <form method="post">
    <div class="mb-3">
        <label for="example1" class="form-label">Email</label>
        <input type="text" class="form-control" name="email" id="example1">
    </div>
    <div class="mb-3">
        <label for="example2" class="form-label">Wachtwoord</label>
        <input type="password" class="form-control" name="password" id="example2">
    </div>
    <button type="submit" name="login" class="btn btn-success">Login</button>
    </form>
    

    

    <hr>
    <?php
    include_once('defaults/footer.php');

    ?>
</div>

</body>
</html>