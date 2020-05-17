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