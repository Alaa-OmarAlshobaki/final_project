<!DOCTYPE html>
<html lang="en">

<head>
    <!-- dattable css -->
    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="datatable/css/editor.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/colreorder/1.5.2/css/colReorder.dataTables.min.css" rel="stylesheet">
    <!-- custom datatable css-->
    <link href="cssDatatable/style.css" rel="stylesheet">
</head>
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
            <div class="row layout-top-spacing  d-flex justify-content-center ">
                <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing ">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>


                                <th>Category Name</th>
                                <th>Category Image</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>


                                <th>Category Name</th>
                                <th>Category Image</th>


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
<!-- datatable js -->
<script src="jsDatatable/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="datatable/js/dataTables.editor.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/colreorder/1.5.2/js/dataTables.colReorder.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<!-- custom js -->
<!-- <script src="jsDatatable/js.js"></script> -->
<script src="jsDatatable/categories.js"></script>