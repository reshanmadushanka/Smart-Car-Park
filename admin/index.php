<?php include '../admin/header.php';
$sql = $db->prepare('select * from tbl_slot');
$sql->execute();
$data = $sql->fetchAll();

?>

        <div class="content pure-u-1 pure-u-md-21-24">
            <div class="header-small">

                <div class="items">
                    <h1 class="subhead">Dashboard</h1>
                </div>

                <div class="pure-g">

                  

                </div>

                <div class="pure-g">
                    <div class="pure-u-1 pure-u-md-1-3">
                        <div class="column-block">
                            <table class="pure-table pure-table-horizontal">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Status</th>

                                </tr>
                                </thead>

                                <tbody>
                                <?php foreach ($data as $parkings) {?>
                                <tr>
                                    <td><?= $parkings['id'] ?></td>
                                    <td><?= $parkings['slot_name'] ?></td>
                                    <td><?= $parkings['status']=='0'?'Parked':'Free' ?></td>
                                </tr>
                                <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="pure-u-1 pure-u-md-2-3">
                        <div class="column-block">
                           
                        </div>
                    </div>
                </div>

                <div class="footer">
                    <div class="pure-menu pure-menu-horizontal">

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
