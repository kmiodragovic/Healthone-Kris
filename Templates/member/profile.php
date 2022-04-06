<!DOCTYPE html>
    <html>
    <?php
    include_once('defaults/head.php');
    ?>
    <body>
        <div class="container">
            <?php
            include_once ('defaults/header.php');
            include_once ('defaults/menu.php');
            include_once ('defaults/pictures.php');
            ?>

            <center><h4>Member Profiel</h4></center>
            
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Email</td>
                        <td><?= $_SESSION['user']->email ?></td>
                    </tr>
                    <tr>
                        <td>Firstname</td>
                        <td><?= $_SESSION['user']->first_name ?></td>
                    </tr>
                    <tr>
                        <td>Lastname</td>
                        <td><?= $_SESSION['user']->last_name ?></td>
                    </tr>
                    <tr>
                        <td>Abonnement</td>
                        <td><?= $_SESSION['user']->abonnement ?></td>
                    </tr>
                </tbody>
            </table>

            <center>
                <a type="button" class="btn btn-primary btn-sm px-3" href="editprofile">Profiel aanpassen</a>
                <a type="button" class="btn btn-danger btn-sm px-3" href="changepassword">Wachtwoord aanpassen</a>
            </center>

            <br><hr><br>

            <?php
            include_once ('defaults/footer.php');
            ?>
        </div>
    </body>
</html>