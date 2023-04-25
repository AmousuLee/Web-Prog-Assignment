<?php
    if(!isset($_SESSION["login"]))
    {
        session_start();
    }
    //$_SESSION['username']='test';
    //unset($_SESSION['username']);
    $current_site = $_SERVER['SCRIPT_NAME'];
?>

<html>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">   
        <div class="container px-5">
            <a class="navbar-brand" href="index.php#page-top">Archery Tournament</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <?php
                        //echo "<script>alert(\"" . $current_site . "\");</script>";
                        // if logged in as admin
                        if(isset($_SESSION['adminID']) && $_SESSION['login'] == "admin")
                        {
                            echo '<li class="nav-item"><a class="nav-link" href="home_admin.php">Tools</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="assets/logout.php">Logout</a></li>';    
                        }
                        // if logged in as user AND at registerEvent page
                        else if (isset($_SESSION['login'])
                            && preg_match("/registerEvent/i", $current_site) == 1
                            || preg_match("/profile_user/i", $current_site) == 1)
                        {
                            
                            echo '<li class="nav-item"><a class="nav-link" href="assets/logout.php">Logout</a></li>';
                        }
                        // if logged in as user
                        else if (isset($_SESSION['login']))
                        {
                            echo '<li class="nav-item"><a class="nav-link" href="registerEvent.php">Register</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="./profile_user.php">Profile</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="assets/logout.php">Logout</a></li>';
                        }
                        // else sess. var not init : not logged in
                        else
                        {
                            echo '<li class="nav-item"><a class="nav-link" href="register.php">Sign Up</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="login.php">Log In</a></li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</html>