<?php
    // This function gets all the reviews out of the database
    function getReviews(int $id):array{
        GLOBAL $pdo, $params;
        $sth=$pdo->prepare('SELECT * FROM review where product_id=? order by date ASC');
        $sth->bindParam(1,$id);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_CLASS, 'Review');
    }

    // This function saves the review in the database
    function saveReview($name, $description,$stars,$id) :bool {
        global $pdo;
        $query = $pdo->prepare("INSERT INTO review(name, description, stars, product_id) VALUES(:name, :description, :stars, :id)");

        $query->bindParam("name", $name);
        $query->bindParam("description", $description);
        $query->bindParam("stars", $stars);
        $query->bindParam("id", $id);

        return $query->execute();

    }
?>