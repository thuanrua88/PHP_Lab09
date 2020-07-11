<?php
session_start();
require_once 'connectdb.php';
$conn = new mysqli($hn, $un, $pw, $db);
if($conn -> connect_errno) die("Connect DB error");
echo <<<_END
<form action = "login.php" method = "POST"><pre>
Name            <input type="text" name="name"><br>
Password        <input type="password" name="password"><br>
                <input type="submit" value="Login" name="login"> 
                <input type="checkbox" value="1" name="rmm"><label for="">Remember Me</label>
</pre></form>
_END;
if (isset($_POST['login']))
{
    $name = $_POST['name'];
    $password = $_POST['password'];


    $query = "select * from user where name = '$name'";
    $result = $conn -> query($query);
    if ($result->num_rows)
    {
        $row = $result->fetch_array(MYSQLI_NUM);
        $result->close();
        if (password_verify($password,$row[2]))
        {
            $_SESSION['name'] = $name;
            $_SESSION['password'] = $hash;
       if (isset($_POST['rmm']) && $_POST['rmm'] == '1')
       {
            setcookie('mycookie',$name.' '.$password,time()+3600);
       }
       header("location: a.php");
        } else echo "Login fail !";
    }
}
?>

