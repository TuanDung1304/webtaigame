<?php
    require_once('db/dbhelper.php');
    require_once('utils/utility.php');
    include('layout/header.php');
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
                    <input required="true" type="text" class="form-control" name='title'>
                    </div>
                    <div class="form-group">
                    <label>Thumbnail:</label>
                    <input required="true" type="text" class="form-control" name='thumbnail'>
                    </div>
                    <div class="form-group">
                    <label>Content:</label>
                    <input required="true" type="text" class="form-control" name='content'>
                    </div>
                    <div class="form-group">
                    <label>Link Image:</label>
                    <input required="true" type="text" class="form-control" name='linkImage'>
                    </div>
                    <div class="form-group">
                    <label style="padding-right: 10px;">Phần mềm:</label>
                    <input type="radio" checked="checked" name='phanMem' value="game"><span style="padding:0 10px;">Game</span>
                    <input type="radio"  name='phanMem' value="app"><span style="padding:0 10px;">Ứng dụng</span>
                    </div>
                    <div class="form-group">
                    <label>Thể loại:</label>
                    <input required="true" type="text" class="form-control" name='theLoai'>
                    </div>
                    <div class="form-group">
                    <label>Link download:</label>
                    <input required="true" type="text" class="form-control" name='linkdownload'>
                    </div>
                    <label>Dung lượng:</label>
                    <input required="true" type="text" class="form-control" name='size'>
                    </div>
                    <div class="form-group">
                    <label >Nhà sản xuất:</label>
                    <input required="true" type="text" class="form-control" name='NSX'>
                    </div>
                    <div class="form-group">
                    <label>Ngày phát hành:</label>
                    <input required="true" type="text" class="form-control" name='ngayPhatHanh'>
                    </div>
                    <?php if(isset($_POST['title'])) echo '<span id="error">Thêm phần mềm thành công</span>'; ?>
                    <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Add">
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
        @$addApplication = mysqli_query($conn, "
        INSERT INTO application (
            id,
            title,
            thumbnail,
            content,
            linkImage,
            phanMem,
            theLoai,
            views,
            linkdownload,
            size,
            NSX,
            ngayPhatHanh
        )
        VALUES (
            '',
            '$title',
            '$thumbnail',
            '$content',
            '$linkImage',
            '$phanMem',
            '$theLoai',
            0,
            '$linkdownload',
            '$size',
            '$NSX',
            '$ngayPhatHanh'
        )
     ");
    }
?>