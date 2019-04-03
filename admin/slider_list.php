<?php include '../admin/header.php';?>
<?php
$sql = $db->prepare("SELECT * FROM tbl_slider"); //get data from database
$sql->execute(); //execute query
$data = $sql->fetchAll(); //insert in to array ?>
<div class="content pure-u-1 pure-u-md-21-24">
            <div class="header-small">

                <div class="items">
                    <h1 class="subhead">Slider List <a class="pure-button button-small button-secondary" href="slider_add.php">Add New Image</a></h1>
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
                            <th>Image</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($data as $sliders) {?>
                        <tr>
                            <td><?=$sliders['id'];?></td>
                            <td><img style="height:100px" src="../assets/img/<?= $sliders['image']?>" alt=""></td>
                            <td><?= $sliders['title'];?></td>
                            <td>
                                <a class="pure-button button-small button-success" href="user_edit.php?id=<?php echo $sliders['id']; ?>">Edit</a>
                                <a class="pure-button button-small button-error" href="slider-delete.php?id=<?=$sliders['id'];?>" onclick="return confirm('Are you sure?');">Delete</a>
                            </td>
                        </tr>
<?php }?>
                        </tbody>
                    </table>
                </div>
<?php
unset($_SESSION['success']);
?>