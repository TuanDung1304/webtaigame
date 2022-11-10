<!DOCTYPE html>
<html lang="en">

<head>
    <title>WebTaiGame</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <script src="https://kit.fontawesome.com/8d346bbfa2.js" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="style/main.css">
</head>

<body>
    <!-- header -->
    <?php session_start() ?>
    <div id="header">
        <nav class="navbar navbar-expand-sm bg-secondary navbar-dark" style="margin-bottom: 0.5em;">
            <div class="container">
                <ul class="navbar-nav" id="main-menu">
                    <li class="nav-item active">
                        <a class="nav-link" href="http://localhost/WebTaiGame/home.php">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/WebTaiGame/games.php">Game</a>
                        <ul class="sub-menu">
                            <li><a href="http://localhost/WebTaiGame/game-ban-sung.php">Bắn súng</a></li>
                            <li><a href="http://localhost/WebTaiGame/game-chien-thuat.php">Chiến thuật</a></li>
                            <li><a href="http://localhost/WebTaiGame/game-hanh-dong.php">Hành động</a></li>
                            <li><a href="http://localhost/WebTaiGame/game-phieu-luu.php">Phiêu lưu</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/WebTaiGame/apps.php">Phần mềm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/WebTaiGame/about.php">About</a>
                    </li>
                    <?php
                    if (isset($_SESSION['username']) && $_SESSION['username']){
                        if($_SESSION['username']=='admin'){
                            echo'
                            <li class="nav-item">
                                <a class="nav-link" href="http://localhost/WebTaiGame/managerAccounts.php">Chào '.$_SESSION['username'].'</a>
                                <ul class="sub-menu">
                                    <li><a href="http://localhost/WebTaiGame/logout.php">Đăng xuất</a></li>
                                </ul>
                            </li>';
                        }else{
                            echo'
                            <li class="nav-item">
                                <a class="nav-link" href="http://localhost/WebTaiGame/editAccount.php?user='.''.$_SESSION['username'].''.'">Chào '.$_SESSION['username'].'</a>
                                <ul class="sub-menu">
                                    <li><a href="http://localhost/WebTaiGame/logout.php">Đăng xuất</a></li>
                                </ul>
                            </li>';
                        }
                    }else{
                        echo'
                            <li class="nav-item">
                                <a class="nav-link" href="http://localhost/WebTaiGame/login.php">Đăng nhập</a>
                            </li>';
                    }
                    ?>
                </ul>
                <form class="form-inline" action="home.php" method="POST">
                    <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm" aria-label="Search" name="search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </div>