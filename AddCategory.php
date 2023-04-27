<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Event Registration</title>
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="./assets/css/styles.css" rel="stylesheet" />
    <link href="./assets/css/loginReg.css" rel="stylesheet" />
</head>

<body id="page-top">

    <!-- Navbar -->
    <?php
        include ("./assets/navbar.php");
        include("./assets/DB_conn.php");
    ?>

    <!-- Header -->
    <header class="masthead text-center text-white">
        <div class="masthead-content">
            <div class="container px-5">
                <h1 class="masthead-heading mb-0">Add Category</h1>
            </div>
        </div>
    </header>
    <!--Event Detail-->
    <section>
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                    <div class="p-5">
                        <h2 class="display-4">Category Currently</h2>
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Range</th>
                                <th scope="col">Target Size</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Capacity</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sql = "SELECT * FROM category";
                                $query = mysqli_query($conn,$sql);
                                $i = 0;
                                while($result = mysqli_fetch_array($query,MYSQLI_NUM)){
                                    $sql2 = "SELECT * FROM event WHERE categoryID = $result[0]";
                                    $left_result = mysqli_query($conn,$sql2);
                                    $left = $result[5]-mysqli_num_rows($left_result);
                                    echo "<tr>";
                                        echo "<th scope='row'>".++$i."</th>";
                                        echo "<td>$result[1] meter</td>";
                                        echo "<td>$result[2] centimeter</td>";
                                        echo "<td>$result[3]</td>";
                                        echo "<td>$result[4]</td>";
                                        echo "<td>"."$left/$result[5]"."</td>";
                                    echo "</tr>";
                                }
                            ?>
                            </tbody>
                          </table>
                    </div>
            </div>
        </div>
    </section>
    <!-- Event registration form -->
    <!-- //! input validation is done on input pattern-title -->
    <section id="scroll">
        <div class="bodyform">
            <div class="container px-5">
                <div class="containerForm">
                    <div class="title">Category Details</div>
                    <form class="loginuser" action="./assets/addCategoryProcess.php" method="POST">
                        <div class="user-details">
                        <div class="input-box">
                                <span class="details">Range:</span>
                                <input type="text" name="range" placeholder="in meter" size="3" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Target Size:</span>
                                <input type="text" name="target" placeholder="in centimeter" size="3"required>
                            </div>
                            <div class="input-box">
                                <span class="details">Date:</span>
                                <input type="date"  name="date" required>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-box">
                                        <span class="details">Time Start:</span>
                                        <input type="text"  name="timeStart" placeholder="12:00 A.M." pattern="(1[012]|0?[1-9]):[0-5][0] (A.M.|P.M.)"
                                        title="Format : HH:mm A.M./P.M." required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-box">
                                        <span class="details">Time End:</span>
                                        <input type="text"  name="timeEnd" placeholder="12:00 A.M." pattern="(1[012]|0?[1-9]):[0-5][0] (A.M.|P.M.)"
                                        title="Format : HH:mm A.M./P.M." required>
                                    </div>
                                </div>
                            </div>
                            <div class="input-box">
                                <span class="details">Capacity:</span>
                                <input type="text"  name="capacity" size="2" required>
                            </div>
                        </div>
                        <div class="button">
                            <input type="submit" value="Add Category">
                        </div>
                        <div class="button red">
                            <input type="button" value="Go back!" onclick="history.back()" style="background-color: red;">
                        </div>
                        </div>
                    </form>
                </div>
            </div>  
        </div>
</section>

    <!-- Footer -->
    <?php
        include("./assets/footer.html");
    ?>
    
    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS -->
    <script src="./assets/js/scripts.js"></script>

</body>

</html>