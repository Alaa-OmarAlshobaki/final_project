<!DOCTYPE html>
<html lang="en">


</head>

<body class="alt-menu sidebar-noneoverflow">

    <!--  BEGIN NAVBAR  -->
    <?php include("layout/header.php") ?>

    <head>

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="plugins/animate/animate.css" rel="stylesheet" type="text/css" />
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
        <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">

        <link href="assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!--  BEGIN CUSTOM STYLE FILE  -->
        <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
        <!--  END CUSTOM STYLE FILE  -->
        <style>
        .table-responsive>.table {
            background: transparent;
        }
        </style>
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

                <div class="container-fluid">





                    <div class="row d-flex justify-content-center">




                        <div class="col-lg-12 col-12 layout-spacing mt-5">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 d-flex justify-content-center">
                                            <h4>Add Discount For Sections Or Books</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form method="POST" action="">
                                        <div class="row d-flex justify-content-center">


                                            <div class="col-xl-4 mb-xl-0 mb-2">
                                                <select class="form-control form-control-sm" name="discount">
                                                    <option>select discount</option>
                                                    <?php 
                            $query="SELECT * FROM discount";
                            $res=mysqli_query($conn,$query);
                            while($row=mysqli_fetch_assoc($res)){

                            
                             ?>
                                                    <option value="<?php echo $row['discount_value']  ?>">
                                                        <?php echo $row['discount_value']  ?></option>

                                                    <?php }  ?>
                                                </select>
                                            </div>
                                            <div class="col-xl-4 mb-xl-0 mb-2">
                                                <select class="form-control form-control-sm" name="cat" id="section">
                                                    <option>select section</option>
                                                    <?php 
                            $querySection="SELECT * FROM category";
                            $resSection=mysqli_query($conn,$querySection);
                            while($rowSection=mysqli_fetch_assoc($resSection)){
                                $userSet[] = $rowSection;
                            } 
                            
                             ?>
                                                    <?php
foreach ($userSet as $key => $value) {
    echo "<option value='{$value['id']}'>{$value['category_name']}</option>";
}
?>
                                                </select>
                                            </div>
                                            <div class="col-xl-4 mb-xl-0 mb-2">
                                                <select class="form-control form-control-sm" name="prod" id="book">
                                                    <option>select book</option>


                                                </select>
                                            </div>
                                            <div class="d-flex justify-content-center mt-5 ">
                                                <button type="submit" name="submit"
                                                    class="btn btn-outline-dark mb-2">Add
                                                    Discount</button>
                                            </div>


                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>


                        <?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
                            
if(isset($_POST['submit'])){
$discount=@$_POST['discount'];
$cat=@$_POST['cat'];
$prod=@$_POST['prod'];
$queryInsert="INSERT INTO `cat_discount_pro`(`id_dis`, `id_cat`, `id_pro`) 
                 VALUES ($discount,$cat,$prod)";
                 $resultInsert=mysqli_query($conn,$queryInsert);
                 echo "done";
}
}



?>





                        <div class="layout-px-spacing">

                            <div class="page-header">
                                <div class="page-title">
                                    <h3>Range Search</h3>
                                </div>
                            </div>

                            <div class="row" id="cancel-row">

                                <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                                    <div class="widget-content widget-content-area br-6">
                                        <div class="table-responsive mb-4 mt-4">
                                            <button onclick="addModal()"
                                                class="btn btn-dark rounded-circle float-right text-center mb-2 mr-2 ">
                                                <span class="h4"> <i class="fad fa-plus"></i></span>

                                            </button>
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>Minimum Discount:</td>
                                                        <td><input type="text" id="min" class="form-control" name="min">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Maximum Discount:</td>
                                                        <td><input type="text" id="max" class="form-control" name="max">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table id="range-search" class="display table table-hover"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Discount Description</th>
                                                        <th>Discount Unit <i class="fal fa-percent text-danger"></i>
                                                        </th>
                                                        <th>Discount Value</th>
                                                        <th>Start date</th>
                                                        <th>End date</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                $i=0;
                                                $query="SELECT * FROM discount";
                                                      $res=mysqli_query($conn,$query);
                                                      while($row=mysqli_fetch_assoc($res)){
                                                          
                                                $i++           ?>
                                                    <tr>

                                                        <td><?php echo $i ?></td>
                                                        <td><?php echo $row['disc_desc']  ?></td>
                                                        <td><?php echo $row['discount_unit']  ?> </td>
                                                        <td><?php echo $row['discount_value']  ?></td>
                                                        <td><?php echo $row['start_disc']  ?></td>
                                                        <td><?php echo $row['end_disc']  ?></td>
                                                        <td class="text-center">
                                                            <button class="btn btn-dark mb-2 mr-2 rounded-circle"> <i
                                                                    onclick="editModal('<?php echo $row['discount_value'] ?>','<?php echo $row['discount_unit'] ?>','<?php echo $row['start_disc'] ?>','<?php echo $row['end_disc']?>','<?php echo $row['disc_desc']?>')"
                                                                    class="fas fa-edit "></i>
                                                            </button>
                                                            <form action="" method="post">
                                                                <input type="hidden" name="delete_cat_id"
                                                                    value="<?php echo $row['discount_value'] ?>">
                                                                <button name="delete"
                                                                    class="btn btn-dark mb-2 mr-2 rounded-circle">
                                                                    <i class="fal fa-trash-alt"></i>
                                                                </button>
                                                            </form>
                                                        </td>

                                                        </span>
                                                    </tr>
                                                    <?php } ?>

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Discount Description</th>
                                                        <th>Discount Unit <i class="fal fa-percent text-danger"></i>
                                                        </th>
                                                        <th>Discount Value</th>
                                                        <th>Start date</th>
                                                        <th>End date</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <?php
                                     if($_SERVER["REQUEST_METHOD"] == "POST"){
                                            
                                        if(isset($_POST['modal']) AND $_POST['type']=='Edit'){
                                            $desc_val=@$_POST['desc_val'];
                                           $desc_unit=@$_POST['desc_unit'];
                                           $desDisc=@$_POST['desDisc'];
                                           $desc_Str=@$_POST['desc_Str'];
                                           $desc_End=@$_POST['desc_End'];
                                          
                                           
                               
                                           $queryUpdate="UPDATE discount set         discount_value   = '$desc_val',
                                                                               discount_unit   = '$desc_unit',
                                                                               start_disc     = '$desc_Str',
                                                                               end_disc     = '$desc_End',
                                                                               disc_desc     = '$desDisc'
                                                                   WHERE       discount_value  = {$desc_val}";
                                           mysqli_query($conn,$queryUpdate);
                                           direct('discount.php');
                               
                                       }
                               
                                       if(isset($_POST['modal']) AND $_POST['type']=='add'){
                               
                                           $desc_val=@$_POST['desc_val'];
                                           $desc_unit=@$_POST['desc_unit'];
                                           $desDisc=@$_POST['desDisc'];
                                           $desc_Str=@$_POST['desc_Str'];
                                           $desc_End=@$_POST['desc_End'];
                                        
                                           $queryInsert="INSERT INTO discount (discount_value,discount_unit,start_disc,end_disc,disc_desc)
                                                               Values         ( '$desc_val','$desc_unit','$desc_Str','$desc_End','$desDisc' )";
                                           mysqli_query($conn,$queryInsert);
                                           direct('discount.php');
                                          
                                           
                               
                                       }
                                           
                                  //   DELETE
        if(isset($_POST['delete'])){
            
         
            
            $cat_id=@$_POST['delete_cat_id'];
           
            $quG="DELETE  FROM gallery WHERE pro_id=$id";
            $resG=mysqli_query($conn,$quG);
          
            $queryD="delete from discount where discount_value = $cat_id";
            mysqli_query($conn,$queryD);

          

            direct('discount.php');
        }
                                    
                                    }







                                    ?>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!--  END CONTENT AREA  -->
                    <div id="faderightModal" class="modal animated fadeInRight custo-fadeInRight" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <form action="" method="POST">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Manage Discount</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-x">
                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="form-group mb-4">
                                            <label for="exampleFormControlTextarea1">Description</label>
                                            <textarea class="form-control"
                                                placeholder="add description for discount if you want" id="desDisc"
                                                name="desDisc" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="control-label">Discount Unit:</label>
                                            <div class="input-group">

                                                <input type="text" name="desc_unit" id="desc_unit"
                                                    placeholder="discount unit" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="control-label">Discount Value:</label>
                                            <div class="input-group">

                                                <input type="number" placeholder="add discount value" name="desc_val"
                                                    id="desc_val" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="control-label">Start Date:</label>
                                            <div class="input-group">

                                                <input type="date" name="desc_Str" id="desc_Str" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="control-label">End Date:</label>
                                            <div class="input-group">

                                                <input type="date" name="desc_End" id="desc_End" class="form-control">
                                            </div>
                                        </div>

                                        <input id="cat_id" type="hidden" name="cat_id" class="form-control" required>
                                        <input id="type" type="hidden" name="type" class="form-control" required>
                                    </div>
                                    <div class="modal-footer md-button">
                                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                                            Discard</button>
                                        <button id="type_btn" type="submit" name="modal"
                                            class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
                <script src="plugins/table/datatable/datatables.js"></script>
                <script src="assets/js/scrollspyNav.js"></script>
                <script>
                /* Custom filtering function which will search data in column four between two values */
                $.fn.dataTable.ext.search.push(
                    function(settings, data, dataIndex) {
                        var min = parseInt($('#min').val(), 10);
                        var max = parseInt($('#max').val(), 10);
                        var age = parseFloat(data[3]) || 0; // use data for the age column

                        if ((isNaN(min) && isNaN(max)) ||
                            (isNaN(min) && age <= max) ||
                            (min <= age && isNaN(max)) ||
                            (min <= age && age <= max)) {
                            return true;
                        }
                        return false;
                    }
                );
                $(document).ready(function() {
                    var table = $('#range-search').DataTable({
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
                        "pageLength": 7
                    });
                    // Event listener to the two range filtering inputs to redraw on input
                    $('#min, #max').keyup(function() {
                        table.draw();
                    });
                });
                </script>
                <!-- END PAGE LEVEL SCRIPTS -->
                <script>
                function addModal() {
                    $('#faderightModal').modal()
                    $('#type').val('add')
                    $('#type_btn').text('Add')

                }

                function editModal(val, unit, sdate, edate, desc) {
                    $('#faderightModal').modal()
                    $('#type').val('Edit')
                    $('#type_btn').text('Edit')
                    $('#desc_val').val(val)
                    $('#desc_unit').val(unit)
                    $('#desc_Str').val(sdate)
                    $('#desc_End').val(edate)
                    $('#desDisc').val(desc)

                }
                </script>
                </script>
                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                <script type="text/javascript">
                $(document).ready(function() {
                    $("#section").change(function() {
                        //get selected parent option 
                        var section_id = $("#section").val();

                        $.ajax({
                            type: "GET",
                            url: "names.php?admin_id=" + section_id,
                            success: function(data) {
                                $("#book").html(data);
                            }
                        });
                    });

                });
                </script>
</body>

</html>