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

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/categories">Categories</a></li>
            <li class="breadcrumb-item"><a href="/categories/<?= $product->category_id ?>"> <?= $name ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=$product->name ?></li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <img class="img-fluid center-block" width="200px" src='/img/<?= $product->picture ?>'>
                <div class="card-body">
                    <h5 class="card-title"><?= $product->name ?></h5>
                </div>
            </div>
        </div>
    </div>

    <form method="post">
        <div class="mb-3">
            <label for="Naam" class="form-label">Naam</label>
            <input type="text" class="form-control" name="name" id="Naam">
        </div>
        <div class="mb-3">
            <label for="Description" class="form-label">Beschrijving</label>
            <input type="text" class="form-control" name="description" id="Description">
        </div>    


        <label>Score:</label>
        <div>
            <select name="stars">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </div>

        <input type="submit" name="verzenden" value="Opslaan" class="btn btn-primary text-right">
             
    </form>

    

    <hr>
    <?php
    include_once('defaults/footer.php');

    ?>
</div>

</body>
</html>