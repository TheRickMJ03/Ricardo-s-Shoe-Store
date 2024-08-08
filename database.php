<?php
//slide 24
$local_dsn ='mysql:host=localhost;port=3306;dbname=my_guitar_shop1';
$local_username= 'mgs_user';
$local_password= 'pa55word';
$njit_dsn='mysql:host=sql1.njit.edu;port=3306;dbname=ram227';
$njit_username='ram227';
$njit_password ='Mysql2023@';


$dsn = $njit_dsn;
$username = $njit_username;
$password = $njit_password;

try {
    $db= new PDO($dsn,$username,$password);
    echo '<p> You are connected to the database!</p>';

}catch(PDOException $exception){

        $error_message = $exception->getMessage();
        include("database_error.php");
        exit();

}


?>