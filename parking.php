<?php
include './header.php';
include "./database/config.php";

$sql = "SELECT * FROM tbl_slot "; //get user details
$result = mysqli_query($db, $sql);
foreach ($result as $slots) {
    print_r($slots['id']);
}
?>
<section id="parking">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Parking Slots</h2>
                
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="parking-box mt-5 mx-auto">
                     
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="parking-box mt-5 mx-auto">
                     
                 </div>
                
            </div>
            <div class="col-lg-3 col-md-6 text-center">
            <div class="parking-box mt-5 mx-auto">
                     
                     </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
            <div class="parking-box mt-5 mx-auto">
                     
                     </div>
            </div>
        </div>
    </div>
</section>
<section>
<div>
</div>
</section>

<?php include './footer.php';?>
<script>
$( document ).ready(function() {
    alert();
});
</script>

</body>

</html>