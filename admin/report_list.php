<?php include '../admin/header.php';?>
<?php
//get customer name list from tbl_user
$sql1 = $db->prepare("SELECT CONCAT(f_name, ' ' ,l_name) AS customer_name,id FROM tbl_user"); 
$sql1->execute(); 
$username = $sql1->fetchAll();
// customer list 2
$customer2 = $db->prepare("SELECT CONCAT(f_name, ' ' ,l_name) AS customer_name,id FROM tbl_user"); 
$customer2->execute(); 
$cus_names = $customer2->fetchAll();
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
$sql3 = $db->prepare("SELECT * FROM `tbl_slot`"); 
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
                        <form action="customer_detail_report.php" method="post">
                        <td>
                            <select name="user_id" id="userdetail" style="width: 200px;">
                                <option selected="selected">Select Customer Name</option>
                                <?php
                                    foreach($username as $username) { ?>
                                    <option value="<?= $username['id'] ?>"><?= $username['customer_name'] ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <button type="submit" class="pure-button button-small button-success" href="#">Generate</a>
                        </td>
                        </form>
                    </tr>
                    
                    <tr>
                        <td>02</td>
                        <td>Booking Details</td>
                        <td>Include Booking Details of selected Date Range</td>
                        <form action="booking_date_report.php" method="post">
                            
                        <td>
                            <div>
                            <label>From</label>
                            <input type="date" name="f_date" style="width: 200px;"/>
                                    </div>
                                    <br>
                                    <div>
                            <label>To</label>
                            <input type="date" name="t_date" style="width: 200px;"/>
                                    </div>
                        </td>
                        <td>
                        <button type="submit" class="pure-button button-small button-success" href="#">Generate</a>
                        </td>
                        </form>
                    </tr>
                    <tr>
                        <td>03</td>
                        <td>User Payment Details</td>
                        <td>Include User Payment Details of selected User</td>
                        
                        <td> 
                        <form action="customer_payment_report.php" method="post">
                            <select name="user_id" id="userdetail" style="width: 200px;">
                                <option selected="selected">Select Customer Name</option>
                                <?php
                                    foreach($cus_names as $usernames) { ?>
                                    <option value="<?= $usernames['id'] ?>"><?= $usernames['customer_name'] ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                        <button type="submit" class="pure-button button-small button-success" href="#">Generate</a>
                        </td>
                       </form>
                    </tr>
                    <tr>
                        <td>04</td>
                        <td>Slot Status Details</td>
                        <td>Include Parking Slot Status Details of selected Parkimg Slot</td>
                        <td>
                        <form action="slot_state_report.php" method="post">
                            <select name="slot" id="slot" style="width: 200px;">
                                <option selected="">Select Parking Slot</option>
                                <?php
                                    foreach($slot as $slot) { ?>
                                    <option value="<?= $slot['id'] ?>"><?= $slot['slot_name'] ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                        <button type="submit" class="pure-button button-small button-success" href="#">Generate</a>
                        </td>
                                    </form>
                    </tr>
                    <tr>
                        <td>05</td>
                        <td>Income Details</td>
                        <td>Include Income Details of selected Date Range</td>
                        <form action="booking_date_report.php" method="post">
                            
                        <td>
                            <div>
                            <label>From</label>
                            <input type="date" name="f_date" style="width: 200px;"/>
                                    </div>
                                    <br>
                                    <div>
                            <label>To</label>
                            <input type="date" name="t_date" style="width: 200px;"/>
                                    </div>
                        </td>
                        <td>
                        <button type="submit" class="pure-button button-small button-success" href="#">Generate</a>
                        </td>
                        </form>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php
unset($_SESSION['success']);
?>