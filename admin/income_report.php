<?php
include 'header.php';
$from = $_POST['f_date'];
$to = $_POST['t_date'];
$sql = $db->prepare("SELECT
*
FROM
tbl_payment
INNER JOIN
tbl_user
ON
tbl_payment.user_id = tbl_user.id
INNER JOIN
tbl_booking
ON
tbl_payment.booking_id = tbl_booking.id
WHERE
tbl_booking.book_date BETWEEN '$from' AND '$to'");

$sql->execute();
$data = $sql->fetchAll();
$totalamount = 0;
$totalhours = 0;
?>
<div class="content pure-u-1 pure-u-md-21-24">
    <div class="header-small" >
        <div class="items" id="print">
            <h1 class="subhead">Income Details Report</h1>
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
                        <th>Customer</th>
                        <th>Payment (Rs)</th>
                        <th>Date</th>                        
                        <th>Vehicle Number</th>
                        <th>Hours</th>
                        <th>Payment Type</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($data as $booking) {?>
                    <tr>
                        <td><?=$booking['f_name'];?></td>
                        <td><?=$booking['amount'];?></td>
                        <td><?=$booking['book_date'];?></td>                        
                        <td><?=$booking['vehical_no'];?></td>
                        <td><?=$booking['no_of_hours'];?></td>
                        <td><?=$booking['status'];?></td>
                    </tr>
                    <?php
                    $totalamount += $booking['amount'];
                    $totalhours += $booking['no_of_hours'];
                    ?>

                    <?php }?>
                    <tr>
                        <td><b>Total</b></td>
                        <td><b><?php echo $totalamount; ?></b></td>
                        <td><b><?php echo count($data); ?> Days</b></td>
                        <td></td>
                        <td><b><?php echo $totalhours; ?></b></td>  
                        <td></td>                       
                    </tr>
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