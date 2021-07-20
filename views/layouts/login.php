<?php

//TODO: do not hardcode, get from database
const login = 'admin';
const password = 'admin';

if (isset($_POST['login']) && isset($_POST['password'])) //when form submitted
{
    if ($_POST['login'] === login && $_POST['password'] === password)
    {
        $_SESSION['login'] = $_POST['login']; //write login to server storage
        header('Location: /'); //redirect to main
    }
    else
    {
        echo "<script>alert('Wrong login or password');</script>";
        echo "<noscript>Wrong login or password</noscript>";
    }
}

?>

<form method="post">
    Login:<br><input name="login"><br>
    Password:<br><input name="password"><br>
    <input type="submit">
</form>