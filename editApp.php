<?php
    require_once('db/dbhelper.php');
    require_once('utils/utility.php');
    include('layout/header.php');
    if(isset($_GET['id'])){
        $id = getGet('id');
        $app = executeResult('select * from application where id ='.$id, true);
        $title = $app['title'];
        $thumbnail = $app['thumbnail'];
        $content = $app['content'];
        $linkImage = $app['linkImage'];
        $phanMem = $app['phanMem'];
        $theLoai = $app['theLoai'];
        $linkdownload = $app['linkdownload'];
        $size = $app['size'];
        $NSX = $app['NSX'];
        $ngayPhatHanh = $app['ngayPhatHanh'];       
    }
?>
<div class="managerAccount">
    <div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Add Application</h2>
			</div>
            <form action="" method="POST">
                <div class="panel-body">
                    <div class="form-group">
                    <label>Title:</label>
                    <input required="true" type="text" class="form-control" name='title' value='<?php echo $title ?>'>
                    </div>
                    <div class="form-group">
                    <label>Thumbnail:</label>
                    <input required="true" type="text" class="form-control" name='thumbnail' value='<?php echo $thumbnail ?>'>
                    </div>
                    <div class="form-group">
                    <label>Content:</label>
                    <input required="true" type="text" class="form-control" name='content' value='<?php echo $content ?>'>
                    </div>
                    <div class="form-group">
                    <label>Link Image:</label>
                    <input required="true" type="text" class="form-control" name='linkImage' value='<?php echo $linkImage ?>'>
                    </div>
                    <div class="form-group">
                    <label style="padding-right: 10px;">Phần mềm:</label>
                    <input type="radio" checked="checked" name='phanMem' value="game"><span style="padding:0 10px;">Game</span>
                    <input type="radio"  name='phanMem' value="app"><span style="padding:0 10px;">Ứng dụng</span>
                    </div>
                    <div class="form-group">
                    <label>Thể loại:</label>
                    <input required="true" type="text" class="form-control" name='theLoai' value='<?php echo $theLoai ?>'>
                    </div>
                    <div class="form-group">
                    <label>Link download:</label>
                    <input required="true" type="text" class="form-control" name='linkdownload' value='<?php echo $linkdownload ?>'>
                    </div>
                    <div class="form-group">
                    <label>Dung lượng:</label>
                    <input required="true" type="text" class="form-control" name='size' value='<?php echo $size ?>'>
                    </div>
                    <div class="form-group">
                    <label >Nhà sản xuất:</label>
                    <input required="true" type="text" class="form-control" name='NSX' value='<?php echo $NSX ?>'>
                    </div>
                    <div class="form-group">
                    <label>Ngày phát hành:</label>
                    <input required="true" type="text" class="form-control" name='ngayPhatHanh' value='<?php echo $ngayPhatHanh ?>'>
                    </div>
                    <?php if(isset($_POST['title'])) echo '<span id="error">Chỉnh sửa thành công</span>'; ?>
                    <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Save">
                    </div>
                </div>
            </form>
		</div>
	</div>
</div>
<?php
    if(isset($_POST['title'])){
        $title = $_POST['title'];
        $thumbnail = $_POST['thumbnail'];
        $content = $_POST['content'];
        $linkImage = $_POST['linkImage'];
        $phanMem = $_POST['phanMem'];
        $theLoai = $_POST['theLoai'];
        $linkdownload = $_POST['linkdownload'];
        $size = $_POST['size'];
        $NSX = $_POST['NSX'];
        $ngayPhatHanh = $_POST['ngayPhatHanh'];
        @$editApplication = $conn->query("
            UPDATE APPLICATION
            SET title = '$title', thumbnail = '$thumbnail', content = '$content', linkImage = '$linkImage', phanMem = '$phanMem', theLoai = '$theLoai', linkdownload = '$linkdownload', size = '$linkImage',NSX = '$NSX', ngayPhatHanh = '$ngayPhatHanh'
            WHERE id = $id
        ");
    }
?>