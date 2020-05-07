<?php
include('include/connection.php');

$prod_name=$_POST['prod_name'];
$prod_desc=$_POST['prod_desc'];
$author_name=$_POST['author_name'];
$price_prod=$_POST['price_prod'];
$product_qty=$_POST['product_qty'];
$id=$_POST['id_cat'];
$sql = "INSERT INTO `product`( `prod_name`, `prod_desc`, `author_name`, `price_prod` `product_qty`) 
        VALUES ('$prod_name','$prod_desc','$author_name','$price_prod','$product_qty')";
if (mysqli_query($conn, $sql)) {
    echo json_encode(array("statusCode"=>200));
} 
else {
    echo json_encode(array("statusCode"=>201));
}


$('#insertProd').on('click', function() {
    $("#insertProd").attr("disabled", "disabled");
    var id = $('#id_cat').val();
    var prod_name = $('#validationCustom01').val();
    var prod_desc = $('#validationCustom04').val();
    var author_name = $('#validationCustom02').val();
    var price_prod = $('#validationCustomUsername').val();
    var product_qty = $('#validationCustom03').val();
    if (id != "" && prod_name != "" && prod_desc != "" && author_name != "" && price_prod !=
        "" && product_qty != "") {
        $.ajax({
            url: "insertajax.php",
            type: "POST",
            data: {
                id: id
                prod_name: prod_name,
                prod_desc: prod_desc,
                author_name: author_name,
                price_prod: price_prod,
                product_qty: product_qty
            },
            cache: false,
            success: function(dataResult) {
                var dataResult = JSON.parse(dataResult);
                if (dataResult.statusCode == 200) {
                    $("#butsave").removeAttr("disabled");
                    $('#fupForm').find('input:text').val('');
                    $("#success").show();
                    $('#success').html('Data added successfully !');
                } else if (dataResult.statusCode == 201) {
                    alert("Error occured !");
                }

            }
        });
    } else {
        alert('Please fill all the field !');
    }
});




?>