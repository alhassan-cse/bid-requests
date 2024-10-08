<?php
ob_start();
session_start();
include('../connect/Connect.php');
include('AdminClass/Authentication.php');

$authentication = new Authentication;
 

$admin = $_SESSION['id'];
if($admin == null){
    header("location: login.php");
}

if(isset($_GET['status'])){ 
    $authentication->logout($user_type = 1);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Admin Dashboard | BID Request</title>
    <meta property="og:title" content="Dashboard">
    <meta name="author" content="Beni Arisandi">
    <meta property="og:locale" content="en_US">
    <meta name="description" content="Responsive admin theme build on top of Bootstrap 4">
    <meta property="og:description" content="Responsive admin theme build on top of Bootstrap 4">
    <link rel="canonical" href="url">
    <meta property="og:url" content="url">
    <meta property="og:site_name" content="Looper - Bootstrap 4 Admin Theme">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <meta name="theme-color" content="#3063A0">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet">
    <!-- <link href="../assets/libs/fontawesome/all.min.css" rel="stylesheet"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <link rel="stylesheet" href="../assets/libs/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="../assets/libs/theme/theme.min.css" data-skin="default">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="../assets/css/main.css">
    
</head>

<body>
    <div class="app">
        <header class="app-header app-header-dark">
            <div class="top-bar">
                <div class="top-bar-brand">
                    <button class="hamburger hamburger-squeeze mr-2" type="button" data-toggle="aside-menu" aria-label="toggle aside menu">
                        <span class="hamburger-box"><span class="hamburger-inner"></span></span></button>
                        <a href="dashboard.php">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="28" viewbox="0 0 351 100">
                                <defs>
                                    <path id="a"
                                        d="M156.538 45.644v1.04a6.347 6.347 0 0 1-1.847 3.98L127.708 77.67a6.338 6.338 0 0 1-3.862 1.839h-1.272a6.34 6.34 0 0 1-3.862-1.839L91.728 50.664a6.353 6.353 0 0 1 0-9l9.11-9.117-2.136-2.138a3.171 3.171 0 0 0-4.498 0L80.711 43.913a3.177 3.177 0 0 0-.043 4.453l-.002.003.048.047 24.733 24.754-4.497 4.5a6.339 6.339 0 0 1-3.863 1.84h-1.27a6.337 6.337 0 0 1-3.863-1.84L64.971 50.665a6.353 6.353 0 0 1 0-9l26.983-27.008a6.336 6.336 0 0 1 4.498-1.869c1.626 0 3.252.622 4.498 1.87l26.986 27.006a6.353 6.353 0 0 1 0 9l-9.11 9.117 2.136 2.138a3.171 3.171 0 0 0 4.498 0l13.49-13.504a3.177 3.177 0 0 0 .046-4.453l.002-.002-.047-.048-24.737-24.754 4.498-4.5a6.344 6.344 0 0 1 8.996 0l26.983 27.006a6.347 6.347 0 0 1 1.847 3.98zm-46.707-4.095l-2.362 2.364a3.178 3.178 0 0 0 0 4.501l2.362 2.364 2.361-2.364a3.178 3.178 0 0 0 0-4.501l-2.361-2.364z">
                                    </path>
                                </defs>
                                <g fill="none" fill-rule="evenodd">
                                    <path fill="currentColor" fill-rule="nonzero"
                                        d="M39.252 80.385c-13.817 0-21.06-8.915-21.06-22.955V13.862H.81V.936h33.762V58.1c0 6.797 4.346 9.026 9.026 9.026 2.563 0 5.237-.446 8.58-1.783l3.677 12.034c-5.794 1.894-9.694 3.009-16.603 3.009zM164.213 99.55V23.78h13.372l1.225 5.571h.335c4.457-4.011 10.585-6.908 16.491-6.908 13.817 0 22.174 11.031 22.174 28.08 0 18.943-11.588 29.863-23.957 29.863-4.903 0-9.694-2.117-13.594-6.017h-.446l.78 9.025V99.55h-16.38zm25.852-32.537c6.128 0 10.92-4.903 10.92-16.268 0-9.917-3.232-14.932-10.14-14.932-3.566 0-6.797 1.56-10.252 5.126v22.397c3.12 2.674 6.686 3.677 9.472 3.677zm69.643 13.372c-17.272 0-30.643-10.586-30.643-28.972 0-18.163 13.928-28.971 28.748-28.971 17.049 0 26.075 11.477 26.075 26.52 0 3.008-.558 6.017-.78 7.354h-37.663c1.56 8.023 7.465 11.589 16.491 11.589 5.014 0 9.36-1.337 14.263-3.9l5.46 9.917c-6.351 4.011-14.597 6.463-21.951 6.463zm-1.338-45.463c-6.462 0-11.031 3.454-12.702 10.363h23.622c-.78-6.797-4.568-10.363-10.92-10.363zm44.238 44.126V23.779h13.371l1.337 12.034h.334c5.46-9.025 13.595-13.371 22.398-13.371 4.902 0 7.465.78 10.697 2.228l-3.343 13.706c-3.454-1.003-5.683-1.56-9.806-1.56-6.797 0-13.928 3.566-18.608 13.483v28.749h-16.38z">
                                    </path>
                                    <use class="fill-warning" xlink:href="#a"></use>
                                </g>
                            </svg>
                        </a>
                </div>
                <div class="top-bar-list">
                    <div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
                        <button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="toggle menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- /toggle menu -->
                    </div>
                    <div class="top-bar-item top-bar-item-full">
                        <form class="top-bar-search">
                            <div class="input-group input-group-search dropdown">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                                </div><input type="text" class="form-control" data-toggle="dropdown" aria-label="Search"
                                    placeholder="Search">
                                <div class="dropdown-menu dropdown-menu-rich dropdown-menu-xl ml-n4 mw-100">
                                    <div class="dropdown-arrow ml-3"></div>
                                    <div class="dropdown-scroll perfect-scrollbar h-auto" style="max-height: 360px">
                                        <div class="list-group list-group-flush list-group-reflow mb-2">
                                            <h6 class="list-group-header d-flex justify-content-between">
                                                <span>Shortcut</span>
                                            </h6>
                                            <div class="list-group-item py-2">
                                                <a href="#" class="stretched-link"></a>
                                                <div class="tile tile-sm bg-muted">
                                                    <i class="fas fa-user-plus"></i>
                                                </div>
                                                <div class="ml-2"> Create user </div>
                                            </div>
                                            <div class="list-group-item py-2">
                                                <a href="#" class="stretched-link"></a>
                                                <div class="tile tile-sm bg-muted">
                                                    <i class="fas fa-dollar-sign"></i>
                                                </div>
                                                <div class="ml-2"> Create invoice </div>
                                            </div>
                                            <h6 class="list-group-header d-flex justify-content-between mt-2">
                                                <span>In projects</span> <a href="#" class="font-weight-normal">Show
                                                    more</a>
                                            </h6>
                                            <div class="list-group-item py-2">
                                                <a href="#" class="stretched-link"><span class="sr-only">Go to search
                                                        result</span></a>
                                                <div class="user-avatar user-avatar-sm bg-muted">
                                                    <img src="assets/images/avatars/bootstrap.svg" alt="">
                                                </div>
                                                <div class="ml-2">
                                                    <div class="mb-n1"> Bootstrap </div><small class="text-muted">Just
                                                        now</small>
                                                </div>
                                            </div>
                                            <div class="list-group-item py-2">
                                                <a href="#" class="stretched-link"><span class="sr-only">Go to search
                                                        result</span></a>
                                                <div class="user-avatar user-avatar-sm bg-muted">
                                                    <img src="assets/images/avatars/slack.svg" alt="">
                                                </div>
                                                <div class="ml-2">
                                                    <div class="mb-n1"> Slack </div><small class="text-muted">Updated 25
                                                        minutes ago</small>
                                                </div>
                                            </div>
                                            <h6 class="list-group-header d-flex justify-content-between mt-2">
                                                <span>Another section</span> <a href="#" class="font-weight-normal">Show
                                                    more</a>
                                            </h6>
                                            <div class="list-group-item py-2">
                                                <a href="#" class="stretched-link"><span class="sr-only">Go to search
                                                        result</span></a>
                                                <div class="tile tile-sm bg-muted"> P </div>
                                                <div class="ml-2">
                                                    <div class="mb-n1"> Product name </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" class="dropdown-footer">Show all results</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
                        <ul class="header-nav nav">
                            <li class="nav-item dropdown header-nav-dropdown has-notified">
                                <a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"><span class="oi oi-pulse"></span></a>
                                <div class="dropdown-menu dropdown-menu-rich dropdown-menu-right">
                                    <div class="dropdown-arrow"></div>
                                    <h6 class="dropdown-header stop-propagation">
                                        <span>Activities <span class="badge">(2)</span></span>
                                    </h6>
                                    <div class="dropdown-scroll perfect-scrollbar">
                                        <a href="#" class="dropdown-item unread">
                                            <div class="user-avatar">
                                                <img src="assets/images/avatars/uifaces15.jpg" alt="">
                                            </div>
                                            <div class="dropdown-item-body">
                                                <p class="text"> Jeffrey Wells created a schedule </p><span
                                                    class="date">Just now</span>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item unread">
                                            <div class="user-avatar">
                                                <img src="assets/images/avatars/uifaces16.jpg" alt="">
                                            </div>
                                            <div class="dropdown-item-body">
                                                <p class="text"> Anna Vargas logged a chat </p><span class="date">3
                                                    hours ago</span>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="user-avatar">
                                                <img src="assets/images/avatars/uifaces17.jpg" alt="">
                                            </div>
                                            <div class="dropdown-item-body">
                                                <p class="text"> Sara Carr invited to Stilearn Admin </p><span
                                                    class="date">5 hours ago</span>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="user-avatar">
                                                <img src="assets/images/avatars/uifaces18.jpg" alt="">
                                            </div>
                                            <div class="dropdown-item-body">
                                                <p class="text"> Arthur Carroll updated a project </p><span
                                                    class="date">1 day ago</span>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="user-avatar">
                                                <img src="assets/images/avatars/uifaces19.jpg" alt="">
                                            </div>
                                            <div class="dropdown-item-body">
                                                <p class="text"> Hannah Romero created a task </p><span class="date">1
                                                    day ago</span>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="user-avatar">
                                                <img src="assets/images/avatars/uifaces20.jpg" alt="">
                                            </div>
                                            <div class="dropdown-item-body">
                                                <p class="text"> Angela Peterson assign a task to you </p><span
                                                    class="date">2 days ago</span>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="user-avatar">
                                                <img src="assets/images/avatars/uifaces21.jpg" alt="">
                                            </div>
                                            <div class="dropdown-item-body">
                                                <p class="text"> Shirley Mason and 3 others followed you </p><span
                                                    class="date">2 days ago</span>
                                            </div>
                                        </a>
                                    </div>
                                    <a href="user-activities.html" class="dropdown-footer">All activities <i class="fas fa-fw fa-long-arrow-alt-right"></i></a>
                                </div>
                            </li>
                           
                            <li class="nav-item dropdown header-nav-dropdown has-notified">
                                <a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="oi oi-envelope-open"></span></a>
                              
                                <div class="dropdown-menu dropdown-menu-rich dropdown-menu-right">
                                    <div class="dropdown-arrow"></div>
                                    <h6 class="dropdown-header stop-propagation">
                                        <span>Messages</span> <a href="#">Mark all as read</a>
                                    </h6>
                                    <div class="dropdown-scroll perfect-scrollbar">
                                        <a href="#" class="dropdown-item unread">
                                            <div class="user-avatar">
                                                <img src="assets/images/avatars/team1.jpg" alt="">
                                            </div>
                                            <div class="dropdown-item-body">
                                                <p class="subject"> Stilearning </p>
                                                <p class="text text-truncate"> Invitation: Joe's Dinner @ Fri Aug 22
                                                </p><span class="date">2 hours ago</span>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="user-avatar">
                                                <img src="assets/images/avatars/team3.png" alt="">
                                            </div>
                                            <div class="dropdown-item-body">
                                                <p class="subject"> Openlane </p>
                                                <p class="text text-truncate"> Final reminder: Upgrade to Pro </p><span
                                                    class="date">23 hours ago</span>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="tile tile-circle bg-green"> GZ </div>
                                            <div class="dropdown-item-body">
                                                <p class="subject"> Gogo Zoom </p>
                                                <p class="text text-truncate"> Live healthy with this wireless sensor.
                                                </p><span class="date">1 day ago</span>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="tile tile-circle bg-teal"> GD </div>
                                            <div class="dropdown-item-body">
                                                <p class="subject"> Gold Dex </p>
                                                <p class="text text-truncate"> Invitation: Design Review @ Mon Jul 7
                                                </p><span class="date">1 day ago</span>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="user-avatar">
                                                <img src="assets/images/avatars/team2.png" alt="">
                                            </div>
                                            <div class="dropdown-item-body">
                                                <p class="subject"> Creative Division </p>
                                                <p class="text text-truncate"> Need some feedback on this please </p>
                                                <span class="date">2 days ago</span>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="tile tile-circle bg-pink"> LD </div>
                                            <div class="dropdown-item-body">
                                                <p class="subject"> Lab Drill </p>
                                                <p class="text text-truncate"> Our UX exercise is ready </p><span
                                                    class="date">6 days ago</span>
                                            </div>
                                        </a>
                                    </div>
                                    <a href="page-messages.html" class="dropdown-footer">All messages <i class="fas fa-fw fa-long-arrow-alt-right"></i></a>
                                </div>
                            </li>
                            <li class="nav-item dropdown header-nav-dropdown">
                                <a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="oi oi-grid-three-up"></span></a>
                                <div class="dropdown-menu dropdown-menu-rich dropdown-menu-right">
                                    <div class="dropdown-arrow"></div>
                                    <div class="dropdown-sheets">
                                        <div class="dropdown-sheet-item">
                                            <a href="#" class="tile-wrapper"><span class="tile tile-lg bg-indigo"><i class="oi oi-people"></i></span> <span class="tile-peek">Teams</span></a>
                                        </div>
                                        <div class="dropdown-sheet-item">
                                            <a href="#" class="tile-wrapper"><span class="tile tile-lg bg-teal"><i class="oi oi-fork"></i></span> <span class="tile-peek">Projects</span></a>
                                        </div>
                                        <div class="dropdown-sheet-item">
                                            <a href="#" class="tile-wrapper"><span class="tile tile-lg bg-pink"><i class="fa fa-tasks"></i></span> <span class="tile-peek">Tasks</span></a>
                                        </div>
                                        <div class="dropdown-sheet-item">
                                            <a href="#" class="tile-wrapper"><span class="tile tile-lg bg-yellow"><i class="oi oi-fire"></i></span> <span class="tile-peek">Feeds</span></a>
                                        </div>
                                        <div class="dropdown-sheet-item">
                                            <a href="#" class="tile-wrapper"><span class="tile tile-lg bg-cyan"><i
                                                        class="oi oi-document"></i></span> <span
                                                    class="tile-peek">Files</span></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="dropdown d-none d-md-flex">
                            <button class="btn-account" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="user-avatar user-avatar-md"><img src="https://crm.poshorabd.net/public/uploads/user/2024091216113541871.png" alt=""></span>
                                <span class="account-summary pr-lg-4 d-none d-lg-block">
                                    <span class="account-name"> 
                                        <?php 
                                        if(isset($_SESSION['name'])){
                                            echo $_SESSION['name'];
                                        }
                                        ?>
                                    </span>
                                </span>
                            </button> 
                            <div class="dropdown-menu">
                                <div class="dropdown-arrow d-lg-none" x-arrow=""></div>
                                <div class="dropdown-arrow ml-3 d-none d-lg-block"></div>
                                <h6 class="dropdown-header d-none d-md-block d-lg-none">
                                    <?php 
                                    if(isset($_SESSION['name'])){
                                        echo $_SESSION['name'];
                                    }
                                    ?>
                                </h6>
                                <a class="dropdown-item" href="user-profile.html"><span class="dropdown-icon oi oi-person"></span> Profile</a> 
                                <a class="dropdown-item" href="?status=logout&logout=true"><span class="fa fa-sing-out"></span>Logout</a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <aside class="app-aside app-aside-expand-md app-aside-light">
            <div class="aside-content">
                <header class="aside-header d-block d-md-none">
                    <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside"><span
                            class="user-avatar user-avatar-lg"><img src="https://crm.poshorabd.net/public/uploads/user/2024091216113541871.png"
                                alt=""></span> <span class="account-icon"><span
                                class="fa fa-caret-down fa-lg"></span></span> <span class="account-summary"><span
                                class="account-name">Beni Arisandi</span> <span class="account-description">Marketing
                                Manager</span></span></button>
                    <div id="dropdown-aside" class="dropdown-aside collapse">
                        <div class="pb-3">
                            <a class="dropdown-item" href="user-profile.html"><span
                                    class="dropdown-icon oi oi-person"></span> Profile</a> <a class="dropdown-item"
                                href="?status=logout&logout=true"><span class="dropdown-icon oi oi-account-logout"></span>
                                Logout</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Help Center</a> <a
                                class="dropdown-item" href="#">Ask Forum</a> <a class="dropdown-item" href="#">Keyboard
                                Shortcuts</a>
                        </div>
                    </div>
                </header>
                <div class="aside-menu overflow-hidden">
                    <!-- .stacked-menu -->
                    <nav id="stacked-menu" class="stacked-menu">
                        <?php include('include/sidebar.php');?>
                    </nav>
                </div>
                <footer class="aside-footer border-top p-2">
                    <button class="btn btn-light btn-block text-primary" data-toggle="skin"><span
                            class="d-compact-menu-none">Night mode</span> <i class="fas fa-moon ml-1"></i></button>
                </footer>
            </div>
        </aside>
        <main class="app-main">
            <div class="wrapper">
                <div class="page">
                    <div class="page-inner">
                        <?php
                        if(isset($page)){
                            if($page == 'users'){
                                include('pages/users.php'); 
                            }
                            elseif($page == 'campaigns'){
                                include('pages/campaigns.php'); 
                            }
                            elseif($page == 'add_campaign'){
                                include('pages/add_campaign.php'); 
                            }
                        } 
                        else{
                          include('content.php'); 
                        }
                       
                       ?>
                    </div>
                </div>
            </div>
            <footer class="app-footer">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a class="text-muted" href="#">Support</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="#">Help Center</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="#">Privacy</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="#">Terms of Service</a>
                    </li>
                </ul>
                <div class="copyright"> Copyright © 2018. All right reserved. </div>
            </footer>
        </main>
    </div>

    <script src="../assets/libs/jquery/jquery.min.js"></script>
    <script src="../assets/libs/popper/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/bootstrap.min.js"></script>
    <!-- BEGIN PLUGINS JS -->
    <!-- <script src="assets/libs/pace-progress/pace.min.js"></script>
    <script src="assets/libs/stacked-menu/stacked-menu.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/libs/flatpickr/flatpickr.min.js"></script>
    <script src="assets/libs/easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="assets/libs/chart/chart.min.js"></script>  -->
    <!-- END PLUGINS JS -->
    <!-- BEGIN THEME JS -->
    <script src="../assets/libs/theme/theme.min.js"></script> <!-- END THEME JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="../assets/js/dashboard-demo.js"></script> <!-- END PAGE LEVEL JS -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116692175-1"></script>
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>

    <script>
        new DataTable('#example', {
            responsive: true
        });
    </script> 


    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-116692175-1');
    </script>
</body>

</html>