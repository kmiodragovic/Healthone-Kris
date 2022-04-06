<?php
    // This function checks the login
    function checkLogin():string{
        global $pdo;
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');

        if($email !== null && $email !== false && !empty($password)){
            $sql = 'SELECT * FROM `user` WHERE `email` = :e AND `password` = :p ';

            $sth = $pdo->prepare($sql);
            $sth->bindParam(':e',$email);
            $sth->bindParam(':p',$password);
            $sth->setFetchMode(PDO::FETCH_CLASS, 'User');
            $sth->execute();
            $user = $sth->fetch();

            if($user !== false){
                $_SESSION['user'] = $user;
                if($_SESSION['user']->role=="admin"){
                    return 'ADMIN';
                } else {
                    return 'MEMBER';
                }
            }
            return 'FAILURE';
        }
        return 'INCOMPLETE';
    }

    // This function let's the user logout
    function logout(){
        $_SESSION = array();
        session_destroy();
    }

    // This function checks if the user is an admin or not
    function isAdmin() :bool{
        if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
            $user = $_SESSION['user'];
            if($user->role == "admin"){
                return true;
            }
            else {
                return false;
            }
        }
        return false;
    }

    // This function makes it possible 
    function makeRegistration():string{
        global $pdo;
        $email  = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $tempPassword = password_hash($tempPassword, PASSWORD_DEFAULT);
        $password = /*$tempPassword;*/ filter_input(INPUT_POST, 'wachtwoord');
        $firstName = filter_input(INPUT_POST, 'first_name');
        $lastName = filter_input(INPUT_POST, 'last_name');
        $abonnement = filter_input(INPUT_POST, 'abonnement');
        
        if ($email !== false && !empty($password) && !empty($firstName) && !empty($lastName)) {
            $sth = $pdo->prepare('INSERT INTO user (email,password,first_name,last_name,abonnement,role) VALUES (?,?,?,?,?,"member")');
            $sth->bindParam(1, $email);
            $sth->bindParam(2, $password);
            $sth->bindParam(3, $firstName);
            $sth->bindParam(4, $lastName);
            $sth->bindParam(5, $abonnement);
            $sth->execute();
            return "SUCCES";
        }
        return "INCOMPLETE";
    }

    // This function checks if the user is an member
    function isMember():bool{
        if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
            $user = $_SESSION['user'];
            if($user->role === "member"){
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    // The function which let's you change the profile
    function changeProfile():bool{
        global $pdo;

        $id = $_SESSION['user']->id;
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $firstName = filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lastName = filter_input(INPUT_POST, "lastName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $abonnement = filter_input(INPUT_POST, "abonnement", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (!empty($firstName) && !empty($lastName)) {

            $sth = $pdo->prepare('UPDATE `user` SET `first_name`=:f, `last_name`=:l, `abonnement`=:a, `email`=:e  WHERE `id`=:i');

            $sth->bindValue(":f",$firstName);
            $sth->bindValue(":l",$lastName);
            $sth->bindValue(":a",$abonnement);
            $sth->bindValue(":e",$email);
            $sth->bindValue(":i",$id);

            $sth->execute();

            $_SESSION['user']->email = $email;
            $_SESSION['user']->first_name = $firstName;
            $_SESSION['user']->last_name = $lastName;
            $_SESSION['user']->abonnement = $abonnement;

            return true;
        } else {
            return false;
        }
    }
?>