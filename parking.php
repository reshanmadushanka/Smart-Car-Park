<?php
include './header.php';
include "./database/config.php";

$sql = "SELECT * FROM tbl_slot "; //get user details
$result = mysqli_query($db, $sql);
foreach ($result as $slots) {
    print_r($slots['id']);
}
?>
<div class="filter-box col-lg-12 pull-left">
<div class="container">
       
        <form class="  col-lg-12 pull-left">
            <div class="col-lg-4 pull-left">
                <input class="form-control" type="date">
            </div>
            <div class="col-lg-4 pull-left">
                <input class="form-control" type="time">
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
                <div class="parking-box mt-5 mx-auto booked">
                     <a href="#"></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="parking-box mt-5 mx-auto parked">
                    <a href="#"></a>  
                 </div>
                
            </div>
            <div class="col-lg-3 col-md-6 text-center">
            <div class="parking-box mt-5 mx-auto">
                     
                     </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
            <div class="parking-box mt-5 mx-auto">
            <a href="#"></a>
                     </div>
            </div>
        </div>
    </div>
</div>
 

<?php include './footer.php';?>
<script>
$( document ).ready(function() {
    alert();
});
</script>

</body>

</html>