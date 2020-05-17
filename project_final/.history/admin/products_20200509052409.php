<body class="alt-menu sidebar-noneoverflow">

    <!--  BEGIN NAVBAR  -->
    <?php include("layout/header.php");  ?>

    <head>
        <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
        <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
        <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
        <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
        <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_custom.css">
        <!--  BEGIN CUSTOM STYLE FILE  -->
        <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components/custom-carousel.css" rel="stylesheet" type="text/css" />
        <!--  END CUSTOM STYLE FILE  -->
        <!-- END PAGE LEVEL CUSTOM STYLES -->
    </head>

    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container sidebar-closed sbar-open" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <?php include("layout/sidebar.php");  ?>

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="page-header">
                    <div class="page-title">
                        <h3>products</h3>
                    </div>
                </div>





                <div class="row layout-spacing">
                    <div class="col-lg-12">
                        <div class="statbox widget box box-shadow">

                            <div class="widget-content widget-content-area">
                                <div class="table-responsive mb-4">
                                    <table id="style-3" class="table style-3  table-hover">
                                        <thead>
                                            <tr>
                                                <th class="checkbox-column text-center"> Record Id </th>
                                                <th class="text-center">Image</th>
                                                <th>Book type</th>
                                                <th>Book name</th>
                                                <th>Description of the book</th>
                                                <th>Author Name</th>
                                                <th>Quantity</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                 $query="SELECT *  FROM product
                                                       INNER JOIN category
                                                        ON product.id_cat = category.id";
                                                   $result=mysqli_query($conn,$query);
                                                   $i=0;
                                                   while($row =mysqli_fetch_assoc($result)){
                                                       $i++;
                                                       
                                                       $id=$row['id_product']
                                                      
                                                    

                                            ?>
                                            <tr>
                                                <td class="checkbox-column text-center"> <?php echo $i ?> </td>

                                                <td class="text-center">

                                                    <div id="carouselExampleIndicators" class="carousel slide"
                                                        data-ride="carousel">
                                                        <ol class="carousel-indicators">
                                                            <li data-target="#carouselExampleIndicators"
                                                                data-slide-to="0" class="active m"></li>
                                                            <li data-target="#carouselExampleIndicators"
                                                                data-slide-to="1"></li>
                                                            <li data-target="#carouselExampleIndicators"
                                                                data-slide-to="2"></li>
                                                        </ol>
                                                        <div class="carousel-inner">
                                                            <?php
                                                             $counter=0;
                                                              $quy="SELECT image FROM gallery WHERE pro_id=$id";
                                                              $res=mysqli_query($conn,$quy);
                                                              while($rw=mysqli_fetch_assoc($res))
                                                              { 
                                                                if ($counter == 0)
                                                                {
                                                                    ?>
                                                            <div class="carousel-item active">
                                                                <img class="d-block w-100"
                                                                    src="<?php echo $rw['image']  ?>" alt="First slide">
                                                            </div>
                                                            <?php
                                                                }else{
                                                                    ?>
                                                            <div class="carousel-item">
                                                                <img class="d-block w-100"
                                                                    src="<?php echo $rw['image']  ?>"
                                                                    alt="Second slide">
                                                            </div>

                                                            <?php


                                                                }
                                                              $counter++ ;
                                                                    
                                                              ?>


                                                            <?php } ?>
                                                            <!-- <div class="carousel-item">
                                                                <img class="d-block w-100" src="assets/img/640x426.jpg"
                                                                    alt="Second slide">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img class="d-block w-100" src="assets/img/640x426.jpg"
                                                                    alt="Third slide">
                                                            </div> -->


                                                        </div>
                                                        <a class="carousel-control-prev"
                                                            href="#carouselExampleIndicators" role="button"
                                                            data-slide="prev">
                                                            <span class="carousel-control-prev-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                        <a class="carousel-control-next"
                                                            href="#carouselExampleIndicators" role="button"
                                                            data-slide="next">
                                                            <span class="carousel-control-next-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </div>




                                                </td>
                                                <td><?php echo$row['category_name']  ?></td>
                                                <td><?php echo$row['prod_name']  ?></td>
                                                <td><?php echo$row['prod_desc']  ?></td>
                                                <td><?php echo$row['author_name']  ?></td>
                                                <td><?php echo$row['product_qty']  ?></td>
                                                <td class="text-center">
                                                    <div class="progress br-30">
                                                        <div class="progress-bar  bg-info" role="progressbar"
                                                            style="width: 80%" aria-valuenow="100" aria-valuemin="0"
                                                            aria-valuemax="100">
                                                            <?php
                                                         
                                                          $queryReadPro = "SELECT product_qty FROM product
                                                                          WHERE id_cat = $id";
                                                          $resultReadPro= mysqli_query($conn,$queryReadPro);
                                                          while($rowReadPro=mysqli_fetch_assoc($resultReadPro)){
                                                            
  
                                                          }
                                                          echo (intval((($rowReadPro['product_qty'])/100)*100));
                                                         

                                                        ?>


                                                        </div>
                                                    </div>

                                                <td class="text-center">
                                                    <ul class="table-controls">
                                                        <li><a href="javascript:void(0);" class="bs-tooltip"
                                                                data-toggle="tooltip" data-placement="top" title=""
                                                                data-original-title="Edit"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit-2 p-1 br-6 mb-1">
                                                                    <path
                                                                        d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                                    </path>
                                                                </svg></a></li>
                                                        <li><a href="javascript:void(0);" class="bs-tooltip"
                                                                data-toggle="tooltip" data-placement="top" title=""
                                                                data-original-title="Delete"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-trash p-1 br-6 mb-1">
                                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                                    <path
                                                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                    </path>
                                                                </svg></a></li>
                                                    </ul>
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
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->



    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="plugins/blockui/jquery.blockUI.min.js"></script>
    <script src="assets/js/app.js"></script>

    <script>
    $(document).ready(function() {
        App.init();
    });
    </script>
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->

    <script src="plugins/table/datatable/datatables.js"></script>
    <script src="assets/js/scrollspyNav.js"></script>

    <script>
    // var e;
    c1 = $('#style-1').DataTable({
        headerCallback: function(e, a, t, n, s) {
            e.getElementsByTagName("th")[0].innerHTML =
                '<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
        },
        columnDefs: [{
            targets: 0,
            width: "30px",
            className: "",
            orderable: !1,
            render: function(e, a, t, n) {
                return '<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
            }
        }],
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
        "lengthMenu": [5, 10, 20, 50],
        "pageLength": 5
    });

    multiCheck(c1);

    c2 = $('#style-2').DataTable({
        headerCallback: function(e, a, t, n, s) {
            e.getElementsByTagName("th")[0].innerHTML =
                '<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
        },
        columnDefs: [{
            targets: 0,
            width: "30px",
            className: "",
            orderable: !1,
            render: function(e, a, t, n) {
                return '<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
            }
        }],
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
        "lengthMenu": [5, 10, 20, 50],
        "pageLength": 5
    });

    multiCheck(c2);

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