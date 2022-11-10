<?php
    require_once('db/dbhelper.php');
    require_once('utils/utility.php');
    include('layout/header.php');
    $existAccount = false;
    $addSuccessfully = false;
    if(isset($_POST['username'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $gender = $_POST['gender']; 
        $query = $conn->query("select username, password from account where username = '$username'");
        if($query->num_rows>0){
            $existAccount = true;
        }else{
            @$addAccount = mysqli_query($conn, "
                INSERT INTO account (
                    username,
                    password,
                    name,
                    gender
                )
                VALUES (
                    '$username',
                    '$password',
                    '$name',
                    '$gender'
                )
            ");
            $addSuccessfully = true;
        }
    }
?>
<div class="managerAccount">
    <div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Add Account</h2>
			</div>
            <form action="" method="POST">
                <div class="panel-body">
                    <div class="form-group">
                    <label>Username:</label>
                    <input required="true" type="text" class="form-control" name='username'>
                    </div>
                    <div class="form-group">
                    <label>Password:</label>
                    <input required="true" type="text" class="form-control" name='password'>
                    </div>
                    <div class="form-group">
                    <label>Name:</label>
                    <input required="true" type="text" class="form-control" name='name'>
                    </div>
                    <div class="form-group">
                    <label style="padding-right: 10px;">Giới tính:</label>
                    <input type="radio" checked="checked" name='gender' value="Nam"><span style="padding:0 10px;">Nam</span>
                    <input type="radio"  name='gender' value="Nữ"><span style="padding:0 10px;">Nữ</span>
                    </div>
                    <?php 
                        if($addSuccessfully) echo '<span id="error">Thêm tài khoản thành công</span>';
                        else if($existAccount) echo '<span id="error">Tài khoản đã tồn tại</span>'; 
                    ?>
                    <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Add">
                    </div>
                </div>
            </form>
		</div>
	</div>
</div>
<?php
include('layout/footer.php')
?>