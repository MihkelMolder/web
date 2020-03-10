<?php require_once APPROOT . '/views/inc/header.php';?>
<?php session_start();
include_once("db.php");?>
<head>
</head>
<body>
<h3>All posts of my blogs</h3>
<a href="posts/index.php"><input type="button" value="Loo postitus"></a><br>

<?php
    $sql = "SELECT * FROM posts ORDER BY id DESC";

    $res = mysqli_query($db, $sql) or die(mysqli_error());

    $posts ='';

    if(mysqli_num_rows($res) > 0) {
        while($row = mysqli_fetch_assoc($res)) {
            $id = $row['id'];
            $title = $row['title'];
            $content = $row['content'];
            $created_at = $row['date'];

            $output = $content;

            $posts .= "<div class='txt'><h2><a href='view_post.php?pid=$id'>$title</a></h2><h3>$created_at</h3><p>$output</p></div><hr> ";
        }
        echo $posts;
    } else {
            echo "There are no posts";
    }
?>
</body>
<?php require_once APPROOT . '/views/inc/footer.php';?>
