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
        <!-- toastr -->
        <link href="plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
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
                                                        <?php
                                                             $counter=0;
                                                              $quy="SELECT * FROM slider_table ";
                                                              $res=mysqli_query($conn,$quy);
                                                              while($rw=mysqli_fetch_assoc($res))
                                                              { 
                                                                if ($counter == 0)
                                                                {
                                                                    ?>
                                                        <div class="carousel-item active">
                                                            <img class="d-block w-100 slide-image"
                                                                src="<?php echo $rw['img']  ?>" alt="First slide">
                                                            <div class="carousel-caption">

                                                                <h3><?php echo $rw['slider_descr']  ?></h3>

                                                            </div>
                                                        </div>
                                                        <?php
                                                                }else{
                                                                    ?>
                                                        <div class="carousel-item">
                                                            <img class="d-block w-100 slide-image"
                                                                src="<?php echo $rw['img']  ?>" alt="Second slide">
                                                            <div class="carousel-caption">

                                                                <h3><?php echo $rw['slider_descr']  ?></h3>

                                                            </div>
                                                        </div>
                                                        <?php


                                                            }
                                                            $counter++ ;
                                                                
                                                            ?>


                                                        <?php } ?>

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
            <div class="col-6 d-flex justify-content-center">
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
                    <button class="btn btn-outline-dark mb-2 text-center snackbar-bg-danger" type="submit"
                        name="submit"><span class="h2"><i class="fal fa-image-polaroid"></i></span> Upload
                        Image</button>
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
    <!-- toastr -->
    <script src="plugins/notification/snackbar/snackbar.min.js"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="assets/js/components/notification/custom-snackbar.js"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->

    <script>
    //First upload
    var firstUpload = new FileUploadWithPreview('myFirstImage')
    $('.snackbar-bg-danger').click(function() {
        Snackbar.show({
            text: 'Done',
            actionTextColor: '#fff',
            backgroundColor: '#e7515a'
        });
    });
    </script>
</body>

</html>