<html>
    <body>
    <script>
        function refreshPage(){
            window.location = 'userList.php';
        }
    </script>
       <?php
            include("../assets/DB_conn.php");
        ?>
            <form action="?" method="POST">
                Search User : <input type="text" name="user">
                <input type="submit" value="send">
            </form>
            <button onclick="refreshPage()">Reset</button>

            <table border=1>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Password</td>
                    <td>phoneNo</td>
                    <td>Function</td>
                </tr>
            <?php
                if(isset($_POST["user"])){
                    
                    $user = $_POST["user"];
                    $sql = "SELECT * FROM user WHERE name='$user'";
                }else{
                    $sql = 'SELECT * FROM user'; 
                }

                $query = mysqli_query($conn, $sql);
                if($query->num_rows>0){
                    while($result = mysqli_fetch_array($query,MYSQLI_NUM)){
                        echo "<tr>";
                            echo "<td>$result[0]</td>";
                            echo "<td>$result[1]</td>";
                            echo "<td>$result[2]</td>";
                            echo "<td>$result[3]</td>";
                            echo "<td>$result[4]</td>";
                            echo "<td><a href='deleteUser.php?id=".$result[0]."'>Delete</a></td>";
                        echo "</tr>";
                    }
                }else{
                    echo "0 result";
                }
                
            ?>
            </table>   
    </body>
</html>