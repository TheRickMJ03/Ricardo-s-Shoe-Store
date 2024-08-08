<!-- 
Name: Ricardo Mejia
Date:11/03/2023
Course Name: IT202/001
Assignment: Unit 7 Assignment: Shoe Store (Phase 3)
Email: ram227@njit.edu
-->
<?php 
  session_start();
  $email = filter_input(INPUT_POST,'email');
  $password = filter_input(INPUT_POST, 'password');
  if (isset($_SESSION['is_valid_admin'])) { 
?>
<?php
require_once('database.php');
$queryCategory = 'SELECT * FROM shoeCategories WHERE shoeCategoryID';
$statement1 = $db->prepare($queryCategory);
$statement1->execute();
$category = $statement1->fetchAll();
$statement1->closeCursor();
?>

<html>
<head>
    <link rel="stylesheet" href="Shoe_style.css">
    <title>Create</title>
    <link rel="stylesheet" href="product_list.css" />
</head>
<body>
<?php include("header_shoe.php");?>
<?php include("nav.php");?>
<main class= maincleats style="background-color:grey;">
<h1>Add Product</h1>
            <form action="add_shoe.php" method= "post" name="shoe_form" id="shoe_form">

            <label>Add Shoe:</label>
            <select name="category_id">
            <?php foreach ($category as $shoe) : ?>
                <option value="<?php echo $shoe['shoeCategoryID']; ?>">
                    <?php echo $shoe['shoeCategoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>
            <!-- SLIDE 40-->
            <label>Shoe Code:</label>
            <input type ="text" name="code" id="code"/>
            <span>*</span>
            <br>
            <label>Shoe Name:</label>
            <input type ="text" name="name" id="name"/>
            <span>*</span>
            <br>
            <label>Shoe Description:</label>
            <input type ="text" name="description" id="description"/>
            <span>*</span>
            <br>
            <label>Shoe Price:</label>
            <input type ="text" name="price" id="price"/>
            <span>*</span>
            <br>
            <input type="reset" value="Reset" onclick="clearForm()">
            <input type = "submit" value = "Submit"/>
            </form> 
            <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>

            <script src = "create.js"></script>

</main>
<?php include ("footer_shoe.php"); ?>


</body>
</html>
<?php } else{
    if($email== NULL && $password == NULL){
        $login_message= 'you must login to view this page';

    }else{

        $login_message = 'Invalid credentials';
    }
    include('login.php');

}
?>


