<!-- 
Name: Ricardo Mejia
Date:10/19/2023
Course Name: IT202/001
Assignment: Section 001 Unit 5 Assignment 
Email: ram227@njit.edu
-->
<?php
require('database.php');
$category_id = filter_input(INPUT_GET, 'category_id',
                            FILTER_VALIDATE_INT);
if ($category_id == NULL || $category_id == FALSE) {
    $category_id = 1;
}
 
// Get name for selected category
$queryCategory = 'SELECT * FROM shoeCategories WHERE shoeCategoryID = :category_id';
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$category_name = $category['shoeCategoryName'];
$statement1->closeCursor();


//get all categories
//1D array ->fetch
//2D array ->fetchall
$queryAllCategories = 'SELECT * FROM shoeCategories ORDER BY  shoeCategoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories=$statement2->fetchAll();
$statement2->closeCursor();

$queryProducts='SELECT * from shoes
WHERE shoeCategoryID = :category_id ORDER BY shoeID';
$statement3= $db->prepare($queryProducts);
//bindvalue = found and replace
$statement3->bindValue('category_id',$category_id);
$statement3->execute();
$shoes = $statement3->fetchAll();
$statement3->closeCursor();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="Shoe_style.css">
    <title>Soccer Cleats</title>
    `<link rel="stylesheet" href="product_list.css" />`
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this item?");
        }
    </script>
</head>
<body>
<?php include("header_shoe.php");?>
<?php include("nav.php");?>
<main class= maincleats>
    <h1 style= "background-color:white">Product List</h1>
    <aside>
        <h2>Categories</h2>
        <nav class= navshoes>
        <ul>
            <?php foreach ($categories as $category) : ?>
            <li>
                <a href="?category_id=<?php
                         echo $category['shoeCategoryID']; ?>">
                    <?php echo $category['shoeCategoryName']; ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
        </nav>           
    </aside>
    <section>
        <h2><?php echo $category_name; ?></h2>
        <table class= list>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Description</th>
                <th class="right">Price</th>
            </tr>
 
            <?php foreach ($shoes as $shoe) : ?>
            <tr>
            <td><a href="shoe_details.php?shoe_id=<?php echo $shoe['shoeID']; ?>" style="color: blue; text-decoration: underline;"><?php echo $shoe['shoeCode']; ?></a></td>
                <td><?php echo $shoe['shoeName']; ?></td>
                <td><?php echo $shoe['description']; ?></td>
                <td class="right"><?php echo $shoe['price']; ?></td>
                <?php 
                if (isset($_SESSION['is_valid_admin'])) {?>
                <td><form action="delete_product.php" method="post" onsubmit="return confirmDelete()">
                    <input type="hidden" name="product_id"
                        value="<?php echo $shoe['shoeID']; ?>">
                    <input type="hidden" name="category_id"
                        value="<?php echo $shoe['shoeCategoryID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>

               <?php } else { ?>
                
                <?php } ?>
            </tr>
            <?php endforeach; ?>
        </table>
    </section>

</main>
<?php include ("footer_shoe.php"); ?>

</body>
</html>