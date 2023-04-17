<script>
    function badUser(){
        alert("Name Doesn't Exist");
    }
</script>
<?php
    session_start();
    $category = $_POST["category"];
    $name = $_SESSION["name"];

    $conn = new mysqli("127.0.0.1", "root", "", "archeryevent") or die("Connection failed : " . $conn->connect_error);

    // ! check if all non-null val is set
    if(isset($category))
    {
        // check in db for existing name
        $sql = "SELECT * FROM `user`
                WHERE `name` = '$name';";

        $result = mysqli_query($conn, $sql);

        // if result more than 0 , found user
        // ? proceed to insert data
        if ($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            $userID = $row["userID"];

            $sql = "INSERT INTO `event` (`userID`, `category`)
                    VALUES ('$userID', '$category');";

            mysqli_query($conn, $sql);
            $conn->close();
            header('Location: ../home_user.php');
            die();
        }
        // else if result is 0, did not found user
        // ? return back to registerEvent
        else
        {
            $conn->close();
            echo "<script>badUser()</script>";
            header('Location: ../registerEvent.php');
            die();
        }
    }
    // ! else one of the value above isnt set
    // ? return back to registerEvent
    else
    {
        header('Location: ../registerEvent.php');
        die();
    }
?>
