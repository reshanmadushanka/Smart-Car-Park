<?php 
include 'header.php';
$id = $_GET['id'];
$sql = $db->prepare("SELECT * FROM `tbl_slot` WHERE id=$id");
$sql->execute();
$data = $sql->fetch(PDO::FETCH_ASSOC);

?>

<div class="content pure-u-1 pure-u-md-21-24">
            <div class="header-small">

                <div class="items">
                    <h1 class="subhead">Slot</h1>
                    <form action="parking-update.php" method="post" autocomplete="off" class="pure-form pure-form-stacked">
                        <fieldset>
                            <label for="firstname"> Name</label>
                            <input required id="name" name="name" type="text" placeholder=" Name" class="pure-input-1" value="<?=$data['slot_name']; ?>">
                          
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <button type="submit" class="pure-button button-success">Update</button>
                        </fieldset>
                    </form>
                </div>


            </div>
        </div>
    </div>