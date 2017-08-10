<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  
error_reporting(0);
if (!isset($_POST['submit']))  {
            echo "";
        } else  { 

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $no_of_guests = $_POST['no_of_guests'];
    $event_type_id = $_POST['event_type_id'];
    $event_time = $_POST['event_time'];
    $event_date = date("Y-m-d h:i:s");
    $description = $_POST['description'];
   
    $sql = "INSERT INTO book_an_event (`first_name`, `last_name`, `mobile`,`email`, `no_of_guests`, `event_type_id`,`event_time`,`event_date`,`description`) VALUES ('$first_name', '$last_name', '$mobile','$email','$no_of_guests','$event_type_id','$event_time','$event_date','$description')";
    if($conn->query($sql) === TRUE){
       echo "<script>alert('Data Updated Successfully');window.location.href='book_an_event.php';</script>";
    } else {
       echo "<script>alert('Data Updation Failed');window.location.href='book_an_event.php';</script>";
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
                                    $getCategories = getAllDataCheckActive('event_types',0);
                                ?>
                                <div class="input-field col s12">
                                    <select name="event_type_id" required>
                                        <option value="">Select Event</option>
                                        <?php while($row = $getCategories->fetch_assoc()) {  ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['event_type']; ?></option>
                                        <?php } ?>
                                    </select> 
                                </div>

                                 <div class="input-field col s6">
                                    <input id="first_name" type="text" class="validate" name="first_name" required>
                                    <label for="first_name">First Name</label>
                                </div>

                                <div class="input-field col s6">
                                    <input id="last_name" type="text" class="validate" name="last_name" required>
                                    <label for="last_name">Last Name</label>
                                </div>
                                
                                <div class="input-field col s6">
                                        <input id="email" type="email" class="validate" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                                        <label for="admin_email">Email</label>
                                </div>
                                
                                <div class="input-field col s6">
                                    <input id="mobile" type="text" class="validate" name="mobile" required>
                                    <label for="mobile">Mobile</label>
                                </div>

                                <div class="input-field col s6">
                                    <input id="no_of_guests" type="text" class="validate" name="no_of_guests" required>
                                    <label for="no_of_guests">Number Of Guests</label>
                                </div>

                                <div class="input-field col s6">
                                    <input id="event_time" type="text" class="validate" name="event_time" required>
                                    <label for="event_time">Event Time</label>
                                </div>

                                <div class="input-field col s12">
                                        <span for="description" class="col-lg-3 col-sm-3 control-label">Description</span> <br /><br />
                                        <div class="col-lg-9">
                                            <textarea id="description" name="description" required></textarea>
                                        </div>
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

<?php include_once 'footer.php'; ?>
<!-- Below script for ck editor -->
<!-- <script src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script> -->
<script src="//cdn.ckeditor.com/4.7.0/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'description' );
</script>
<style type="text/css">
    .cke_top, .cke_contents, .cke_bottom {
        border: 1px solid #333;
    }
</style>
