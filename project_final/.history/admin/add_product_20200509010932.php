<!DOCTYPE html>
<html lang="en">



<body class="alt-menu sidebar-noneoverflow" data-spy="scroll" data-target="#navSection" data-offset="100">

    <!--  BEGIN NAVBAR  -->
    <?php include('layout/header.php')  ?>

    <head>


        <!--  BEGIN CUSTOM STYLE FILE  -->
        <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
        <link href="plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="plugins/jquery-step/jquery.steps.css">

        <style>
        #formValidate .wizard>.content {
            min-height: 25em;
        }

        #example-vertical.wizard>.content {
            min-height: 24.5em;
        }
        </style>
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
            <div class="container-fluid">
                <div class="container">



                    <div class="row layout-top-spacing" id="cancel-row">


                        <div class="col-lg-12 layout-spacing">

                        </div>

                        <div class="col-lg-12  layout-spacing">
                            <div class="statbox widget box box-shadow">


                            </div>
                        </div>



                        <div class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Add books to its section </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div id="circle-basic" class="">
                                        <h3>ٍSelect Section</h3>
                                        <section>
                                            <div>
                                                <select id="category" class="placeholder js-states form-control">
                                                    <option>Choose...</option>
                                                    <?php
                                                    $query="SELECT * FROM category";
                                                    $result=mysqli_query($conn,$query);
                                                    while($row=mysqli_fetch_assoc($result)){
                                                    ?>
                                                    <option value="<?php echo $row['id'] ?>">
                                                        <?php echo $row['category_name']?>
                                                    </option>

                                                    <?php }
                                                    ?>
                                                </select>

                                            </div>
                                        </section>
                                        <h3>Add a book to the custom section </h3>
                                        <section>
                                            <div>


                                                <form class="needs-validation" method="POST" novalidate
                                                    action="javascript:void(0);">
                                                    <div class="form-row">
                                                        <input type="hidden" name="id_cat" id="idCat" value="">
                                                        <!-- <select id="idCat"></select> -->
                                                        <div class="col-md-4 mb-4">
                                                            <label for="validationCustom01">Book Name</label>
                                                            <input type="text" class="form-control" name="prod_name"
                                                                id="validationCustom01" placeholder="book name" value=""
                                                                required>
                                                            <div class="valid-feedback">
                                                                good!
                                                            </div>
                                                            <div class="invalid-feedback">
                                                                please insert name of book
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-8 mb-4">
                                                            <label for="exampleFormControlTextarea1">Book
                                                                Description</label>
                                                            <textarea class="form-control" id="validationCustom04"
                                                                placeholder="book description" value="" name="prod_desc"
                                                                required name="prod_desc"
                                                                id="exampleFormControlTextarea1" rows="4"></textarea>
                                                            <div class="valid-feedback">
                                                                good!
                                                            </div>
                                                            <div class="invalid-feedback">
                                                                please insert book description
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-4">
                                                            <label for="validationCustom02"> Author Name</label>
                                                            <input type="text" name="author_name" class="form-control"
                                                                id="validationCustom02" placeholder="author name"
                                                                value="" required>
                                                            <div class="valid-feedback">
                                                                good!
                                                            </div>
                                                            <div class="invalid-feedback">
                                                                please insert author name
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-4">
                                                            <label for="validationCustomUsername">Price</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                        id="inputGroupPrepend">$</span>
                                                                </div>
                                                                <input type="number" class="form-control"
                                                                    id="validationCustomUsername"
                                                                    placeholder="Price of book"
                                                                    aria-describedby="inputGroupPrepend"
                                                                    name="price_prod" required>
                                                                <div class="invalid-feedback">
                                                                    Please insert price
                                                                </div>
                                                                <div class="valid-feedback">
                                                                    good!
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-4 mb-4">
                                                            <label for="validationCustom03">Quantity</label>
                                                            <input type="number" class="form-control"
                                                                id="validationCustom03" name="product_qty"
                                                                placeholder="quantity" required>
                                                            <div class="invalid-feedback">
                                                                Please insert Quantity
                                                            </div>
                                                        </div>

                                                    </div>


                                                    <button id="insertProd"
                                                        class="btn btn-outline-dark snackbar-bg-danger mb-2 mt-3"
                                                        type="submit" name="submit"><span class="h3"><i
                                                                class="fal fa-books-medical text-danger"></i></span>
                                                        Upload book
                                                    </button>
                                                </form>
                                            </div>
                                            <!-- section upload multiple imge for product according last id in table product -->
                                        </section>
                                        <h3>Upload multiple pictures of the book</h3>
                                        <section>
                                            <div>
                                                <form id="upload_multiple_images" method="POST"
                                                    enctype="multipart/form-data">
                                                    <div class="custom-file-container" data-upload-id="mySecondImage">

                                                        <input type="hidden" id="prod" name="prod" value="">

                                                        <label>Upload (Allow Multiple) <a href="javascript:void(0)"
                                                                class="custom-file-container__image-clear"
                                                                title="Clear Image">x</a></label>
                                                        <label class="custom-file-container__custom-file">
                                                            <input type="file" name="image[]" id="image" multiple
                                                                accept=".jpg, .png, .gif"
                                                                class="custom-file-container__custom-file__custom-file-input">
                                                            <input type="hidden" name="MAX_FILE_SIZE"
                                                                value="10485760" />
                                                            <span
                                                                class="custom-file-container__custom-file__custom-file-control"></span>
                                                        </label>
                                                        <div class="custom-file-container__image-preview"></div>
                                                        <button type="submit" name="btn_upload" value="Insert"
                                                            class="btn btn-outline-dark snackbar-bg-danger mb-2 mt-3">
                                                            <span class="h3"><i
                                                                    class="fal fa-images text-danger"></i></span>
                                                            Upload multiple images
                                                        </button>

                                                    </div>
                                                </form>
                                                <div id="images_list"></div>
                                            </div>
                                            <?php
    

    if (isset($_POST['btn_upload'])) {
        $idProud=@$_POST['prod'];

        $queryRead="SELECT * FROM product
                   INNER JOIN category 
                   ON product.id_cat = category.id 
                   WHERE product.id_product = $idProud";
       $resultRead=mysqli_query($conn,$queryRead);
       $rowRead=mysqli_fetch_assoc($resultRead);
       $name_category=$rowRead['category_name'];
       $name_product= $rowRead['prod_name'];
       
      
      
       if (!file_exists('uploads/')) {
        mkdir('uploads/', 0777, true);
     
    }
    if (!file_exists("uploads/$name_category/")) {
        mkdir("uploads/$name_category/", 0777, true);
    
    }
    if (!file_exists("uploads/$name_category/$name_product/")) {
        mkdir("uploads/$name_category/$name_product/", 0777, true);
    
    }
  
     
      
    foreach($_FILES['image']['tmp_name'] as $key =>$tmp_name ) {
        $imageTmpName = $_FILES['image']['tmp_name'][$key];
        $img_title=time().'_'.$_FILES["image"]["name"][$key];
        $uploadFolder ="uploads/$name_category/$name_product/";
        $result = move_uploaded_file($imageTmpName,$uploadFolder.$img_title);
        $hostImg="uploads/$name_category/$name_product/".$img_title ;

            $sqlRead = "INSERT INTO gallery (pro_id, image) VALUES ('$idProud','$hostImg')";
            
            $rowSqlRead=mysqli_query($conn,$sqlRead);
         
           
          
        }

    }
  
    ?>
                                            <!-- end section upload multiple image  -->
                                        </section>
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
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="assets/js/scrollspyNav.js"></script>


    <script src="plugins/jquery-step/jquery.steps.min.js"></script>
    <script src="plugins/jquery-step/custom-jquery.steps.js"></script>
    <script src="assets/js/forms/bootstrap_validation/bs_validation_script.js"></script>
    <script src="plugins/file-upload/file-upload-with-preview.min.js"></script>
    <!-- toastr -->
    <script src="plugins/notification/snackbar/snackbar.min.js"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="assets/js/components/notification/custom-snackbar.js"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->

    <!-- END PAGE LEVEL SCRIPTS -->

    <script>
    //Second upload
    var secondUpload = new FileUploadWithPreview('mySecondImage')
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);

    // Get the Toast button
    var toastButton = document.getElementById("toast-btn");
    // Get the Toast element
    var toastElement = document.getElementsByClassName("toast")[0];

    // toastButton.onclick = function() {
    //     $('.toast').toast('show');
    // }

    $('.snackbar-bg-danger').click(function() {
        Snackbar.show({
            text: 'done',
            actionTextColor: '#fff',
            backgroundColor: '#e7515a'
        });
    });
    </script>

    <!-- ajax code to returd id from step 1 to step 2 when select category -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#category").change(function() {
            //get selected parent option 
            var cat_id = $("#category").val();
            //alert(admin_id);
            $.ajax({
                type: "GET",
                url: "operation.php?cat_id=" + cat_id,
                success: function(data) {
                    $("#idCat").val(data);
                }
            });
        });



    });
    </script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#insertProd").click(function() {
            //get selected parent option 
            var cat_id = $("#idCat").val();
            var name = $('#validationCustom01').val();
            var description = $('#validationCustom04').val();
            var author = $('#validationCustom02').val();
            var price = $('#validationCustomUsername').val();
            var quantity = $('#validationCustom03').val();

            if (name != "" && description != "" && author != "" && price != "" && quantity != "")

                $.ajax({
                    type: "GET",
                    url: "ajaxInsertProduct.php?cat_id=" + cat_id + "&&name?=" + name +
                        "&&description?=" + description + "&&author?=" + author + "&&price?=" +
                        price + "&&quantity?=" + quantity,
                    data: {
                        name: name,
                        description: description,
                        author: author,
                        price: price,
                        quantity: quantity,
                    },
                    cache: false,
                    success: function(data) {
                        $('#prod').val(data);
                        $('#insertProd').html("Data added successfully !");

                    }
                });
        });



    });
    </script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {


        $("#insert").click(function() {
            event.preventDefault();
            var image_name = $('#image').val();
            var prod = $("#prod").val();
            if (image_name == '') {
                alert("Please Select Image");
                return false;
            } else {
                $.ajax({
                    url: "insert.php?id=" + prod + "&&image_name=" + image_name,
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $('#image').val('');
                        load_images();
                    }
                });
            }
        });


    });
    </script>


</body>

</html>