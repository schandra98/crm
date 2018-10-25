<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>Customer Relation Management - <?= $title ?></title>

        <!-- Bootstrap -->
        <link href="<?= base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?= base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?= base_url() ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- bootstrap-progressbar -->
        <link href="<?= base_url() ?>assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
        <!-- jQuery custom content scroller -->
        <link href="<?= base_url() ?>assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
        <!-- Custom Theme Style WDM -->
        <link href="<?= base_url() ?>assets/vendors/Added/css/bootstrap-table-expandable.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/vendors/Added/css/jquerysctipttop.css" rel="stylesheet">
        <!--Bootstrap Modal Alert--> 
        <link href="<?= base_url() ?>assets/vendors/bootstrap-dialog-master/dist/css/bootstrap-dialog.min.css" rel="stylesheet">
        <!-- Font Icon -->
        <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

        <!-- Main css -->
        <link rel="stylesheet" href="css/style.css">
        <?php
        if (strpos($data, "insert") !== false) {
            include_once 'layout/header/h_all_insert.php';
        }
        if (strpos($data, "load") !== false) {
            include_once 'layout/header/h_all_load.php';
        }
        if (strpos($data, "dashboard") !== false) {
            include_once 'layout/header/h_dashboard.php';
        }
        ?>

        <!-- Custom Theme Style -->
        <link href="<?= base_url() ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/vendors/Added/css/tambahan.css" rel="stylesheet">

    </head>

    <body class="nav-sm footer_fixed">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 col-xs-12 left_col menu_fixed">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="<?= base_url('core/load_report_complain/1') ?>" class="site_title"><i class="fa fa-home"></i> <span >CRM</span></a>
                        </div>

                        <div class="clearfix"></div>
                        <!-- menu profile quick info -->
                        <div class="profile">
                            <div class="profile_pic">
                                <img src="<?= base_url() ?>assets/production/images/user.png" alt="..." class="img-circle profile_img">
                            </div>
                            <div class="profile_info">
                                <span>Welcome to Customer Relation Management,</span>
                                <h5>AS <?= $_SESSION['crm-nama_karyawan'] ?></h5>
                            </div>
                        </div>
                        <!-- /menu profile quick info -->
                        <br />
                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu ">
                            <div class="menu_section">
                                <h3>MENU</h3>
                                <ul class="nav side-menu">
                                    <!--<li><a href="#"><i class="fa fa-pie-chart"></i> Dashboard </a></li>-->
                                    <li><a><i class="fa fa-home"></i> Report Complain </a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?= base_url('core/load_report_complain/1') ?>">New</a></li>
                                            <li><a href="<?= base_url('core/load_report_complain/2') ?>">On Progress</a></li>
                                            <li><a href="<?= base_url('core/load_report_complain/3') ?>">Finish</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?= base_url('core/load_report_approach') ?>"><i class="fa fa-clipboard"></i> Report Approach </a>
                                    </li>
                                    <li><a href="<?= base_url('core/load_report_approach_resp') ?>"><i class="fa fa-clipboard"></i> Report Approach Resp</a>
                                    </li>
<!--                                    <li><a href="<?= base_url('core/load_insert') ?>"><i class="fa fa-edit"></i> Insert 1 </a>
                                    </li>-->                                    <li><a href="<?= base_url('core/load_insert2') ?>"><i class="fa fa-edit"></i> Set Report Approach </a>
                                    </li>
                                    <li><a><i class="fa fa-table"></i> Master<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?= base_url('core/load_master/1') ?>">Master <br>Aktif</a></li>
                                            <li><a href="<?= base_url('core/load_master/0') ?>">Master <br>Pasif</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /sidebar menu -->
                    </div>
                </div>
                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav>
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        <img src="<?= base_url() ?>assets/production/images/user.png" alt="">
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li><a href="<?= base_url('login/log_out'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    <table  width="100%" >
                        <tr>
                            <td onclick="bgChange('DimGray')" bgcolor="DimGray">&nbsp;</td>
                            <td onclick="bgChange('Gainsboro')" bgcolor="#777777">&nbsp;</td>
                            <td onclick="bgChange('Gainsboro')" bgcolor="#888888">&nbsp;</td>
                            <td onclick="bgChange('Gainsboro')" bgcolor="#999999">&nbsp;</td>
                            <td onclick="bgChange('Gainsboro')" bgcolor="#A9A9A9">&nbsp;</td>
                            <td onclick="bgChange('Gainsboro')" bgcolor="#BCBCBC">&nbsp;</td>
                            <td onclick="bgChange('DimGray')" bgcolor="Gainsboro">&nbsp;</td>
                            <td onclick="bgChange('Navy')" bgcolor="CadetBlue">&nbsp;</td>
                            <td onclick="bgChange('')" bgcolor="#60AFC6">&nbsp;</td>
                            <td onclick="bgChange('')" bgcolor="#60AFC6">&nbsp;</td>
                            <td onclick="bgChange('DarkGreen')" bgcolor="SkyBlue">&nbsp;</td>
                            <td onclick="bgChange('DarkGreen')" bgcolor="SkyBlue">&nbsp;</td>
                            <td onclick="bgChange('')" bgcolor="#B0E0E6">&nbsp;</td>
                            <td onclick="bgChange('')" bgcolor="#B0E0E6">&nbsp;</td>
                            <td onclick="bgChange('')" bgcolor="LightCyan">&nbsp;</td>
                            <td onclick="bgChange('')" bgcolor="LightCyan">&nbsp;</td>
                            <td onclick="bgChange('')" bgcolor="LightCyan">&nbsp;</td>
                            <td onclick="bgChange('DarkGreen')" bgcolor="#EDFFFF">&nbsp;</td>
                            <td onclick="bgChange('DarkGreen')" bgcolor="HoneyDew">&nbsp;</td>
                            <td onclick="bgChange('DarkGreen')" bgcolor="#FAFDFF">&nbsp;</td>
                            <td onclick="bgChange('DarkGreen')" bgcolor="#FAFDFF">&nbsp;</td>
                            <td onclick="bgChange('DarkGreen')" bgcolor="#FAFDFF">&nbsp;</td>
                            <td onclick="bgChange('DarkGreen')" bgcolor="#FAFDFF">&nbsp;</td>
                            <td onclick="bgChange('DarkGreen')" bgcolor="HoneyDew">&nbsp;</td>
                            <td onclick="bgChange('DarkGreen')" bgcolor="#EDFFFF">&nbsp;</td>
                            <td onclick="bgChange('DarkGreen')" bgcolor="#EDFFFF">&nbsp;</td>
                            <td onclick="bgChange('')" bgcolor="LightCyan">&nbsp;</td>
                            <td onclick="bgChange('')" bgcolor="LightCyan">&nbsp;</td>
                            <td onclick="bgChange('')" bgcolor="LightCyan">&nbsp;</td>
                            <td onclick="bgChange('')" bgcolor="#B0E0E6">&nbsp;</td>
                            <td onclick="bgChange('')" bgcolor="#B0E0E6">&nbsp;</td>
                            <td onclick="bgChange('SkyBlue')" bgcolor="SkyBlue">&nbsp;</td>
                            <td onclick="bgChange('SkyBlue')" bgcolor="SkyBlue">&nbsp;</td>
                            <td onclick="bgChange('')" bgcolor="#7ABFD7">&nbsp;</td>
                            <td onclick="bgChange('')" bgcolor="#60AFC6">&nbsp;</td>
                            <td onclick="bgChange('Navy')" bgcolor="CadetBlue">&nbsp;</td>
                            <td onclick="bgChange('Gainsboro')" bgcolor="Gainsboro">&nbsp;</td>
                            <td onclick="bgChange('Gainsboro')" bgcolor="#BCBCBC">&nbsp;</td>
                            <td onclick="bgChange('Gainsboro')" bgcolor="#ACACAC">&nbsp;</td>
                            <td onclick="bgChange('Gainsboro')" bgcolor="#A9A9A9">&nbsp;</td>
                            <td onclick="bgChange('Gainsboro')" bgcolor="#999999">&nbsp;</td>
                            <td onclick="bgChange('Gainsboro')" bgcolor="#888888">&nbsp;</td>
                            <td onclick="bgChange('Gainsboro')" bgcolor="#777777">&nbsp;</td>
                            <td onclick="bgChange('DimGray')" bgcolor="DimGray">&nbsp;</td>
                            <td onclick="bgChange('DimGray')" bgcolor="DimGray">&nbsp;</td>
                            <td onclick="bgChange('Gainsboro')" bgcolor="#777777">&nbsp;</td>
                            <td onclick="bgChange('Gainsboro')" bgcolor="#888888">&nbsp;</td>
                            <td onclick="bgChange('Gainsboro')" bgcolor="#999999">&nbsp;</td>
                            <td onclick="bgChange('Gainsboro')" bgcolor="#A9A9A9">&nbsp;</td>
                            <td onclick="bgChange('Gainsboro')" bgcolor="#A9A9A9">&nbsp;</td>
                            <td onclick="bgChange('DimGray')" bgcolor="Gainsboro">&nbsp;</td>
                            <td onclick="bgChange('Navy')" bgcolor="CadetBlue">&nbsp;</td>
                            <td onclick="bgChange('')" bgcolor="#60AFC6">&nbsp;</td>
                            <td onclick="bgChange('DarkGreen')" bgcolor="SkyBlue">&nbsp;</td>
                            <td onclick="bgChange('')" bgcolor="#B0E0E6">&nbsp;</td>
                            <td onclick="bgChange('')" bgcolor="LightCyan">&nbsp;</td>
                            <td onclick="bgChange('')" bgcolor="LightCyan">&nbsp;</td>
                            <td onclick="bgChange('DarkGreen')" bgcolor="#EDFFFF">&nbsp;</td>
                            <td onclick="bgChange('DarkGreen')" bgcolor="HoneyDew">&nbsp;</td>
                            <td onclick="bgChange('DarkGreen')" bgcolor="#FAFDFF">&nbsp;</td>
                            <td onclick="bgChange('DarkGreen')" bgcolor="#FAFDFF">&nbsp;</td>
                            <td onclick="bgChange('DarkGreen')" bgcolor="#FAFDFF">&nbsp;</td>
                            <td onclick="bgChange('DarkGreen')" bgcolor="#FAFDFF">&nbsp;</td>
                        </tr>
                    </table>
                    <?php
                    include_once $page;
                    ?>
                </div>
                <!-- /page content -->
                <div class="modal fade" id="add" role="dialog">
                    <div class="modal-dialog modal-lg" style="width:90%; margin: auto; padding-left: 4%; padding-top: 1%;">   
                        <div class="modal-content">
                            <div class="modal-body">
                            </div>
                        </div>
                    </div>

                </div>

                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                        &copy;2018 All Rights Reserved by DCXCD<a href="https://colorlib.com"></a>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>

        <!-- jQuery -->
        <script src="<?= base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="<?= base_url() ?>assets/vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="<?= base_url() ?>assets/vendors/nprogress/nprogress.js"></script>
        <!-- jQuery Smart Wizard -->
        <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
        <!-- jQuery custom content scroller -->
        <script src="<?= base_url() ?>assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="<?= base_url() ?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- JS -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="vendor/jquery-validation/dist/additional-methods.min.js"></script>
        <script src="vendor/jquery-steps/jquery.steps.min.js"></script>
        <script src="js/main.js"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
        <?php
        include_once 'layout/footer/f_all.php';
        if (strpos($data, "insert") !== false) {
            include_once 'layout/footer/f_all_modal.php';
            include_once 'layout/footer/f_all_insert.php';
        }
        if (strpos($data, "load") !== false) {
            include_once 'layout/footer/f_all_load.php';
        }
        if (strpos($data, "dashboard") !== false) {
            include_once 'layout/footer/f_dashboard.php';
        }
        ?>

        <!-- Custom Theme Scripts -->
        <script src="<?= base_url() ?>assets/build/js/custom.min.js">
        </script>
        <script>
        $(document).ready(function () {
            if (detectmob() == true) {
                onMobile();
            }
        });
        </script>
    </body>
</html>