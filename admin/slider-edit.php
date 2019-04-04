<?php
include '../admin/header.php';

if (isset($_GET['id'])) {
 $id  = $_GET['id']; // for testing purposes
 $sql = $db->prepare("SELECT * FROM tbl_slider WHERE id = '$id'"); //get slider details
 $sql->execute();
 $data = $sql->fetch(PDO::FETCH_ASSOC);

} else {
 echo "Something went wrong!";
}
?>
<div class="content pure-u-1 pure-u-md-21-24">
            <div class="header-small">

                <div class="items">
                    <h1 class="subhead">Image Slider</h1>
                    <form action="slider-update.php" method="post" autocomplete="off" class="pure-form pure-form-stacked">
                    <fieldset>
                            <label for="title">Title</label>
                            <input required id="title" name="title" type="text" placeholder="Title" class="pure-input-1" value="<?=$data['title'] ?>">

                            <label for="file">Upload the Image </label>
                            <input required id="file" name="file" type="file" placeholder="file" class="pure-input-1" value="">

                            <input type="hidden" name="id" value="<?= $id ?>">
                            <button type="submit" class="pure-button button-success">Save</button>
                        </fieldset>
                    </form>
                </div>


            </div>
        </div>
    </div>