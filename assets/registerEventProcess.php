<script>
    function badUser(){
        alert("Name Doesn't Exist.");
        window.location = '../registerEvent.php';
    }

    function successMsg(){
        alert("You have successfully register for the event!")
    }

    function noCategory(){
        alert("Please select one of the category!")
        window.location = '../registerEvent.php';
    }
</script>

<?php
    session_start();
    $category = $_POST["category"];
    $name = $_SESSION["name"];

    include("DB_conn.php");

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
            echo "<script>successMsg()</script>";
            die();
        }
        // else if result is 0, did not found user
        // ? return back to registerEvent
        else
        {
            $conn->close();
            echo "<script>badUser()</script>";
            die();
        }
    }
    // ! else one of the value above isnt set
    // ? return back to registerEvent
    else
    {
        $conn->close();
        echo "<script>noCategory()</script>";
        die();
    }
?>
