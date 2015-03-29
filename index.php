<!DOCTYPE HTML>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="./style.css">
  <title>
    hjort – Welcome to Stag Land!
  </title>
</head>

<body>
  <div class="logo"><img src="./stag studios logo 4.svg"></div>

  <div class ="placeholder"><p>
    Welcome to Stag Land.
  </p></div>

  <?php
    $postNames = file('blog-posts/post-index.txt');
    foreach($postNames as $post) {
      echo "<div class='blogPost'>";
      $post = substr($post, 0, strlen($post)-1);
      $newPost = file_get_contents('./blog-posts/'.$post);
      echo $newPost;
      echo "<hr>";
      echo "</div>";
    }
  ?>
</body>
</html>
