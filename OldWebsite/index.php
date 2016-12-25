<!DOCTYPE HTML>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="./style.css">
  <link rel="shortcut icon" href="favicon.ico">
  <link href='http://fonts.googleapis.com/css?family=Alice' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Lato:400,700,300italic' rel='stylesheet' type='text/css'>
  <title>
    hjorthjort
  </title>
</head>

<body>
  <div class="logo" id="logo"><img src="./stag studios logo 4.svg"></div>
   <script>
	function fadeIn(el) {
		el.style.opacity = 0.01;
		var tick = function() {
    			el.style.opacity = +el.style.opacity + 0.01;

    			if (+el.style.opacity < 1) {
      				(window.requestAnimationFrame && requestAnimationFrame(tick)) || setTimeout(tick, 16)
    			}
  		};

  		tick();
	}

	fadeIn(document.getElementById("logo"));</script>
  <div class ="placeholder"><p>
    Welcome to Stag Land.
  </p></div>
     <div class="recent">
     <h1>Recent Posts</h1>
  <?php 
     $postNames = file('blog-posts/.post-index.txt');
    //iterate over array
    echo " | ";
    for($i = 0; $i < 5; $i++) {
      $post = trim($postNames[$i]);
      $newPost = explode("\n", file_get_contents('./blog-posts/'."$post"));
     $newPost = trim($newPost[0]); 
     $newPost = preg_replace("/<[^>]*>/", "", $newPost);
      echo "<a href=\"#" . $post . "\">" . $newPost . "</a> | ";
    }
  ?>
   </div>
  <?php
    //get array of filenames
    $postNames = file('blog-posts/.post-index.txt');
    //iterate over array
    foreach($postNames as $post) {
      $post = trim($post);
      echo "<div class='blogPost'>";
      echo "<a name=\"".$post."\">";
      //remove trailing whitespace
      //get the whole file as a string and put in newPost variable
      $newPost = file_get_contents('./blog-posts/'."$post");
      echo $newPost;
      $date = date('D, d M Y H:i', filemtime('./blog-posts/'.$post));
      echo "<div class='date'>Last modified: ".$date."</div>";
      echo "<hr>";
      echo "</div>";
   }
?>
       
 
</body>
</html>
