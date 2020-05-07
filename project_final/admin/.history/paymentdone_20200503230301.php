<body class="alt-menu sidebar-noneoverflow">

    <!--  BEGIN NAVBAR  -->
    <?php include('layout/header.php')  ?>

    <head>

        <link href="plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->

        <!--  BEGIN CUSTOM STYLE FILE  -->
        <link href="assets/css/apps/invoice.css" rel="stylesheet" type="text/css" />
        <!--  END CUSTOM STYLE FILE  -->

    </head>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container sidebar-closed sbar-open" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <?php include("layout/sidebar.php")  ?>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="row invoice layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="app-hamburger-container">
                            <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-menu chat-menu d-xl-none">
                                    <line x1="3" y1="12" x2="21" y2="12"></line>
                                    <line x1="3" y1="6" x2="21" y2="6"></line>
                                    <line x1="3" y1="18" x2="21" y2="18"></line>
                                </svg></div>
                        </div>

                        <div class="doc-container">
                            <div class="tab-title">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <div class="search">
                                            <input type="text" class="form-control" placeholder="Search...">
                                        </div>
                                        <ul class="nav nav-pills inv-list-container d-block" id="pills-tab"
                                            role="tablist">
                                            <?php
                        $query  =       "SELECT * FROM order_table
                                         INNER JOIN customer_table
                                         ON  order_table.customer_id = customer_table.id_customer ";
                        $result =       mysqli_query($conn,$query);
                                        while($row =mysqli_fetch_assoc($result)){


                        ?> <form action="" method="post">
                                                <li class="nav-item">
                                                    <div class="nav-link list-actions" id="invoice-00001"
                                                        data-invoice-id="<?php echo$row['id_order'] ?>">
                                                        <div class="f-m-body">
                                                            <div class="f-head">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-dollar-sign">
                                                                    <line x1="12" y1="1" x2="12" y2="23"></line>
                                                                    <path
                                                                        d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6">
                                                                    </path>
                                                                </svg>
                                                            </div>
                                                            <div class="f-body">
                                                                <p class="invoice-number">
                                                                    <?php echo $row['id_order']  ?>
                                                                </p>
                                                                <p class="invoice-customer-name"><span>To:</span>
                                                                    <?php echo $row['full_name_customer'] ?>
                                                                </p>
                                                                <p class="invoice-generated-date">Date:
                                                                    <?php echo $row['order_date'] ?></p>

                                                                <input type="hidden" name="id_order"
                                                                    value="<?php echo $row['id_order']  ?>">
                                                                <button name="save"
                                                                    class="btn btn-danger btn-sm text-white ">
                                                                    <i class="fa fa-eye"></i>
                                                                </button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </form>
                                            <?php  }?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="invoice-container">
                                <div class="invoice-inbox">

                                    <div class="inv-not-selected">
                                        <p>Open an invoice from the list.</p>
                                    </div>

                                    <div class="invoice-header-section">
                                        <h4 class="inv-number"></h4>
                                        <div class="invoice-action">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-printer action-print" data-toggle="tooltip"
                                                data-placement="top" data-original-title="Reply">
                                                <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                                <path
                                                    d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2">
                                                </path>
                                                <rect x="6" y="14" width="12" height="8"></rect>
                                            </svg>
                                        </div>
                                    </div>

                                    <div id="ct" class="">

                                        <div class="invoice-00001">
                                            <div class="content-section  animated animatedFadeInUp fadeInUp">

                                                <div class="row inv--head-section">

                                                    <div class="col-sm-6 col-12">
                                                        <h3 class="in-heading">INVOICE</h3>
                                                    </div>
                                                    <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                        <div class="company-info">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-hexagon">
                                                                <path
                                                                    d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                                                </path>
                                                            </svg>
                                                            <h5 class="inv-brand-name">CORK</h5>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row inv--detail-section">

                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-to">Invoice To</p>
                                                    </div>
                                                    <div
                                                        class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                        <p class="inv-detail-title">From : XYZ Company</p>
                                                    </div>

                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-customer-name">
                                                            <?php 
                                                            
                                                 if($_SERVER["REQUEST_METHOD"] == "POST"){
                                                     if(isset($_POST['save'])){
                                                   
                                                    $i=0;
                                                        $id= @$_POST['id_order'];
                                                        $query1  =       "SELECT * FROM order_items
                                                                        INNER JOIN order_table
                                                                        ON order_items.order_id = order_table.id_order
                                                                        INNER JOIN product
                                                                        ON order_items.product_id = product.id
                                                                        INNER JOIN customer_table
                                                                        ON  order_table.customer_id = customer_table.id_customer
                                                                        WHERE  order_id = $id";
                                                        $result1 = mysqli_query($conn,$query1);
                                                        $row1    = mysqli_fetch_assoc($result1);
                                                   $i++;
                                                       
                                        
                                                    ?>

                                                            <?php echo $row1['full_name_customer']  ?></p>
                                                        <p class="inv-street-addr">
                                                            <?php echo $row1['city_customer']  ?>,
                                                            <?php echo $row1['street_customer']  ?>
                                                        </p>
                                                        <p class="inv-email-address">
                                                            <?php echo $row1['email_customer']  ?></p>
                                                    </div>
                                                    <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                        <p class="inv-list-number"><span class="inv-title">Invoice
                                                                Number : </span> <span class="inv-number">[invoice
                                                                number]</span></p>
                                                        <p class="inv-created-date"><span class="inv-title">Payment Date
                                                                : </span> <span
                                                                class="inv-date"><?php echo $row1['order_date'] ?></span>
                                                        </p>

                                                    </div>
                                                </div>

                                                <div class="row inv--product-table-section">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead class="">
                                                                    <tr>
                                                                        <th scope="col">S.No</th>
                                                                        <th scope="col">Items</th>
                                                                        <th class="text-right" scope="col">Qty</th>
                                                                        <th class="text-right" scope="col">Unit Price
                                                                        </th>
                                                                        <th class="text-right" scope="col">Amount</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><?php echo $i ?></td>
                                                                        <td><?php echo $row1['prod_name']  ?></td>
                                                                        <td class="text-right">
                                                                            <?php echo $row1['quantity']  ?></td>
                                                                        <td class="text-right">$300</td>
                                                                        <td class="text-right">$2800</td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                        <div class="inv--payment-info">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-12">
                                                                    <h6 class=" inv-title">Payment Info:</h6>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Bank Name: </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">Bank of America</p>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Account Number : </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">1234567890</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                        <div class="inv--total-amounts text-sm-right">
                                                            <div class="row">
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Sub Total: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$13300</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Tax Amount: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class=" discount-rate">Discount : <span
                                                                            class="discount-percentage">5%</span> </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7 grand-total-title">
                                                                    <h4 class="">Grand Total : </h4>
                                                                </div>
                                                                <div class="col-sm-4 col-5 grand-total-amount">
                                                                    <h4 class="">$14000</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <?php  } }?>
                                    </div>


                                </div>

                                <div class="inv--thankYou">
                                    <div class="row">
                                        <div class="col-sm-12 col-12">
                                            <p class="">Thank you for doing Business with us.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>

    <script>
    $(document).ready(function() {
        App.init();
    });
    </script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/apps/invoice.js"></script>
</body>

</html>