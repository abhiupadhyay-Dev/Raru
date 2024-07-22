<?php include('include/config.php');
if($_REQUEST['subslug'] == ''){
    $category_details = $db->get_results("SELECT * FROM product_category WHERE status='1' AND slug='".$_REQUEST['slug']."'"); 
  }
  if(count($category_details)>0)
      {
          foreach($category_details as $cat_dtls)
          {

          }
      } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- metas -->
    <meta charset="utf-8" />
    <meta name="author" content="Website Design Templates" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="keywords" content="Wealth Management, Portfolio Management, Equity & Bonds Market" />
    <meta name="description" content="RARU CAPITAL IFSC PRIVATE LIMITED is a dynamic and innovative company dedicated to providing India's most advanced platform for easy, fast, and transparent financial services." />

    <!-- title  -->
    <title>RARU CAPITAL IFSC PRIVATE LIMITED</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="img/logos/favicon.png">
    <link rel="apple-touch-icon" href="img/logos/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/logos/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/logos/apple-touch-icon-114x114.png">

    <!-- plugins -->
    <link rel="stylesheet" href="css/plugins.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">


    <!-- search css -->
    <link rel="stylesheet" href="search/search.css">

    <!-- quform css -->
    <link rel="stylesheet" href="quform/css/base.css">

    <!-- theme core css -->
    <link href="css/styles.css" rel="stylesheet">

</head>

<body>

    <!-- PAGE LOADING
    ================================================== -->
    <div id="preloader"></div>

    <!-- MAIN WRAPPER
    ================================================== -->
    <div class="main-wrapper">

        <!-- HEADER
        ================================================== -->
                <header class="header-style1 menu_area-light">

            <div class="navbar-default border-bottom border-color-light-white">

                <!-- start top search -->
                <div class="top-search bg-primary">
                    <div class="container">
                        <form class="search-form" action="https://lifesthtml.websitelayout.net/search.html" method="GET" accept-charset="utf-8">
                            <div class="input-group">
                                <span class="input-group-addon cursor-pointer">
                                    <button class="search-form_submit fas fa-search text-white" type="submit"></button>
                                </span>
                                <input type="text" class="search-form_input form-control" name="s" autocomplete="off" placeholder="Type & hit enter...">
                                <span class="input-group-addon close-search mt-1"><i class="fas fa-times"></i></span>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end top search -->

                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-12">
                            <div class="menu_area alt-font">
                                <nav class="navbar navbar-expand-lg navbar-light p-0">
                                    <div class="navbar-header navbar-header-custom">
                                        <!-- start logo -->
                                        <a href="index.html" class="navbar-brand"><img id="logo" src="img/logos/footer-logo.png" alt="logo"></a>
                                        <!-- end logo -->
                                    </div>

                                    <div class="navbar-toggler"></div>

                                    <!-- start menu area -->
                                    <ul class="navbar-nav ms-auto" id="nav" style="display: none;">
                                        <li><a href="index.html">Home</a></li>
                                        <li>
                                            <a href="#!">About Us</a>
                                            <ul>
                                                <li><a href="about-company.html">About Company</a></li>
                                                <li><a href="about-gift-city.html">About Gift City</a></li>
                                                <li><a href="about-ifsc.html">About IFSC</a></li>
                                                <li><a href="vision-mission.html">Vision Mission</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="directors-desk.html">Director’s Desk</a></li>
                                        <li><a href="mentor.html">Mentor</a></li>
                                        <li><a href="our-services.html">Our Services</a>
                                            <ul>
                                                <li><a href="broking.html">Broking</a></li>
<!-- <li><a href="fund-management-entity.html">Fund Management Entity<span class="ti-arrow-right"></span></a></li>  -->
                                                <li><a href="financial-products-distribution.html">Financial Product Distribution</a></li> 
                                                <li><a href="merchant-banking.html">Merchant Banking</a></li>                                                  
                                            </ul>
                                        </li>
                                        <li class="active"><a href="blogs.php">Blogs</a></li>
                                         <li><a href="careers.php">Careers</a></li>
                                    </ul>
                                    <!-- end menu area -->

                                    <!-- start attribute navigation -->
                                    <div class="attr-nav align-items-lg-center main-font">
                                        <ul>
                                            <li class="d-none d-sm-block d-md-block d-lg-none d-xl-inline-block"><a href="contact.html" class="butn-style3 text-black"><span>contact</span></a></li>
                                        </ul>
                                    </div>
                                    <!-- end attribute navigation -->
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>


<?php
    
   if($_REQUEST['subslug'] == ''){
    $category_details = $db->get_results("SELECT * FROM product_category WHERE status='1' AND slug='".$_REQUEST['slug']."'"); 
  }
  if(count($category_details)>0)
      {
          foreach($category_details as $cat_dtls)
          {

          }
      }
?>  
  
              <!-- PAGE TITLE
        ================================================== -->
        <section class="page-title-section top-position1 bg-img cover-background left-overlay-dark" data-overlay-dark="6" data-background="img/banner/page-title.jpg">
            <div class="container">
                <div class="page-title">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Blogs</h1>
                        </div>
                        <div class="col-md-12">
                            <ul class="ps-0">
                                <li><a href="index.html" class="text-white">Home</a></li>
                                <li><a href="#!" class="text-white">Blogs</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-inline-block p-2 border border-width-2 border-white top-20 right-10 ani-move position-absolute rounded-circle z-index-1"></div>
            <div class="d-inline-block p-2 border border-width-2 border-white bottom-10 left-10 ani-left-right position-absolute z-index-1"></div>
            <img src="img/content/shape5.png" class="position-absolute top-20 left-5 ani-top-bottom z-index-1" alt="...">
        </section>


<!-- BLOG GRID
        ================================================== -->
        <section>
            <div class="container">
                <div class="section-heading text-center mb-2-9 mb-lg-6 wow fadeIn" data-wow-delay="100ms">
                    <span>Our Blog</span>
                    <h2 class="display-22 display-sm-18 display-md-16 display-lg-11 mb-0">Latest news &amp; updates</h2>
                </div>

                <div class="row g-xl-5 mt-n2-9">

                    <div class="col-lg-4">
                        <div class="blog sidebar ps-xl-4">
                            
                            <div class="widget mb-1-9 wow fadeIn" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeIn;">
                                <div class="widget-title">
                                    <h3 class="mb-0 h6">Categories</h3>
                                </div>
                                <div class="p-1-9">
                                    <ul class="list-style4">
                                        <?php $product_category = $db->get_results("SELECT * FROM product_category WHERE status='1'");
                                         if(count($product_category)>0)
                                         {
                                          $i=0;
                                          foreach($product_category as $cat_dtls)
                                        {?>
                                        <li><a href="blog-category.php?slug=<?php echo $cat_dtls->slug?>"><?php echo $cat_dtls->name;?></a></li>
                                        <?php }}?>
                                    </ul>
                                </div>
                            </div>
                            <div class="widget mb-1-9 wow fadeIn" data-wow-delay="400ms" style="visibility: visible; animation-delay: 400ms; animation-name: fadeIn;">
                                <div class="widget-title">
                                    <h3 class="mb-0 h6">Recent Posts</h3>
                                </div>

                                <div class="p-1-9">

                                        <?php $home_slider = $db->get_results("SELECT * FROM tbl_blog order by id desc limit 5");
                            if(count($home_slider)>0)
                             {
                             $i=0;
                             foreach($home_slider as $slider_dtls)
                            {?>
                                    <div class="d-flex mb-4">
                                        <div class="flex-shrink-0 image-hover">
                                            <img height="70px" width="70px" src="upload/blog/<?php echo $slider_dtls->image1?>" class="rounded" alt="...">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h4 class="h6"><a href="blog-single.php?slug=<?php echo $slider_dtls->slug?>"><?php echo $slider_dtls->title;?></a></h4>
                                            <p class="mb-0 small"> <?php echo $slider_dtls->date;?></p>
                                        </div>
                                    </div>
                                    <?php }}?>
                                </div>
                            </div>                            
                        </div>
                    </div>
            <div class="col-lg-8 mb-2-9 mb-lg-0">                            
                <div class="row">
                     <?php if($_REQUEST['subslug'] == ''){
                    $slider_dtls = $db->get_results("SELECT * FROM tbl_blog WHERE status='1' AND cat_id='".$category_details[0]->id."'ORDER BY id DESC");
                    }
                    
                      if(count($slider_dtls)>0)
                      {
                          foreach($slider_dtls as $slider_dt)
                          {?>
                         
                        <div class="col-md-6 col-lg-6 col-sm-12 col-12 mb-2-9 wow fadeIn" data-wow-delay="200ms">
                            <article class="card card-style3 border-0 h-100">
                                <div class="card-image position-relative">
                                    <img src="upload/blog/<?php echo $slider_dt->image1?>" class="card-img-top blog-img" alt="...">
                                </div>
                                <div class="card-body p-1-9 position-relative">
                                    <ul class="mb-2 p-0 d-inline-block">
                                        <li class="display-30 d-inline-block"><i class="fa fa-calendar pe-2 text-primary"></i><?php echo $slider_dt->date; ?></li>
                                        <li class="display-30 d-inline-block text-capitalize me-3"><a href="#!"><i class="fa fa-building text-primary pe-2"></i><?php echo $slider_dt->company_name; ?></i></a></li>
                                    </ul>
                                    <h3 class="h4 mb-4"><a href="blog-single.php?slug=<?php echo $slider_dt->slug?>"><?php echo $slider_dt->title;?></a></h3>
                                    <a href="blog-single.php?slug=<?php echo $slider_dt->slug?>" class="butn-style3 text-black"><span>Read More</span></a>
                                </div>
                            </article>
                        </div>
                    <?php }}?>
                </div>
            </div>
         </div>
            </div>
            <img src="img/content/shape7.png" class="position-absolute bottom-35 right-5 ani-move d-none d-sm-block" alt="...">
        </section>


        <!-- FOOTER
        ================================================== -->
                <footer class="footer-style3 pt-0 overflow-visible">
            <div class="container">
                <div class="row mt-n2-9">
                    <div class="col-sm-6 col-lg-3 pe-5 mt-2-9 wow fadeIn" data-wow-delay="200ms">
                        <div class="footer-top">
                            <div class="footer-logo">
                                <img  src="img/logos/footer-logo.png" alt="logo">
                            </div>                            
                            <p class="mb-1-6 text-white mt-1-6 text-justify">At RARU CAPITAL, we believe in the philosophy of offering a wide range of stock products to cater to the diverse needs of our clients. </p>
                            <ul class="social-icon-style1 mb-0 d-inline-block list-unstyled">
                                <li class="d-inline-block me-2"><a href="https://www.instagram.com/rarucapital__2516/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <li class="d-inline-block me-2"><a href="https://twitter.com/rarucapital" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li class="d-inline-block"><a href="https://www.linkedin.com/company/raru-capital-ifsc-private-limited/?originalSubdomain=in" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mt-2-9 wow fadeIn" data-wow-delay="350ms">
                        <h3 class="h5 mb-1-9">Quick Links</h3>
                        <ul class="footer-list ps-0">
                            <li>
                                <a href="about-company.html">About Company</a>
                            </li>
                            <li>
                                <a href="directors-desk.html">Director’s Desk</a>
                            </li>
                            <li>
                                <a href="mentor.html">Mentor</a>
                            </li>
                            <li>
                                <a href="our-services.html">Our Services</a>
                            </li>
                            <li>
                                <a href="blogs.php">Blogs</a>
                            </li>
                            <li>
                                <a href="careers.php">Careers</a>
                            </li>
                            <li>
                                <a href="contact.html">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-lg-3 mt-2-9 wow fadeIn" data-wow-delay="500ms">
                        <h3 class="h5 mb-1-9">Quick Links</h3>
                        <ul class="footer-list ps-0">
                            
                            <li>
                                <a href="broking.html">Broking</a>
                            </li>
                            <!-- <li><a href="fund-management-entity.html">Fund Management Entity<span class="ti-arrow-right"></span></a></li>  -->
                                                <li><a href="financial-products-distribution.html">Financial Product Distribution</a></li> 
                                                <li><a href="merchant-banking.html">Merchant Banking</a></li>
                            <li>
                                <a href="about-gift-city.html">About Gift City</a>
                            </li> 
                            <li>
                                <a href="about-ifsc.html">About IFSC</a>
                            </li>
                            <li>
                                <a href="vision-mission.html">Vision Mission</a>
                            </li>
                            <li> 
                                <div class="language-change-wrapper">
                                    <div id="google_translate_element"></div>

                                    <script type="text/javascript">
                                    function googleTranslateElementInit() {
                                      new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                                    }
                                    </script> 

                                        <!-- <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>  -->

                                    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> 
                                </div>
                            </li> 
                        </ul>
                    </div>
                    <div class="col-sm-6 col-lg-3 mt-2-9 wow fadeIn" data-wow-delay="650ms">
                        <h3 class="h5 mb-1-9">Contact Details</h3>
                        <div class="d-flex contact-number align-items-center">
                            <div class="flex-shrink-0">
                                <i class="ti-mobile display-15 text-white"></i>
                            </div>
                            <div class="flex-grow-1 ms-4">
                                <p class="text-white-new mb-2">Rakesh Lahoti:</p>
                                <a class="text-white-new" href="tel:+91 9227540053">+919227540053</a>
                            </div>
                        </div>
                        <div class="d-flex contact-number mt-4">
                            <div class="flex-shrink-0">
                                <i class="ti-mobile display-15 text-white"></i>
                            </div>
                            <div class="flex-grow-1 ms-4">
                                <p class="text-white-new mb-2">Rakesh Patel:</p>
                                <a class="text-white-new" href="tel:+91 9825005351">+919825005351</a>
                            </div>                             
                        </div>
                        <div class="d-flex contact-number mt-4">
                            <div class="flex-shrink-0">
                                <i class="ti-email display-15 text-white"></i>
                            </div>
                            <div class="flex-grow-1 ms-4">
                                <p class="text-white-new mb-2">Email Address</p>
                                <a class="text-white-new" href="mail:info@rarucapital.com">info@rarucapital.com</a>
                            </div>                             
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <p>&copy; <span class="current-year"></span> all rights reserved By: <a href="https://rarucapital.com/" target="_blank" class="text-primary text-white-hover">RARU CAPITAL</a></p>
                            <p>Designed & Developed by: <a href="https://visionartinfotech.com/" target="_blank" class="text-primary text-white-hover">Vision Art Infotech</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>

    
<!--download brochure-->
<div class="buy-theme alt-font d-none d-lg-inline-block">
      <a data-fancybox data-src="#login-form" target="_blank">
        <!-- <div class="contact_icon2"> -->
          <i class="fas fa-file my-float2"></i>
          <span>Our Brochure</span>
        <!-- </div> -->
        <div id="login-form" class="form-popup">
            <form method="post" action="brochure-mailpdf.php" class="form-container">

              <label for="email"><b>Company Name</b></label>
              <input type="text" placeholder="Enter Company Name" name="company_name" required>

              <label for="email"><b>Email</b></label>
              <input type="text" placeholder="Enter Email" name="email" required>

              <label for="email"><b>Mobile No</b></label>
              <input type="text" placeholder="Enter Mobile No" name="telephone" required>

              <button type="submit" name="submit" class="btn">Submit</button>
          </form>
        </div>
    </a>
    </div>
   

    <div class="all-demo alt-font d-none d-lg-inline-block"><a href="https://api.whatsapp.com/send?phone=+919227540053&text=Hi,%20I%20have%20contacted%20through%20your%20website." target="_blank"><i class="fab fa-whatsapp"></i><span>Whatsapp Massage</span></a></div>

    <!-- SCROLL TO TOP
    ================================================== -->
    <a href="#!" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>

    <!-- all js include start -->

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- popper js -->
    <script src="js/popper.min.js"></script>

    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>

    <!-- jquery -->
    <script src="js/core.min.js"></script>

    <!-- Search -->
    <script src="search/search.js"></script>

    <!-- custom scripts -->
    <script src="js/main.js"></script>

    <!-- form plugins js -->
    <script src="quform/js/plugins.js"></script>

    <!-- form scripts js -->
    <script src="quform/js/scripts.js"></script>

    <!-- all js include end -->
    <script src="js/jquery.fancybox.min.js"></script>

</body>

</html>