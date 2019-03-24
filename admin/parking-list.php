<?php
include 'header.php';
$sql = $db->prepare('select * from tbl_slot');
$sql->execute();
$data = $sql->fetchAll(); 
?>
<div class="content pure-u-1 pure-u-md-21-24">
            <div class="header-small">

                <div class="items">
                    <h1 class="subhead">Parking Slot List </h1>
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
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($data as $slot) {?>
                        <tr>
                            <td><?=$slot['id'];?></td>
                            <td><?=$slot['slot_name'];?></td>
                            <td><?= $slot['status']=='1'?'Booked':'Free' ?></td>

                            <td>
                                <a class="pure-button button-small button-success" href="parking-edit.php?id=<?= $slot['id']; ?>">Edit</a>
                                
                            </td>
                        </tr>
<?php }?>
                        </tbody>
                    </table>
                </div>
<?php
unset($_SESSION['success']);
?>
