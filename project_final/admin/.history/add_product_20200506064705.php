<!DOCTYPE html>
<html lang="en">



<body class="alt-menu sidebar-noneoverflow" data-spy="scroll" data-target="#navSection" data-offset="100">

    <!--  BEGIN NAVBAR  -->
    <?php include('layout/header.php')  ?>

    <head>


        <!--  BEGIN CUSTOM STYLE FILE  -->
        <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
        <link href="plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
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
            <div class="container">
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
                                                <select class="placeholder js-states form-control">
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
                                        <h3>Effects</h3>
                                        <section>
                                            <div>


                                                <form class="needs-validation" novalidate action="javascript:void(0);">
                                                    <div class="form-row">
                                                        <div class="col-md-4 mb-4">
                                                            <label for="validationCustom01">Book Name</label>
                                                            <input type="text" class="form-control"
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
                                                            <textarea class="form-control" id="validationCustom02"
                                                                placeholder="book description" value="" required
                                                                name="prod_desc" id="exampleFormControlTextarea1"
                                                                rows="4"></textarea>
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
                                                        <div class="col-md-3 mb-4">
                                                            <label for="validationCustom03">Quantity</label>
                                                            <input type="number" class="form-control"
                                                                id="validationCustom03" name="product_qty"
                                                                placeholder="quantity" required>
                                                            <div class="invalid-feedback">
                                                                Please insert Quantity
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <button class="btn btn-dark mt-3" type="submit"><span class="h3"><i
                                                                class="fal fa-books-medical"></i></span> Upload book
                                                    </button>
                                                </form>
                                            </div>
                                        </section>
                                        <h3>Pager</h3>
                                        <section>
                                            <div>
                                                <div class="custom-file-container" data-upload-id="mySecondImage">
                                                    <label>Upload (Allow Multiple) <a href="javascript:void(0)"
                                                            class="custom-file-container__image-clear"
                                                            title="Clear Image">x</a></label>
                                                    <label class="custom-file-container__custom-file">
                                                        <input type="file"
                                                            class="custom-file-container__custom-file__custom-file-input"
                                                            multiple>
                                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                        <span
                                                            class="custom-file-container__custom-file__custom-file-control"></span>
                                                    </label>
                                                    <div class="custom-file-container__image-preview"></div>

                                                </div>
                                            </div>
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
    </script>

</body>

</html>