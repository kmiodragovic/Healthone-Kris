<?php
function getCategories():array
{
    global $pdo;
    return $pdo->query('SELECT * FROM categories')->fetchAll(PDO::FETCH_CLASS, 'Category');
}

function getCategoryName(int $id):string
{
    global $pdo;
    $sth = $pdo->prepare('SELECT * FROM categories WHERE id= ?');
    $sth->bindParam(1, $id, PDO::PARAM_INT);
    $sth->execute();
    $category = $sth->fetch(PDO::FETCH_ASSOC);
    return $category['name'];
}
?>