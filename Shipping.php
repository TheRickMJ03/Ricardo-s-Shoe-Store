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

if(!isset($to)) {$to = '';}
if(!isset($shipdate)) {$shipdate= '';}
if(!isset($ordernumber)) {$ordernumber= '';}
if(!isset($dimensions)) {$dimensions= '';}
if(!isset($declare)) {$declare= '';}
if(!isset($name)) {$name= '';}
if(!isset($address)) {$address= '';}
if(!isset($city)) {$city= '';}
if(!isset($state)) {$state= '';}
if(!isset($zip)) {$zip= '';}

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
          
        <main class = "shippingticket">
            <h1 style= "color:white ;text-align:center ;background-color:black;" >Shipping Ticket</h1>
            <form action ="Shippingticket.php" method = "post" style="text-align:center;">
                <label>Ship to:</label>
                <input type = "text" name="to" value = "<?php echo htmlspecialchars($to); ?>" >
                <br>
                <label>Ship date:</label>
                <input type = "text" name="shipdate" value = "<?php echo htmlspecialchars($shipdate); ?>" >
                <br>
                <label>Order Number:</label>
                <input type = "text" name="ordernumber" value = "<?php echo htmlspecialchars($ordernumber); ?>" >
                <br>
                <label>Dimensions of the package:</label>
                <input type = "text" name="dimensions" value = "<?php echo htmlspecialchars($dimensions); ?>" >
                <br>
                <label>Declared Value:</label>
                <input type = "text" name="declare" value = "<?php echo htmlspecialchars($declare); ?>" >
                <br>
                <label>First and Last Name:</label>
                <input type = "text" name="name" value = "<?php echo htmlspecialchars($name); ?>" >
                <br>
                <label>Street Address:</label>
                <input type = "text" name="adress" value = "<?php echo htmlspecialchars($address); ?>" >
                <br>
                <label>City:</label>
                <input type = "text" name="city" value = "<?php echo htmlspecialchars($city); ?>" >
                <br>
                <label>State:</label>
                <input type = "text" name="state" value = "<?php echo htmlspecialchars($state); ?>" >
                <br>
                <label>Zip Code:</label>
                <input type = "text" name="zip" value = "<?php echo htmlspecialchars($zip); ?>" >
                <br> 
                <input type = "submit" value="Submit">
        
            </form>
            <?php if(!empty($error_message)){?>
            <p style="color:red; font-family:arial; text-align:center;"> <?php echo htmlspecialchars($error_message); ?> </p>
         <?php } ?>     
            
          
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