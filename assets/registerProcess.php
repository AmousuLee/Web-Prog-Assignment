<script>
    function badUser(){
        alert("Name already exist! Try login to your account.");
        window.location = '../register.php';
    }
</script>

<?php
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phoneNo = $_POST["phoneNo"];

    include("DB_conn.php");

    // ! check if all non-null val is set
    if(isset($name) && isset($email) && isset($password))
    {
        // check in db for existing name
        $sql = "SELECT `name` FROM `user`
                WHERE `name` = '$name';";

        $result = mysqli_query($conn, $sql);

        // if result return 0 , no conflict with existing users
        // ? proceed to insert data
        if ($result->num_rows == 0)
        {
            $sql = "INSERT INTO `user` (`name`, `email`, `password`, `phoneNo`)
                    VALUES ('$name', '$email', '$password', '$phoneNo');";

            mysqli_query($conn, $sql);

            mysqli_close($conn);
            header('Location: ../login.php');
            die();
        }
        // else if result more than 0, conflict with existing users
        // ? return back to register
        else
        {
            mysqli_close($conn);
            echo "<script>badUser()</script>";
            die();
        }
    }
    // ! else one of the value above isnt set
    // ? return back to register
    else
    {
        mysqli_close($conn);
        header('Location: ../register.php');
        die();
    }   
?>
