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
    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-3.3.7-dist/css/metisMenu.min.css" rel="stylesheet">
    <link href="bootstrap-3.3.7-dist/css/morris.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href='spectrum/spectrum.css' rel='stylesheet'>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
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
            <ul id="title_room_panel" class="nav navbar-top-links navbar-left pull-left" hidden>
                <li>
                    <a href="">
                        <i class="ti-layout fa-fw"></i>&nbsp;
                        <b><span id="title_room"></span></b>
                    </a>
                </li>
                <li>
                    <a id="delete_room_btn" href="js" class="btn btn-default btn-lg">
                        <span class="glyphicon glyphicon-trash"></span>
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
                    <form id="create_form" role="search" class="app-search hidden-xs" hidden>
                        <input type="text" class="form-control" id="room_name" name="room_name" placeholder="Room name">
                    </form>
                    <a href="js" id="add_room" class="waves-effect" style="color: green"><span class="glyphicon glyphicon-plus"></span> Add new room</a>
                </li>
                <?php
                include 'GenerateListRooms.php';
                new GenerateListRooms();
                ?>
            </ul>
        </div>
    </div>
    <div id="page-wrapper">
        <div id="toolbar_paint" class="nav navbar-top-links">
            <button class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-pencil"></span>
            </button>
            <input type='text' id="custom" />

            <div id="spinner_tool">
                <div class="input-group number-spinner">
				<span class="input-group-btn">
					<button class="btn btn-default btn-lg" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span>
                    </button>
				</span>
                    <input type="text" class="form-control text-center" value="5" style="height: 42px; border-color: #cccccc">
                    <span class="input-group-btn">
					<button class="btn btn-default btn-lg" data-dir="up"><span class="glyphicon glyphicon-plus"></span>
                    </button>
				</span>
                </div>
            </div>



        </div>
        <div class="container-fluid" style="padding-top: 10px;height: 93%;width: 100%;position: absolute;">
            <iframe ID="field_draw" src="Canvas.php" width="100%" height="100%" align="left">
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
<script src='spectrum/spectrum.js'></script>
</body>
</html>