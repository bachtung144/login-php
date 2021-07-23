<?php
class LoginModel{
    protected $table = 'users';

    public function handleLogin(){
        global $conn;
        $user_name=$_POST['username'];
        $password=($_POST['password']);
        $sql = "SELECT * FROM user WHERE username=? AND password=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $user_name, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        if ($result->num_rows > 0) {
            return true;
        }
        return false;
    }
}
