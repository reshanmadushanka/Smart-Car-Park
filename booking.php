<?php 
include "./database/config.php";



include 'header.php';
?>

<div class="filter-box col-lg-12 pull-left">
<div class="container">
        <form method="post" action="parking-search.php"  class="col-lg-6 pull-left">
            <div class="col-lg-12 pull-left">
            <label class="text-white" for="date">Select Date</label>
                <input name="date" class="form-control" type="date">
            </div>
            <div class="col-lg-12 pull-left">
            <label class="text-white" for="date">Select Time</label>
                <input name="time" class="form-control" type="time">
            </div>
            <div class="col-lg-12 pull-left">
                <button type="submit">Book</button>
            </div>
        </form>

</div>
</div>











<?php include 'footer.php';?>