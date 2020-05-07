<!DOCTYPE html>
<html lang="en">



<body class="alt-menu sidebar-noneoverflow" data-spy="scroll" data-target="#navSection" data-offset="100">

    <!--  BEGIN NAVBAR  -->
    <?php include('layout/header.php')  ?>

    <head>


        <!--  BEGIN CUSTOM STYLE FILE  -->
        <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
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
                                            <h4>Default</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div id="circle-basic" class="">
                                        <h3>Keyboard</h3>
                                        <section>
                                            <div>
                                                <select class="placeholder js-states form-control">
                                                    <option>Choose...</option>
                                                    <option value="one">First</option>
                                                    <option value="two">Second</option>
                                                    <option value="three">Third</option>
                                                    <option value="four">Fourth</option>
                                                    <option value="five">Fifth</option>
                                                </select>
                                            </div>
                                        </section>
                                        <h3>Effects</h3>
                                        <section>
                                            <div>
                                                ===============
                                                HTML
                                                ===============

                                                <form class="needs-validation" novalidate action="javascript:void(0);">
                                                    <div class="form-row">
                                                        <div class="col-md-4 mb-4">
                                                            <label for="validationCustom01">First name</label>
                                                            <input type="text" class="form-control"
                                                                id="validationCustom01" placeholder="First name"
                                                                value="Shaun" required>
                                                            <div class="valid-feedback">
                                                                Looks good!
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-4">
                                                            <label for="validationCustom02">Last name</label>
                                                            <input type="text" class="form-control"
                                                                id="validationCustom02" placeholder="Last name"
                                                                value="Park" required>
                                                            <div class="valid-feedback">
                                                                Looks good!
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-4">
                                                            <label for="validationCustomUsername">Username</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                        id="inputGroupPrepend">@</span>
                                                                </div>
                                                                <input type="text" class="form-control"
                                                                    id="validationCustomUsername" placeholder="Username"
                                                                    aria-describedby="inputGroupPrepend" required>
                                                                <div class="invalid-feedback">
                                                                    Please choose a username.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-6 mb-4">
                                                            <label for="validationCustom03">City</label>
                                                            <input type="text" class="form-control"
                                                                id="validationCustom03" placeholder="City" required>
                                                            <div class="invalid-feedback">
                                                                Please provide a valid city.
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mb-4">
                                                            <label for="validationCustom04">State</label>
                                                            <input type="text" class="form-control"
                                                                id="validationCustom04" placeholder="State" required>
                                                            <div class="invalid-feedback">
                                                                Please provide a valid state.
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mb-4">
                                                            <label for="validationCustom05">Zip</label>
                                                            <input type="text" class="form-control"
                                                                id="validationCustom05" placeholder="Zip" required>
                                                            <div class="invalid-feedback">
                                                                Please provide a valid zip.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <div class="form-check pl-0">
                                                            <div
                                                                class="custom-control custom-checkbox checkbox-success">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="invalidCheck" required>
                                                                <label class="custom-control-label"
                                                                    for="invalidCheck">Agree to terms and
                                                                    conditions</label>
                                                                <div class="invalid-feedback">
                                                                    You must agree before submitting.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary mt-3" type="submit">Submit
                                                        form</button>
                                                </form>
                                            </div>
                                        </section>
                                        <h3>Pager</h3>
                                        <section>
                                            <p>The next and previous buttons help you to navigate through your content.
                                            </p>
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
    $(".placeholder").select2({
        placeholder: "Make a Selection",
        allowClear: true
    }); ===
    === === === ===
    Javascript
        ===
        === === === ===

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
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/jquery-step/jquery.steps.min.js"></script>
    <script src="plugins/jquery-step/custom-jquery.steps.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
</body>

</html>