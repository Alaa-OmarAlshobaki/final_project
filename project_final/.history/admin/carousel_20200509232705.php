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

                                                                <h3>How To Make More Blog By Doing Less</h3>

                                                            </div>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block w-100 slide-image"
                                                                src="assets/img/640x426.jpg" alt="Second slide">
                                                            <div class="carousel-caption">

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
            <div class="col-6">
                <form id="upload_multiple_images" method="POST" enctype="multipart/form-data">
                    <div class="form-group col-md-8 mb-4">
                        <label for="exampleFormControlTextarea1">
                            Description</label>
                        <textarea class="form-control" id="validationCustom04" placeholder="description" value=""
                            name="desc" required name="prod_desc" id="exampleFormControlTextarea1" rows="4"></textarea>

                    </div>
                    <div class="custom-file-container" data-upload-id="myFirstImage">
                        <label>Upload Image <a href="javascript:void(0)" class="custom-file-container__image-clear"
                                title="Clear Image">x</a></label>
                        <label class="custom-file-container__custom-file">
                            <input type="file" name="cat_img" id="cat_img"
                                class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                        </label>
                        <div class="custom-file-container__image-preview"></div>

                    </div>
                    <!-- Dark -->
                    <button class="btn btn-outline-dark mb-2" type="submit" name="submit">Dark</button>
                </form>
            </div>
            <?php
       if(isset($_POST['submit'])){
           $slider="slider";
           $desc=$_POST['desc'];
           if (!file_exists('uploads/')) {
            mkdir('uploads/', 0777, true);

        }
        if (!file_exists("uploads/$slider/")) {
            mkdir("uploads/$slider/", 0777, true);
        
        }
      
        if(!empty($_FILES["cat_img"]["type"])){
            $upload_dir_img="uploads/$slider/";
            $img_title=time().'_'.$_FILES["cat_img"]["name"];
            $vaild_exe=array("png", "jpg","jpeg");
            $temporary=explode(".",$_FILES["cat_img"]["name"]);
   
            $file_extension=end($temporary);
            if(($_FILES["cat_img"]["type"]=="image/png")||($_FILES["cat_img"]["type"]=="image/jpeg") ||($_FILES["cat_img"]["type"]=="image/jpg") && in_array($file_extension,$valid_extensions))
             {
                
                 $sourcePath=$_FILES["cat_img"]['tmp_name'];
                move_uploaded_file($sourcePath,$upload_dir_img.$img_title);
                $hostImg="uploads/$slider/".$img_title;
              

        $query="INSERT INTO slider_table (img,slider_descr) Values ( '$hostImg','$desc' )";
        mysqli_query($conn,$query);
        direct('carousel.php');
       
        

    }}}

?>
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
    </script>
</body>

</html>