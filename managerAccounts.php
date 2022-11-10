<?php
require_once('db/dbhelper.php');
require_once('utils/utility.php');
include('layout/header.php');
include('notAdmin.php');
#phan trang
$item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:10;
$current_page = !empty($_GET['page'])?$_GET['page']:1;
$offset = ($current_page-1)*$item_per_page;
$total_records = mysqli_query($conn, 'select * from application')->num_rows;
$total_pages = ceil($total_records/$item_per_page);
?>
    <div class="manager">
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading" id="btn-admin">
                    <a href="" class="btn btn-success btn-sm" id="btn-admim">
                        Quản lý account
                    </a>
                    <a href="managerApps.php" class="btn btn-primary btn-sm" id="btn-admim">
                        Quản lý phần mềm
                    </a>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="20px">STT</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th width="30%">Họ tên</th>
                                <th width="100px">Giới tính</th>
                                <th width="60px"></th>
                                <th width="60px"></th>
                            </tr>
                        </thead>
                        <tbody>
    <?php
        $sql = 'select * from account';
        $accounts = executeResult($sql);
        $index=1;
        foreach($accounts as $acc){
            echo '<tr>
                <td>'.$index++.'</td>
                <td>'.$acc['username'].'</td>
                <td>'.$acc['password'].'</td>
                <td>'.$acc['name'].'</td>
                <td>'.$acc['gender'].'</td>
                <td><button class="btn btn-warning" onclick=\'window.open("editAccount.php?user='.$acc['username'].'","_self")\'>Edit</button></td>
                <td><button class="btn btn-danger" onclick="deleteAccount(\''.$acc['username'].'\')">Delete</button></td>
            </tr>';
        }
    ?>
                            
                        </tbody>
                    </table>
                    <button id="addAccount" class="btn btn-success" onclick="window.open('addAccount.php', '_self')">Add Account</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function deleteAccount(username){
            $.post('deleteAccount.php', {
                'username': username
            }, function(data){
                alert(data);
                location.reload();
            });
        }
    </script>
<?php
include('layout/footer.php')
?>