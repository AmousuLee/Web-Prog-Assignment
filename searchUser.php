<?php session_start(); ?>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>User Page</title>
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
        <link href="assets/css/userSearch.css" rel="stylesheet" />
    </head>


    <body>
    <!-- navbar start : for user -->
        <?php
            include("assets/navbar.php");
        ?>
                <header class="masthead text-white" style="margin-bottom: 28vh">
            <div class="masthead-content">
                <div class="container px-5">
                    <h1 class="masthead-heading mb-0">Home Page</h1>
                    <p class="masthead-subheading mb-0">Welcome back, Admin ID : <?php echo $_SESSION['adminID'] ?>.</p>
                </div>
            </div>
        </header>

    <!-- main cont. start -->
    <?php   
        $name = $_POST["name"];

    include("assets/DB_conn.php");

    $sql = "SELECT * FROM `user` WHERE `name` = '$name';";
    $result = mysqli_query($conn, $sql); 
    $row=mysqli_fetch_array($result,MYSQLI_BOTH);

    if($name == $row[1]){

        $password=$row[3];
        $email=$row[2];
        $id = $row[0];
        $phoneNo = $row[4]
    ?>
    <section id="scroll">
        <div class="bodyform">
            <div class="container px-5">
                <div class="containerForm">
                    <div class="title">User Details</div>
                    <form class="loginuser" action="assets/deleteUser.php" method="POST">
                        <div class="user-details">
                        <div class="input-box">
                                <span class="details">User ID:</span>
                                <input type="text" id="name" name="id" value="<?php echo $id ?>"readonly>
                            </div>
                            <div class="input-box">
                                <span class="details">User name:</span>
                                <input type="text" id="name" name="name" value="<?php echo $name ?>"readonly>
                            </div>
                            <div class="input-box">
                                <span class="details">Email:</span>
                                <input type="text" id="name" name="email" value="<?php echo $email ?>"readonly>
                            </div>
                            <div class="input-box">
                                <span class="details">Password:</span>
                                <input type="text" id="name" name="password" value="<?php echo $password ?>"readonly>
                            </div>
                            <div class="input-box">
                                <span class="details">Contact:</span>
                                <input type="text" id="name" name="password" value="<?php echo $phoneNo ?>"readonly>
                            </div>
                        </div>
                        <div class="button">
                            <input type="submit" value="Delete">
                        </div>
                        </div>
                    </form>
                </div>
            </div>  
        </div>
</section>
<?php
    }
    else{
        echo"Username not exist.";
        header('Location: home_admin.php');
        die();
    } ?>

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