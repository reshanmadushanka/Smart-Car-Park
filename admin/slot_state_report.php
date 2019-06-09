<?php
include 'header.php';
$slot = $_POST['slot'];
$sql = $db->prepare("SELECT
*
FROM
tbl_booking
INNER JOIN
tbl_slot
ON
tbl_booking.slot_id = tbl_slot.id
WHERE
tbl_booking.slot_id = '$slot'");
$sql->execute();
$data = $sql->fetchAll(); 

?>
<div class="content pure-u-1 pure-u-md-21-24">
    <div class="header-small" >
        <div class="items" id="print">
            <h1 class="subhead">Parking Slot Report</h1>
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
                        <th>Status</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Vehicle Number</th>
                        <th>Hours</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($data as $slot) {?>
                    <tr>
                        <td><?= $slot['status']=='1'?'Free':'Parked' ?></td>
                        <td><?=$slot['from'];?></td>
                        <td><?=$slot['to'];?></td>
                        <td><?=$slot['vehical_no'];?></td>
                        <td><?=$slot['no_of_hours'];?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
        <a class="pure-button button-small button-warning" href="javascript:history.go(-1)">Back</a>
        <button class="pure-button button-small button-success" onclick="printDiv('print')">Print</button>
       <?php
unset($_SESSION['success']);
?>
<script>
		function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}
	</script>