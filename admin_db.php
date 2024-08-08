<?php
//Slide 18
require_once('database.php');

function is_valid_admin_login($db,$email,$password){
    $query = 'SELECT password FROM shoeManagers WHERE emailAddress = :email';
    $statement = $db-> prepare($query);
    $statement->bindValue(':email',$email);
    $statement->execute();
    $row = $statement->fetch();
    $statement->closeCursor();

    if($row == false){

        return false;
    }else{

        $hash= $row['password'];
        return password_verify($password,$hash);
    }


}   
function get_manager_details($db, $email) {
    $query = "SELECT firstName, lastName, emailAddress FROM shoeManagers WHERE emailAddress = :email";
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $result;
}
?>