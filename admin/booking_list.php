<?php include '../admin/header.php';?>
<?php
$sql = $db->prepare("SELECT
tbl_booking.*,
tbl_slot.slot_name AS name,
tbl_slot.status AS status
FROM
`tbl_booking`
INNER JOIN tbl_slot ON tbl_slot.id = tbl_booking.slot_id
"); //get data from database
$sql->execute(); //execute query
$data = $sql->fetchAll(); //insert in to array ?>
<div class="content pure-u-1 pure-u-md-21-24">
            <div class="header-small">

                <div class="items">
                    <h1 class="subhead">Booking List </h1>
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
                            <th>#id</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Live Status</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($data as $users) {?>
                        <tr>
                            <td><?=$users['id'];?></td>
                            <td><?=$users['name']?></td>
                            <td><?=$users['book_date']?></td>
                            <td><?=$users['from']?></td>
                            <td><?=$users['to']?></td>
                            <td><?=$users['status']=='0'? 'Parked':'Free';?></td>
                            
                        </tr>
<?php }?>
                        </tbody>
                    </table>
                </div>
<?php
unset($_SESSION['success']);
?>