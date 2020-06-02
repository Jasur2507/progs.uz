<? include 'include/header.php'; ?>
<? include 'include/menuTop.php'; ?>
<? include 'include/menuLeft.php'; ?>
<div class="col-md-7" style="min-width:400px;">
<?php
$servername = "localhost";
$username = "u1021740_progs";
$password = "5R4p5X2r";
$dbname = "u1021740_progs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->Query("set names cp1251;");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `db_progs` WHERE `status`=1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
?>
<a href="<?=$row["pageUrl"]."?id=".$row['id'];?>" style="text-decoration:none;">
      <div class="d-flex flex-column bg-light">
        <div class="p-2">
          <h3 class="text-info"><?=$row["name"];?></h3>
        </div>
        <div class="d-flex flex-row p-2">
          <div class="p-2">
            <div style="height:100px;width:100px;border:1px solid black;">
              <img src="<?=$row['image'];?>" alt="avatar" style="width:100px;height:100px;">
            </div>
          </div>
          <div class="p-4">
            <?=$row["about"];?>
          </div>
        </div>
      </div>
</a>

    <?
  }
} else {
  echo "0 results";
}
$conn->close();
?>

    </div>
<? include 'include/menuRight.php'; ?>
<? include 'include/footer.php'; ?>
