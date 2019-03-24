<?php include '../admin/header.php'; ?>
<?php
$sql = $db->prepare("SELECT * FROM tbl_user"); //get data from database
$sql->execute(); //execute query
$data = $sql->fetchAll(); //insert in to array ?>
<div class="content pure-u-1 pure-u-md-21-24">
            <div class="header-small">

                <div class="items">
                    <h1 class="subhead">User List <a class="pure-button button-small button-secondary" href="../admin/register_user.php">Add New User</a></h1>
<!--
                    <aside class="pure-message message-success">
                        <p><strong>SUCCESS</strong>: Success message.</p>
                    </aside>
                    <aside class="pure-message message-error">
                        <p><strong>ERROR</strong>: Error message.</p>
                    </aside>
                    <aside class="pure-message message-warning">
                        <p><strong>WARNING</strong>: Warning message.</p>
                    </aside> -->
            <?php if (isset($_SESSION['success'])) { ?>
                <aside class="pure-message message-success">
                        <p><strong>SUCCESS</strong><?= $_SESSION['success']; ?></p>
                    </aside>
	<?php
} ?>
                    <table class="pure-table pure-table-bordered">
                        <thead>
                        <tr>
                            <th>#id</th>
                            <th>Name</th>
                            <th>EMail</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($data as $users) { ?>
                        <tr>
                            <td><?=$users['id']; ?></td>
                            <td><?=$users['f_name'] . ' ' . $users['l_name']; ?></td>
                            <td><?=$users['email']; ?></td>
                            <td>
                                <a class="pure-button button-small button-success" href="user_edit.php?id=<?php echo $users['id']; ?>">Edit</a>
                                <a class="pure-button button-small button-error" href="#" onclick="return confirm('Are you sure?');">Delete</a>
                            </td>
                        </tr>
<?php } ?>
                        </tbody>
                    </table>
                </div>
<?php 
unset($_SESSION['success'])

?>
                <!-- <div class="navigation">
                    <div class="pure-button-group">
                        <a href="#" class="pure-button">Prev</a>
                        <a href="#" class="pure-button">Next</a>
                    </div>
                </div> -->