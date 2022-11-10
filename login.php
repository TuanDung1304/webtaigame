<?php
include('layout/header.php');
require_once('db/dbhelper.php');

header('Content-Type: text/html; charset=UTF-8');
if(isset($_POST['login'])){
    $username = $_POST['txtUsername'];
    $password = $_POST['txtPassword'];

    if(!preg_match('/^[a-zA-Z0-9_]+$/', $username)){
        $notValidationAccount = true;
    }else{
        $query = mysqli_query($conn, "select username, password from account where username = '$username' and password = '$password'");
        $user = mysqli_fetch_assoc($query);
        if(mysqli_num_rows($query)==0){
            $incorrectPassword = true;
        }else{
            $_SESSION['username'] = $username;
            header('Location: home.php'); 
        }
    }
    

    // -----------statement-----------
    // $stmt = $conn->prepare("select username, password from account where username=?");
    // $stmt->bind_param("s", $username);
    // $stmt->execute();
    // $result = $stmt->get_result();
    // $user = $result->fetch_assoc();
    // if(!$user){
    //     $notExitsAccount = true;
    // }else if($password != $user['password']){
    //     $incorrectPassword = true;
    // }else{
    //     $_SESSION['username'] = $username;
    //     header('Location: home.php'); 
    // }
}
?>

<div class="login">
    <h1>Login</h1>
    <form action="" method="POST">
        <div class="account">
            <input type="text" name="txtUsername" required>
            <span></span>
            <label for="">Username</label>
        </div>
        <div class="account">
            <input type="password" name="txtPassword" required>
            <span></span>
            <label for="">Password</label>
        </div>
        <?php
            if(isset($incorrectPassword) && $incorrectPassword){
                echo '<span id="error">Mật khẩu không đúng</span>';
            }
            else if(isset($notValidationAccount) && $notValidationAccount){
                echo '<span id="error">Tài khoản không hợp lệ</span>';
            }
        ?>
        <input type="submit" name="login" value="Login" id="btn-admin">
        
        <div class="login_register_link">
            Bạn chưa có tài khoản? <a href="register.php">Đăng ký</a>
        </div>
    </form>
</div>

<?php
include('layout/footer.php');
?>