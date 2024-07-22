<div class="page-sidebar">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="../index.html" style="font-size: 18px">RARU CAPITAL IFSC</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="#" class="profile-mini">
                <img src="../img/logos/footer-logo.png" alt="RARU"/>
            </a>
            <div class="profile">
                <div class="profile-image">
                    <img src="../img/logos/footer-logo.png" alt="RARU"/>
                </div>
            </div>
        </li>
        <!--li class="xn-title">Navigation</li-->
        <li <?php if($title_tag == 'Dashboard') echo 'class="active"'; ?>>
            <a href="index.php"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
        </li>
        <li <?php if($title_tag == 'Blog') echo 'class="active"'; ?>>
            <a href="blog_category.php"><span class="fa fa-sliders"></span> <span class="xn-text">Blog</span></a>
        </li>
       
        <li <?php if($title_tag == 'Change Password') echo 'class="active"'; ?>><a href="change-password.php"><span class="fa fa-unlock-alt"></span> <span class="xn-text">Change Password</span></a></li>

    </ul>
    <!-- END X-NAVIGATION -->
</div>
