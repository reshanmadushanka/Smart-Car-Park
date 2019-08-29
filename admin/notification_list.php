<?php
include 'header.php';
$sql = $db->prepare("SELECT
tbl_booking.*,
tbl_slot.slot_name AS name,
tbl_slot.status AS status
FROM
`tbl_booking`
INNER JOIN tbl_slot ON tbl_slot.id = tbl_booking.slot_id
WHERE tbl_booking.is_show = 0
"); 
$sql->execute();
$data = $sql->fetchAll();   
?>
<div class="content pure-u-1 pure-u-md-21-24">
            <div class="header-small">

                <div class="items">
                    <h1 class="subhead">Booking List </h1>
                    <table class="pure-table pure-table-bordered">
                        <thead>
                        <tr>
                            <th>#id</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($data as $bookings) {?>
                        <tr>
                            <td><?=$bookings['id'];?></td>
                            <td><?=$bookings['name']?></td>
                            <td><?=$bookings['book_date']?></td>
                            <td>
                            <a class="pure-button button-small button-success" href="booking_more_detail.php?id=<?php echo $bookings['id']; ?>">Show</a>
                            </td>

                        </tr>
                       <?php }?>
                        </tbody>
                    </table>
                </div>
<?php
unset($_SESSION['success']);
?>