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
                    <a href="managerAccounts.php" class="btn btn-primary btn-sm" >
                        Quản lý account
                    </a>
                    <a href="" class="btn btn-success btn-sm">
                        Quản lý phần mềm
                    </a>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="20px">STT</th>
                                <th>Title</th>
                                <th>Thể loại</th>
                                <th width="60px"></th>
                                <th width="60px"></th>
                            </tr>
                        </thead>
                        <tbody>
    <?php
        $sql = 'select * from application limit '.$item_per_page.' offset '.$offset.'';
        $apps = executeResult($sql);
        $index=1 + ($current_page-1)*10;
        foreach($apps as $app){
            echo '<tr>
                <td>'.$index++.'</td>
                <td>'.$app['title'].'</td>
                <td>'.$app['phanMem'].'</td>
                <td><button class="btn btn-warning"  onclick=\'window.open("editApp.php?id='.$app['id'].'","_self")\'>Edit</button></td>
                <td><button class="btn btn-danger" onclick="deleteApp('.$app['id'].')">Delete</button></td>
            </tr>';
        }
    ?>
                            
                        </tbody>
                    </table>
                    <button id="addAccount" class="btn btn-success" onclick="window.open('addApplication.php', '_self')">Add Application</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function deleteApp(id){
            console.log(id);
            $.post('deleteApp.php', {
                'id': id
            }, function(data){
                alert(data);
                location.reload();
            });
        }
    </script>
<?php
include 'pagination.php';
include('layout/footer.php')
?>