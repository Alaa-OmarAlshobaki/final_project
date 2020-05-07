<body class="alt-menu sidebar-noneoverflow">

    <!--  BEGIN NAVBAR  -->
    <?php include("layout/header.php")   ?>
    <!--  END NAVBAR  -->

    <head>
        <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
        <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
        <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_html5.css">
        <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
        <!-- END PAGE LEVEL CUSTOM STYLES -->
    </head>
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container sidebar-closed sbar-open" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <?php include("layout/sidebar.php") ?>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="page-header">
                    <div class="page-title">
                        <h3>HTML5 Export</h3>
                    </div>
                </div>

                <div class="row" id="cancel-row">

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Customer Name</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Order Date</th>
                                            <th>Status</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                                                      $i=0;
                                                                    
                                                                      $query2  =       "SELECT * FROM order_table
                                                                                       INNER JOIN customer_table
                                                                                      ON  order_table.customer_id = customer_table.id_customer";
                                                                                      
                                                                      $result2 = mysqli_query($conn,$query2);
                                                                     
                                                                     while( $row2= mysqli_fetch_assoc($result2)){ 
                                                                         $id=$row2['id_order']; 
                                                                        $i++;
                                                                        ?>
                                        <tr>
                                            <td><?php echo $row2['id_order'] ?></td>
                                            <td><?php echo $row2['full_name_customer'] ?></td>
                                            <td><?php echo $row2['phone_customer']  ?></td>
                                            <td><?php echo $row2['street_customer']."," . $row2['city_customer'] ?>
                                            </td>
                                            <td><?php echo $row2['order_date'] ?></td>
                                            <td>
                                                <?php
                                            if($row2['order_status']==1){
                                                echo "<span class='h5'><i class='fad fa-truck-loading text-success'></i></span>";
                                            }else{
                                                echo "<span class='h5'><i class='fad fa-truck text-danger'></i></span>";
                                            }
                                            ?>
                                            </td>

                                            <td>
                                                <?php 
                                            $total = 0;
                                            $query = " SELECT * FROM order_items
                                                       WHERE order_id = $id";
                                            $result = mysqli_query($conn,$query);
                                            while($row    = mysqli_fetch_assoc($result)){
                                                $total += $row['quantity'];
                                            
                                        }
                                        if($total >3){
                                            echo $total . "Discount". 30%
                                        } else if($total > 5){
                                            echo $total . "Discount" . 50%
                                        }
                                       
                                            ?>
                                            </td>

                                            <td>
                                                <?php 
                                            $total = 0;
                                            $query = " SELECT * FROM order_items
                                                       WHERE order_id = $id";
                                            $result = mysqli_query($conn,$query);
                                            while($row    = mysqli_fetch_assoc($result)){
                                                $total += $row['list_price'];
                                            
                                        }
                                        echo $total;
                                            ?> JOD
                                            </td>
                                        </tr>

                                        <?php }?>


                                    </tbody>
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

    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="plugins/table/datatable/datatables.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="plugins/table/datatable/button-ext/jszip.min.js"></script>
    <script src="plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="plugins/table/datatable/button-ext/buttons.print.min.js"></script>
    <script>
    $('#html5-extension').DataTable({
        dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
        buttons: {
            buttons: [{
                    extend: 'copy',
                    className: 'btn'
                },
                {
                    extend: 'csv',
                    className: 'btn'
                },
                {
                    extend: 'excel',
                    className: 'btn'
                },
                {
                    extend: 'print',
                    className: 'btn'
                }
            ]
        },
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
        "pageLength": 7
    });
    </script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
</body>

</html>