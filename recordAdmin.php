<?php session_start(); ?>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin's Record Page</title>
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
    </head>

    <?php

        // check if sess. var is set ; else return to login
        if (!isset($_SESSION["login"]) && $_SESSION["login"] != "admin") {
            header('Location: index.php');
            exit;
        }
        
        $conn = new mysqli("127.0.0.1", "root", "", "archeryevent") or die("Connection failed : " . $conn->connect_error);
        $sql = "SELECT * FROM `event`;";
        $result = mysqli_query($conn, $sql);
    ?>

    <body>
    <!-- navbar start : for admin -->
        <?php
            include("assets/navbar.php");
        ?>
    <!-- main cont. start -->
    <!-- ! added inline : adjust footer to bottom -->
        <header class="masthead text-white">
            <div class="masthead-content">
                <div class="container px-5">
                    <h1 class="masthead-heading mb-0">Record Page</h1>
                </div>
            </div>
        </header>
        <section id="scroll">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-lg-1">
                        <div class="p-5">
                            <table class="table">
                                <tr>
                                    <th>registerID</th>
                                    <th>userID</th>
                                    <th>Category</th>
                                </tr>
                            <?php
                                while($row = $result->fetch_assoc())
                                {
                                    echo
                                    "<tr>
                                        <td>" . $row["registerID"] . "</td>" .
                                        "<td>" . $row["userID"] . "</td>";

                                    if ($row["category"] == 1)
                                    {
                                        echo "<td>" . $row["category"] . " - 50 meters at a 80-centimeter target</td></tr>";
                                    }
                                    else if ($row["category"] == 2)
                                    {
                                        echo "<td>" . $row["category"] . " - 50 meters at a 122-centimeter target</td></tr>";
                                    }
                                    else if ($row["category"] == 3)
                                    {
                                        echo "<td>" . $row["category"] . " - 70 meters at a 80-centimeter target</td></tr>";
                                    }
                                    else if ($row["category"] == 4)
                                    {
                                        echo "<td>" . $row["category"] . " - 70 meters at a 122-centimeter target</td></tr>";
                                    }
                                }
                            ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- footer start -->
        <?php
            include("assets/footer.html");
        ?>

        <!-- Bootstrap core JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS -->
        <script src="assets/js/scripts.js"></script>
        <script src="assets/js/validation.js"></script>
    </body>
</html>