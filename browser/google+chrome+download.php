<? include '../include/header.php'; ?>
<? include '../include/menuTop.php'; ?>
<? include '../include/menuLeft.php'; ?>
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
$id=$_GET['id'];
$sql = "SELECT * FROM `db_progs` WHERE `id`=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
?>
      <div class="d-flex flex-column bg-light">
        <div class="p-2">
          <h3 class="text-info"><?=$row["name"];?></h3>
        </div>
        <div class="p-2 text-center">
            <img src="<?=$row['avatarUrl'];?>" alt="avatar" class="img-fluid" style="max-width:70%;height:auto;">
        </div>
        <div class="d-flex flex-row p-2">
          <div class="p-4">
            <?=$row["description"];?>
          </div>
        </div>
        <? include '../include/download.php'; ?>
        <? include '../include/comments.php'; ?>
      </div>
<a href="/add.php?id=<?=$row['id']?>">Edit</a>
    <?
  }
} else {
  echo "0 results";
}
$conn->close();
?>

    </div>
<? include '../include/menuRight.php'; ?>
<? include '../include/footer.php'; ?>
