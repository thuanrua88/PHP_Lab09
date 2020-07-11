<?php
require_once 'connectdb.php';
$conn = new mysqli($hn, $un, $pw, $db);
if($conn -> connect_errno) die("Connect DB error");

echo <<<_END
<form action = "register.php" method = "POST"><pre>
Name            <input type="text" name="name" required><br>
Password        <input type="password" name="password" required><br>
Config password <input type="password" name="cpassword" required><br>
Email           <input type="email" name="email" required><br>
                <button type="submit" value="Login" name="login"><a href="login.php">Login</a></button> <input type="submit" value="Register" name="register">               
</pre></form>
_END;

if (isset($_POST['register']))
{
    $name = $_POST['name'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];
    $email = $_POST['email'];

    if ($pass == $cpass)
    {
        $hash = password_hash($pass,PASSWORD_DEFAULT);
        $query = "select * from user where name = '$name'";
        $result = $conn->query($query);
        $rows = $result->num_rows;
        if ($rows > 0)
        {
            echo $name . ' has exits!';
        } else
            {
            $query = "insert into user values ('','$name','$hash','$email')";
            $result = $conn->query($query);
            if ($result)
            {
                echo 'Register successfull !';
                header('location:login.php');
            }
            else echo 'Register fail !';
            }
    } else echo 'password and config password is not match !';
}

?>