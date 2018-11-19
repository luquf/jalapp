<?php

require 'db.php';


// returns all the users in the database
function getUsers() {
    $db = connectDB();
    $stmt = $db->prepare("SELECT * from `utilisateurs`");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

// returns a user according to the $id given in parameter
function getUserByID($id) {
    $db = connectDB();
    $stmt = $db->prepare('SELECT * FROM `utilisateurs` WHERE id=?');
    $stmt->execute(array($id));
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

// returns a user according to the $email given in parameter
function getUserByEmail($email) {
    $db = connectDB();
    $stmt = $db->prepare('SELECT * FROM `utilisateurs` WHERE email=?');
    $stmt->execute(array($email));
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

// removes a user according to the $email given in parameter
function removeUserByEmail($email) {
    $db = connectDB();
    $stmt = $db->prepare('DELETE FROM `utilisateurs` WHERE email=?');
    $stmt->execute(array($email));
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

// removes a user according to the $id given in parameter
function removeUserByID($id) {
    $db = connectDB();
    $stmt = $db->prepare('DELETE FROM `utilisateurs` WHERE cle=?');
    $stmt->execute(array($id));
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

// hashes a password in the database
function hashPassword($pass) {
    return password_hash($pass, PASSWORD_BCRYPT);
}

// checks a plain text password according to a hashes
function checkPassword($pass, $hash) {
    return password_verify($pass, $hash);
}

// checks user credentials
function checkCredentials($email, $pass) {
    $db = connectDB();
    $stmt = $db->prepare('SELECT mdp FROM `utilisateurs` WHERE email=?');
   
    $stmt->execute(array($email));
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    if(checkPassword($pass, $data[0][0]) == true) { 
        return true;
    } 
    return false;
}

function setPassword($email, $old, $new) {
    $hashed = hashPassword($new);
    $db = connectDB();
    $stmt = $db->prepare('SELECT mdp FROM `utilisateurs` WHERE email=?');
    $stmt->execute(array($email));
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    if (count($data) == 0) {
        return false;
    }
    if(checkPassword($old, $data[0][0]) == false) {
        return false;
    }
    $stmt = $db->prepare('UPDATE`utilisateurs` SET  mdp=:mdp WHERE email=:email');
    $stmt->bindParam(':email', $email);    
    $stmt->bindParam(':mdp', $hashed);
    $stmt->execute();
    return true;
}

// checks if an email exists in the database
function emailExistsInDatabase($email) {
    $db = connectDB();
    $stmt = $db->prepare('SELECT * FROM `utilisateurs` WHERE email=?');
    $stmt->execute(array($email));
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    if (count($data) > 0) {
        return true;
    }
    return false;
}

//$user = array("hcek7huhfeh", "Berton", "Leo", "leoantoineberton@gmail.com", "password", "14 bis rue Louis Leroux", "Carrieres sur seine", "78420", "France", "1997-07-16", true);
// insert a user in the database
function setUser($user) {
    $db = connectDB();
    $stmt = $db->prepare('INSERT INTO `utilisateurs` VALUES(:cle, :nom, :prenom, :email, :mdp, :adresse, :ville, :pays, :telephone, :administrateur)');
    $stmt->bindParam(':cle', $user['0']);
    $stmt->bindParam(':nom', $user['1']);
    $stmt->bindParam(':prenom', $user['2']);
    $stmt->bindParam(':email', $user['3']);
    $pass = hashPassword($user['4']);
    $stmt->bindParam(':mdp', $pass);
    $stmt->bindParam(':adresse', $user['5']);
    $stmt->bindParam(':ville', $user['6']);
    $stmt->bindParam(':pays', $user['7']);
    $stmt->bindParam(':telephone', $user['8']);
    $stmt->bindParam(':administrateur', $user['9']);
    
    $data = $stmt->execute();
    return $data;
}

?>