<?php

    $id = $_GET['id'];

    include("../assets/DB_conn.php");

    // sql to delete a record
    $sql = "DELETE FROM user WHERE UID = $id"; 
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        mysqli_close($conn);
        header('Location: userList.php'); 
        exit;
    } else {
        echo "Error deleting record";
    }

?>