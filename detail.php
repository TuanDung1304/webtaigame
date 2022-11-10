<?php
require_once('db/dbhelper.php');
require_once('utils/utility.php');
include('layout/header.php');

$id = getGet('id');
$app = executeResult('select * from application where id =' . $id, true);
$listTheLoai = explode(",", $app['theLoai']);
$listLinkDownload = explode(',', $app['linkdownload']);
$listLinkImage = explode(',', $app['linkImage']);
function getTheLoai($theloai)
{
    switch (trim($theloai)) {
        case 'Hành động':
            return 'game-hanh-dong';
        case 'Phiêu lưu':
            return 'game-phieu-luu';
        case 'Chiến thuật':
            return 'game-chien-thuat';
        case 'Bắn súng':
            return 'game-ban-sung';
        case 'Phần mềm':
            return 'apps';
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-5">
            <img id="detail_thumb" src="<?= $app['thumbnail'] ?>" style="width: 100%;">
        </div>
        <!-- Title -->
        <div class="col-md-7">
            <h2 id="detail-title"><?= $app['title'] ?></h2>
            <div class="row game-attrs">
                <div class="col-xs-4 col-md-3 text-muted small" style="margin-bottom: 1em;">Thể loại:</div>
                <div class="col-xs-8 col-md-9">
                    <?php
                    for ($i = 0; $i < count($listTheLoai) - 1; $i++) {
                        echo '<a href="' . getTheLoai($listTheLoai[$i]) . '.php" class="item">' . $listTheLoai[$i] . ',' . '</a>';
                    }
                    echo '<a href="' . getTheLoai($listTheLoai[$i]) . '.php" class="item">' . $listTheLoai[count($listTheLoai) - 1] . '</a>';
                    ?>
                </div>
                <div class="col-xs-4 col-md-3 text-muted small" style="margin-bottom: 1em;">Nhà sản xuất:</div>
                <div class="col-xs-8 col-md-9">
                    <span class="item">
                        <?= $app['NSX'] ?>
                    </span>
                </div>

                <div class="col-xs-4 col-md-3 text-muted small" style="margin-bottom: 1em;">Năm phát hành:</div>
                <div class="col-xs-8 col-md-9"><span class="item"><?= $app['ngayPhatHanh'] ?> </span></div>

                <div class="col-xs-4 col-md-3 text-muted small">Lượt xem:</div>
                <div class="col-xs-8 col-md-9"><span class="item"><?= $app['views'] ?> <i class="fa fa-eye" style="color: white;"></i> </span></div>
            </div>
        </div>
        <!-- Download -->
        <div class="col-md-12" id="download">
            <p>
            <h4>Link tải <?= $app['title'] ?></h4>
            </p>
            <p>
            <h6 style="color: orange;">Dung lượng: <?= $app['size'] ?></h6>
            </p>
            <?php
            if( isset($_SESSION['username']) && $_SESSION['username']){
                
                if (count($listLinkDownload) == 1) {
                    echo '<p><a target="_blank" href="' . $app['linkdownload'] . '">' . $app['title'] . '.rar' . '</a></p>';
                } else {
                    for ($i = 0; $i < count($listLinkDownload); $i++) {
                        echo '<p><a target="_blank" href="' . $listLinkDownload[$i] . '">' . $app['title'] . '.part' . ($i + 1) . '.rar' . '</a></p>';
                    }
                }
            }else{
                echo '<h6 style="color: orange;">Để tải game vui lòng <a href="login.php"><span  id="log-to-down">Đăng nhập</span></a></h6>';
            }
            ?>
        </div>

        <!-- SLIDER SHOW -->
        <div id="detail-content">
            <style>
                <?php
                $p = 0;
                for ($i = 1; $i <= count($listLinkImage); $i++) {
                    echo '
                    #radio' . $i . ':checked ~ .first{
                        margin-left: ' . $p . '%;
                    }
                    ';
                    $p -= 20;
                }
                for ($i = 1; $i <= count($listLinkImage); $i++) {
                    echo '
                    #radio' . $i . ':checked ~ .navigation-auto .auto-btn' . $i . '{
                        background: #40D3DC;
                    }
                    ';
                }
                ?>
            </style>

            <div class="slider">
                <div class="slides">
                    <?php
                    for ($i = 1; $i < count($listLinkImage); $i++) {
                        echo '<input type="radio" name="radio-btn" id="radio' . ($i) . '">';
                    }
                    echo '<div class="slide first">
                            <img src="' . $listLinkImage[1] . '" alt="">
                            </div>';
                    for ($i = 2; $i < count($listLinkImage); $i++) {
                        echo '<div class="slide">
                            <img src="' . $listLinkImage[$i] . '" alt="">
                            </div>';
                    }
                    ?>

                    <div class="navigation-auto">
                        <?php
                        for ($i = 1; $i < count($listLinkImage); $i++) {
                            echo '<div class="auto-btn' . ($i) . '"></div>';
                        }
                        ?>
                    </div>
                </div>

                <div class="navigation-manual">
                    <?php
                    for ($i = 1; $i < count($listLinkImage); $i++) {
                        echo '<label for="radio' . ($i) . '" class="manual-btn"></label>';
                    }
                    ?>
                </div>
            </div>
            <?php
                if($listTheLoai[0]!="Phần mềm")   echo '<div style="margin: 30px 170px 0 170px;">
                            <iframe src="'.$listLinkImage[0].'"></iframe>
                        </div>';
            ?>
            <!-- <script type="text/javascript">
                var counter = 1;
                setInterval(function() {
                    document.getElementById('radio' + counter).checked = true;
                    counter++;
                    if (counter > <?= count($listLinkImage) ?>) {
                        counter = 1;
                    }
                }, 5000);
            </script> -->

            <div class="col-md-12" style="color: white; margin-bottom: 30px;">
                <p>
                    <h3 style="text-align: center;">Nội dung</h3>
                </p>
                <div id="content-text">
                    <p><?= $app['content'] ?></p>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php
include('layout/footer.php');
?>