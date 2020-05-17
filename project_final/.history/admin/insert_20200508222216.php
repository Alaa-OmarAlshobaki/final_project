<?php
include("include/connection.php");
$prod= $GET['prod'];

    if (isset($_POST['btn_upload'])) {
       
        $idProud=@$GET['prod'];

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
  
     
      
    foreach($_FILES['file_img']['tmp_name'] as $key =>$tmp_name ) {
        $imageTmpName = $_FILES['file_img']['tmp_name'][$key];
        $img_title=time().'_'.$_FILES["file_img"]["name"][$key];
        $uploadFolder ="uploads/$name_category/$name_product/";
        $result = move_uploaded_file($imageTmpName,$uploadFolder.$img_title);
        $hostImg="uploads/$name_category/$name_product/".$img_title ;

            $sqlRead = "INSERT INTO gallery (pro_id, image) VALUES ('$idProud','$hostImg')";
            
            $rowSqlRead=mysqli_query($conn,$sqlRead);
         
           
          
        }

    }




?>