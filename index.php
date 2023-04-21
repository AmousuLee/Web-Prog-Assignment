<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Archery</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="assets/css/styles.css" rel="stylesheet" />
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Countdown CSS -->
    <link rel="stylesheet" href="assets/css/style_timer.css">
    <!-- Countdown JS -->
    <script src="assets/js/countdown.js"></script>
</head>

<body id="page-top">
    <!-- Navigation-->
    <!-- ! Sign Up, Login, Other li not yet init. -->
    <?php
        include("assets/navbar.php");
    ?>
    <!-- Header-->
    <header class="masthead text-center text-white">
        <div class="masthead-content">
            <div class="container px-5">
                <h1 class="masthead-heading mb-0">Archery Tournament</h1>
                <br>
                <h3 style="color:black">CCI, UNITEN | 20 - 21 MAY 2023 | 5PM - 7PM</h3>
                <div class="container_cd">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            
                                <div class="content_cd">
                                    <div class="counter">
                                        <h3>Registration Deadline - 19 May 2023</h3>
                                        <div id="countdown">   

                                        </div><!-- /#Countdown Div -->
                                    </div> <!-- /.Counter Div -->
                                </div> <!-- /.Content Div -->
                            
                        </div> <!-- /.Columns Div -->
                    </div> <!-- /.Row Div -->
                </div> <!-- /.Container Div -->
            </div>
        </div>
    </header>
    <!-- Content section 1-->
    <section id="scroll">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5"><img class="img-fluid rounded-circle" src="assets/img/a1.jpg" alt="..." /></div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4">About Archery...</h2>
                        <p>Archery is a sport that involves shooting arrows with a bow. It has a long history and is now
                            primarily a recreational activity and competitive sport.
                            Archery can be practiced in various settings and with different types of bows.
                            It requires physical and mental skills and can be enjoyed by people of all ages and
                            abilities.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Content section 2-->
    <section>
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <div class="p-5"><img class="img-fluid rounded-circle" src="assets/img/a2.jpg" alt="..." /></div>
                </div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <h2 class="display-4">Tournament Details</h2>
                        <p>Target archery is a popular form of modern archery where archers shoot at stationary circular
                            targets set at
                            specific distances up to 70 meters for recurve and 50 meters for compound bows.
                            The target consists of 10 scoring zones in five colors, with the innermost yellow rings
                            scoring the most points (10 and 9) and
                            the outermost white rings scoring the least (2 and 1). Target archery is used at the Olympic
                            Games and World Archery Championships,
                            and world rankings are based on target archery events.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Content section 3-->
    <section>
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5"><img class="img-fluid rounded-circle" src="assets/img/a3.jpg" alt="..." /></div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4">Join the Tournament now!</h2>
                        <a class="btn btn-primary btn-xl rounded-pill mt-5" href="registerEvent.php">Join</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer-->
    <?php
        include("assets/footer.html");
    ?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="assets/js/scripts.js"></script>
</body>

</html>