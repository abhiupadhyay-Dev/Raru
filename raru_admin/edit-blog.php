<?php include('../include/config.php');
include('verify_login.php'); ?>
<?php
	$title_tag = "Edit Blog";
	$breadcrumb = "Edit Blog";
?>
<?php 

$slider_dtls =$db->get_results("SELECT * FROM tbl_blog WHERE id='".$_REQUEST['id']."'");
//print_r($slider_dtls);
?>

<!DOCTYPE html>

<html lang="en">
<head>
<?php include 'includes/head.php'; ?>
</head>
<body>
<?php
if(isset($_POST['SubmitSlider']))
{
  $slug = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "-", strtolower($_POST['title'])));
  $query = $db->get_results("SELECT * FROM tbl_blog  WHERE  slug LIKE '$slug%'" );
  $numHits = count($query);
  if($numHits <= 0)
  {
   $slug_final = $slug;
  }
  else
  {
    
     $slug_final = $slug.'-'.$numHits;
  }

  if (!empty($_FILES['slider_photo1']))
  {
    $var1_upload = 'slider_photo1';
    $doc_types = 'images';
    $orig_upload_path = '../upload/blog/';
    
    if($image_path1 = image_upload($var1_upload,$doc_types,$orig_upload_path))
    {
      $image1 = $image_path1;
    }
    else
    {
      $image1 = $_POST['slider_old1'];
    }
  }
  else
  {
    $image1 = $_POST['slider_old1'];
  }
  $update_product = $db->query("UPDATE tbl_blog SET title='".addslashes($_POST['title'])."',des_1='".addslashes($_POST['des_1'])."',des_2='".addslashes($_POST['des_2'])."',image1='".$image1."',slug='".$slug_final."' WHERE id='".$_REQUEST['id']."'");
}
  if($update_product)
  {
    $message = "Product Updated Successfully.";
    $page = "blog.php?cat_id=".$_REQUEST['cat_id']."";
    redirect($page); 

  }
?>
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
        <div class="col-md-12"> 
          
          <!-- START PROJECTS BLOCK -->
          
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="panel-title-box">
                <h3>Edit Slider Image</h3>
                
                <!--span>Orders activity</span--> 
                
              </div>
              <ul class="panel-controls">
                <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
              </ul>
            </div>
            <div class="panel-body">
              <form class="form-horizontal" id="addslider" method="post" action="" enctype="multipart/form-data">
              <?php if($message){ echo $message;}?>
              
                    <div class="form-group">
                          <label class="col-md-3 col-xs-12 control-label">Title</label>
                        <div class="col-md-6 col-xs-12">
                              <input type="text" id="title" name="title" class="validate[required] form-control" value="<?php echo $slider_dtls[0]->title;?>" />
                        </div>
                    </div>
                
                  
                  <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Description 1</label>
                    <div class="col-md-6 col-xs-12">
                     <textarea name="des_1" id="des_1" class="form-control"><?php echo $slider_dtls[0]->des_1;?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Description 2</label>
                    <div class="col-md-6 col-xs-12">
                     <textarea name="des_2" id="des_2" class="form-control"><?php echo $slider_dtls[0]->des_2;?></textarea>
                    </div>
                  </div>
               		<div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Choose Blog Image </label>
                    <div class="col-md-6 col-xs-12">
                      
 					          <input type="file" class="form-control" value="" id="slider_photo1" name="slider_photo1"/>
                    <input type="hidden" name="slider_old1" id="slider_old1" value="<?php echo $slider_dtls[0]->image1?>">
                    </div>
                    <div class="col-md-3 col-xs-12">
                    <img src="../upload/blog/<?php echo $slider_dtls[0]->image1; ?>" width="60%" height="50%">
                   </div>
                  </div>
                  <div class="form-group padding-10 padding-bottom-0">
                    <button class="btn btn-primary pull-right btn-cancel" data-url="blog.php?cat_id=<?php echo $_REQUEST['cat_id']?>">Back <span class="fa fa-undo fa-right"></span></button>
                    <button class="btn btn-primary pull-right" name="SubmitSlider" id="SubmitSlider">Submit<span class="fa fa-floppy-o fa-right"></span></button>
                  </div>
                </form>
            </div>
          </div>
          
          <!-- END PROJECTS BLOCK --> 
          
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
<script src="ckeditor/ckeditor.js"></script> 
<script src="ckeditor/adapters/jquery.js"></script> 
<script>
$(document).ready(function(){
	$("#addslider").validationEngine();
});
$('#des_1').ckeditor();
$('#des_2').ckeditor();
$('#des_3').ckeditor();
$('#des_4').ckeditor();
</script> 
</body>
</html>
