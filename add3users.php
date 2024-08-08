<?php
    require_once("database.php");
    //Adding first User
    add_admin($db,"user1@test1.com","user1","user1","USER1");
    //Adding second user
    add_admin($db,"user2@test2.com","user2","user2","USER2");
    //Adding thirs user
    add_admin($db,"user3@test3.com","user3","user3","USER3");

    function add_admin($db,$email, $password,$firstName,$lastName) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = 'INSERT INTO shoeManagers (emailAddress,
                    password,firstName,lastName)
                VALUES (:email, :password,:firstName,:lastName)';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $hash);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->execute();
        $statement->closeCursor();
    }
    function is_valid_admin_login($db,$email, $password) {
        $query = 'SELECT password FROM shoeManagers
                WHERE emailAddress = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        $hash = $row['password'];
        return password_verify($password, $hash);
    }



?>












