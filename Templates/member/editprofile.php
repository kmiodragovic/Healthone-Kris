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
        <div class="alert alert-succes" role="alert">
            <?=$message?>
        </div>
    <?php endif;?>

    <form class="row g-3" method="post">

        <div class="row">
            <div class="col-md-12">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="text" name="email" id="inputEmail" class="form-control" value="<?php if(isset($_SESSION['user']->email)){echo $_SESSION['user']->email;}else{echo "";}?>">
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <label for="inputFirstName" class="form-label">Firstname</label>
                <input type="text" name="firstName" id="inputFirstName" class="form-control" value="<?php if(isset($_SESSION['user']->first_name)){echo $_SESSION['user']->first_name;}else{echo "";}?>" placeholder="Berke">
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <label for="inputLastName" class="form-label">Lastname</label>
                <input type="text" name="lastName" id="inputLastName" class="form-control" value="<?php if(isset($_SESSION['user']->last_name)){echo $_SESSION['user']->last_name;}else{echo "";}?>" placeholder="Ozturk">
            </div>
        </div>

        <div class="col-md-12">
            <label class="form-label">Abbonnement:</label>
            <div class="">
                <select name="abonnement">
                <option value="maand-abonnement">maand-abonnement</option>
                <option value="jaar-abonnement">jaar-abonnement</option>
                </select>
            </div>
        </div>
        

        <center>
            <div class="col-12">
                <button type="submit" name="profile" class="btn btn-primary">Profiel aanpassen</button>
            </div>
        </center>
    </form>
    
    <hr>
    <?php
    include_once('defaults/footer.php');
    ?>
</div>

</body>
</html>