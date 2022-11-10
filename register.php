<?php
require_once('db/dbhelper.php');
require_once('utils/utility.php');
include('layout/header.php');

header('Content-Type: text/html; charset=UTF-8');
if(isset($_POST['register'])){
    include('db/ketnoi.php');
    $username = $_POST['txtUsername'];
    $password = $_POST['txtPassword1'];
    $confirmPass = $_POST['txtPassword2'];
    $name = $_POST['txtName'];
    $query = mysqli_query($conn, "select username, password from account where username = '$username'");
    if($query->num_rows==1){
        $exitsAccount = true;
    }else if($password != $confirmPass){
        $incorrectPass = true;
    }else{
        @$addmember = mysqli_query($conn, "
            INSERT INTO account (
                username,
                password,
                name
            )
            VALUES (
                '$username',
                '$password',
                '$name'
            )
        ");
    }
}
?>

<div class="login">
    <h1>Register</h1>
    <form method="POST">
        <div class="account">
            <input type="text" name="txtUsername" required>
            <span></span>
            <label for="">Username</label>
        </div>
        <div class="account">
            <input type="password" name="txtPassword1" required>
            <span></span>
            <label for="">Password</label>
        </div>
        <div class="account">
            <input type="password" name="txtPassword2" required>
            <span></span>
            <label for="">Confirm password</label>
        </div>
        <div class="account">
            <input type="text" name="txtName" required>
            <span></span>
            <label for="">Fullname</label>
        </div>
        <?php
            if(isset($exitsAccount) && $exitsAccount==true){ 
                echo '<span id="error">Tài khoản đã tồn tại</span>';
            }else if(isset($incorrectPass) && $incorrectPass==true){
                echo '<span id="error">Mật khẩu xác nhận không đúng</span>';
            }else if(isset($addmember) && $addmember==true){
                echo '<span id="error">Đăng ký tài khoản thành công</span>';
            }
        ?>
        <input type="submit" name="register" value="Đăng ký">
        <div class="login_register_link">
            Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a>
        </div>
    </form>
</div>

<?php
include('layout/footer.php');
?>