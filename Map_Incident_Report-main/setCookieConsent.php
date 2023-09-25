<?php  

if(!isset($_COOKIE['consent']))
{
    setcookie('consent', true, time() + (60*60*24*90), '/', 'test1234562456756742368.000webhostapp.com');
}

header("Location: ./index.php");
?>