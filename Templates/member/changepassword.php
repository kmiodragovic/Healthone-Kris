<!DOCTYPE html>
<html>
<?php
include_once('defaults/head.php');
?>

<body>
<div class="container">
    <?php
    include_once('defaults/header.php');
    include_once('defaults/menu.php');
    include_once('defaults/pictures.php');
    ?>

    <?php if(!empty($message)): ?>
        <div class="alert alert-success" role="alert">
            <?=$message?>
        </div>
    <?php endif;?>

    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">Welkom 
                <?php if(isset($_SESSION['user']->first_name)){echo $_SESSION['user']->first_name;}else{echo "";}?>
                <?php if(isset($_SESSION['user']->last_name)){echo $_SESSION['user']->last_name;}else{echo "";}?>
            </h3>            
        </div>            
    </div>    

    <?php
        global $pdo;

        $query = $pdo->prepare('SELECT * FROM `user` WHERE email = :email');



        if (isset($_POST['wijzig'])) {

            $email = $_SESSION['user']->email;

            $activePassword = $_SESSION['user']->password;
            $currentPassword = $_POST['currentPassword'];
            $newPassword = $_POST['newPassword'];
            $repeatpassword = $_POST['repeatPassword'];

            if ($activePassword === $currentPassword) { 
                if ($newPassword === $repeatpassword) {
                    if (!empty($email) && !empty($newPassword)) {

                        $replacingPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                        $sth = $pdo->prepare('UPDATE `user` SET `password`=:p WHERE `email`=:e');
            
                        $sth->bindValue(":p",$replacingPassword);
                        $sth->bindValue(":e",$email);
            
                        $sth->execute();
            
                        $_SESSION['user']->email = $email;
                        $_SESSION['user']->password = $replacingPassword;
            
                        echo '<div class="alert alert-success" role="alert">Wachtwoord is succesvol gewijzigd!</div>';           

                    } else {
                        echo '<div class="alert alert-danger" role="alert">Vul alles goed in!</div>';
                    }
                } else {
                    echo '<div class="alert alert-danger" role="alert">Wachtwoorden komen niet overeen, vul alles goed in!</div>';
                }
            } else {
                echo '<div class="alert alert-danger" role="alert">Verkeerde wachtwoord, vul alles goed in!</div>';
            }   
        }
    ?>

    <form class="row g-3" method="post">
        <div class="col-md-12">
            <label for="currentpass" class="form-label">Huidige wachtwoord</label>
            <input type="password" name="currentPassword" id="currentpass" class="form-control">
        </div>
        <div class="col-md-12">
            <label for="newpass" class="form-label">Nieuwe wachtwoord</label>
            <input type="password" name="newPassword" id="newpass" class="form-control">
        </div>
        <div class="col-md-12">
            <label for="repeatpass" class="form-label">Herhaal wachtwoord</label>
            <input type="password" name="repeatPassword" id="repeatpass" class="form-control">
        </div>

        <center>
            <div class="col-12">
                <button type="submit" name="wijzig" class="btn btn-danger">Wachtwoord aanpassen</button>
            </div>
        </center>
    </form>

    <center>
        <a type="button" class="btn btn-primary btn-sm px-3" href='/member/profile'>
            Terug naar profiel
        </a>
    </center>

    <hr>
    <?php
    include_once('defaults/footer.php');
    ?>
</div>

</body>
</html>