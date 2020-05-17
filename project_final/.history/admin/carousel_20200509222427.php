<!DOCTYPE html>
<html lang="en">



<body class="alt-menu sidebar-noneoverflow" data-spy="scroll" data-target="#navSection" data-offset="100">

    <!--  BEGIN NAVBAR  -->
    <?php include("layout/header.php")  ?>

    <head>


        <!--  BEGIN CUSTOM STYLE FILE  -->
        <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components/custom-carousel.css" rel="stylesheet" type="text/css" />
        <link href="plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
        <!--  END CUSTOM STYLE FILE  -->

    </head>
    <!--  END NAVBAR  -->

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
            <div class="container">
                <div class="container ">



                    <div class="row layout-top-spacing ">
                        <div id="custom_carousel" class="col-lg-12 layout-spacing ">
                            <div class="statbox widget box box-shadow">

                                <div class="widget-content widget-content-area  style-custom-1">
                                    <div class="container" style="max-width: 928px;">
                                        <div class="row d-flex justify-content-center ">
                                            <div class="col-lg-12 col-md-12 mb-5 p-0 ">
                                                <div id="style1" class="carousel slide style-custom-1"
                                                    data-ride="carousel">
                                                    <ol class="carousel-indicators">
                                                        <li data-target="#style1" data-slide-to="0" class="active"></li>
                                                        <li data-target="#style1" data-slide-to="1"></li>
                                                        <li data-target="#style1" data-slide-to="2"></li>
                                                    </ol>
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img class="d-block w-100 slide-image"
                                                                src="assets/img/640x426.jpg" alt="First slide">
                                                            <div class="carousel-caption">
                                                                <span class="badge">Lifestyle</span>
                                                                <h3>How To Make More Blog By Doing Less</h3>

                                                            </div>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block w-100 slide-image"
                                                                src="assets/img/640x426.jpg" alt="Second slide">
                                                            <div class="carousel-caption">
                                                                <span class="badge">Lifestyle</span>
                                                                <h3>How To Make Blog</h3>

                                                            </div>
                                                        </div>
                                                        <!-- <div class="carousel-item">
                                                            <img class="d-block w-100 slide-image"
                                                                src="assets/img/640x426.jpg" alt="Third slide">
                                                            <div class="carousel-caption">
                                                                <span class="badge">Lifestyle</span>
                                                                <h3>Best Blog Android Apps</h3>
                                                                <div class="media">
                                                                    <img src="assets/img/90x90.jpg" class=""
                                                                        alt="avatar">
                                                                    <div class="media-body">
                                                                        <h6 class="user-name">User name</h6>
                                                                        <p class="meta-time"><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-calendar">
                                                                                <rect x="3" y="4" width="18" height="18"
                                                                                    rx="2" ry="2"></rect>
                                                                                <line x1="16" y1="2" x2="16" y2="6">
                                                                                </line>
                                                                                <line x1="8" y1="2" x2="8" y2="6">
                                                                                </line>
                                                                                <line x1="3" y1="10" x2="21" y2="10">
                                                                                </line>
                                                                            </svg> May, 14 2019</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                    </div>
                                                    <a class="carousel-control-prev" href="#style1" role="button"
                                                        data-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                            aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#style1" role="button"
                                                        data-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                            aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>





                </div>
            </div>
            <div class="custom-file-container" data-upload-id="mySecondImage">
                <label>Upload (Allow Multiple) <a href="javascript:void(0)" class="custom-file-container__image-clear"
                        title="Clear Image">x</a></label>
                <label class="custom-file-container__custom-file">
                    <input type="file" class="custom-file-container__custom-file__custom-file-input" multiple>
                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                </label>
                <div class="custom-file-container__image-preview"></div>
            </div>
        </div>

    </div>
    </div>
    <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
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
    <!-- END GLOBAL MANDATORY STYLES -->
    <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/file-upload/file-upload-with-preview.min.js"></script>

    <script>
    //First upload
    var firstUpload = new FileUploadWithPreview('myFirstImage')
    //Second upload
    var secondUpload = new FileUploadWithPreview('mySecondImage')
    </script>
</body>

</html>