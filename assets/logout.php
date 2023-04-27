<?php
    echo "<script src='../assets/js/alertmsg.js'></script>";
    session_start();
    session_destroy();
    echo "<script>logout()</script>";
?>

