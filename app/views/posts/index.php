<?php require_once APPROOT . '/views/inc/header.php';?>
<?php
session_start();
include_once("db.php");

if(isset($_POST['post'])){
  $title = strip_tags($_POST['title']);
  $content = strip_tags($_POST['content']);

  $title = mysqli_real_escape_string($db, $title);
  $content = mysqli_real_escape_string($db, $content);

  $date = date("jS \of F Y h:i:s A");


  $sql = "INSERT INTO posts (title, content, date) VALUES ('$title', '$content', '$date')";

  sleep (1);
  mysqli_query($db, $sql);
  header("Location: ../pages");
}
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <form action="index.php" method="post" enctype="multipart/form-data">
    <input placeholder="Title" name="title" type="text" autofocus size="50"><br>
    <textarea placeholder="Content" name="content" rows="20" cols="50"></textarea><br>
    <input name="post" type="submit" value="Post"><hr>

  </form>
</body>
</html>
<?php require_once APPROOT . '/views/inc/footer.php';?>
