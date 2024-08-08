<?php
require('database.php');

// Get shoeID from the URL
$shoe_id = filter_input(INPUT_GET, 'shoe_id', FILTER_VALIDATE_INT);

// Fetch details of the selected shoe
$queryShoeDetails = 'SELECT * FROM shoes WHERE shoeID = :shoe_id';
$statement = $db->prepare($queryShoeDetails);
$statement->bindValue(':shoe_id', $shoe_id);
$statement->execute();
$shoeDetails = $statement->fetch();
$statement->closeCursor();


if (!$shoeDetails) {
    // Display an error message and exit the script
    echo '<h1>Error: Shoe not found</h1>';
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Shoe Details</title>
<link rel="stylesheet" href="shoe_details.css">
<link rel="stylesheet" href="Shoe_style.css">
<link rel="stylesheet" href="Shippingcss.css">

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var shoeImage = document.querySelector('img');

            // Add the class to the image on mouseover
            shoeImage.addEventListener("mouseover", function () {
                shoeImage.classList.add('image-filter');
            });

            // Remove the class on mouseout
            shoeImage.addEventListener("mouseout", function () {
                shoeImage.classList.remove('image-filter');
            });
        });
    </script>
</head>

<body>
    <?php include("header_shoe.php");?>
    <?php include("nav.php");?>
<div id="details">
    <h1>Shoe Details</h1>
    <p>Shoe Code: <?php echo $shoeDetails['shoeCode']; ?></p>
    <p>Shoe Name: <?php echo $shoeDetails['shoeName']; ?></p>
    <p>Description: <?php echo $shoeDetails['description']; ?></p>
    <p>Price: <?php echo $shoeDetails['price']; ?>$</p>
    <img src="shoes_images/<?php echo $shoeDetails['shoeID']; ?>.jpg" >

</div>
<?php include ("footer_shoe.php"); ?>





</body>
</html>