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
            <li class="breadcrumb-item"><a href="/category/<?= $product->category_id ?>"> <?= $name ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=$product->name ?></li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <img class="img-fluid center-block mx-auto d-block" width="200px" src='/img/<?= $product->picture ?>'>
                <div class="card-body">
                    <h5 class="card-title"><?= $product->name ?></h5>
                    <p class="card-text"><?= $product->description ?></p>
                    <a class="btn btn-primary" href="/review/<?=$product->id?>" role="button">Geef een review</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <?php foreach($reviews as $review):?>
        <div class="col-md-6">
            <div class="card text-center">
                <img class="img-fluid center mx-auto d-block" width="200px" src='/img/<?= $product->picture ?>'>
                <div class="card-body">
                <h5 class="card-title">Review</h5><br>
                <p class="card-text">Naam: <?= $review->name?></p><br>
                <p class="card-text">Reactie: <?= $review->description?></p><br>
                <p class="card-text">Score: <?= $review->stars?></p><br>
                <p class="card-text">Datum: <?= $review->date?></p><br>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>

    

    <hr>
    <?php
    include_once('defaults/footer.php');
    ?>
</div>

</body>
</html>
