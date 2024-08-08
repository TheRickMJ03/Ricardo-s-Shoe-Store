<!-- 
Name: Ricardo Mejia
Date:11/03/2023
Course Name: IT202/001
Assignment: Unit 7 Assignment: Shoe Store (Phase 3)
Email: ram227@njit.edu
-->
<?php
    require_once('database.php');

    function isShoeCodeUnique($db, $code) {
        $query = 'SELECT COUNT(*) FROM shoes WHERE shoeCode = :code';
        $statement = $db->prepare($query);
        $statement->bindValue(':code', $code);
        $statement->execute();
        $count = $statement->fetchColumn();
        $statement->closeCursor();
    
        return $count == 0; 
    }
//Slide 41
print_r($_POST);

$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$code= filter_input(INPUT_POST, 'code');
$name1= filter_input(INPUT_POST, 'name');
$description1=filter_input(INPUT_POST,'description');
$price= filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
if (
    $category_id == NULL || $category_id == FALSE ||
    $code == NULL || $name1 == NULL || $description1 == NULL || $description1 == FALSE ||
    $price == NULL || $price == FALSE
) {
    $error = "Invalid input. Check fields and try again";
    echo $error;
} else {
    if ($price > 1000) {
        $error = "INVALID PRICE, PRICE SHOULD BE LESS THAN $1000";
        echo $error;
    }else{
        if (!isShoeCodeUnique($db, $code)) {
            $error = "Shoe code already exists. Please choose a different code.";
            echo $error;
        }else{
            $query = 'INSERT INTO shoes(shoeCategoryID, shoeCode, shoeName, description, price, dateAdded) VALUES (:category_id, :code, :name, :description, :price, NOW())';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $category_id);
            $statement->bindValue(':code', $code);
            $statement->bindValue(':name', $name1);
            $statement->bindValue(':description', $description1);
            $statement->bindValue(':price', $price);
            $statement->execute();
            $statement->closeCursor();
        }
    }
}

include('Shoes.php');


?>