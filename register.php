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
    <!-- //! input validation is done on input pattern-title -->
    <section id="scroll">
        <div class="bodyform">
            <div class="container px-5">
                <div class="containerForm">
                    <div class="titleReg">Registration</div>
                    <form class="registerUser" action="assets/registerProcess.php" method="POST" onsubmit="return passwordValidation()">
                        <div class="user-details">
                            <div class="input-box">
                                <span class="details">Full Name</span>
                                <input type="text" name="name" placeholder="Enter your full name"
                                required>
                            </div>
                            <div class="input-box">
                                <span class="details">Email</span>
                                <input type="email" name="email" placeholder="Enter your email"
                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                    title="Must contain standard format : johndoe@mail.com"
                                required>
                            </div>
                            <div class="input-box">
                                <span class="details">Password</span>
                                <input type="password" name="password" id="P" placeholder="Enter your Password"
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" 
                                required>
                            </div>
                            <div class="input-box">
                                <span class="details">Confirm Password</span>
                                <input type="password" name="CP" id="CP" placeholder="Confirm your Password" 
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" 
                                required>
                            </div>
                            <div class="input-box">
                                <span class="details">Phone number <span>*(not necessary)</span></span>
                                <input type="text" name="phoneNo" placeholder="Enter your phone no."
                                    pattern="\d{10,11}"
                                    title="Must contain 10/11 characters (Do not include +60)" 
                                >
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/validation.js"></script>
</body>

</html>