<?php
include 'header.php';
$cutomer = $_POST['user_id'];
$sql = $db->prepare("SELECT DISTINCT
tbl_user.id,
tbl_user.f_name,
tbl_user.l_name,
tbl_user.NIC,
tbl_user.mobile,
tbl_user.city,
tbl_user.email,
tbl_booking.vehical_no
FROM
`tbl_user`
INNER JOIN tbl_booking ON tbl_user.id = tbl_booking.user_id
WHERE
tbl_user.id ='$cutomer'");

$sql->execute();
$data = $sql->fetchAll(); 
?>
<div class="content pure-u-1 pure-u-md-21-24">
    <div class="header-small" >
        <div class="items" id="print">
            <h1 class="subhead">Customer Detail Report</h1>
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
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>NIC No</th>
                        <th>Mobile No</th>
                        <th>City</th>
                        <th>email</th>
                        <th>Vehical No</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($data as $user) {?>
                    <tr>
                        <td><?=$user['id'];?></td>
                        <td><?=$user['f_name'];?></td>
                        <td><?=$user['l_name'];?></td>
                        <td><?=$user['NIC'];?></td>
                        <td><?=$user['mobile'];?></td>
                        <td><?=$user['city'];?></td>
                        <td><?=$user['email'];?></td>
                        <td><?=$user['vehical_no'];?></td>
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