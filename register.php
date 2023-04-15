<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Registration</title>
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
    <link href="assets/css/loginReg.css" rel="stylesheet" />
    <script>
        function passwordValidation(){
            let P = document.getElementById("P").value;
            let CP =document.getElementById("CP").value;

            if(P!=CP){
                alert("Password and Confirm Password not match!");
                return false;
            }else{
                return true;
            }
        }
    </script>
</head>

<body id="page-top">

    <!-- Navbar -->
    <?php
        include("assets/navbar.php");
    ?>

    <!-- Header -->
    <header class="masthead text-center text-white">
        <div class="masthead-content">
            <div class="container px-5">
                <h1 class="masthead-heading mb-0">Registration</h1>
            </div>
        </div>
    </header>

    <!-- registration form -->
    <!-- //! reg. for user ; for now only accept username, password and email -->
    <section id="scroll">
        <div class="bodyform">
            <div class="container px-5">
                <div class="containerForm">
                    <div class="titleReg">Registration</div>
                    <form class="registerUser" action="registerProcess.php" onsubmit="return passwordValidation()">
                        <div class="user-details">
                            <div class="input-box">
                                <label class="details">Email</label>
                                <input type="text" name="email" placeholder="Enter your email" required>
                            </div>
                            <div class="input-box">
                                <label class="details">Password</label>
                                <input type="text" name="password" id="P" placeholder="Enter your Password" required>
                            </div>
                            <div class="input-box">
                                <label class="details">Confirm Password</label>
                                <input type="text" name="CP" id="CP" placeholder="Confirm your Password" required>
                            </div>
                        </div>
                        <div class="button">
                            <input type="submit" value="Register">
                        </div>
                        <div class="button">
                            <a href="login.php">
                                <input type="button" value="Already have account? Sign in here!">
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php
        include("assets/footer.html");
    ?>
    
    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></scrip>
    <!-- Core theme JS -->
    <script src="assets/js/scripts.js"></script>
</body>

</html>