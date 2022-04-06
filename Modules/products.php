<?php
// TODO Zorg dat de methodes goed ingevuld worden met de juiste queries.
function getProducts(int $categoryId)
{
    global $pdo;
    $sth = $pdo->prepare('SELECT * FROM product WHERE category_id=? ');
    $sth->bindParam(1, $categoryId);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_CLASS, 'Product');
}

function getProduct(int $productId)
{
   global $pdo;
   $sth = $pdo->prepare('SELECT * FROM product WHERE id=?');
   $sth->bindParam(1, $productId);
   $sth->execute();
   //$category = $sth->fetch();
   return $sth->fetchAll(PDO::FETCH_CLASS, 'Product')[0];
}

function getAllProducts():array{
    global $pdo;
    $sth = $pdo->prepare('SELECT * FROM product ORDER BY category_id');
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_CLASS, 'Product');
}

function deleteProduct(int $productId){
    global $pdo;
    $id = filter_var($_REQUEST['id'], FILTER_VALIDATE_INT);
    if ($id!=false){

        $sql = $pdo->prepare('DELETE FROM `product` WHERE `id` = :id');

        $stmnt = $sql;
        $stmnt->bindParam(':id',$productId);
        $stmnt->execute();
    }
}

function isPost() {
    if( (isset($_POST['name'])) && (!empty($_POST['name'])) &&
        (isset($_POST['category'])) && (!empty($_POST['category'])) &&
        (isset($_POST['description'])) && (!empty($_POST['description'])))
    {
        return true;
    } else {
        return false;
    }
}

function saveProduct(/*string $name, string $category, string $description*/){
    global $pdo;
    $cat=filter_input(INPUT_POST, 'category');
    $newcat = "";

    if($cat == "roeitrainer"){
        $newcat = 1;
    }
    if($cat == "crosstrainer"){
        $newcat = 2;
    }
    if($cat == "hometrainer"){
        $newcat = 3;
    }
    if($cat == "loopband"){
        $newcat = 4;
    }
    $name = filter_input(INPUT_POST, 'name');
    $description = filter_input(INPUT_POST, 'description');

    if(!empty($name) && !empty($description) && !empty($newcat)){
        $sql = "INSERT INTO `product` (`id`, `category_id`, `name`, `description`) VALUES ('', '$newcat', '$name', '$description')";
        $sth = $pdo->prepare($sql);
        $newproduct = $sth->execute();

        echo "LOOOL HET WERKT";
    }
}

?>