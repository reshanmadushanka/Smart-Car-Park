<?php
include "./database/config.php";
session_start();
$user_id = $_SESSION['user_id'];
$book_date = $_POST['date'];
$from = $_POST['f_time'];
$to = $_POST['t_time'];
$slot_id = $_POST['slot_id'];
$vehical_no = $_POST['vehical_no'];
$no_of_hours = $_POST['no_of_hours'];
$price = $_POST['price'];

//insert into tbl_booking
$sql1 = $db->prepare("INSERT INTO `tbl_booking`( `user_id`, `book_date`, `from`, `to`, `slot_id`, `vehical_no`, `no_of_hours`) VALUES ( '$user_id', '$book_date', '$from', '$to', '$slot_id', '$vehical_no', '$no_of_hours')");
$sql1->execute(); //execute query
$booking_id = $db->lastInsertId();

//insert data into tbl_payment when click submit button

$sql2 = $db->prepare("INSERT INTO `tbl_payment`(`user_id`, `booking_id`, `amount`, `status`) VALUES ('$user_id', '$booking_id', '$price', 'online')");
$sql2->execute(); //execute query

include './header.php';

?>
<div class="filter-box col-lg-12 pull-left text-white">
    <br>
    <div class="container">
        <div class="row">
            <form method="post" id="pay_form"action="payment_result.php" class="col-lg-6 pull-left">
                <div class="col-lg-12 pull-left">
                    <label class="text-white" for="date">Customer Name</label>
                    <input name="user_name" value="<?= $_SESSION['login_user']; ?>" class="form-control" type="text" readonly>
                </div>
                <div class="col-lg-12 pull-left">
                    <label class="text-white" for="date">Vehical No.</label>
                    <input name="vehical_no" value="<?= $_POST['vehical_no'] ?>" class="form-control" type="text" readonly>
                </div>
                <div class="col-lg-12 pull-left">
                    <label class="text-white" for="date">Parking Slot No.</label>
                    <input name="slot_name" value="<?= $_POST['slot_name'] ?>" class="form-control" type="text" readonly>
                </div>
                <div class="col-lg-12 pull-left">
                    <label class="text-white" for="date">Credit/ Debit Card No</label>
                    <input name="card_no" class="form-control" type="number" required="true">
                </div>
                <div class="col-lg-12 pull-left">
                    <label class="text-white" for="date">Expire Date</label>
                    <input name="exp_date" id="exp_date" class="form-control" type="text" required="true">
                </div>                
                <div class="col-lg-12 pull-left">
                    <label class="text-white" for="date">Security Code</label>
                    <input name="Sec_code" class="form-control" type="text" required="true">
                </div>
                <div class="col-lg-12 pull-left">
                    <label class="text-white" for="date">Amount</label>
                    <input name="price" value="<?= $_POST['price'] ?>" class="form-control" type="text" readonly>
                </div>
                <div class="col-lg-12 pull-left">
                    <button name="submit" type="submit">Pay Now</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>
<script>
    $(document).ready(function() {
        jQuery('#exp_date').datetimepicker({
            timepicker: false,
            format: 'Y/m',
        });
    });
    $("#pay_form").validate({
        submitHandler: function(form) {
            // do other things for a valid form
            form.submit();
        }
    });
</script>