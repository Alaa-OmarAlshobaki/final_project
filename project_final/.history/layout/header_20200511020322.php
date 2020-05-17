<link href="admin/fontawesome-pro/css/all.min.css" rel="stylesheet">
<script src="admin/fontawesome-pro/js/all.min.js"></script>
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
                        <a href="chat.php" class="mb-5"> <i class="fal fa-comments-alt"></i></a>
                    </div>
                    <div class="text">
                        <p>Free Support</p>
                        <p class="font-weight-bold number">Send Massage</p>
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

                            </ul>
                        </li>
                        <!-- Pages -->
                        <li class="menu-item">
                            <a href="my-account.php">Account </a>

                        </li>
                        <!-- Blog -->

                        <li class="menu-item">
                            <a href="contact.html">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>