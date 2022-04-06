<!DOCTYPE html>
    <html>
    <?php
    include_once('defaults/head.php');
    ?>
    <body>
        <div class="container">
            <?php
            include_once ('defaults/header.php');
            include_once ('defaults/menu.php');
            include_once ('defaults/pictures.php');
            ?>

            <h1 class="text-center">| Sportcenter Health<span class="text-primary">One</span> |</h1>
            <br>

            <center>
                <a type="button" class="btn btn-success btn-sm px-3" href="/admin/add">
                            <i class="bi bi-plus-square"></i>
                </a>
            </center>

            <br>

            <table class="table align-middle">
                <thead>
                    <tr>
                        <th scope="col">nr</th>
                        <th scope="col">picture</th>
                        <th scope="col">Naam</th>
                        <th scope="col">Category</th>
                        <th scope="col" class="text-center">Aanpassen</th>
                        <th scope="col" class="text-center">Verwijderen</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count=1; ?>
                    <?php foreach($products as $product): ?>
                    <tr>
                        <th scope="row"><?= $count++?></th>

                        <td style="width: 10%"><img src="/img/<?=$product->picture?>" class="img-thumbnail img-fluid"></td>
                        <td><?= $product->name ?></td>
                        <td><?= getCategoryname($product->category_id) ?></td>
                        <td class="text-center">
                            <a type="button" class="btn btn-warning btn-sm px-3" href="/admin/edit/<?=$product->id?>">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a type="button" class="btn btn-danger btn-sm px-3" href="/admin/delete/<?=$product->id?>">
                                <i class="bi bi-dash-square"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>

            <br><hr><br>
            <?php
            include_once ('defaults/footer.php');
            ?>
        </div>
    </body>
</html>