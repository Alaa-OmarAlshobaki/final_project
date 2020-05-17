<body class="alt-menu sidebar-noneoverflow">

    <!--  BEGIN NAVBAR  -->
    <?php include("layout/header.php");  ?>

    <head>
        <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
        <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
        <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
        <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
        <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_custom.css">
        <!--  BEGIN CUSTOM STYLE FILE  -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="plugins/animate/animate.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components/custom-carousel.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />
        <link href="plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
        <!--  END CUSTOM STYLE FILE  -->
        <!-- END PAGE LEVEL CUSTOM STYLES -->
    </head>

    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container sidebar-closed sbar-open" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <?php include("layout/sidebar.php");  ?>

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="page-header">
                    <div class="page-title">
                        <h3>products</h3>
                    </div>
                </div>





                <div class="row layout-spacing">
                    <div class="col-lg-12">
                        <div class="statbox widget box box-shadow">

                            <div class="widget-content widget-content-area">
                                <div class="table-responsive mb-4">
                                    <table id="style-3" class="table style-3  table-hover">
                                        <thead>
                                            <tr>
                                                <th class="checkbox-column text-center"> Record Id </th>
                                                <th class="text-center">Image</th>
                                                <th>Edit images</th>
                                                <th>Book type</th>
                                                <th>Book name</th>
                                                <th>Description of the book</th>
                                                <th>Author Name</th>
                                                <th>Quantity</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                 $query="SELECT *  FROM product
                                                       INNER JOIN category
                                                        ON product.id_cat = category.id";
                                                   $result=mysqli_query($conn,$query);
                                                   $i=0;
                                                   while($row =mysqli_fetch_assoc($result)){
                                                       $i++;
                                                       
                                                       $id=$row['id_product']
                                                      
                                                    

                                            ?>
                                            <tr>
                                                <td class="checkbox-column text-center"> <?php echo $i ?> </td>

                                                <td class="text-center">

                                                    <div id="carouselExampleIndicators" class="carousel slide"
                                                        data-ride="carousel">
                                                        <ol class="carousel-indicators">
                                                            <li data-target="#carouselExampleIndicators"
                                                                data-slide-to="0" class="active m"></li>
                                                            <li data-target="#carouselExampleIndicators"
                                                                data-slide-to="1"></li>
                                                            <li data-target="#carouselExampleIndicators"
                                                                data-slide-to="2"></li>
                                                        </ol>
                                                        <div class="carousel-inner">
                                                            <?php
                                                             $counter=0;
                                                              $quy="SELECT * FROM gallery WHERE pro_id=$id";
                                                              $res=mysqli_query($conn,$quy);
                                                              while($rw=mysqli_fetch_assoc($res))
                                                              { 
                                                                $idImg=$rw['id'];
                                                                $image=$rw['image'];
                                                                if ($counter == 0)
                                                                {
                                                                    ?>
                                                            <div class="carousel-item active">
                                                                <img class="d-block w-100"
                                                                    src="<?php echo $rw['image']  ?>" alt="First slide">
                                                                <div class="carousel-caption">


                                                                    <span class="h2"><i
                                                                            onclick="editGalModal('<?php echo $idImg ?>','<?php echo $image ?>','<?php echo $id ?>')"
                                                                            class="fas fa-edit "></i>
                                                                    </span>



                                                                </div>
                                                            </div>
                                                            <?php
                                                                }else{
                                                                    ?>
                                                            <div class="carousel-item">
                                                                <img class="d-block w-100"
                                                                    src="<?php echo $rw['image']  ?>"
                                                                    alt="Second slide">
                                                                <div class="carousel-caption">

                                                                    <span class="h2"><i
                                                                            onclick="editGalModal('<?php echo $idImg ?>','<?php echo $image ?>','<?php echo $id ?>')"
                                                                            class="fas fa-edit "></i>
                                                                    </span>



                                                                </div>
                                                            </div>

                                                            <?php


                                                                }
                                                              $counter++ ;
                                                                    
                                                              ?>


                                                            <?php } ?>



                                                        </div>
                                                        <a class="carousel-control-prev"
                                                            href="#carouselExampleIndicators" role="button"
                                                            data-slide="prev">
                                                            <span class="carousel-control-prev-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                        <a class="carousel-control-next"
                                                            href="#carouselExampleIndicators" role="button"
                                                            data-slide="next">
                                                            <span class="carousel-control-next-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </div>




                                                </td>
                                                <td class="checkbox-column text-center">

                                                </td>
                                                <td><?php echo$row['category_name']  ?></td>
                                                <td><?php echo$row['prod_name']  ?></td>
                                                <td><?php echo$row['prod_desc']  ?></td>
                                                <td><?php echo$row['author_name']  ?></td>
                                                <td><?php echo$row['product_qty']  ?></td>
                                                <td class="text-center">
                                                    <div class="progress br-30">
                                                        <div class="progress-bar  bg-info" role="progressbar"
                                                            style="width: 80%" aria-valuenow="100" aria-valuemin="0"
                                                            aria-valuemax="100">
                                                            <?php
                                                         
                                                          $queryReadPro = "SELECT product_qty FROM product
                                                                          WHERE id_cat = $id";
                                                          $resultReadPro= mysqli_query($conn,$queryReadPro);
                                                         $rowReadPro=mysqli_fetch_assoc($resultReadPro);
                                                           
                                                            
                                                            
  
                                                        
                                                          
                                                          echo (200-isset($rowReadPro['product_qty']  ));
                                                         

                                                        ?>


                                                        </div>
                                                    </div>

                                                <td class="text-center">
                                                    <i onclick="editModal('<?php echo $row['category_name'] ?>','<?php echo $row['prod_name'] ?>','<?php echo$row['prod_desc'] ?>','<?php echo$row['author_name']  ?>','<?php echo$row['product_qty'] ?>','<?php echo $id ?>','<?php echo $row['id'] ?>')"
                                                        class="fas fa-edit "></i>
                                                </td>
                                            </tr>
                                            <?php }?>

                                        </tbody>


                                        <?php
                                     if($_SERVER["REQUEST_METHOD"] == "POST"){
                                            
                                        if(isset($_POST['modal']) AND $_POST['type']=='edit'){
                                            $cat_name=@$_POST['cat_name'];
                                            $pro_name=@$_POST['pro_name'];
                                            $cat_desc=@$_POST['cat_desc'];
                                            $auth_name=@$_POST['auth_name'];
                                            $qua=@$_POST['qua'];
                                           
                                           $query="UPDATE product set        
                                                                              prod_name    = '$pro_name',
                                                                              prod_desc     = '$cat_desc',
                                                                              author_name     = '$auth_name',
                                                                              product_qty     = '$qua',
                                                                              id_cat          ='',
                                                                   WHERE       id              = {$cat_id}";
                                           mysqli_query($conn,$query);
                                           direct('categories.php');
                               
                                       }
                               
                                       if(isset($_POST['modal']) AND $_POST['type']=='add'){
                               
                                           $cat_name=@$_POST['cat_name'];
                                           $cat_desc=@$_POST['cat_desc'];
                                           
                                       
                                           if (!file_exists('uploads/')) {
                                               mkdir('uploads/', 0777, true);
                                   
                                           }
                                           if (!file_exists("uploads/$cat_name/")) {
                                               mkdir("uploads/$cat_name/", 0777, true);
                                           
                                           }
                                         
                                           if(!empty($_FILES["cat_img"]["type"])){
                                               $upload_dir_img="uploads/$cat_name/";
                                               $img_title=time().'_'.$_FILES["cat_img"]["name"];
                                               $vaild_exe=array("png", "jpg","jpeg");
                                               $temporary=explode(".",$_FILES["cat_img"]["name"]);
                                      
                                               $file_extension=end($temporary);
                                               if(($_FILES["cat_img"]["type"]=="image/png")||($_FILES["cat_img"]["type"]=="image/jpeg") ||($_FILES["cat_img"]["type"]=="image/jpg") && in_array($file_extension,$valid_extensions))
                                                {
                                                   
                                                    $sourcePath=$_FILES["cat_img"]['tmp_name'];
                                                   move_uploaded_file($sourcePath,$upload_dir_img.$img_title);
                                                   $hostImg="$cat_name/".$img_title;
                                                 
                               
                                           $query="INSERT INTO category (category_name,	category_dec,category_img) Values ( '$cat_name','$cat_desc','$hostImg' )";
                                           mysqli_query($conn,$query);
                                           direct('categories.php');
                                          
                                           
                               
                                       }}}}







                                    ?>









                                    </table>
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
    <div id="rotateleftModal" class="modal animated rotateInDownLeft custo-rotateInDownLeft" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Book</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-4">
                            <label class="control-label" id="sec">Section Name:</label>
                            <div class="input-group">

                                <input type="text" name="cat_name" id="cat_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="control-label" id="book">Book Name:</label>
                            <div class="input-group">

                                <input type="text" name="pro_name" id="pro_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleFormControlTextarea1" id="des">Description</label>
                            <textarea class="form-control" id="cat_desc" name="cat_desc"
                                id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label class="control-label" id="aut">Author Name:</label>
                            <div class="input-group">

                                <input type="text" name="auth_name" id="auth_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="control-label" id="q">Quantity:</label>
                            <div class="input-group">

                                <input type="text" name="qua" id="qua" class="form-control">
                            </div>
                        </div>
                        <select class="form-control form-control-sm">
                            <option> Select</option>
                            <?php
                            $querySelect="SELECT * FROM product
                                          INNER JOIN category
                                          ON product.id_cat = category.id";
                            $resSelect=mysqli_query($conn,$querySelect);
                            while($rowSelect=mysqli_fetch_assoc($resSelect))
                            {

                            ?>
                            <option value="<?php $rowSelect['id'] ?>"><?php echo $rowSelect['category_name']  ?>
                            </option>
                            <?php } ?>
                        </select>
                        <div class="custom-file-container" id="img" data-upload-id="myFirstImage">
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

                        <input id="idcat" type="text" name="idcat" class="form-control" required>
                        <input id="cat_id" type="text" name="cat_id" class="form-control" required>
                        <input id="type" type="text" name="type" class="form-control" required>
                        <input id="img_id" type="text" name="img_id" class="form-control" required>


                        <div class="modal-footer md-button">
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                            <button id="type_btn" type="submit" name="modal" class="btn btn-primary">Save</button>
                        </div>
                </form>
            </div>
        </div>
    </div>



    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
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
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->

    <script src="plugins/table/datatable/datatables.js"></script>
    <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/file-upload/file-upload-with-preview.min.js"></script>
    <script>
    var firstUpload = new FileUploadWithPreview('myFirstImage')
    // var e;
    c1 = $('#style-1').DataTable({
        headerCallback: function(e, a, t, n, s) {
            e.getElementsByTagName("th")[0].innerHTML =
                '<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
        },
        columnDefs: [{
            targets: 0,
            width: "30px",
            className: "",
            orderable: !1,
            render: function(e, a, t, n) {
                return '<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
            }
        }],
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "lengthMenu": [5, 10, 20, 50],
        "pageLength": 5
    });

    multiCheck(c1);

    c2 = $('#style-2').DataTable({
        headerCallback: function(e, a, t, n, s) {
            e.getElementsByTagName("th")[0].innerHTML =
                '<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
        },
        columnDefs: [{
            targets: 0,
            width: "30px",
            className: "",
            orderable: !1,
            render: function(e, a, t, n) {
                return '<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
            }
        }],
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "lengthMenu": [5, 10, 20, 50],
        "pageLength": 5
    });

    multiCheck(c2);

    c3 = $('#style-3').DataTable({
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [5, 10, 20, 50],
        "pageLength": 5
    });

    multiCheck(c3);


    function editModal(Cname, Pname, desc, auth, qty, id, idcat) {


        $('#rotateleftModal').modal()
        $('#cat_id').val(id)
        $('#idcat').show()
        $('#idcat').val(idcat)
        $('#type').val('edit')
        $('#type_btn').text('Edit')
        $('#cat_name').val(Cname)
        $('#pro_name').val(Pname)
        $('#cat_desc').val(desc)
        $('#auth_name').val(auth)
        $('#qua').val(qty)
        $('#img').hide()
        $('#img_id').hide()

        $('#cat_name').show()
        $('#pro_name').show()
        $('#cat_desc').show()
        $('#auth_name').show()
        $('#qua').show()
        $('#sec').show()
        $('#book').show()
        $('#des').show()
        $('#aut').show()
        $('#q').show()



        $('#type_btn').text('Edit')


    }

    function editGalModal(idImg, image, id) {


        $('#rotateleftModal').modal()
        $('#cat_id').val(id)
        $('#img_id').val(idImg)
        $('#type').val('editImages')
        $('#type_btn').text('Edit')
        $('#idcat').hide()
        $('#cat_name').hide()
        $('#pro_name').hide()
        $('#cat_desc').hide()
        $('#auth_name').hide()
        $('#qua').hide()
        $('#sec').hide()
        $('#book').hide()
        $('#des').hide()
        $('#aut').hide()
        $('#q').hide()
        $('#img').show()
        $('#cat_img').val(image)



        $('#type_btn').text('Edit')


    }
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
</body>

</html>