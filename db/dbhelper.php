<?php
require_once('config.php');
$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

function executeResult($sql, $onlyOne = false){
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($conn, 'utf8');
    $result = mysqli_query($conn, $sql);
    if($onlyOne){
        $data = mysqli_fetch_assoc($result);
    }else{
        $data = [];
        while(($row = mysqli_fetch_assoc($result))!=null){
            $data[] = $row;
        }
    }
    mysqli_close($conn);
    return $data;
}