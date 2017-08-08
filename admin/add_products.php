<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php 
if (!isset($_POST['submit']))  {
            echo "";
} else  {
    //Save data into database
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $product_price = $_POST['product_price'];
    $price_type = $_POST['price_type'];
    $offer_price = $_POST['offer_price'];
    $selling_price = $_POST['selling_price'];
    $deal_start_date = $_POST['deal_start_date'];
    $deal_end_date = $_POST['deal_end_date'];
    $quantity = $_POST['quantity'];
    $minimum_order_quantity = $_POST['minimum_order_quantity'];
    $key_features = $_POST['key_features'];
    $product_info = $_POST['product_info'];
    $specifications = $_POST['specifications'];
    $availability_id = $_POST['availability_id'];
    $status = $_POST['status'];
    $created_at = date("Y-m-d h:i:s");
    $created_by = $_SESSION['admin_user_id'];
    //save product images into product_images table    
    
    $sql1 = "INSERT INTO products (`product_name`,`category_id`,`product_price`,`price_type`,`offer_price`,`selling_price`, `deal_start_date`, `deal_end_date`, `quantity`, `minimum_order_quantity`, `key_features`,`product_info`,`specifications`,`availability_id`,`status`,`created_by`,`created_at`) VALUES ('$product_name','$category_id','$product_price','$price_type','$offer_price','$selling_price', '$deal_start_date', '$deal_end_date', '$quantity', '$minimum_order_quantity', '$key_features','$product_info','$specifications','$availability_id','$status','$created_by','$created_at')";
    $result1 = $conn->query($sql1);
    $last_id = $conn->insert_id;

    $product_images = $_FILES['product_images']['name'];
    foreach($product_images as $key=>$value){

        $product_images1 = $_FILES['product_images']['name'][$key];
        $file_tmp = $_FILES["product_images"]["tmp_name"][$key];
        $file_destination = '../uploads/product_images/' . $product_images1;
        move_uploaded_file($file_tmp, $file_destination);        
        $sql = "INSERT INTO product_images ( `product_id`,`product_image`) VALUES ('$last_id','$product_images1')";
        $result = $conn->query($sql);
    }
    
    if( $result1 == 1){
    echo "<script>alert('Data Updated Successfully');window.location.href='products.php';</script>";
    } else {
       echo "<script>alert('Data Updation Failed');window.location.href='products.php';</script>";
    }
}
?>
<main class="mn-inner">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Products</div>
        </div>
        <div class="col s12 m12 l2"></div>
        <div class="col s12 m12 l8">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <form class="col s12" method="post" enctype="multipart/form-data">
                            <div class="row">
                               
                                <?php
                                    $getCategories = getAllDataCheckActive('categories',0);
                                    $getWeights = getAllDataCheckActive('product_weights',0);
                                ?>
                                <div class="input-field col s12">
                                    <select name="category_id" required>
                                        <option value="">Select Category</option>
                                        <?php while($row = $getCategories->fetch_assoc()) {  ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="input-field col s12">
                                    <input id="product_name" type="text" class="validate" name="product_name" required>
                                    <label for="product_name">Product Name</label>
                                </div>
                                
                                <div class="input-field col s12">
                                   <input id="product_price" type="text" class="validate" name="product_price" onkeypress="return isNumberKey(event)" required>
                                   <label for="product_price">Product Price</label>
                                </div>
                                <div class="input-field col s12">
                                    <select name="price_type" id="price_type" required class="price_type">
                                        <option value="">Select Price Type</option>
                                        <option value="1">Price</option>
                                        <option value="2">Percentage</option>
                                    </select>
                                </div>
                                <div class="input-field col s12 show_price" style="display:none">
                                   <input id="offer_price" type="text" class="validate" name="offer_price" onkeypress="return isNumberKey(event)" required>
                                   <label for="offer_price" class="price_change_text">Discount Price</label>
                                </div>
                                <div id="clickview"></div>
                                <div class="input-field col s12">
                                   <input id="selling_price" readonly type="text" class="validate" name="selling_price" placeholder="Selling Price" required>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        <label for="deal_start_date">Deal Start date</label>
                                        <input id="deal_start_date" name="deal_start_date" type="text" class="datepicker">
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col s12">
                                            <label for="deal_end_date">Deal End date</label>
                                            <input id="deal_end_date" name="deal_end_date" type="text" class="datepicker">
                                        </div>
                                    </div>
                                <div class="input-field col s6">
                                    <input id="quantity" type="text" class="validate order_qnty" name="quantity" onkeypress="return isNumberKey(event)" required>
                                    <label for="quantity">Quantity</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="minimum_order_quantity" type="text" class="validate min_order_qnty" onkeypress="return isNumberKey(event)" name="minimum_order_quantity" required>
                                    <label for="minimum_order_quantity">Minimum Order Quantity</label>
                                </div>
                                
                                <div class="input-field col s12">
                                    <span for="keyfet" class="col-lg-3 col-sm-3 control-label">Key Features</span> <br /><br />
                                    <div class="col-lg-9">
                                        <textarea id="key_features" name="key_features" required></textarea>
                                    </div>
                                </div>
                                        
                                <div class="input-field col s12">
                                        <span for="name" class="col-lg-3 col-sm-3 control-label">Product Info</span> <br /><br />
                                        <div class="col-lg-9">
                                            <textarea name="product_info" required id="product_info"></textarea>
                                        </div>
                                </div>

                                <div class="input-field col s12">
                                        <span for="name" class="col-lg-3 col-sm-3 control-label">Specifications</span> <br /><br />
                                        <div class="col-lg-9">
                                            <textarea name="specifications" required id="specifications"></textarea>
                                        </div>
                                </div>
                                    
                                <div class="input-field col s12">
                                    <select name="availability_id" required>
                                        <option value="" disabled selected>Avalability</option>
                                        <option value="0">In Stock</option>
                                        <option value="1">Out Of Stock</option>
                                    </select>
                                </div>

                                <div class="input-field col s12">
                                    Product Images : <br /><br />
                                    <div class="input_fields_wrap">
                                        <div>
                                            <img id="output" height="100" width="100"/> 
                                            <input type="file" id="product_images" name="product_images[]" accept="image/*" onchange="loadFile(event)" required> 
                                            <a style="cursor:pointer" id="add_more" class="add_field_button">Add More Fields</a>
                                        </div><br/>
                                    </div>
                                </div>

                                <?php $getStatus = getAllData('user_status'); ?>
                                    <div class="input-field col s12">
                                        <select name="status" required>
                                            <option value="">Select Status</option>
                                            <?php while($row = $getStatus->fetch_assoc()) {  ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['status']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                <div class="input-field col s12">
                                    <input type="submit" name="submit" value="Submit" class="waves-effect waves-light btn teal">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col s12 m12 l2"></div>
    </div>
</main>



<?php include_once('ck_editor.php'); include_once 'footer.php'; ?>

<script type="text/javascript">
$(document).ready(function() {

    //Change price type starts here
    $("#price_type").change(function () {
        if ($(this).val() == 1) {
            $(".show_price").show();
            $('.price_change_text').html('Enter Discount Price');
        } else if($(this).val() == 2) {
            $(".show_price").show();
            $('.price_change_text').html('Enter Offer Percentage');
        } else {
            $(".show_price").hide();
        }
        $('#offer_price, #selling_price').val('');
    });
    //End
    //Check validation for prodcut price empty or not and calaculate selling price
    $('#offer_price').keyup(function() {
        if($('#product_price').val()==''){
            alert("Please Enter Product Price");
            $('#offer_price').val('');
            return false;
        } else if($('#price_type').val() == 1) {
            calcPrice = ($('#product_price').val() - $('#offer_price').val());
        } else if($('#price_type').val() == 2) {
            calcPrice = $('#product_price').val() - ( ($('#product_price').val()/100) * $('#offer_price').val());
            if (parseInt($('#offer_price').val())>99) {
                alert("Please enter the percentage less than 100 ");
                $('#selling_price').val('');
                $('#offer_price').val('');
                return false;
            };
        }
        discountPrice = calcPrice.toFixed(2);
        $('#selling_price').val(discountPrice);
        if(parseInt($('#offer_price').val()) > parseInt($('#product_price').val())) {
            alert("Please Enter Discount value less than Product Price");
            $('#selling_price').val('');
            $('#offer_price').val('');
        }
    });
    //End
    //Add multi images for products
    var abc = 0;
    $('#add_more').click(function () {
        $(this).before("<div><input type='file' id='file' name='product_images[]' accept='image/*'required><a href='#' class='remove_field'>Remove</a> </div>");
    });
    $('body').on('change', '#file', function () {
        if (this.files && this.files[0])
        {
            abc += 1; //increementing global variable by 1
            var z = abc - 1;
            var x = $(this).parent().find('#previewimg' + z).remove();
            $(this).before("<div id='abcd" + abc + "' class='abcd'><img id='previewimg" + abc + "' src='' width='150' height='150'/></div>");
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
        }
    });
        //image preview
    function imageIsLoaded(e) {
        $('#previewimg' + abc).attr('src', e.target.result);
    };
    $(this).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
    //End date should be greater than Start date
    $("#deal_end_date").change(function () {
        var startDate = document.getElementById("deal_start_date").value;
        if ($('#deal_start_date').val()=='') {
        alert("Please Enter Deal Start date");
        document.getElementById("deal_end_date").value = "";
    };
        var endDate = document.getElementById("deal_end_date").value;
     
        if ((Date.parse(endDate) <= Date.parse(startDate))) {
            alert("Deal End date should be greater than Deal Start date");
            document.getElementById("deal_end_date").value = "";
        }
    });
    
   //Minimum order quantity should be less than quantity
   $("#minimum_order_quantity").keyup(function () {
        if($('#quantity').val()==''){
            alert("Please Enter Quantity");
            $('#minimum_order_quantity, #quantity').val('');
        } else {
            if(parseInt($('#minimum_order_quantity').val()) > parseInt($('#quantity').val())) {
                alert("The quantity value must be larger than the minimum quantity");
                $('#minimum_order_quantity').val('');
                return false;
            }
        }
   });
   
});

//Only allowed numbers
//How to make HTML input tag only accept numerical values?
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>