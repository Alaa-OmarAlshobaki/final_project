<body class="alt-menu sidebar-noneoverflow">

    <!--  BEGIN NAVBAR  -->
    <?php include("layout/header.php")   ?>

    <head>
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
        <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
        <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
        <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_custom.css">
        <!-- END PAGE LEVEL STYLES -->
    </head>

    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container sidebar-closed sbar-open" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <?php include("layout/sidebar.php");  ?>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="page-header">
                    <div class="page-title">
                        <h3>Mange Categories</h3>
                    </div>
                </div>


                <div class="row" id="cancel-row">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <button onclick="addModal()"
                                class="btn btn-dark rounded-circle float-right text-center mb-2 mr-2 ">
                                <span class="h4"> <i class="fad fa-plus"></i></span>

                            </button>

                            <div class="table-responsive mb-4 mt-4">

                                <table id="multi-column-ordering" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th># </th>
                                            <th>ٍSection NAme</th>
                                            <th>description</th>

                                            <th>quantity</th>
                                            <th>progress</th>
                                            <th>Discount</th>
                                            <th>Start date discount</th>
                                            <th>end date discount</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    // read , insert and edit data from table categories
                                    // add discount for categories and defiend date of discount
                                    $i=0;
                                    $queryRead = "SELECT * FROM category ";
                                    $resultRead= mysqli_query($conn,$queryRead);
                                    echo $queryRead;
                                    while($rowRead=mysqli_fetch_assoc($resultRead)){
                                        $i++;
                                        $id_category=$rowRead['id'];
                                        

                                    

                                    ?>
                                        <tr>
                                            <td><?php echo $i   ?></td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="usr-img-frame mr-2 rounded-circle">
                                                        <img alt="avatar" class="img-fluid rounded-circle"
                                                            src="assets/img/90x90.jpg">
                                                    </div>
                                                    <p class="align-self-center mb-0 admin-name">
                                                        <?php echo $rowRead['category_name']  ?></p>
                                                </div>
                                            </td>
                                            <td><?php echo $rowRead['category_dec'] ?></td>

                                            <td>
                                                <!-- return data from table prodect according category
                                            and count number of product for this category
                                            then return quantity -->
                                                <?php
                                            $quantity=0;
                                             $queryReadPro = "SELECT product_qty FROM product
                                                              WHERE id_cat = $id_category";
                                             $resultReadPro= mysqli_query($conn,$resultReadPro);
                                             while($rowReadPro=mysqli_fetch_assoc($resultReadPro)){
                                                 $quantity+=$rowReadPro['	product_qty'];

                                             }

                                            echo $quantity;


                                            ?>
                                            </td>
                                            <td>progress</td>
                                            <td>
                                                <!-- INNER JOIN discount
                                                  ON category.id_discount = discount.discount_value -->
                                                <?php echo $rowRead['discount_value']   ?>
                                            </td>
                                            <td><?php echo $rowRead['start_disc']   ?></td>
                                            <td><?php echo $rowRead['end_disc']   ?></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-dark rounded-circle btn-sm mr-2">
                                                    <i onclick="editModal()" class=" fas fa-edit "></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php  } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th># </th>
                                            <th>ٍSection NAme</th>
                                            <th>description</th>

                                            <th>quantity</th>
                                            <th>progress</th>
                                            <th>Discount</th>
                                            <th>Start date discount</th>
                                            <th>end date discount</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
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

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="plugins/table/datatable/datatables.js"></script>
    <script>
    $('#multi-column-ordering').DataTable({
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 7,
        columnDefs: [{
            targets: [0],
            orderData: [0, 1]
        }, {
            targets: [1],
            orderData: [1, 0]
        }, {
            targets: [4],
            orderData: [4, 0]
        }]
    });
    c3 = $('#style-3').DataTable({
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [5, 10, 20, 50],
        "pageLength": 5
    });

    multiCheck(c3);
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->

</body>

</html>