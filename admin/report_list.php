<?php include '../admin/header.php';?>
<?php
//get customer name list from tbl_user
$sql1 = $db->prepare("SELECT CONCAT(f_name, ' ' ,l_name) AS customer_name FROM tbl_user"); 
$sql1->execute(); 
$username = $sql1->fetchAll();

//get booking date list from tbl_booking
$sql2 = $db->prepare("SELECT  DISTINCT `book_date` FROM `tbl_booking`"); 
$sql2->execute(); 
$bookdate = $sql2->fetchAll();

//get booking year list from tbl_booking
$year = $db->prepare("SELECT DISTINCT EXTRACT(YEAR FROM tbl_booking.book_date) AS year FROM tbl_booking"); 
$year->execute(); 
$bookyear = $year->fetchAll();

//get booking Month list from tbl_booking
$month = $db->prepare("SELECT DISTINCT MONTHNAME (tbl_booking.book_date) AS month FROM tbl_booking"); 
$month->execute(); 
$bookmonth = $month->fetchAll();

//get parking slot list from tbl_slot
$sql3 = $db->prepare("SELECT `slot_name` FROM `tbl_slot`"); 
$sql3->execute(); 
$slot = $sql3->fetchAll();

?>

<div class="content pure-u-1 pure-u-md-21-24">
    <div class="header-small">
        <div class="items">
            <h1 class="subhead">Report Details</h1>
            <!-- success msg show -->
            <?php if (isset($_SESSION['success'])) {?>
            <aside class="pure-message message-success">
                <p><?=$_SESSION['success'];?></p>
            </aside>
            <?php
}?>
            <table class="pure-table pure-table-bordered">
                <thead>
                    <tr>
                        <th>Index</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Sort By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01</td>
                        <td>Customer Details</td>
                        <td>Include Customer Details of selected Customer</td>
                        <td><select name="userdetail" id="userdetail" style="width: 200px;">
                                <option selected="selected">Select Customer Name</option>
                                <?php
                                    foreach($username as $username) { ?>
                                    <option value="<?= $username['customer_name'] ?>"><?= $username['customer_name'] ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <a class="pure-button button-small button-success" href="#">Generate</a>
                            <a class="pure-button button-small button-warning" href="#">Print</a>
                        </td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td>Daily Booking Details</td>
                        <td>Include Daily Booking Details of selected Date</td>
                        <td><select name="bookdate" id="bookdate" style="width: 200px;">
                                <option selected="selected">Select Booking Date</option>
                                <?php
                                    foreach($bookdate as $bookdate) { ?>
                                    <option value="<?= $bookdate['book_date'] ?>"><?= $bookdate['book_date'] ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <a class="pure-button button-small button-success" href="#">Generate</a>
                            <a class="pure-button button-small button-warning" href="#">Print</a>
                        </td>
                    </tr>
                    <tr>
                        <td>03</td>
                        <td>Monthly Booking Details</td>
                        <td>Include Monthly Booking Details of selected Month</td>
                        <td><select name="bookmonth" id="bookmonth" style="width: 200px;">
                                <option selected="selected">Select Month</option>
                                <?php
                                    foreach($bookmonth as $bookmonth) { ?>
                                    <option value="<?= $bookmonth['month'] ?>"><?= $bookmonth['month'] ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <a class="pure-button button-small button-success" href="#">Generate</a>
                            <a class="pure-button button-small button-warning" href="#">Print</a>
                        </td>
                    </tr>
                    <tr>
                        <td>04</td>
                        <td>Annualy Booking Details</td>
                        <td>Include Annualy Booking Details of selected Year</td>
                        <td><select name="bookyear" id="bookyear" style="width: 200px;">
                                <option selected="selected">Select Year</option>
                                <?php
                                    foreach($bookyear as $bookyear) { ?>
                                    <option value="<?= $bookyear['year'] ?>"><?= $bookyear['year'] ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <a class="pure-button button-small button-success" href="#">Generate</a>
                            <a class="pure-button button-small button-warning" href="#">Print</a>
                        </td>
                    </tr>
                    <tr>
                        <td>05</td>
                        <td>User Payment Details</td>
                        <td>Include User Payment Details of selected User</td>
                        <td><select name="userpayment" id="userpayment" style="width: 200px;">
                                <option selected="selected">Select Customer Name</option>
                                <?php
                                   foreach($username as $username) { ?>
                                    <option value="<?=$username['customer_name']?>"> <?=$username['customer_name']?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <a class="pure-button button-small button-success" href="#">Generate</a>
                            <a class="pure-button button-small button-warning" href="#">Print</a>
                        </td>
                    </tr>
                    <tr>
                        <td>06</td>
                        <td>Slot Status Details</td>
                        <td>Include Parking Slot Status Details of selected Parkimg Slot</td>
                        <td><select name="slot" id="slot" style="width: 200px;">
                                <option selected="selected">Select Parking Slot</option>
                                <?php
                                    foreach($slot as $slot) { ?>
                                    <option value="<?= $slot['slot_name'] ?>"><?= $slot['slot_name'] ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <a class="pure-button button-small button-success" href="#">Generate</a>
                            <a class="pure-button button-small button-warning" href="#">Print</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php
unset($_SESSION['success']);
?>