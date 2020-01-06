<?php
include './header.php';
include "./database/config.php";

$sql = $db->prepare("SELECT * FROM tbl_slot "); //get user details
$sql2 = $db->prepare("SELECT * FROM tbl_location "); //get locations
$sql->execute(); //execute query
$sql2->execute(); //execute query
$data = $sql->fetchAll(); //insert in to array
$locations = $sql2->fetchAll(); //insert in to array

?>
<br>
<br>
<br>
<div class="filter-box col-lg-12 pull-left text-white">
    <div class="container">
        <div class="row">
            <form method="post" action="parking-search.php" class="col-lg-8">
                <div class="col-lg-8">
                    <div>
                        <label for="">Parking Location</label>
                        <select class="form-control" name="location" id="location" id="">
                            <?php foreach ($locations as $location) {?>
                                <option selected value="<?=$location['id']?>"><?=$location['name']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div>
                        <label for="date">Select Booking Date</label>
                        <input autocomplete="off" name="date" id="datepick" class="form-control" type="text">
                    </div>
                    <div>
                        <label for="date"> Select From Time</label>
                        <input autocomplete="off" name="time_from" type='text' id="timpick" class="form-control" />
                    </div>
                    <div>
                        <label for="date"> Select To Time</label>
                        <input autocomplete="off" name="time_to" type='text' id="time_to" class="form-control" />
                    </div>
                </div>
                <div class="col-lg-8 form-group">
                    <button type="submit">Search</button>
                </div>
        </div>
        </form>
    </div>
</div>
</div>

<div id="parking" class="col-lg-12 pull-left">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center ">
                <h2 class="text-white">Parking Slot Status</h2>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 text-center">
                <div id="park1" class="parking-box mt-5 mx-auto ">
                    <!-- <a href="#"></a> -->
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div id="park2" class="parking-box mt-5 mx-auto ">
                    <!-- <a href="#"></a> -->
                </div>

            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div id="park3" class="parking-box mt-5 mx-auto">

                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div id="park4" class="parking-box mt-5 mx-auto">
                    <!-- <a href="#"></a> -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './footer.php';?>
<script>
$(document).ready(function() {
    var dateToday = new Date();
    jQuery('#datepick').datetimepicker({
        timepicker: false,
        minDate: dateToday,
        format: 'Y/m/d',
    });
    jQuery('#timpick,#time_to').datetimepicker({
        datepicker: false,
        format: 'H:i'
    });
    //get data from database
    function update() {
        $.ajax({
            url: 'parking-data.php', //php
            data: "", //the data "caller=name1&&callee=name2"
            dataType: 'json', //data format
            success: function(data) {
                // slot 1----------------------------
                if (data[0]['status'] == '0') {
                    $('#park1').addClass("parked");
                } else {
                    $('#park1').removeClass("parked");
                }
                // slot 2 -----------------------------booked
                if (data[1]['status'] == '0') {
                    $('#park2').addClass("parked");
                } else {
                    $('#park2').removeClass("parked");
                }
                // slot 3 -----------------------------booked
                if (data[2]['status'] == '0') {
                    $('#park3').addClass("parked");
                } else {
                    $('#park3').removeClass("parked");
                }
                // slot 4 -----------------------------booked
                if (data[3]['status'] == '0') {
                    $('#park4').addClass("parked");
                } else {
                    $('#park4').removeClass("parked");
                }
            }
        });
    }

    setInterval(update, 500); //every 10 secs

});
</script>
</body>

</html>