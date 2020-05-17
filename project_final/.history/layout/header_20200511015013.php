<div class="header-middle pt--10 pb--10">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 ">
                <a href="index.html" class="site-brand">
                    <img src="image/logo.png" alt="">
                </a>
            </div>
            <div class="col-lg-3">
                <div class="header-phone ">
                    <div class="icon">
                        <i class="fas fa-headphones-alt"></i>
                    </div>
                    <div class="text">
                        <p>Free Support 24/7</p>
                        <p class="font-weight-bold number">+01-202-555-0181</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="main-navigation flex-lg-right">
                    <ul class="main-menu menu-right ">
                        <li class="menu-item">
                            <a href="index.php">Home</a>
                        </li>
                        <!-- Shop -->
                        <li class="menu-item has-children mega-menu">
                            <a href="javascript:void(0)">Sections <i class="fas fa-chevron-down dropdown-arrow"></i></a>
                            <ul class="sub-menu four-column">
                                <!-- read all section from database -->
                                <?php
                                            $queryReadSect="SELECT * FROM category";
                                            $resultReadSec=mysqli_query($conn,$queryReadSect);
                                           while($rowReadSec=mysqli_fetch_assoc($resultReadSec))
                                           {


                                            ?>
                                <li class="cus-col-25">
                                    <h3 class="menu-title"><a
                                            href="categorey.php?id=<?php echo $rowReadSec['id'] ?>"><?php echo $rowReadSec['category_name'] ?>
                                        </a></h3>

                                </li>
                                <?php } ?>
                                <!-- <li class="cus-col-25">
                                                <h3 class="menu-title"> <a href="javascript:void(0)">Shop List</a></h3>
                                                <ul class="mega-single-block">
                                                    <li><a href="shop-list.html">Fullwidth</a></li>
                                                    <li><a href="shop-list-left-sidebar.html">left Sidebar</a></li>
                                                    <li><a href="shop-list-right-sidebar.html">Right Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li class="cus-col-25">
                                                <h3 class="menu-title"> <a href="javascript:void(0)">Product Details
                                                        1</a></h3>
                                                <ul class="mega-single-block">
                                                    <li><a href="product-details.html">Product Details Page</a></li>
                                                    <li><a href="product-details-affiliate.html">Product Details
                                                            Affiliate</a></li>
                                                    <li><a href="product-details-group.html">Product Details Group</a>
                                                    </li>
                                                    <li><a href="product-details-variable.html">Product Details
                                                            Variables</a></li>
                                                </ul>
                                            </li>
                                            <li class="cus-col-25">
                                                <h3 class="menu-title"><a href="javascript:void(0)">Product Details
                                                        2</a></h3>
                                                <ul class="mega-single-block">
                                                    <li><a href="product-details-left-thumbnail.html">left Thumbnail</a>
                                                    </li>
                                                    <li><a href="product-details-right-thumbnail.html">Right
                                                            Thumbnail</a></li>
                                                    <li><a href="product-details-left-gallery.html">Left Gallery</a>
                                                    </li>
                                                    <li><a href="product-details-right-gallery.html">Right Gallery</a>
                                                    </li>
                                                </ul>
                                            </li> -->
                            </ul>
                        </li>
                        <!-- Pages -->
                        <li class="menu-item">
                            <a href="my-account.php"> Account </a>

                        </li>
                        <!-- Blog -->
                        <li class="menu-item has-children mega-menu">
                            <a href="javascript:void(0)">Blog <i class="fas fa-chevron-down dropdown-arrow"></i></a>
                            <ul class="sub-menu three-column">
                                <li class="cus-col-33">
                                    <h3 class="menu-title"><a href="javascript:void(0)">Blog Grid</a></h3>
                                    <ul class="mega-single-block">
                                        <li><a href="blog.html">Full Widh (Default)</a></li>
                                        <li><a href="blog-left-sidebar.html">left Sidebar</a></li>
                                        <li><a href="blog-right-sidebar.html">Right Sidebar</a></li>
                                    </ul>
                                </li>
                                <li class="cus-col-33">
                                    <h3 class="menu-title"><a href="javascript:void(0)">Blog List </a></h3>
                                    <ul class="mega-single-block">
                                        <!-- <li><a href="blog-list.html">Full Widh (Default)</a></li> -->
                                        <li><a href="blog-list-left-sidebar.html">left Sidebar</a></li>
                                        <li><a href="blog-list-right-sidebar.html">Right Sidebar</a></li>
                                    </ul>
                                </li>
                                <li class="cus-col-33">
                                    <h3 class="menu-title"><a href="javascript:void(0)">Blog Details</a>
                                    </h3>
                                    <ul class="mega-single-block">
                                        <li><a href="blog-details.html">Image Format (Default)</a></li>
                                        <li><a href="blog-details-gallery.html">Gallery Format</a></li>
                                        <li><a href="blog-details-audio.html">Audio Format</a></li>
                                        <li><a href="blog-details-video.html">Video Format</a></li>
                                        <li><a href="blog-details-left-sidebar.html">left Sidebar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item">
                            <a href="contact.html">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>