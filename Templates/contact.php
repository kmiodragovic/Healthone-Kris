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

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item"><a href="/contact">Contact</a></li>
                </ol>
            </nav>
            
            <h2 class="text-center">Over onze vestiging</h2>

            <div class="row">
                <div class="col-md-10 rounded mx-auto d-block">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="prev"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="next"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="/img/carousel1.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="/img/carousel2.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="/img/carousel3.jpg" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-md-10 mx-auto d-block">

                    <p>Zie hieronder de openingstijden en locatie van sportcenter HealthOne. 
                        <br>- Dit zijn ook de openingstijden van de bar die zich bevindt in sportcenter HealthOne.
                        <br>- U kunt bij ons gratis parkeren op het parkeerterrein dat we delen met de voetbalvereniging.
                        <br>- Wij zijn dagelijks volgens de openingstijden bereikbaar via 015 257 89 24.
                    </p>

                    <?php
                        try {
                            $db = new PDO("mysql:host=localhost;dbname=healthone","root", "");
                            $query = $db->prepare ("SELECT * FROM openingstijden");
                            $query->execute();
                            $result = $query->fetchAll(PDO::FETCH_ASSOC);
                            echo "<table>";
                            foreach ($result as &$data) {
                                echo "<td>" . $data ["day"] . " ";
                                echo "<td>" . $data ["time"] . "<br>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        } catch(PDOException $e) {
                            die("Error!: " . $e->getMessage());
                        }
                    ?>                    
                </div>
            </div>

            <br>
            
            <center>
            <div class="row">
                <div class="col-md-12 rounded mx-auto d-block">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1549.7801861794155!2d4.3301513!3d51.9956248!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c5b44d70e5bf1f%3A0x99611a9d7c4e54e6!2sParkeerplaats%2C%202635%20DJ%20Den%20Hoorn!5e1!3m2!1snl!2snl!4v1635089346182!5m2!1snl!2snl" width="1080" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    <br>
                    <h6 class="text-center">We zijn gevestigd aan de Zuidhoornseweg 6A 2635 DJ Den Hoorn</h6>
                    <br>
                </div>
            </div>
            </center>

            <br><hr><br>

            <?php
            include_once ('defaults/footer.php');
            ?>
        </div>
    </body>
</html>