<?php session_start(); 
//print_r($_SESSION);exit;?>
<?php include('../include/config.php');
include ('verify_login.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>

<?php include('script.php');

//print_r($_SESSION);exit;?>
<?php include('../Class/Users.php');
$obj_users = new Users(); ?>
</head>

<body class="skin-blue">
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<div class="wrapper">
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1> 
     <!-- <small>Optional description</small>--> 
     </h1>
    </section>
    <!-- Main content -->
    <section class="content"> 
  	<div class="row">
    <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                <?php $countuserid = Countregisterdusers(); ?>
                  <h3><?php echo $countuserid[0]->countuserid; ?></h3>
                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="show_users.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                <?php $countcomplainid = Countcomplain(); ?>
                  <h3><?php echo $countcomplainid[0]->countcomplainid; ?></h3>
                  <p>Total Complain</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="show_camplain.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                <?php $countpandingcomId = Countpandingcomplain(); ?>
                  <h3><?php echo $countpandingcomId[0]->pandingcomplain; ?></h3>
                  <p>Total Panding Complain</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="show_camplain.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                <?php $countinprocesscomId = Countinprocesscomplain(); ?>
                  <h3><?php echo $countinprocesscomId[0]->Inprocesscomplain; ?></h3>
                  <p>Total InProcessing Complain</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="show_camplain.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
             <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                <?php $countfinsihcomId = Countfinishcomplain(); ?>
                  <h3><?php echo $countfinsihcomId[0]->finishcomplain; ?></h3>
                  <p>Total Finish Complain</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="show_camplain.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
    </div>
    </section>
    <!-- /.content --> 
    
    
    </div>
</div>
<?php include('footer.php'); ?>
</body>
</html>