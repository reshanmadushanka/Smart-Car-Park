<?php
include "./database/config.php";
session_start();
// user details
$user_id = $_SESSION['user_id'];
$sql = $db->prepare("SELECT * FROM tbl_user where id=$user_id"); //get user details
$sql->execute();
$user = $sql->fetch(PDO::FETCH_ASSOC);
// booking details
$sql2 = $db->prepare("SELECT
tbl_booking.*,
tbl_slot.slot_name AS name,
tbl_slot.status AS status
FROM
`tbl_booking`
INNER JOIN tbl_slot ON tbl_slot.id = tbl_booking.slot_id
where tbl_booking.user_id = $user_id
");
$sql2->execute();
$bookings = $sql2->fetchAll();
include './header.php';
?>
<div class="container">
<div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="section-heading text-white"><?=$user['f_name'] . ' ' . $user['l_name'];?></h2>
                <hr class="light my-4">
                <p class="text-faded mb-4">Mobile : <?=$user['mobile']?></p>
                <p class="text-faded mb-4">NIC : <?=$user['NIC']?></p>
                <p class="text-faded mb-4">City : <?=$user['city']?></p>
                <p class="text-faded mb-4">Email : <?=$user['email']?></p>
                <h2 class="section-heading text-white">Your Booking Details</h2>
                <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#id</th>
      <th scope="col">Name</th>
      <th scope="col">Date</th>
      <th scope="col">From</th>
      <th scope="col">To</th>
      <th scope="col">Live Status</th>
    </tr>
  </thead>
  <tbody>
                        <?php foreach ($bookings as $users) {?>
                        <tr>
                            <td><?=$users['id'];?></td>
                            <td><?=$users['name']?></td>
                            <td><?=$users['book_date']?></td>
                            <td><?=$users['from']?></td>
                            <td><?=$users['to']?></td>
                            <td><?=$users['status'] == '0' ? 'Parked' : 'Free';?></td>

                        </tr>
<?php }?>
                        </tbody>
</table>
                <a class="btn btn-light btn-xl js-scroll-trigger" href="parking.php">Get Started!</a>
            </div>

        </div>
</div>

<?php include './footer.php';?>