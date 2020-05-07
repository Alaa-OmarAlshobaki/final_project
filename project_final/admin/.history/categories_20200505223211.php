<body class="alt-menu sidebar-noneoverflow">

    <!--  BEGIN NAVBAR  -->
    <?php include("layout/header.php")   ?>

    <head>
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
        <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
        <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
        <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_custom.css">
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="plugins/animate/animate.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->

        <!--  BEGIN CUSTOM STYLE FILE  -->
        <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />
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
        <?php include("layout/sidebar.php");  ?>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="page-header">
                    <div class="page-title">
                        <h3>Mange Categories</h3>
                    </div>
                </div>


                <div class="row" id="cancel-row">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <button onclick="addModal()"
                                class="btn btn-dark rounded-circle float-right text-center mb-2 mr-2 ">
                                <span class="h4"> <i class="fad fa-plus"></i></span>

                            </button>

                            <div class="table-responsive mb-4 mt-4">

                                <table id="multi-column-ordering" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th># </th>
                                            <th>ٍSection NAme</th>
                                            <th>description</th>

                                            <th>quantity</th>
                                            <th>progress</th>
                                            <th>Discount</th>
                                            <th>Start date discount</th>
                                            <th>end date discount</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    // read , insert and edit data from table categories
                                    // add discount for categories and defiend date of discount
                                    $i=0;
                                    $queryRead = "SELECT * FROM category ";
                                    $resultRead= mysqli_query($conn,$queryRead);
                                   
                                    while($rowRead=mysqli_fetch_assoc($resultRead)){
                                        $i++;
                                        $id_category= @$rowRead['id'];
                                        

                                    

                                    ?>
                                        <tr>
                                            <td><?php echo $i. $id_category ?></td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="usr-img-frame mr-2 rounded-circle">
                                                        <img alt="avatar" class="img-fluid rounded-circle"
                                                            src="uploads/<?php echo $rowRead['category_img']?>">
                                                    </div>
                                                    <p class="align-self-center mb-0 admin-name">
                                                        <?php echo $rowRead['category_name']  ?></p>
                                                </div>
                                            </td>
                                            <td><?php echo $rowRead['category_dec'] ?></td>

                                            <td>
                                                <!-- return data from table prodect according category
                                                        and count number of product for this category
                                                        then return quantity -->
                                                <?php
                                                        $quantity=0;
                                                        $queryReadPro = "SELECT product_qty FROM product
                                                                        WHERE id_cat = $id_category";
                                                        $resultReadPro= mysqli_query($conn,$queryReadPro);
                                                        while($rowReadPro=mysqli_fetch_assoc($resultReadPro)){
                                                            $quantity+=$rowReadPro['product_qty'];

                                                        }

                                                        echo $quantity;


                                                        ?>
                                            </td>
                                            <td>progress</td>
                                            <td>
                                                <?php
                                                    $queryReadDis = "SELECT * FROM category
                                                                INNER JOIN discount
                                                                ON category.id_discount = discount.discount_value 
                                                                WHERE id = $id_category";
                                                    $resultReadDis=mysqli_query($conn,$queryReadDis);
                                                    $rowReadDis=mysqli_fetch_assoc($resultReadDis);
                                                    
                                                    if($rowReadDis['discount_value'] == 0){

                                                        echo "No Discount";
                                                }else{
                                                    echo $rowReadDis['discount_value'] ."<i class='fal fa-percentage text-danger'></i>" ;
                                                    
                                                } ?>

                                            </td>
                                            <td>
                                                <?php 
                                             $queryReadDis = "SELECT * FROM category
                                             INNER JOIN discount
                                             ON category.id_discount = discount.discount_value 
                                             WHERE id = $id_category";
                                             $resultReadDis=mysqli_query($conn,$queryReadDis);
                                             $rowReadDis=mysqli_fetch_assoc($resultReadDis);
                                             echo $rowReadDis['start_disc'] ;  ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    $queryReadDis = "SELECT * FROM category
                                                    INNER JOIN discount
                                                    ON category.id_discount = discount.discount_value 
                                                    WHERE id = $id_category";
                                                    $resultReadDis=mysqli_query($conn,$queryReadDis);
                                                    $rowReadDis=mysqli_fetch_assoc($resultReadDis);
                                                    echo $rowReadDis['end_disc'] ;  ?>
                                            </td>
                                            <td class="text-center">

                                                <i onclick="editModal('<?php echo $rowRead['category_name'] ?>','<?php echo $rowRead['category_dec'] ?>','<?php echo $rowRead['category_img'] ?>')"
                                                    class="fas fa-edit "></i>

                                            </td>
                                        </tr>
                                        <?php  } ?>
                                    </tbody>
                                    <!-- code for add data into catgory table -->

                                    <?php
                                     if($_SERVER["REQUEST_METHOD"] == "POST"){
                                            
                                        if(isset($_POST['modal']) AND $_POST['type']=='edit'){
                                            $cat_desc=@$_POST['cat_desc'];
                                            $cat_name=@$_POST['cat_name'];
                                            $cat_id=@$_POST['cat_id'];
                                          
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
                               
                                           $query="UPDATE category set        
                                                                              category_name    = '$cat_name',
                                                                              category_dec     = '$cat_desc',
                                                                              category_img     = '$hostImg'
                                                                   WHERE       id              = {$cat_id}";
                                           mysqli_query($conn,$query);
                                           direct('mange_categories.php');
                               
                                       }}}
                               
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
                                           direct('mange_categories.php');
                                          
                                           
                               
                                       }}}}







                                    ?>
                                    <tfoot>
                                        <tr>
                                            <th># </th>
                                            <th>ٍSection NAme</th>
                                            <th>description</th>

                                            <th>quantity</th>
                                            <th>progress</th>
                                            <th>Discount</th>
                                            <th>Start date discount</th>
                                            <th>end date discount</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
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
                        <h5 class="modal-title">Modal Header</h5>
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
                            <label class="control-label">Section Name:</label>
                            <div class="input-group">

                                <input type="text" name="cat_name" id="cat_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" id="cat_desc" name="cat_desc"
                                id="exampleFormControlTextarea1" rows="3"></textarea>
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
                        <input id="cat_id" type="text" name="cat_id" class="form-control" required>
                        <input id="type" type="text" name="type" class="form-control" required>
                    </div>
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

    <!--  BEGIN CUSTOM SCRIPT FILE  -->
    <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/file-upload/file-upload-with-preview.min.js"></script>

    <script>
    //First upload
    var firstUpload = new FileUploadWithPreview('myFirstImage')

    $('#multi-column-ordering').DataTable({
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
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 7,
        columnDefs: [{
            targets: [0],
            orderData: [0, 1]
        }, {
            targets: [1],
            orderData: [1, 0]
        }, {
            targets: [4],
            orderData: [4, 0]
        }]
    });


    function editModal(id, name, desc, img) {


        $('#rotateleftModal').modal()
        $('#type').val('edit')
        $('#cat_name').val(name)
        $('#cat_desc').val(desc)
        $('#cat_img').val(img)
        $('#cat_id').val(id)
        $('#type_btn').text('Edit')


    }

    function addModal() {
        $('#rotateleftModal').modal()
        $('#type').val('add')
        $('#type_btn').text('Add')

    }
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->

</body>

</html>