<?php
require_once("admin_db.php");
require_once("database.php");
session_start();
//SLIDE 22
$email = filter_input(INPUT_POST,'email');
$password = filter_input(INPUT_POST, 'password');

if(is_valid_admin_login($db,$email,$password)){
    $managerDetails = get_manager_details($db, $email);

    $_SESSION ['is_valid_admin']=true;
    $_SESSION['manager_details'] = $managerDetails;


    include("Home.php");




}else{
    if($email== NULL && $password == NULL){
        $login_message= 'you must login to view this page';

    }else{

        $login_message = 'Invalid credentials';
    }
    include('login.php');

}
?>
