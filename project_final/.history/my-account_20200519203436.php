<?php include("admin/include/function.php") ;
 include("admin/include/connection.php") ;
session_start();
if(!isset($_SESSION['id'])){
	direct("login.php");
}
$id_Cus=$_SESSION['id'];
isset($_GET['idProd']);
if(isset($_POST['addToCart'])){
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart']=array();
        $_SESSION['cart'][0]['productid']=$_GET['idProd'];
        $_SESSION['cart'][0]['quantity']=$_POST['quantity'];
        echo 'Product successfully added';
    }
    else {
        /*if exist change quantity*/
                if(isexist($_GET['idProd'],$_POST['quantity'])){
                    echo 'Quantity updated successfully';
                }
        /*else add new product in cart*/
                else{
                    $m=$_SESSION['cart'];
                    $max=count($m);
                    $_SESSION['cart'][$max]['productid']=$_GET['idProd'];
                    $_SESSION['cart'][$max]['quantity']=$_POST['quantity'];
                    echo 'Product successfully added';
                }
            }
        
        
   
  
    // $_SESSION['prod_card'][]=$_GET['id'];
    // $quantity =$_POST['quantity'];
    
   
   
}


function isexist($pid,$quantity) {
    $m=$_SESSION['cart'];
    $max=count($m);
    for($i=0;$i<$max;$i++){
        if($pid==$_SESSION['cart'][$i]['productid']){
            $_SESSION['cart'][$i]['quantity']=$quantity;
            return true;
        }
    }
    return false;

}
if(!isset($_SESSION['cart'])){
    
}else{

$max=count($_SESSION['cart']);
for($i=0;$i<$max;$i++){
    $prod_id=$_SESSION['cart'][$i]['productid'];
    $quantity=$_SESSION['cart'][$i]['quantity'];
    $query="SELECT * FROM product
          WHERE id_product= $prod_id";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($result)){
 $prodctCard[]=array($row,$quantity);

}

}
    

}
// foreach ($_SESSION['cart'] as $prod_id) {
//    $query="SELECT * FROM product
         
//            WHERE id_product= $prod_id";
//    $result=mysqli_query($conn,$query);
//    while($row=mysqli_fetch_assoc($result)){
      
//        $prodctCard[]=$row;
      
//    }
// }

$total=0;


?>



<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pustok - Book Store </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/plugins.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
    <link href="admin/fontawesome-pro/css/all.min.css" rel="stylesheet">
    <script src="admin/fontawesome-pro/js/all.min.js"></script>
</head>

<body>
    <div class="site-wrapper" id="top">
        <div class="site-header d-none d-lg-block">
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
                                    <a href="chat\index.php"> <i class="fal fa-comments-alt"></i></a>
                                </div>
                                <div class="text mt-3">
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
                                        <a href="javascript:void(0)">Sections <i
                                                class="fas fa-chevron-down dropdown-arrow"></i></a>
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
                                                        href="categorey.php?idProd=<?php echo $rowReadSec['id'] ?>"><?php echo $rowReadSec['category_name'] ?>
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
                                    <?php if(isset($_SESSION['id'])) { ?>
                                    <li class="menu-item">
                                        <a href="logout_customer.php"><i class="fal fa-sign-out"></i></a>
                                    </li>
                                    <?php } ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom pb--10">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <nav class="category-nav   ">
                                <div>
                                    <a href="javascript:void(0)" class="category-trigger"><span class="mr-3"><i
                                                class="fa fa-bars"></i></span>Browse
                                        Sections</a>
                                    <ul class="category-menu">
                                        <?php
                                          $queryCat ="SELECT * FROM category ";
                                           
                                          $resultCat=mysqli_query($conn,$queryCat);
                                          while($rowCat =mysqli_fetch_assoc($resultCat)){ 
                                            $id= $rowCat['id'];
                                          
                                        ?>
                                        <li class="cat-item has-children">
                                            <a
                                                href="categorey.php?idProd=<?php echo $rowCat['id'] ?>"><?php echo $rowCat['category_name'] ?></a>
                                            <ul class="sub-menu">
                                                <?php
                                                       $querySub ="SELECT * FROM product
                                                       INNER JOIN category
                                                       ON product.id_cat = category.id 
                                                       WHERE id_cat=$id";
                                                        
                                                       $resultSub=mysqli_query($conn,$querySub);
                                                       while($rowSub =mysqli_fetch_assoc($resultSub)){ 
                                                ?>
                                                <li> <a
                                                        href="product.php?idProd=<?php echo $rowSub['id_product'] ?>"><?php echo $rowSub['prod_name'] ?></a>
                                                </li>
                                                <?php  } ?>
                                            </ul>
                                        </li>

                                        <?php  } ?>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="col-lg-5">
                            <div class="header-search-block">
                                <input type="text" placeholder="Search entire store here">
                                <button>Search</button>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="main-navigation flex-lg-right">
                                <div class="cart-widget">
                                    <div class="login-block">
                                        <?php  if(!isset($_SESSION['id'])) { ?>
                                        <a href="login.php" class="font-weight-bold">Login</a> <br>
                                        <span>or</span><a href="login-register.php">Register</a>
                                        <?php } ?>
                                    </div>
                                    <?php  if(isset($_SESSION['id'])) { ?>
                                    <div class="cart-block">
                                        <div class="cart-total">
                                            <span class="text-number">
                                                <?php echo count($_SESSION['cart']) ;
                                             
                                                ?>
                                            </span>
                                            <span class="text-item">
                                                Shopping Cart
                                            </span>
                                            <span class="price">
                                                <?php
                                            if(empty($prodctCard)){
                                                
                                            }else {
                                                foreach ($prodctCard as $key => $singleProCard) {
                                                
                                               
                                                    
                                                        
                                                       
                                         
                                                            
                                                       
                                                        $idP=$singleProCard[0]['id_product'];
                                                  
                                                    $q="select * from cat_discount_pro where id_pro =$idP ";
                                                    $rs=mysqli_query($conn,$q);
                                                    $rowQ=mysqli_fetch_assoc($rs);
                                                    if(isset( $rowQ['id_dis'])){
                                                    $total+= $singleProCard[1]* ($singleProCard[0]['price_prod']-($singleProCard[0]['price_prod']*$rowQ['id_dis']/100));
                                                    }else{
                                                        $total+=  $singleProCard[1]*$singleProCard[0]['price_prod'];
                                                    }

                                            
                                                
                                                
                                            }
                                            }
                                            

                                                 
                                               
                                                echo $total;  ?> JOD
                                                <i class="fas fa-chevron-down"></i>
                                            </span>
                                        </div>
                                        <div class="cart-dropdown-block">
                                            <?php
                                            
                                                if(empty($prodctCard)){
                                                
                                                }else {
                                                    
                                                foreach ($prodctCard as $key => $singleProCard) {
                                                    ?>
                                            <span class="price ml-3">
                                                <span class="qty price-discount ">
                                                    <?php
                                               echo $singleProCard[1];
                                               ?>
                                                    X</span>
                                            </span>
                                            <?php

                                               foreach ($singleProCard as $key2 => $ProCard) {
                                                   
                                               

                                                if ($key2==0) {
                                                  
                                                        $idP= $ProCard['id_product'] ;
                                                    $q="select * from cat_discount_pro where id_pro = $idP";
                                                    $rs=mysqli_query($conn,$q);
                                                    $rowQ=mysqli_fetch_assoc($rs);
                                                    if(isset( $rowQ['id_dis'])){
                                                $total+= $ProCard['price_prod']-($ProCard['price_prod']*$rowQ['id_dis']/100);
                                                    }else{
                                                        $total+= $ProCard['price_prod'];  
                                                    }
                                                # code...
                                            ?>
                                            <div class=" single-cart-block ">
                                                <div class="cart-product">
                                                    <a href="product-details.html" class="image">
                                                        <?php $img = $ProCard['id_product'];
                                                        $queryGall="select * from gallery where pro_id=$img";
                                                        $resGall=mysqli_query($conn,$queryGall);
                                                        $rowGall=mysqli_fetch_assoc($resGall)  ?>
                                                        <img src="admin/<?php echo $rowGall['image']?>" alt="">
                                                    </a>
                                                    <div class="content">
                                                        <h3 class="title"><a
                                                                href="product-details.html"><?php echo $ProCard['prod_name'];?></a>
                                                        </h3>
                                                        <?php } ?>
                                                        <p class="price">

                                                            <!-- <span class="qty">
                                                                1 X
                                                                <?php  //if ($key2==1){ echo $ProCard ; } ?>
                                                            </span> -->

                                                            <?php
                                                             if ($key2==0) {
                                                          $idP= $ProCard['id_product'] ;
                                                $q="select * from cat_discount_pro where id_pro = $idP";
                                                $rs=mysqli_query($conn,$q);
                                                $rowQ=mysqli_fetch_assoc($rs);
                                                if(isset( $rowQ['id_dis'])){
                                                  ?>
                                                            <span
                                                                class="price"><?php echo $ProCard['price_prod']-($ProCard['price_prod']*$rowQ['id_dis']/100) ?>
                                                                JOD</span>
                                                            <del
                                                                class="price-old"><?php echo $ProCard['price_prod']  ?>JOD</del>


                                                            <?php


                                                }else {
                                                    ?>

                                                            <span
                                                                class="price"><?php echo $ProCard['price_prod']  ?>JOD</span>

                                                            <?php }


                                                ?>
                                                            <!-- discount -->

                                                            <span class="price-discount">
                                                                <?php $idPro= $ProCard['id_product'] ;
                                                $q="select * from cat_discount_pro where id_pro = $idPro";
                                                $rs=mysqli_query($conn,$q);
                                                $rowQ=mysqli_fetch_assoc($rs);
                                                if(isset( $rowQ['id_dis'])){
                                                    echo $rowQ['id_dis'] . "%";
                                                }else {
                                                    echo "no Discount";
                                                }
                                                
                                                
                                                ?>

                                                            </span>





                                                        </p>
                                                        <a href="deleteprocard.php?idProd=<?php echo $ProCard['id_product']  ?>"
                                                            class="cross-btn"><i class="fas fa-times"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } } }}?>
                                            <div class=" single-cart-block ">
                                                <div class="btn-block">
                                                    <a href="cart.php" class="btn">View Cart <i
                                                            class="fas fa-chevron-right"></i></a>
                                                    <a href="checkout.php" class="btn btn--primary">Check Out <i
                                                            class="fas fa-chevron-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-mobile-menu">
            <header class="mobile-header d-block d-lg-none pt--10 pb-md--10">
                <div class="container">
                    <div class="row align-items-sm-end align-items-center">
                        <div class="col-md-4 col-7">
                            <a href="index.html" class="site-brand">
                                <img src="image/logo.png" alt="">
                            </a>
                        </div>
                        <div class="col-md-5 order-3 order-md-2">
                            <nav class="category-nav   ">
                                <div>
                                    <a href="javascript:void(0)" class="category-trigger"><span class="mr-3"><i
                                                class="fa fa-bars"></i></span>Browse
                                        Sections</a>
                                    <ul class="category-menu">
                                        <?php
                                          $queryCatMob ="SELECT * FROM category ";
                                           
                                          $resultCatMob=mysqli_query($conn,$queryCatMob);
                                          while($rowCatMob =mysqli_fetch_assoc($resultCatMob)){ 
                                            $id= $rowCatMob['id'];
                                          
                                        ?>
                                        <li class="cat-item has-children">
                                            <a
                                                href="categorey.php?idProd=<?php echo $rowCatMob['id'] ?>"><?php echo $rowCatMob['category_name'] ?></a>
                                            <ul class="sub-menu">
                                                <?php
                                                       $querySubMob ="SELECT * FROM product
                                                       INNER JOIN category
                                                       ON product.id_cat = category.id 
                                                       WHERE id_cat=$id";
                                                        
                                                       $resultSubMob=mysqli_query($conn,$querySubMob);
                                                       while($rowSubMob =mysqli_fetch_assoc($resultSubMob)){ 
                                                ?>
                                                <li> <a
                                                        href="product.php?idProd=<?php echo $rowSubMob['id_product'] ?>"><?php echo $rowSubMob['prod_name'] ?></a>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                        <?php } ?>

                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="col-md-3 col-5  order-md-3 text-right">
                            <div class="mobile-header-btns header-top-widget">
                                <ul class="header-links">
                                    <li class="sin-link">
                                        <a href="cart.php" class="cart-link link-icon"><i class="ion-bag"></i></a>
                                    </li>
                                    <li class="sin-link">
                                        <a href="javascript:" class="link-icon hamburgur-icon off-canvas-btn"><i
                                                class="ion-navicon"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!--Off Canvas Navigation Start-->
            <aside class="off-canvas-wrapper">
                <div class="btn-close-off-canvas">
                    <i class="ion-android-close"></i>
                </div>
                <div class="off-canvas-inner">
                    <!-- search box start -->
                    <div class="search-box offcanvas">
                        <form>
                            <input type="text" placeholder="Search Here">
                            <button class="search-btn"><i class="ion-ios-search-strong"></i></button>
                        </form>
                    </div>
                    <!-- search box end -->
                    <!-- mobile menu start -->
                    <div class="mobile-navigation">
                        <!-- mobile menu navigation start -->
                        <nav class="off-canvas-nav">
                            <ul class="mobile-menu main-mobile-menu">
                                <li class="menu-item">
                                    <a href="index.php">Home</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Sections</a>
                                    <ul class="sub-menu">
                                        <!-- read all section from database -->
                                        <?php
                                            $queryReadSect="SELECT * FROM category";
                                            $resultReadSec=mysqli_query($conn,$queryReadSect);
                                           while($rowReadSec=mysqli_fetch_assoc($resultReadSec))
                                           {


                                            ?>
                                        <li class="menu-item-has-children">
                                            <a href="categorey.php?idProd=<?php echo $rowReadSec['id'] ?>"><?php echo $rowReadSec['category_name'] ?>
                                            </a>

                                        </li>
                                        <?php } ?>

                                    </ul>
                                </li>

                                <li class="menu-item">
                                    <a href="my-account.php">Account </a>

                                </li>
                                <li><a href="contact.php">Contact</a></li>
                                <?php if(isset($_SESSION['id'])) { ?>
                                <li class="menu-item">
                                    <a href="logout_customer.php"><i class="fal fa-sign-out"></i></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </nav>
                        <!-- mobile menu navigation end -->
                    </div>
                    <!-- mobile menu end -->

                    <div class="off-canvas-bottom">
                        <div class="contact-list mb--10">
                            <a href="" class="sin-contact"><i class="fas fa-mobile-alt"></i>(+962) 788320226</a>
                            <a href="" class="sin-contact"><i
                                    class="fas fa-envelope"></i>alaaomaralshobaki@gmail.com</a>
                        </div>
                        <div class="off-canvas-social">
                            <a href="#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="single-icon"><i class="fas fa-rss"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </aside>
            <!--Off Canvas Navigation End-->
        </div>
        <div class="sticky-init fixed-header common-sticky">
            <div class="container d-none d-lg-block">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <a href="index.php" class="site-brand">
                            <img src="image/logo.png" alt="">
                        </a>
                    </div>
                    <div class="col-lg-8">
                        <div class="main-navigation flex-lg-right">
                            <ul class="main-menu menu-right ">
                                <li class="menu-item">
                                    <a href="index.php">Home</a>
                                </li>
                                <!-- Shop -->
                                <li class="menu-item has-children mega-menu">
                                    <a href="javascript:void(0)">Sections <i
                                            class="fas fa-chevron-down dropdown-arrow"></i></a>
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
                                                    href="categorey.php?idProd=<?php echo $rowReadSec['id'] ?>"><?php echo $rowReadSec['category_name'] ?>
                                                </a></h3>

                                        </li>
                                        <?php } ?>

                                    </ul>
                                </li>
                                <!-- Pages -->
                                <li class="menu-item">
                                    <a href="my-account.php">Account </a>

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
        <section class="breadcrumb-section">
            <h2 class="sr-only">Site Breadcrumb</h2>
            <div class="container">
                <div class="breadcrumb-contents">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">My Account</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <div class="page-section inner-page-sec-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <!-- My Account Tab Menu Start -->
                            <div class="col-lg-3 col-12">
                                <div class="myaccount-tab-menu nav" role="tablist">
                                    <a href="#dashboad" class="active" data-toggle="tab"><i
                                            class="fas fa-tachometer-alt"></i>
                                        Dashboard</a>
                                    <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>


                                    <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i>
                                        address</a>
                                    <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Account
                                        Details</a>
                                    <a href="logout_customer.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                                </div>
                            </div>
                            <!-- My Account Tab Menu End -->
                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 col-12 mt--30 mt-lg--0">
                                <div class="tab-content" id="myaccountContent">
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Dashboard</h3>
                                            <div class="welcome mb-20">
                                                <?php 
													$queryUser="SELECT * FROM customer_table WHERE id_customer=$id_Cus ";
													$resUser=mysqli_query($conn,$queryUser);
													$rowUser=mysqli_fetch_assoc($resUser);
											?>
                                                <p>Hello, <strong><?php echo $rowUser['full_name_customer'] ?></strong>

                                            </div>
                                            <p class="mb-0">From your account dashboard. you can easily check &amp; view
                                                your
                                                recent orders, manage your shipping and billing addresses and edit your
                                                password and account details.</p>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="orders" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Orders</h3>
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>id order</th>
                                                            <th>order status</th>
                                                            <th>order date</th>
                                                            <th>book name</th>
                                                            <th>Quantity</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
														$i=0;
													$query="SELECT * FROM order_table
															INNER JOIN order_items
															ON order_table.id_order=order_items.order_id
															INNER JOIN product
															ON order_items.product_id=product.id_product
															WHERE order_table.customer_id=$id_Cus ";
															$res=mysqli_query($conn,$query);
															while($row=mysqli_fetch_assoc($res)){
													   $i++
													?>
                                                        <tr>
                                                            <td><?php echo $i ?></td>
                                                            <td><?php echo $row['id_order']  ?></td>
                                                            <td>
                                                                <?php 
															if($row['order_status']==0){
																echo "<span class='h2'><i class='fal fa-truck-container text-danger'></i></span>";
															}else{
																echo "<span class='h2'><i class='far fa-truck-loading text-success'></i></span>";
															}
															
															?>
                                                            </td>
                                                            <td><?php echo $row['order_date'] ?></td>
                                                            <td><?php echo $row['prod_name'] ?></td>
                                                            <td><?php echo $row['quantity'] ?></td>
                                                            <td><?php echo  $row['total'] ?></td>
                                                        </tr>
                                                        <?php } ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
                                    <!-- Single Tab Content Start -->

                                    <!-- Single Tab Content End -->
                                    <!-- Single Tab Content Start -->

                                    <!-- Single Tab Content End -->
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Billing Address</h3>
                                            <address>
                                                <p><strong><?php echo $rowUser['full_name_customer'] ?></strong></p>
                                                <p><?php echo $rowUser['street_customer'] .",". $rowUser['city_customer'] ?>
                                                    <br>
                                                </p>
                                                <p>Mobile: <?php echo $rowUser['phone_customer'] ?></p>
                                                <p>Email: <?php echo $rowUser['email_customer'] ?></p>
                                            </address>

                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="account-info" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Account Details</h3>
                                            <div class="account-details-form">
                                                <form action="" method="POST">
                                                    <div class="row">
                                                        <div class=" col-12  mb--30">
                                                            <input id="first-name"
                                                                value="<?php echo $rowUser['full_name_customer'] ?>"
                                                                placeholder="First Name" name="name" type="text">
                                                        </div>


                                                        <div class="col-lg-6   mb--30">
                                                            <input id="email" name="email" placeholder="Email Address"
                                                                value="<?php echo $rowUser['email_customer'] ?>"
                                                                type="email">
                                                        </div>
                                                        <div class="col-lg-6   mb--30">
                                                            <input id="phone" placeholder="Phone" name="phone"
                                                                value="<?php echo $rowUser['phone_customer'] ?>"
                                                                type="text">
                                                        </div>
                                                        <div class="col-12  mb--30">
                                                            <h4>Password change</h4>
                                                        </div>
                                                        <div class="col-12 col-lg-6   mb--30">
                                                            <input id="current-pwd" name="pass"
                                                                placeholder="Current Password" value="" type="password">
                                                        </div>
                                                        <div class="col-lg-6 col-12  mb--30">
                                                            <input id="new-pwd" placeholder="New Password"
                                                                name="new_pass" type="password">
                                                        </div>
                                                        <div class="col-12 col-lg-6  mb--30">
                                                            <input id="current-pwd" name="street" placeholder="street"
                                                                value="<?php echo $rowUser['street_customer'] ?>"
                                                                type="text">
                                                        </div>
                                                        <div class="col-lg-6 col-12  mb--30">
                                                            <input id="new-pwd" placeholder="city"
                                                                value="<?php echo $rowUser['city_customer'] ?>"
                                                                name="city" type="text">
                                                        </div>

                                                        <div class="col-12">
                                                            <button class="btn btn--primary" type="submit"
                                                                name="update">Save Changes</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <?php 
                                                $id= $rowUser['id_customer'];
                                                $name= @$_POST['name'];
                                                $email= @$_POST['email'];
                                                $phone= @$_POST['phone'];
                                                $pass= @$_POST['pass'];
                                                $new= @$_POST['new_pass'];
                                                $city= @$_POST['city'];
                                                $street=@$_POST['street'];

                                                if(isset($_POST['update'])){
                                                   
                                                    $queryCheck="SELECT password_customer
                                                                 FROM customer_table 
                                                                 WHERE id_customer=$id";
                                                    $resCheck=mysqli_query($conn,$queryCheck);
                                                    if($row=mysqli_fetch_assoc($resCheck)){
                                                        $password=$row['password_customer'];
                                                      
                                                        if($password === $pass){
                                              echo $id;
                                             
                                                 $queryUpdate="UPDATE customer_table
                                                               SET                   full_name_customer=$name,
                                                                                     phone_customer    =$phone,
                                                                                     email_customer    =$email,
                                                                                     street_customer   =$street,
                                                                                     city_customer     =$city,
                                                                                     password_customer =$pass,
                                                                             WHERE   id_customer       =$id";
                                                if($resUpdate=mysqli_query($conn,$queryUpdate)){
                                                    echo "done";
                                                }else{
                                                    echo "error";
                                                }
                                                                             


                                                }else{
                                                    echo "password not match";
                                                }
                                            }
                                            }



                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
                                </div>
                            </div>
                            <!-- My Account Tab Content End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=================================
  Brands Slider
===================================== -->
    <section class="section-margin">
        <h2 class="sr-only">Brand Slider</h2>
        <div class="container">
            <div class="brand-slider sb-slick-slider border-top border-bottom" data-slick-setting='{
                                            "autoplay": true,
                                            "autoplaySpeed": 8000,
                                            "slidesToShow": 6
                                            }' data-slick-responsive='[
                {"breakpoint":992, "settings": {"slidesToShow": 4} },
                {"breakpoint":768, "settings": {"slidesToShow": 3} },
                {"breakpoint":575, "settings": {"slidesToShow": 3} },
                {"breakpoint":480, "settings": {"slidesToShow": 2} },
                {"breakpoint":320, "settings": {"slidesToShow": 1} }
            ]'>
                <!-- <div class="single-slide">
                    <img src="image/others/brand-1.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="image/others/brand-2.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="image/others/brand-3.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="image/others/brand-4.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="image/others/brand-5.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="image/others/brand-6.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="image/others/brand-1.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="image/others/brand-2.jpg" alt="">
                </div> -->
            </div>
        </div>
    </section>
    <!--=================================
    Footer Area
===================================== -->
    <footer class="site-footer">
        <div class="container">
            <div class="row justify-content-between  section-padding">
                <div class=" col-xl-3 col-lg-4 col-sm-6">
                    <div class="single-footer pb--40">
                        <div class="brand-footer footer-title">
                            <img src="image/logo--footer.png" alt="">
                        </div>
                        <div class="footer-contact">
                            <p><span class="label">Address:</span><span class="text">Example Street 98, HH2 BacHa, New
                                    York, USA</span></p>
                            <p><span class="label">Phone:</span><span class="text">+18088 234 5678</span></p>
                            <p><span class="label">Email:</span><span class="text">suport@hastech.com</span></p>
                        </div>
                    </div>
                </div>
                <div class=" col-xl-3 col-lg-2 col-sm-6">
                    <div class="single-footer pb--40">
                        <div class="footer-title">
                            <h3>Information</h3>
                        </div>
                        <ul class="footer-list normal-list">
                            <li><a href="">Prices drop</a></li>
                            <li><a href="">New products</a></li>
                            <li><a href="">Best sales</a></li>
                            <li><a href="">Contact us</a></li>
                            <li><a href="">Sitemap</a></li>
                        </ul>
                    </div>
                </div>
                <div class=" col-xl-3 col-lg-2 col-sm-6">
                    <div class="single-footer pb--40">
                        <div class="footer-title">
                            <h3>Extras</h3>
                        </div>
                        <ul class="footer-list normal-list">
                            <li><a href="">Delivery</a></li>
                            <li><a href="">About Us</a></li>
                            <li><a href="">Stores</a></li>
                            <li><a href="">Contact us</a></li>
                            <li><a href="">Sitemap</a></li>
                        </ul>
                    </div>
                </div>
                <div class=" col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer-title">
                        <h3>Newsletter Subscribe</h3>
                    </div>
                    <div class="newsletter-form mb--30">
                        <form action="./php/mail.php">
                            <input type="email" class="form-control" placeholder="Enter Your Email Address Here...">
                            <button class="btn btn--primary w-100">Subscribe</button>
                        </form>
                    </div>
                    <div class="social-block">
                        <h3 class="title">STAY CONNECTED</h3>
                        <ul class="social-list list-inline">
                            <li class="single-social facebook"><a href=""><i class="ion ion-social-facebook"></i></a>
                            </li>
                            <li class="single-social twitter"><a href=""><i class="ion ion-social-twitter"></i></a></li>
                            <li class="single-social google"><a href=""><i
                                        class="ion ion-social-googleplus-outline"></i></a></li>
                            <li class="single-social youtube"><a href=""><i class="ion ion-social-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p class="copyright-heading">Suspendisse in auctor augue. Cras fermentum est ac fermentum tempor. Etiam
                    vel magna volutpat, posuere eros</p>
                <a href="#" class="payment-block">
                    <img src="image/icon/payment.png" alt="">
                </a>
                <p class="copyright-text">Copyright © 2019 <a href="#" class="author">Pustok</a>. All Right Reserved.
                    <br>
                    Design By Pustok</p>
            </div>
        </div>
    </footer>
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <script src="js/plugins.js"></script>
    <script src="js/ajax-mail.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>