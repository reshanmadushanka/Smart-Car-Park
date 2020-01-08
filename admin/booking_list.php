<?php include '../admin/header.php';?>
<?php
$sql1 = $db->prepare("SELECT * FROM tbl_slot "); //get user details
$sql1->execute(); //execute query
$slot = $sql1->fetchAll(); //insert in to array

if(isset($_POST['slot'])){
    $s_slot = $_POST['slot'];
    $sql = $db->prepare("SELECT
    tbl_booking.*,
    tbl_slot.slot_name AS name,
    tbl_slot.status AS status
    FROM
    `tbl_booking`
    INNER JOIN tbl_slot ON tbl_slot.id = tbl_booking.slot_id
    where tbl_slot.slot_name = '$s_slot'
    "); //get data from database
    $sql->execute(); //execute query
    $data = $sql->fetchAll(); //insert in to array
}else{
    $sql = $db->prepare("SELECT
    tbl_booking.*,
    tbl_slot.slot_name AS name,
    tbl_slot.status AS status
    FROM
    `tbl_booking`
    INNER JOIN tbl_slot ON tbl_slot.id = tbl_booking.slot_id
    "); //get data from database
    $sql->execute(); //execute query
    $data = $sql->fetchAll(); //insert in to array
}
    
?>

<div class="content pure-u-1 pure-u-md-21-24">
    <div class="header-small">
        <div class="items">
            <h1 class="subhead">Slot Booking Details</h1>
            <!-- success msg show -->
            <?php if (isset($_SESSION['success'])) {?>
            <aside class="pure-message message-success">
                <p><?=$_SESSION['success'];?></p>
            </aside>
            <?php
    }?>

            <div class="items">
                <form action="booking_list.php" method="post" autocomplete="off"
                    class="pure-form pure-form-stacked">
                    <fieldset>
                        <label for="slotname">Select Slot No.</label>
                        <select class="form-control" name="slot" id="slot" id="">
                            <?php foreach ($slot as $value) {?>
                                <option selected value="<?=$value['slot_name']?>"><?=$value['slot_name']?></option>
                            <?php }?>
                        </select>

                    </fieldset>
                    <button class="pure-button button-small button-success" type="submit">Search</button><br><br>
                </form>
            </div>
            <table class="pure-table pure-table-bordered">
                        <thead>
                            <tr>
                                <th>#id</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Live Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($data as $users) {?>
                            <tr>
                                <td><?=$users['id'];?></td>
                                <td><?=$users['name']?></td>
                                <td><?=$users['book_date']?></td>
                                <td><?=$users['from']?></td>
                                <td><?=$users['to']?></td>
                                <td><?=$users['status']=='0'? 'Parked':'Free';?></td>

                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
        </div>
        <?php
    unset($_SESSION['success']);
    ?>       