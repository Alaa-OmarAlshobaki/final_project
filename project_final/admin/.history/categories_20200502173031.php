<?php 
//include header
include("layout/header.php");
?>
<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container sidebar-closed sbar-open" id="container">

    <div class="overlay"></div>
    <div class="cs-overlay"></div>
    <div class="search-overlay"></div>
    <?php include("layout/sidebar.php")  ?>


    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>

                                <th>Name</th>
                                <th>email</th>
                                <th>img</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>

                                <th>Name</th>
                                <th>email</th>
                                <th>img</th>


                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>

        </div>
    </div>
    <!--  END CONTENT AREA  -->

</div>
<!-- END MAIN CONTAINER -->
<?php include("layout/footer.php") ?>