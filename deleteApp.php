<?php
require_once('db/dbhelper.php');
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $sql = 'delete from application where id = '.$id.'';
    $conn->query($sql);
    echo 'Xóa phần mềm thành công';
}
?>