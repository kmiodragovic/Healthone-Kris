<?php
    global $params;

    if(!isAdmin()){
        logout();
        header("Location: /home");
    } else {
        switch($params[2]){
            // When home is selected in the menu it wil be directed to this case
            case 'home':
                include_once "../Templates/admin/home.php";
                break;
            // When beheer is selected in the menu it wil be directed to this case
            case 'beheer':
                $products=getAllProducts();
                include_once "../Templates/admin/beheer.php";
                break;
            // When add is selected in the table on the beheer.php it wil be directed to this case
            case 'add':
                $categories = getCategories();
                include_once "../Templates/admin/add.php";
                break;
            // When delete is selected in the table on the beheer.php it wil be directed to this case
            case 'delete':
                $product = getProduct($_GET['id']);
                unlink('img/' . $product->picture);
                deleteProduct($_GET['id']);
                $products = getAllProducts();
                header("Location: /admin/beheer");
                break;
            default:
                include_once "../Templates/admin/home.php";
                break;
        }
    }
?>