<? include 'include/header.php'; ?>
<? include 'include/menuTop.php'; ?>
<? include 'include/menuLeft.php'; ?>
<div class="col-sm-6">
  <div class="d-flex flex-column bg-light">
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
$editId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($editId)
{
    $sql = "SELECT * FROM  db_progs WHERE id = '".$editId."' LIMIT 1";
    $resul = $conn->query($sql);

  if ($resul->num_rows > 0)
  {
    $result = $resul->fetch_assoc();

    //Подставляем данные из БД для формы редактирования
    $status = $result['status'];
    $name=$result["name"];
    $category=$result["category"];
    $size=$result["size"];
    $author=$result["author"];
    $tags=$result["tags"];
    $systems=$result["systems"];
    $language=$result["language"];
    $lanlength = $result["language"];
    $about=$result["about"];
    $description=$result["description"];
    $url=$result["url"];
    $pageUrl=$result["pageUrl"];
    $downloadUrl=$result["downloadUrl"];
    $avatarUrl=$result["avatarUrl"];
    $version=$result["version"];

  }
  else
  {
    exit();
  }
}

if (isset($_POST['submit'])) {
$name=$_POST["name"];
$category=$_POST["category"];
$size=$_POST["size"];
$author=$_POST["author"];
$tags=$_POST["tags"];
$systems=$_POST["systems"];
$arrlength = count($systems);
$system="";
for($x = 0; $x < $arrlength; $x++) {
    $system .=$systems[$x].", ";
}
$language=$_POST["language"];
$lanlength = count($language);
$lang="";
for($x = 0; $x < $lanlength; $x++) {
    $lang .=$language[$x].", ";
}
$about=$_POST["about"];
$description=$_POST["description"];
$url=$_POST["url"];
$pageUrl=$_POST["pageUrl"];
$downloadUrl=$_POST["downloadUrl"];
$avatarUrl=$_POST["avatarUrl"];
$version=$_POST["version"];


if ($editId)
{
  $sql = "UPDATE db_progs SET `name` = '".$name."', `size` = '".$size."', `author` = '".$author."', `tags` = '".$tags."', `about` = '".$about."', `description` = '".$description."', `downloadUrl` = '".$downloadUrl."', `pageUrl` = '".$pageUrl."', `avatarUrl` = '".$avatarUrl."', `version` = '".$version."' WHERE id = '".$editId."'";

}else {
$sql = "INSERT INTO db_progs (name, category,size,author,tags,systems,about,description,downloadUrl,pageUrl,avatarUrl,language,version)
VALUES ('$name','$category','$size','$author','$tags','$system','$about','$description','$downloadUrl','$pageUrl','$avatarUrl','$lang','$version')";

}
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>

<script>
  tinymce.init({
    selector: '#description'
  });
</script>

        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" value="<?=$name;?>" placeholder="Enter name" name="name" required>
          </div>
          <div class="row">
            <div class="col">
              <label for="version">Version:</label>
              <input type="text" class="form-control" id="version" value="<?=$version;?>" placeholder="Enter name" name="version" required>
            </div>
            <div class="col">
              <label for="category">Category:</label>
              <select name="category" id="category" class="custom-select mb-3">
                <option selected>Category:</option>
                <option value="system">Система</option>
                <option value="safety">Безопасность</option>
                <option value="office">Офис</option>
                <option value="media">Медиа</option>
                <option value="internet">Интернет</option>
                <option value="blogs">Статьи</option>
                <option value="activation">Активация Windows</option>
                <option value="android">Андроид</option>
              </select>
            </div>
            <div class="col">
              <label for="size">Size:</label>
              <input type="text" class="form-control" value="<?=$size;?>" id="size" placeholder="Enter size" name="size" required>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="tags">Tags:</label>
              <textarea class="form-control" rows="5" name="tags" id="tags"></textarea>
            </div>
            <div class="col">
              <label for="systems">Systems:</label>
              <select name="systems[]" id="systems" size="4" class="custom-select mb-3" multiple>
                <option selected>Systems:</option>
                <option value="Windows">Windows</option>
                <option value="10">10</option>
                <option value="8">8</option>
                <option value="7">7</option>
                <option value="XP">XP</option>
                <option value="Vista">Vista</option>
              </select>
            </div>
            <div class="col">
              <label for="language">Language:</label>
              <select name="language[]" id="language" size="4" class="custom-select mb-3" multiple>
                <option selected>Language:</option>
                <option value="English">English</option>
                <option value="Russian">Russian</option>
                <option value="Espanol">Espanol</option>
                <option value="Arabic">Arabic</option>
                <option value="Chinese">Chinese</option>
                <option value="Japanese">Japanese</option>
                <option value="Qazaqcha">Qazaqcha</option>
                <option value="Uzbek">Uzbek</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" class="form-control" value="<?=$author;?>" id="author" placeholder="Enter author" name="author" required>
          </div>
          <div class="form-group">
            <label for="about">About:</label>
            <input type="text" class="form-control" value="<?=$about;?>" id="about" placeholder="Enter about" name="about" required>
          </div>
          <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required><?=$description;?></textarea>
          </div>
          <div class="form-group">
            <label for="pageUrl">Page Url:</label>
            <input type="text" class="form-control" value="<?=$pageUrl;?>" id="pageUrl" placeholder="Enter url" name="pageUrl" required>
          </div>
          <div class="form-group">
            <label for="downloadUrl">Download Url:</label>
            <input type="text" class="form-control" value="<?=$downloadUrl;?>" id="downloadUrl" placeholder="Enter url" name="downloadUrl" required>
          </div>
          <div class="form-group">
            <label for="downloadUrl">Avatar Url:</label>
            <input type="text" class="form-control" value="<?=$avatarUrl;?>" id="avatarUrl" placeholder="Enter url" name="avatarUrl" required>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>

    <? include 'include/menuRight.php'; ?>
    <? include 'include/footer.php'; ?>
