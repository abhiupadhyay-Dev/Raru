<?php 
include('../include/config.php');
include('verify_login.php'); 
	$title_tag = "Blog";
    $breadcrumb = "Blog";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'includes/head.php'; ?>
</head>
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
  }
  $date=date("Y-m-d");
  $company_name="RARU CAPITAL IFSC PRIVATE LIMITED";
  $product = $db->query("INSERT INTO `tbl_blog`(`cat_id`,`title`,`date`,`company_name`,`des_1`,`des_2`,`image1`,`slug`,`status`) VALUES ('".$_REQUEST['cat_id']."','".addslashes($_POST['title'])."','".$date."','".$company_name."','".addslashes($_POST['des_1'])."','".addslashes($_POST['des_2'])."','".$image1."','".$slug_final."','1')");

  if($product)
  {
    $message = "Blog Create Successfully.";
    $page = "blog.php?cat_id=".$_REQUEST['cat_id']."";
    redirect($page);
  }
}
if($_REQUEST['action'] =='delete')
{

    global $db;
    $sqlnew   = "DELETE FROM `tbl_blog` WHERE `id` = ".$_REQUEST['id']."";
    $querynew = $db->query($sqlnew);
    if($querynew)
    {
		$message = "delete successfully";
        $page = "blog.php?cat_id=".$_REQUEST['cat_id']."";
        redirect($page); 
    }
}
?>


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
        <div class="col-md-12"> 
          
          <!-- START PROJECTS BLOCK -->
          <div class="panel panel-default tabs">
            <ul class="nav nav-tabs" role="tablist">
              <li class="active"><a href="#slider" role="tab" data-toggle="tab">All Blog</a></li>
              <li><a href="#add-slider" role="tab" data-toggle="tab">Add Blog</a></li>
            </ul>
            <div class="panel-body tab-content">
              <div class="tab-pane active" id="slider" style="overflow-x:auto;">
                <table class="table table-hover datatable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>Date</th>
                      <th>Company Name</th>
                      <th>Image</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $home_slider = $db->get_results("SELECT * FROM tbl_blog WHERE status='1' AND cat_id='".$_REQUEST['cat_id']."' ORDER BY id DESC");
          				  if(count($home_slider)>0)
          				  {
          					  $i=0;
          					  foreach($home_slider as $slider_dtls)
          					  {?>
                    <tr>
                      <td><?php echo $i= $i+1;?></td>
                      <td><?php echo $slider_dtls->title; ?></td>
                      <td><?php echo $slider_dtls->date; ?></td>
                      <td><?php echo $slider_dtls->company_name; ?></td>
                      <td><img src="../upload/blog/<?php echo $slider_dtls->image1;?>" width="70" height="40"></td>
                      <td class="center">
                        <a href="edit-blog.php?id=<?php echo $slider_dtls->id;?>&cat_id=<?php echo $_REQUEST['cat_id'];?>" title="Edit"><span class="fa fa-pencil"></span></a>

                        <a href="#" class="mb-control" data-box="#item-delete" data-item="id" data-item-number="<?php echo $slider_dtls->id;?>" data-toggle="tooltip" data-placement="top" title="Delete"><span class="fa fa-trash-o"></span></a>
                            </td>
                    </tr>
                    <?php }
				  }?>
                  </tbody>
                </table>
              </div>
              <div class="tab-pane" id="add-slider">
                <form class="form-horizontal" id="addSlider" method="post" action="" enctype="multipart/form-data">
                  <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Title</label>
                    <div class="col-md-6 col-xs-12">
                      <input type="text" id="title" name="title" class="validate[required] form-control" />
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Description 1</label>
                    <div class="col-md-6 col-xs-12">
                     <textarea name="des_1" id="des_1" class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Description 2</label>
                    <div class="col-md-6 col-xs-12">
                     <textarea name="des_2" id="des_2" class="form-control"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Choose Blog Image</label>
                    <div class="col-md-6 col-xs-12">
                      <input type="file" class="form-control" id="slider_photo1" name="slider_photo1"/>
                    </div>
                  </div>
                  <div class="form-group padding-10 padding-bottom-0">
                    <button class="btn btn-primary pull-right btn-cancel" data-url="blog.php?cat_id=<?php echo $_REQUEST['cat_id']?>">Back <span class="fa fa-undo fa-right"></span></button>
                    <button class="btn btn-primary pull-right" name="SubmitSlider" id="SubmitSlider">Submit<span class="fa fa-floppy-o fa-right"></span></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- END PROJECTS BLOCK --> 
          
        </div>
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
	$("#addSlider").validationEngine();
});

$('#des_1').ckeditor();
$('#des_2').ckeditor();
$('#des_3').ckeditor();
$('#des_4').ckeditor();
</script>
<!-- END FOOTER SCRIPTS & AUDIO PRELOAD -->
</body>
</html>
