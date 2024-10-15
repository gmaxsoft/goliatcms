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
    <link href="css/icons.min.css" rel="stylesheet" >
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
                    <a href="module/dashboard/" class="detailed">
                        <span class="title">Wyniki</span>
                    </a>
                    <span class="icon-thumbnail"><a href="module/dashboard/"><i class="mdi mdi-chart-bar"></i></a></span>
                </li>
                <li>
                    <a href="javascript:;"><span class="title">Baza klientów</span><span class=" arrow"></span></a>
                    <span class="icon-thumbnail"><i class="pg-servers"></i></a></span>
                    <ul class="sub-menu">
                        <li class="">
                            <a href="module/customers/">Klienci firmy</a>
                            <span class="icon-thumbnail"><a href="module/customers/"><i class="pg-servers"></i></a></span>
                        </li>
                        <li class="">
                            <a href="module/customers_www/">Klienci www</a>
                            <span class="icon-thumbnail"><a href="module/customers_www/"><i class="pg-server_hard"></i></a></span>
                        </li>
                        <li class="">
                            <a href="module/customers_dms/">Klienci DMS</a>
                            <span class="icon-thumbnail"><a href="module/customers_dms/"><i class="pg-server_hard"></i></a></span>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="module/room/" class="">
                        <span class="title">Poczekalnia</span>
                    </a>
                    <span class="icon-thumbnail"><a href="module/room/"><i class="mdi mdi-clock-time-eight"></i></a></span>
                </li>

                <li class="">
                    <a href="module/leads/" class="">
                        <span class="title">Szanse</span>
                    </a>
                    <span class="icon-thumbnail"><a href="module/leads/"><i class="mdi mdi-dice-multiple"></i></a></span>
                </li>
                <li class="">
                    <a href="module/offer/" class="">
                        <span class="title">Oferty</span>
                    </a>
                    <span class="icon-thumbnail"><a href="module/offer/"><i class="mdi mdi-newspaper-plus"></i></a></span>
                </li>
                <li class="">
                    <a href="module/win/" class="">
                        <span class="title">Wygrane</span>
                    </a>
                    <span class="icon-thumbnail"><a href="module/win/"><i class="pg-grid"></i></a></span>
                </li>

                <li class="">
                    <a href="module/summary/" class="">
                        <span class="title">Rozliczenie</span>
                    </a>
                    <span class="icon-thumbnail"><a href="module/summary/"><i class="pg-charts"></i></a></span>
                </li>

                <li>
                    <a href="javascript:;"><span class="title">Magazyn</span><span class=" arrow"></span></a>
                    <span class="icon-thumbnail"><i class="pg-servers"></i></a></span>
                    <ul class="sub-menu">
                        <li class="">
                            <a href="module/advertisements/">Magazyn firmy</a>
                            <span class="icon-thumbnail"><a href="module/advertisements/"><i class="pg-folder"></i></a></span>
                        </li>
                        <li class="">
                            <a href="module/advertisements_www/">Magazyn www</a>
                            <span class="icon-thumbnail"><a href="module/advertisements_www/"><i class="pg-server_hard"></i></a></span>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="module/calendar/" class="">
                        <span class="title">Kalendarz</span>
                    </a>
                    <span class="icon-thumbnail"><a href="module/calendar/"><i class="pg-calender"></i></a></span>
                </li>
                <li class="">
                    <a href="module/media/" class="">
                        <span class="title">Biblioteka dokumentów</span>
                    </a>
                    <span class="icon-thumbnail"><a href="module/media/"><i class="pg-movie"></i></a></span>
                </li>

                <li class="">
                    <a href="javascript:;"><span class="title">Baza</span><span class=" arrow"></span></a>
                    <span class="icon-thumbnail"><i class="fs-14 pg-settings"></i></span>
                    <ul class="sub-menu">
                        <li class="">
                            <a href="module/access/">Uprawnienia</a>
                            <span class="icon-thumbnail"><a href="module/access/"><i class="fs-14 pg-lock"></i></a></span>
                        </li>
                        <li class="">
                            <a href="module/location/">Lokalizacje</a>
                            <span class="icon-thumbnail"><a href="module/location/">Lk</a></span>
                        </li>
                        <li class="">
                            <a href="module/county/">Powiaty</a>
                            <span class="icon-thumbnail"><a href="module/county/">Po</a></span>
                        </li>
                        <li class="">
                            <a href="module/producers/">Producenci</a>
                            <span class="icon-thumbnail"><a href="module/producers/">Pr</a></span>
                        </li>
                        <li class="">
                            <a href="module/status_offer/">Status sprawy</a>
                            <span class="icon-thumbnail"><a href="module/status_offer/">Ss</a></span>
                        </li>
                        <li class="">
                            <a href="module/status_deal/">Status umowy</a>
                            <span class="icon-thumbnail"><a href="module/status_deal/">Sd</a></span>
                        </li>
                        <li class="">
                            <a href="module/machines/">Typy maszyn</a>
                            <span class="icon-thumbnail"><a href="module/machines/">Tm</a></span>
                        </li>
                        <li class="">
                            <a href="module/machines/">Typy maszyn</a>
                            <span class="icon-thumbnail"><a href="module/machines/">Tm</a></span>
                        </li>
                        <li class="">
                            <a href="module/source/">Żródła</a>
                            <span class="icon-thumbnail"><a href="module/source/">Uź</a></span>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;"><span class="title">Ustawienia</span><span class=" arrow"></span></a>
                    <span class="icon-thumbnail"><i class="fs-14 pg-settings"></i></span>
                    <ul class="sub-menu">

                        <li class="">
                            <a href="module/mail_theme/">Szablony e-mail</a>
                            <span class="icon-thumbnail"><a href="module/mail_theme/"><i class="fs-14 pg-mail"></i></a></span>
                        </li>
                        <li class="">
                            <a href="module/calendar_category/">Kategorie kalendarza</a>
                            <span class="icon-thumbnail"><a href="module/calendar_category/">Kk</a></span>
                        </li>
                        <li class="">
                            <a href="module/form_contact/">Formularz www</a>
                            <span class="icon-thumbnail"><a href="module/form_contact/">Fw</a></span>
                        </li>
                        <li class="">
                            <a href="module/www_contact/">Dane kontaktowe www</a>
                            <span class="icon-thumbnail"><a href="module/www_contact/">Dk</a></span>
                        </li>
                        <li class="">
                            <a href="module/see_more_settings/">Teksty www</a>
                            <span class="icon-thumbnail"><a href="module/see_more_settings/">Tw</a></span>
                        </li>

                        <li class="">
                            <a href="module/trader_signature/">Ustawienia podpisu</a>
                            <span class="icon-thumbnail"><a href="module/trader_signature/">Up</a></span>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;"><span class="title">Administracja</span>
                        <span class=" arrow"></span></a>
                    <span class="icon-thumbnail"><i class="mdi mdi-account"></i></span>
                    <ul class="sub-menu">
                        <li class="">
                            <a href="module/adminusers/">Użytkownicy</a>
                            <span class="icon-thumbnail"><a href="module/adminusers/"><i class="mdi mdi-account-multiple"></i></a></span>
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
        <div class="page-content-wrapper ">

            <div class="content "> <?php // echo $core->content_engine(); 
                                    ?> </div>

        </div>
    </div>
    <script src="lib/jquery/jquery-3.7.1.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/font-awesome/js/all.min.js" rel="stylesheet"></script>
    <script src="js/custom.js?id=<?php echo $session_id; ?>"></script>
</body>

</html>