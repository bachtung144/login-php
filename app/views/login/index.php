<?php
if (!isset($_COOKIE['user']) && !isset($_SESSION['login'])){
?>
<html>
<head>
    <title>Trang đăng nhập</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="app/public/css/login.css">
</head>
<body>
<form method="POST" action="login/run">
<div class="container">
    <h2 class="form-title">Login</h2>
    <p class="error">
    <?php 
        if(isset($_SESSION['loginMessage'])){
            echo $_SESSION['loginMessage'];
            unset($_SESSION['loginMessage']);
        }
    ?>
    </p>
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <button type="submit">Login</button>
    <label>
      <input type="checkbox" name="remember" value="1"> Remember me
    </label>
  </div>
</form>
</body>
</html>
<?php
}else{
    header("location:/home");
}
?>

