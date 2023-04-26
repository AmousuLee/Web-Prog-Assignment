<?php
    echo '<script type="text/JavaScript" src="../assets/js/alertmsg.js"></script>';
    $range = $_POST["range"];
    $target = $_POST["target"];
    $date = $_POST["date"];
    $time = $_POST["timeStart"] ." - ". $_POST["timeEnd"];
    $capacity = $_POST["capacity"];

    include("DB_conn.php");

    // ! check if all non-null val is set
    if(isset($range) && isset($target) && isset($date) && isset($time) && isset($capacity))
    {
        // check in db for existing name
        $sql = "SELECT `categoryID` FROM `category`
                WHERE `TargetRg` = '$range'
                AND  `TargetSz` = '$target'
                AND  `Date` = '$date'
                AND  `Time` = '$time'
                AND  `capacity` = '$capacity'";

        $result = mysqli_query($conn, $sql);

        // if result return 0 , no conflict with existing users
        // ? proceed to insert data
        if ($result->num_rows == 0)
        {
            $sql = "INSERT INTO `category`(`TargetRg`, `TargetSz`, `Date`, `Time`, `capacity`)
                    VALUES ('$range', '$target', '$date', '$time','$capacity');";

            mysqli_query($conn, $sql);
            mysqli_close($conn);
            echo "<script>successCategoryAdded()</script>";
            die();
        }
        // else if result more than 0, conflict with existing users
        // ? return back to register
        else
        {
            mysqli_close($conn);
            echo "<script>badCategoryAdded()</script>";
            die();
        }
    }
    // ! else one of the value above isnt set
    // ? return back to register
    else
    {
        mysqli_close($conn);
        echo "<script>badInput()</script>";
        die();
    }   
?>
