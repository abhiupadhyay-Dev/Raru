<?php include('../include/config.php');
include('verify_login.php');?>
<?php
$title_tag = "Dashboard";
$breadcrumb = "Dashboard";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/head.php'; ?>
</head>
<body>
    <!-- START PAGE CONTAINER -->
    <div class="page-container">

        <!-- START PAGE SIDEBAR -->
        <?php include 'includes/navigation.php'; ?>
        <!-- END PAGE SIDEBAR -->

        <!-- PAGE CONTENT -->
        <div class="page-content">

            <!-- START X-NAVIGATION VERTICAL -->
            <?php include 'includes/nav-horizontal.php'; ?>
            <!-- END X-NAVIGATION VERTICAL -->

            <!-- START BREADCRUMB -->
            <?php include 'includes/breadcrumb.php'; ?>
            <!-- END BREADCRUMB -->

            <!-- PAGE CONTENT WRAPPER -->
            <div class="page-content-wrap">



                    <div class="row">
						<div class="col-md-10 admin-home-page">

                            <!-- START SALES BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <img id="logo" src="../img/logos/logo.png" alt="logo">
                                </div>
                                <div class="panel-heading">
                                    <div class="panel-title-box text-center">
                                        <h3>Welcome to</h3>
                                        <h2> <?php echo $sitename;?>  </h2>

                                    </div>
                                </div>

                            </div>
                            <!-- END SALES BLOCK -->

                        </div>


                    </div> 

                </div>
                <!-- END PAGE CONTENT WRAPPER -->
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <?php include 'includes/logout.php'; ?>
        <!-- END MESSAGE BOX-->

        <!-- FOOTER SCRIPTS & AUDIO PRELOAD -->
        <?php include 'includes/footer-scripts.php'; ?>
        <!-- END FOOTER SCRIPTS & AUDIO PRELOAD -->
    </body>
    </html>
