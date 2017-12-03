<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Drawing rooms</title>
    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="bootstrap-3.3.7-dist/css/metisMenu.min.css" rel="stylesheet">
    <link href="bootstrap-3.3.7-dist/css/morris.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse">
                <i class="ti-menu"></i>
            </a>
            <div class="top-left-part">
                <a class="logo" href="UserExit.php">
                    <i class="glyphicon glyphicon-fire"></i>&nbsp;
                    <span class="hidden-xs">Drawing Rooms</span>
                </a></div>
            <ul class="nav navbar-top-links navbar-left hidden-xs">
                <li>
                    <a href="javascript:void(0)" class="open-close hidden-xs hidden-lg waves-effect waves-light">
                        <i class="ti-arrow-circle-left ti-menu"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-top-links navbar-right pull-right">
                <li>
                    <?php
                    include 'Authorize.php';
                    $d = new Authorize();
                    $d->print_user();
                    ?>
                </li>
                <li>
                    <a href="UserExit.php" class="btn btn-default btn-lg">
                        <span class="glyphicon glyphicon-log-out"></span> Log out
                    </a>
                </li>

            </ul>
        </div>
    </nav>
    <div class="navbar-default sidebar nicescroll" role="navigation">
        <div class="sidebar-nav navbar-collapse ">
            <ul class="nav" id="side-menu">
                <li class="in">
                    <form id="create_form" role="search" class="app-search hidden-xs" method="post" hidden>
                        <input type="text" class="form-control" id="room_name" name="room_name" placeholder="Room name">
                    </form>

                    <?php include 'Create_new_file.php'?>

                    <a href="js" id="add_room" class="waves-effect" style="color: green"><span class="glyphicon glyphicon-plus"></span> Add new room</a>
                </li>
                <?php
                include 'Generate_list_rooms.php';
                new Generate_list_rooms();
                ?>
            </ul>
        </div>
    </div>
    <div id="page-wrapper">
        <div class="nav navbar-top-links" style="padding-top: 5px; padding-left: 5px">
            <button class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-log-out"></span>
            </button>

        </div>
        <div class="container-fluid" style="padding-top: 10px;height: 95%;width: 100%;position: absolute;">
            <iframe ID="field_draw" src="canvas.php" width="100%" height="100%" align="left">
                It not work
            </iframe>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="bower_components/raphael/raphael-min.js"></script>
<script src="js/waves.js"></script>
<script src="js/myadmin.js"></script>
<script src="js/rooms.js"></script>
</body>

</html>