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
    <h1>Payment Detail</h1><br><br>
    <h3 class="text-white">Your Parking Slot will be reserved
        on <font color="red"><?php print_r($_POST['date']); ?></font>
        from <font color="red"><?php print_r($_POST['f_time']); ?></font>
        to <font color="red"><?php print_r($_POST['t_time']); ?> </font>
        for<font color="red"> <?php print_r($_POST['no_of_hours']); ?></font>
        hour/hours only </h3> <br>
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
                <div class="col-lg-12 pull-left" id="expiration-date" required="true">
                    <label>Expiration Date</label>
                    <select>
                        <option value="01">January</option>
                        <option value="02">February </option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                    <select>
                        <option value="16"> 2016</option>
                        <option value="17"> 2017</option>
                        <option value="18"> 2018</option>
                        <option value="19"> 2019</option>
                        <option value="20"> 2020</option>
                        <option value="21"> 2021</option>
                    </select>
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