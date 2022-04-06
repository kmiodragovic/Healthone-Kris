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
    ?>

    <?php
    try {
        $conn = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    if (@$_POST) 
    {
        $tempName = $_POST['name'];
        $tempCat = $_POST['category'];
        $tempDesc = $_POST['description'];

        if ($tempName == ""||$tempCat == "" ||$tempDesc == "") {echo "<h1>Vull alles in!</h1>"; return;}

        $sth = $conn->prepare("INSERT INTO `product` (`id`, `name`, `category_id`, `description`) VALUES (NULL, '$tempName', '$tempCat', '$tempDesc')");
        $sth->execute();
        
        echo "<div class='alert alert-warning text-center' role='alert'>" . $tempName . " is toegevoegd!</div>";
    }
    ?>
    
    <form method = "post">
        <div class="md-6">
            <label for="inputName" class="form-label">Naam</label>
            <input type="text" class="form-control" id="inputName" name="name">
        </div>
        <div class="md-6">
            <label for="cat" class="form-label">Category</label>
            <select class="form-select" id="cat" name="category">
                <?php foreach($categories as $category):?>
                    <option value="<?= $category->id?>"><?= $category->name?></option>
                <?php endforeach;?>
            </select>
        </div>    

        <div class="md-6">
            <label for="name" class="form-label">Beschrijving:</label>
            <textarea class="form-control" id="name" name="description" id="Description"></textarea>
        </div> 
        <input type="submit" value="Voeg toe">
    </form>

    <center>
        <a type="button" class="btn btn-success btn-sm px-3" href='beheer.php'>
            Terug naar overzicht
        </a>
    </center>

    <hr>
    <?php
    include_once('defaults/footer.php');
    ?>
</div>

</body>
</html>