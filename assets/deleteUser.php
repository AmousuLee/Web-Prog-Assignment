
<html>
    <head>
        <script>
            function success(){
                alert("User Successfully Removed!");
                window.location = './home_admin.php';
            }
            function fail(){
                alert("Remove Failed!");
                window.location = './home_admin.php';
            }
        </script>
    </head>


    <?php
        include("navbar.php");

        $name = $_POST["name"];

        include("DB_conn.php");
        $sql = "DELETE FROM `user` WHERE `name` = '$name';";
        $result = mysqli_query($conn, $sql); 
        if($result){
            mysqli_close($conn);
            echo"<script>success()</script>";
        }else{
            mysqli_close($conn);
            echo"<script>fail()</script>";
        }
    ?>

      
    </body>
</html>