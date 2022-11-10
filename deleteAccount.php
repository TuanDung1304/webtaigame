<?php
require_once('db/dbhelper.php');
if(isset($_POST['username'])){
    $username = $_POST['username'];
    $sql = 'delete from account where username = "'.$username.'"';
    $conn->query($sql);
    echo 'Xóa tài khoản thành công';
}
?>