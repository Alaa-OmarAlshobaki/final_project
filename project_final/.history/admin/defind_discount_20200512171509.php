<!DOCTYPE html>
<html lang="en">

<head>

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
</head>

<body class="alt-menu sidebar-noneoverflow" data-spy="scroll" data-target="#navSection" data-offset="100">

    <!--  BEGIN NAVBAR  -->
    <?php include("layout/header.php")?>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container sidebar-closed sbar-open" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <?php  include("layout/sidebar.php") ?>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="container-fluid">





                <div class="row">




                    <div class="col-lg-12 col-12 layout-spacing mt-5">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Add Discount For Sections Or Books</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">

                                <div class="row">

                                    <div class="col-xl-4 mb-xl-0 mb-2">
                                        <select class="form-control form-control-sm">
                                            <option>Large select</option>
                                            <option>One</option>
                                            <option>Two</option>
                                            <option>Three</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-4 mb-xl-0 mb-2">
                                        <select class="form-control form-control-sm">
                                            <option>Default select</option>
                                            <option>One</option>
                                            <option>Two</option>
                                            <option>Three</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-4 mb-xl-0 mb-2">
                                        <select class="form-control form-control-sm">
                                            <option>Small select</option>
                                            <option>One</option>
                                            <option>Two</option>
                                            <option>Three</option>
                                        </select>
                                    </div>
                                    <div>
                                        <button class="btn btn-outline-dark mb-2">Add Discount</button>
                                    </div>

                                </div>



                            </div>
                        </div>
                    </div>

                </div>
                <!--  END CONTENT AREA  -->
            </div>
            <!-- END MAIN CONTAINER -->
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
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/scrollspyNav.js"></script>
</body>

</html>