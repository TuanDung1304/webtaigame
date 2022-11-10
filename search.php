<?php
session_start();
if(isset($_POST['search'])){
    $text = $_POST['search'];
    echo $text;
}
?>
<?php
include('layout/header.php');
require_once('db/dbhelper.php');
#phan trang
$item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:12;
$current_page = !empty($_GET['page'])?$_GET['page']:1;
$offset = ($current_page-1)*$item_per_page;
$total_records = mysqli_query($conn, 'select * from application')->num_rows;
$total_pages = ceil($total_records/$item_per_page);
#query
$apps = executeResult('select * from application limit '.$item_per_page.' offset '.$offset.'');
?>
<!-- wrapper -->
<div class="container" style="margin-top: 1em;">
    <div class="row">
        <?php
        foreach ($apps as $item) {
            echo '
                <div class="col-md-4 col-6">
                    <a href="detail.php?id=' . $item['id'] . '">
                        <img src = "' . $item['thumbnail'] . '" style="width: 100%; border-radius: 8px;" title="Views: '.$item['views'].'">
                        <p class="underline-hover-effect" id="title">
                        <span>' . $item['title'] . '</span>
                        </p>
                    </a>
                </div>'
            ;
        }
        ?>
    </div>
</div>
<?php include 'pagination.php' ?>
<?php
include('layout/footer.php');
?>