
<!-- 
Name: Ricardo Mejia
Date:10/05/2023
Course Name: IT202/001
Assignment: Section 001 Unit 3 Assignment 
Email: ram227@njit.edu
-->
<?php 
  session_start();
  $email = filter_input(INPUT_POST,'email');
  $password = filter_input(INPUT_POST, 'password');
  if (isset($_SESSION['is_valid_admin'])) { 
?>

<?php    


$to= filter_input(INPUT_POST , 'to');
$shipdate= filter_input(INPUT_POST , 'shipdate');
$ordernumber= filter_input(INPUT_POST , 'ordernumber', FILTER_VALIDATE_FLOAT);
$dimensions= filter_input(INPUT_POST , 'dimensions', FILTER_VALIDATE_FLOAT);
$declare= filter_input(INPUT_POST , 'declare', FILTER_VALIDATE_FLOAT);
$name= filter_input(INPUT_POST , 'name', FILTER_VALIDATE_FLOAT);
$address= filter_input(INPUT_POST , 'addres', FILTER_VALIDATE_FLOAT);
$city= filter_input(INPUT_POST , 'city', FILTER_VALIDATE_FLOAT);
$state= filter_input(INPUT_POST , 'state');
$zip= filter_input(INPUT_POST , 'zip');



if($to === FALSE){

    $error_message = "Enter a valid address!";
}
elseif ($shipdate===FALSE){

    $error_message = "Please type the date again.";
}

elseif($ordernumber === FALSE){

    $error_message= "Please type the order number again.";
}
else if($dimensions>36){

    $error_message = 'Dimensions cannot be more than 36 inches';
}
else if($declare>=150){

    $error_message = 'The declared value of the package cannot be more than $150.';
}
else if(ctype_lower ($state) or strlen($state)>2){

    $error_message = 'Please re-enter the state in the proper format (state abbreviations = EX: NJ).';
}
else if(ctype_digit($zip)==FALSE){

    $error_message = 'Please type numbers, not letters.';
}

else{
$error_message = "";
}

if($error_message  != ""){
    include("Shipping.php");
    exit();
}


$dimensions= $dimensions."''";
$declare= $declare. "$";

?>


<html>
    <head>
        <link rel="stylesheet" href="Shoe_style.css">
        <link rel="stylesheet" href="Shippingcss.css">
        <title>Ricardo's Shoe Store</title>



    </head>
    <body>
       
        <?php include("header_shoe.php");?>
        <?php include("nav.php");?>
        
            <div class="ticket" >
            <h1>Shipping Ticket</h1>
            <label> From :</label><p style="font-family:arial;">323 Dr Martin Luther King Jr Blvd, Newark, NJ 07102</p>
            <br>
            <label> Ship to:</label>
            <span ><?php echo $to ;?></span>
            <br>
            <label>Dimensions of the package:</label><span><?php echo $dimensions ;?></span>
            <br>
            <label>Declared Value:</label><span><?php echo $declare ;?></span>
            <br>
            <label>Shipping Company:</label><p>USPS</p>
            
            <label>Shipping Class:</label><p>Next Day Air</p>
            <label>Tracking Number:</label>
            <span><?php echo(rand(1000000000,10000000000)); ?></span>
            <br>
            <img src="images/Barcode.png" alt="barcode" width= "100px" height="100px">
            <br>
            <label>Order Number:</label><span><?php echo $ordernumber ;?></span>
            <br>        
            <label>Ship date:</label><span><?php echo $shipdate; ?></span>
            <br>
            </div>

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