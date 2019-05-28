<?php
include_once '../model/Admin_User.php';
ob_start();
session_start();
$user = new Admin_User();
$user->i_loguar();//Ky funksion kontrollon nese useri eshte i loguar apo jo 

$te_dhena=$user->te_dhena_user();

$my_id=$user->my_id();

?>

<!DOCTYPE html>
<html>
    
<head>
        <meta charset="utf-8" />
        <title>Kursi.com - Menaxhoni kursin tuaj</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="Sistem per menaxhimin e kursit tuaj.Menaxhoni dhe ruani gjithqka online ne sistemin tuaj" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="../dark-hori/assets/images/favicon.ico">


        <link href="../plugins/jquery-circliful/css/jquery.circliful.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="../dark-hori/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../dark-hori/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../dark-hori/assets/css/style.css" rel="stylesheet" type="text/css" />

        <link href="../dark-hori/assets/css/my_style.css" rel="stylesheet" type="text/css" />

        <script src="dark-hori/assets/js/modernizr.min.js"></script>

        <!-- DataTables -->
        <link href="../plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="../plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Multi Item Selection examples -->
        <link href="../plugins/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">

    </head>

    <body>

        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container-fluid">

                    <!-- Logo container-->
                    <div class="logo">
                        <!-- Text Logo -->
                        <a href="../view/" class="logo">
                            <span class="logo-small"><i class="mdi mdi-radar"></i></span>
                             
                            <span class="logo-large"><i class="mdi mdi-radar"></i><?php echo $te_dhena['emri'];  ?></span>
                            
                        </a>
                        <!-- Image Logo -->
                        <!--<a href="index.html" class="logo">-->
                        <!--<img src="assets/images/logo_dark.png" alt="" height="24" class="logo-lg">-->
                        <!--<img src="assets/images/logo_sm.png" alt="" height="24" class="logo-sm">-->
                        <!--</a>-->

                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras topbar-custom">

                        <ul class="list-inline float-right mb-0">

                            <li class="menu-item list-inline-item">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>
                            <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <i class="mdi mdi-bell noti-icon"></i>
                                    <span class="badge badge-pink noti-icon-badge">1</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg" aria-labelledby="Preview">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5 class="font-16"><span class="badge badge-danger float-right">1</span>Notification</h5>
                                    </div>

                                    <!-- item-->
                                    <a href="../profile/my_profile.php" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-success"><i class="mdi mdi-comment-account"></i></div>
                                        <p class="notify-details"><?php echo $te_dhena['emri'];  ?><small class="text-muted"><?php echo $te_dhena['email'];  ?></small></p>
                                    </a>

                                    

                                    

                                    <!-- All-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item notify-all">
                                        View All
                                    </a>

                                </div>
                            </li>

                            <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img src="../dark-hori/assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5 class="text-overflow"><small class="text-white">Welcome ! <?php echo($te_dhena['emri']); ?></small> </h5>
                                    </div>

                                    <!-- item-->
                                    <a href="../profile/my_profile.php" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account"></i> <span>Profile</span>
                                    </a>

                                    
                                    <!-- item-->
                                    <a href="dil.php" class="dropdown-item notify-item">
                                        <i class="mdi mdi-logout"></i> <span>Shkycu</span>
                                    </a>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <!-- end menu-extras -->

                    <div class="clearfix"></div>

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->

            <div class="navbar-custom">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="../view/"><i class="ti-home"></i>HOME</a>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="fa fa-book"></i> KURSET</a>
                                <ul class="submenu">
                                    <li><a href="../view/course_list.php"><i class="fa fa-eye"></i>  Shiko kurset</a></li>
                                    <li><a href="../actions/add_course.php"><i class="fa fa-plus"></i>     Krijo kurs</a></li>
                                    
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="fa fa-th-large"></i></i> KLASAT</a>
                                <ul class="submenu">
                                    <li><a href="../view/class_list.php"><i class="fa fa-eye"></i>     Shiko klasat aktive</a></li>
                                    <li><a href="../actions/add_class.php"><i class="fa fa-plus"></i>     Krijo nje klase</a></li>
                                    
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="fa fa-graduation-cap"></i> STUDENTET</a>
                                <ul class="submenu">
                                    <li><a href="../view/student_list.php"><i class="fa fa-eye"></i>    Shiko studentet</a></li>
                                    <li><a href="../actions/add_student.php"><i class="fa fa-plus"></i>    Shto nje student</a></li>
                                    
                                    
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="fa fa-group"></i></i> INSTRUKTOR</a>
                                <ul class="submenu">
                                    <li><a href="../view/teacher_list.php"><i class="fa fa-list"></i>    Lista instruktoreve</a></li>
                                    <li><a href="../actions/add_teacher.php"> <i class="fa fa-plus"></i>    Shto nje instruktor</a></li>
                                    
                                    
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="fa fa-money"></i> PAGESAT</a>
                                <ul class="submenu">
                                    <li class="has-submenu">
                                        <a href="../actions/bej_pagese.php"><i class="fa fa-handshake-o"></i>          Mandat pagese</a>
                                        
                                    </li>

                                    <li class="has-submenu">
                                        <a href="../actions/shitje_artikulli.php"><i class="fa fa-book"></i> Shitje artikulli  </a>
                                        
                                    </li>

                                    <li class="has-submenu">
                                        <a href="../view/mandat_list.php"><i class="fa fa-list"></i> Mandatet e bera</a>
                                        
                                    </li>

                                    <li class="has-submenu">
                                        <a href="../view/fitime_mujore.php"><i class="fa fa-money"></i> Te ardhura mujore</a>
                                        
                                    </li>

                                    
                                </ul>
                            </li>
                            

                            

                        </ul>

                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->

        