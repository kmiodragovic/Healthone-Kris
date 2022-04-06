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

            <h1 class="text-center">| Sportcenter Health<span class="text-danger">One</span> |</h1>
            <br>

            <div class="row">
                <div class="col-md-12">
                    <div id="marquee-cont">
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                            <td width="50px" style="background:#E21B4D;">
                                <button id="ticker-title">ACTIES:</button>
                            </td>
                            <td id="marquee" style="background:#173084;color:#E21B4D;">
                                <marquee onmouseover="this.stop();" onmouseout="this.start();" id='scroll'>
                                temp <img src="../img/rb_logo.jpg" width="25px" />
                                </marquee>
                            </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col-md-12">
                    - Fit en gezond zijn is geen vanzelfsprekendheid. We moeten er zelf wat voor doen. Goede, gezonde voeding is hiervoor de basis.
                    Bewegen hoort hier ook bij. Regelmatig bewegen zorgt voor een goede doorbloeding en draagt bij aan ontspanning van lichaam en geest.
                    Sporten is goed voor sterkere spieren en voor de conditie. Sporcenter HealthOne heeft verschillende sportapparaten om mee te kunnen werken aan je conditie.
                    <br><br>
                    - Bij sportcenter HealthOne kan ieder geabonneerde onze sportapparaten gebruiken voor maximaal een half uur lang, als niemand anders na jou
                    het sportapparaat wilt gebruiken mag je nog eens een half uur er mee of op trainen.
                    <br><br>
                    - Naast sportapparaten, kleedkamers, tv's, douches en een servicebalie hebben we ook een bar waar je lekker een drankje kan doen met je gymbuddy bij het trainen wanneer je wilt.
                    We bieden ook natuurlijk lekkere shakes aan, denk maar aan de pre-workout van Animal of A merk proteine repen.
                </div>
            </div>

            <br><hr><br>

            <h2 class="text-center">Laatste nieuws</h2>
            <br>
            <h5 class="text-dark">- Bij de bar is ook koude <span class="text-danger">RedBull</span> te verkrijgen.</h5>
            <br>
            <h5 class="text-dark">- Of ook een koude <span class="text-light">Monster</span> Energy.</h5>

            <br><hr><br>


            <?php
            include_once ('defaults/footer.php');
            ?>
        </div>
    </body>
    <script src="../js/home.js"></script>
</html>
