<?php
include './header.php';
include "./database/config.php";

$sql = $db->prepare("SELECT * FROM tbl_slot "); //get user details
$sql->execute(); //execute query
$data = $sql->fetchAll(); //insert in to array

foreach ($data as $slots) {
}
?>
<div class="filter-box col-lg-12 pull-left">
<div class="container">

        <form method="post" action="parking-search.php"  class="col-lg-12 pull-left">
            <div class="col-lg-4 pull-left">
            <label for="date">Date</label>
                <input name="date" class="form-control" type="date">
            </div>
            <div class="col-lg-4 pull-left">
            <label for="date">Date</label>
                    <input name="time" type='time' class="form-control" />
                </div>
            </div>
            <div class="col-lg-12 pull-left">
                <button type="submit">Search</button>
            </div>
        </form>

</div>
</div>

<div id="parking" class="col-lg-12 pull-left">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center ">
                <h2 class="text-white">Parking Slots</h2>

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
$( document ).ready(function() {
    function update() {
    $.ajax({
        url: 'parking-data.php', //php
        data: "", //the data "caller=name1&&callee=name2"
        dataType: 'json', //data format
        success: function (data) {
// slot 1----------------------------
        if(data[0]['status']=='0'){
            $('#park1').addClass( "parked" );
        }else{
            $('#park1').removeClass( "parked" );
        }
// slot 2 -----------------------------booked
        if(data[1]['status']=='0'){
            $('#park2').addClass( "parked" );
        }else{
            $('#park2').removeClass( "parked" );
        }
// slot 3 -----------------------------booked
        if(data[2]['status']=='0'){
            $('#park3').addClass( "parked" );
        }else{
            $('#park3').removeClass( "parked" );
        }
// slot 4 -----------------------------booked
        if(data[3]['status']=='0'){
            $('#park4').addClass( "parked" );
        }else{
            $('#park4').removeClass( "parked" );
        }
    }
    });
}

setInterval(update, 1000); //every 10 secs

});

</script>
</body>

</html>