<?php $session_id = Session::get_session_id(); ?>
<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <title>Golia CMS - Panel administracyjny</title>
    <base href="https://<?php echo $_SERVER['HTTP_HOST']; ?>/" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="robots" content="noindex,nofollow" />
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="lib/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&amp;subset=latin-ext" rel="stylesheet">
    <link href="css/pages-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="css/icons.min.css" rel="stylesheet">
    <link href="css/style.css?id=<?php echo $session_id; ?>" rel="stylesheet">
    <link rel="icon" type="image/ico" href="img/favicon.ico">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="fixed-header">
    <nav class="page-sidebar" data-pages="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-header-controls">
                <div class="desc-txt-nav">
                    <span>Nawigacja</span>
                    <button type="button" class="btn btn-link btnpin" data-toggle-pin="sidebar"><i class="fa-solid fa-circle-arrow-left hicon"></i></button>
                </div>
            </div>
        </div>

        <div class="sidebar-menu">

            <ul class="menu-items">
                <li class="m-t-30">
                    <a href="/home/" class="detailed">
                        <span class="title">Dashboard</span>
                    </a>
                    <span class="icon-thumbnail"><a href="/home/"><i class="mdi mdi-chart-bar"></i></a></span>
                </li>
                <li>
                    <a href="javascript:;"><span class="title">Ustawienia</span><span class=" arrow"></span></a>
                    <span class="icon-thumbnail"><i class="fs-14 pg-settings"></i></span>
                    <ul class="sub-menu">
                        <li class="">
                            <a href="/maintenance/">Przerwa techniczna</a>
                            <span class="icon-thumbnail"><a href="/maintenance/">Pt</a></span>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;"><span class="title">Administracja</span>
                        <span class=" arrow"></span></a>
                    <span class="icon-thumbnail"><i class="mdi mdi-account"></i></span>
                    <ul class="sub-menu">
                        <li class="">
                            <a href="/users/">Użytkownicy</a>
                            <span class="icon-thumbnail"><a href="/users/"><i class="mdi mdi-account-multiple"></i></a></span>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </nav>

    <div class="page-container ">
        <div class="header ">
            <a href="#" class="toggle-sidebar hidden-lg-up pg pg-menu" data-toggle="sidebar"></a>
            <div class="d-flex align-items-center">
                <div class="pull-left p-r-10 fs-14 b-grey b-r font-heading hidden-md-down">
                    <span class="semi-bold usertxt">
                        Użytkownik: <strong><a href="/module/adminusers/"></a></strong>
                    </span>
                </div>
                <div class="dropdown pull-right hidden-md-down b-grey b-r">
                    <span class="inline lgd32 p-l-10 p-r-10">
                        <strong><a href="https://www.demo.maxsoft.pl/" class="usertxt" target="_blank" title="Przejdź do strony www"><i class="pg-world"></i></a></strong>
                    </span>
                </div>
                <div class="dropdown pull-right hidden-md-down b-grey b-r">
                    <span class="inline lgd32 p-l-10 p-r-10">
                        <a href="/home/logout/" title="Wyloguj się"><i class="pg-power"></i></a>
                    </span>
                </div>
            </div>
        </div>
        <?php include $filename; ?>
    </div>
    <script src="lib/jquery/jquery-3.7.1.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/font-awesome/js/all.min.js" rel="stylesheet"></script>
    <script src="js/custom.js?id=<?php echo $session_id; ?>"></script>
</body>

</html>