<!DOCTYPE html>
<html>
    <body>
        <?php
      //  include("db.php");
        $email="Nhuy@gmail.com";
        if(isset($_POST["curpass"])){
            $cur = $_POST["curpass"];
            $new = $_POST["newpass"];
            $conf = $_POST["conpass"];

            if($new <> $conf)
            {
                echo "<h4 style ='color:red'> Mat khau moi va mat khau moi duoc nhap lai khong trung khop</h4>";
            }
            else{
                $sql="select * from customers where email = '$email' and password = '$cur'";
                $result=$conn->query($sql);
                
                if(mysqli_num_rows($result)>0){
                    $sql ="update customers set password='$new' where email ='$email' and password = '$cur'";
                    if($conn->query($sql))
                    {
                        echo "<h4 style ='color:green'> Mat khau da duoc doi</h4>";
                    }
                    else
                    {
                        echo "<h4 style ='color:red'> Mat khau hien tai khong hop le</h4>";
                    }
                }
                else
                {
                    echo "<h4 style ='color:red'> Mat khau hien tai khong hop le</h4>";
                }
            }
        }
        ?>
        <form action="" method="post">
            Mat khau cu <input type="password" name = "curpass"><br>
            Mat khau moi <input type="password" id="newpass" name ="newpass"><br>
            Nhap lai mat khau moi <input type="password" name="conpass" id="conpass"><br>

            <input type="submit" value="Change">
        </form>
    </body>
    
    
</html>