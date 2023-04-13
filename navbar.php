<?php
    session_start();
    //$_SESSION['username']='test';
    //unset($_SESSION['username']);
?>

<html>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">   
        <div class="container px-5">
            <a class="navbar-brand" href="#page-top">Archery Tournament</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <?php
                        // if logged in as admin
                        if(isset($_SESSION['username']) == "admin")
                        {
                            echo '<li class="nav-item"><a class="nav-link" href="#!">Record</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="#!">Logout</a></li>';
                        }
                        // if logged in as user
                        else if (isset($_SESSION['username']))
                        {
                            echo '<li class="nav-item"><a class="nav-link" href="#!">Register</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="#!">Profile</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="#!">Logout</a></li>';
                        }
                        // else sess. var not init : not logged in
                        else
                        {
                            echo '<li class="nav-item"><a class="nav-link" href="#!">Sign Up</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="#!">Log In</a></li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</html>