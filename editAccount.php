<?php
    require_once('db/dbhelper.php');
    require_once('utils/utility.php');
    include('layout/header.php');
    if(isset($_GET['user'])){
        $username = getGet('user');
        $user = executeResult('select * from account where username = "'.$username.'"', true);
        $password = $user['password'];
        $name = $user['name'];
        $gender = $user['gender'];
    }
    
?>
<div class="managerAccount">
    <div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Edit Account</h2>
			</div>
            <form action="" method="POST">
                <div class="panel-body">
                    <div class="form-group">
                    <label>Username:</label>
                    <input required="true" type="text" class="form-control" name='username' value='<?php echo $username ?>'>
                    </div>
                    <div class="form-group">
                    <label>Password:</label>
                    <input required="true" type="text" class="form-control" name='password' value='<?php echo $password ?>'>
                    </div>
                    <div class="form-group">
                    <label>Họ Tên:</label>
                    <input required="true" type="text" class="form-control" name='name' value='<?php echo $name ?>'>
                    </div>
                    <div class="form-group">
                    <label style="padding-right: 10px;">Giới tính:</label>
                    <input type="radio" checked="checked" name='gender' value="Nam"><span style="padding:0 10px;">Nam</span>
                    <input type="radio"  name='gender' value="Nữ"><span style="padding:0 10px;">Nữ</span>
                    </div>
                    <?php if(isset($_POST['username'])) echo '<span id="error">Chỉnh sửa thành công</span>'; ?>
                    <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Save">
                    </div>
                </div>
            </form>
		</div>
	</div>
</div>
<?php
    if(isset($_POST['username'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        @$editAccount = $conn->query("
        UPDATE ACCOUNT
        SET username = '$username', password = '$password', name = '$name', gender = '$gender'
        WHERE username = '$username'
        ");
    }
?>
<?php
include('layout/footer.php')
?>