<?php include '../admin/header.php';?>
<?php
$sql = $db->prepare("SELECT
tbl_user.f_name AS customer_name,
tbl_user.mobile AS contact_no,
tbl_booking.vehical_no AS vehical_no,
tbl_booking.book_date AS book_date,
tbl_booking.no_of_hours AS no_of_hours,
tbl_payment.status AS payment_status,
tbl_slot.slot_name AS slot_name
FROM
tbl_booking
INNER JOIN tbl_user ON tbl_user.id = tbl_booking.user_id
INNER JOIN tbl_payment ON tbl_payment.user_id = tbl_booking.user_id
INNER JOIN tbl_slot ON tbl_slot.id = tbl_booking.slot_id"); //get data from database
$sql->execute(); //execute query
$data = $sql->fetchAll(); //insert in to array ?>
<div class="content pure-u-1 pure-u-md-21-24">
    <div class="header-small">
        <div class="items">
            <h1 class="subhead">User Reservation Details</h1>
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
                        <th>Customer Name</th>
                        <th>Contact No</th>
                        <th>Vehicle No</th>
                        <th>Booking Date</th>
                        <th>No. of Hours</th>
                        <th>Slot No</th>
                        <th>Payment Status</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $i = 0;
                        foreach ($data as $users) {
                        $i++; ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?=$users['customer_name']?></td>
                        <td><?=$users['contact_no']?></td>
                        <td><?=$users['vehical_no']?></td>
                        <td><?=$users['book_date']?></td>
                        <td><?=$users['no_of_hours']?></td>
                        <td><?=$users['slot_name']?></td>
                        <td><?=$users['payment_status']?></td>                        
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php
unset($_SESSION['success']);
?>