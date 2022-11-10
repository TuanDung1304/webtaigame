<?php
$item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:12;
$current_page = !empty($_GET['page'])?$_GET['page']:1;
$offset = ($current_page-1)*$item_per_page;
$total_records = mysqli_query($conn, 'select * from application')->num_rows;
$total_pages = ceil($total_records/$item_per_page);
?>