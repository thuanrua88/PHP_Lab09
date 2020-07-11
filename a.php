<?php
session_start();
if (isset($_SESSION['name']))  $username = $_SESSION['name'];

if (isset($_COOKIE['mycookie'])) $username = $_COOKIE['mycookie'];
    echo "Wellcome ".$username;
echo <<<_END
<form action = "login.php" method = "POST"><pre>
                <input type="submit" value="Logout" name="logout"> 
</pre></form>
_END;
if (isset($_POST['logout']))
{
    unset($_SESSION['name']);
    unset($_SESSION['password']);
    setcookie('mycookie','', time()-3600);
    header('localhost:b.php');
}
?>