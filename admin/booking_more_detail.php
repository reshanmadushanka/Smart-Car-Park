<?php
include 'header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id']; // for testing purposes
    $sql = $db->prepare("SELECT
 tbl_booking.*,
 tbl_slot.slot_name AS name,
 tbl_slot.status AS status
 FROM
 `tbl_booking`
 INNER JOIN tbl_slot ON tbl_slot.id = tbl_booking.slot_id
 WHERE tbl_booking.id =  $id
 ");
    $sql2 = $db->prepare("UPDATE
 `tbl_booking`
SET
 `is_show` = 1
WHERE
 `id` = $id");
    $sql->execute();
    $sql2->execute();
    $data = $sql->fetch(PDO::FETCH_ASSOC);

} else {
    echo "Something went wrong!";
}

?>

<div class="content pure-u-1 pure-u-md-21-24">
            <div class="header-small">

                <div class="items">
                    <h1 class="subhead">Booking Detail </h1>
                </div>
                <table class="pure-table pure-table-bordered">
                    <tr>
                        <td>Date</td>
                        <td><?= $data['name']; ?></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><?= $data['book_date']; ?></td>
                    </tr>
                    <tr>
                        <td>Time Slot</td>
                        <td><?=date('h:i:s a', strtotime($data['from']))." - ".date('h:i:s a', strtotime($data['to'])); ?></td>
                    </tr>
                    <tr>
                        <td>State</td>
                        <td><?= $data['status']=='0'? 'Parked':'Free';?></td>
                    </tr>

                </table>
                <a class="pure-button button-small button-warning" href="javascript:history.go(-1)">Back</a>
           </div>
         
</div>
