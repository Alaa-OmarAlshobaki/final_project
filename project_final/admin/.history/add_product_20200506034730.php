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

                    <div id="navSection" data-spy="affix" class="nav  sidenav">
                        <div class="sidenav-content">
                            <a href="#wizards_pills" class="active nav-link">Pills</a>
                            <a href="#wizards_circle" class="nav-link">Circle</a>
                        </div>
                    </div>

                    <div class="row layout-top-spacing" id="cancel-row">

                        <div id="wizards_pills" class="col-lg-12">
                            <div class="seperator-header">
                                <h4 class="">Pills</h4>
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
    </div>
    </div>

    <div id="wizards_circle" class="col-lg-12">
        <div class="seperator-header">
            <h4 class="">Circle</h4>
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
                        <p>Try the keyboard navigation by clicking arrow left or right!</p>
                    </section>
                    <h3>Effects</h3>
                    <section>
                        <p>Wonderful transition effects.</p>
                    </section>
                    <h3>Pager</h3>
                    <section>
                        <p>The next and previous buttons help you to navigate through your content.
                        </p>
                    </section>
                </div>

                <div class="code-section-container">

                    <button class="btn toggle-code-snippet"><span>Code</span></button>

                    <div class="code-section text-left">
                        <pre>
$("selector").steps({
    cssClass: 'circle wizard'
});
</pre>
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
    <!-- END PAGE LEVEL SCRIPTS -->
</body>

</html>