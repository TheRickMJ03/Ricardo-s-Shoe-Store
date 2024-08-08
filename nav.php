<!-- 
Name: Ricardo Mejia
Date:10/05/2023
Course Name: IT202/001
Assignment: Section 001 Unit 3 Assignment 
Email: ram227@njit.edu
-->
<?php 
  session_start();
  if (isset($_SESSION['is_valid_admin'])) { 
    $user = $_SESSION["is_valid_admin"];
    if (isset($_SESSION['manager_details'])) {
        $manager_details = $_SESSION['manager_details'];
    }

?>
    <nav>
        <ul>  
            <li>  
            <a href="Home.php" color=white> Home </a>  
            </li>  
            <li>  
            <a href="Shipping.php" color=white> Shipping</a>  
            </li>  
            <li>  
            <a href="Shoes.php" color=white> Shoes</a>  
            </li> 
            <li style= "font-size:15">  
            <a href="Create.php" color=white> Create Shoe</a>  
            </li> 
            <li>  
            <a href="Logout.php">Logout</a> 
            </li> 
           
            <?php echo '<p style="color: red;">Welcome ' . $manager_details['firstName'] . ' ' . $manager_details['lastName'] . ' (' . $manager_details['emailAddress'] . ')</p>'; ?>
         
            
          
            
                    
        </ul>
    </nav>         
<?php } else { ?>
    <nav>
        <ul>  
            <li>  
            <a href="Home.php" color=white> Home </a>  
            </li>  
            <li>  
            <a href="Shoes.php" color=white> Shoes</a>  
            </li> 
            <li>  
            <a href="Login.php">Login</a>
            </li> 
        </ul>
    </nav>        

  <?php } ?>