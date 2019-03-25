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

                    <div class="pure-u-1 pure-u-md-1-3">
                        <div class="column-block">
                            <div class="column-block-header column-success">
                                <h2>Bookings</h2>
                                <span class="column-block-info">1000 <span>this month</span></span>
                            </div>
                            <ul class="column-block-list">
                                <li>Today <span class="buble-success button-small pull-right">100</span></li>
                                <li>Yesterday <span class="buble-secondary button-small pull-right">1000</span></li>
                                <li>Total <span class="buble-warning button-small pull-right">10000</span></li>
                            </ul>
                        </div>
                    </div>

                    <!-- <div class="pure-u-1 pure-u-md-1-3">
                        <div class="column-block">
                            <div class="column-block-header column-warning">
                                <h2>Posts</h2>
                                <span class="column-block-info">1000 <span>this month</span></span>
                            </div>
                            <ul class="column-block-list">
                                <li>Today <span class="buble-success button-small pull-right">100</span></li>
                                <li>Yesterday <span class="buble-secondary button-small pull-right">1000</span></li>
                                <li>Total <span class="buble-warning button-small pull-right">10000</span></li>
                            </ul>
                        </div>
                    </div> -->

                    <!-- <div class="pure-u-1 pure-u-md-1-3">
                        <div class="column-block">
                            <div class="column-block-header">
                                <h2>Options</h2>
                                <span class="column-block-info">1000 <span>this month</span></span>
                            </div>
                            <ul class="column-block-list">
                                <li>Today <span class="buble-success button-small pull-right">100</span></li>
                                <li>Yesterday <span class="buble-secondary button-small pull-right">1000</span></li>
                                <li>Total <span class="buble-warning button-small pull-right">10000</span></li>
                            </ul>
                        </div>
                    </div> -->

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
                            <!-- <table class="pure-table pure-table-horizontal">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Full Name 1</td>
                                    <td>nickname1@domain.local</td>
                                    <td>User</td>
                                    <td>Active</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Full Name 2</td>
                                    <td>nickname2@domain.local</td>
                                    <td>Moderator</td>
                                    <td>Awaiting</td>
                                </tr>
                                </tbody>
                            </table> -->
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
