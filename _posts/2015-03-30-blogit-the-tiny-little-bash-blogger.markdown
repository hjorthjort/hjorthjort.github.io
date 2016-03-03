---
layout: post
title: blogit&#58; the tiny little bash blogger
date: 2015-03-30 15:41:00 +0100
categories: old-site
--- 

So, here's the script I put together to export my markdown blog post to this
blog. It's a crude solution, but I'd lie if I said I wasn't proud anyway.

Here's the code
---

{%highlight bash%}
 #!/bin/bash

    #Global varibles
    server=myusername@162.248.8.165
    rootpath='~/my-site'

    #Set the name of the new html file
    page="$1.html"

    #Generate markdown and push to server
    markdown "$1" | ssh $server "cat > \
     $rootpath/blog-posts/'$page'"

    #Put the name of the new files in the index over all posts.
    ssh $server "touch $rootpath/blog-posts/.post-index.txt\
    && sed -i '1i $page' $rootpath/blog-posts/.post-index.txt"
{%endhighlight%}

And here's what it does
---

The script takes as input the name of a markdown document, for example

{%highlight bash%}
$ blogit my-post.md
{%endhighlight%}

This document is then converted to html in the second paragraph. Finally, it
gets pushed to the server, to a folder called blog-posts, and the name of the
new html is added to the index of posts.

Those global variables are configured for my special server setup. See more
under "The server side"

The PHP
---

Here's what happens with the post when the page is loaded:

{%highlight php%}
    <!DOCTYPE HTML>
    <html>

    …

      <?php
        //get array of filenames
        $postNames = file('blog-posts/.post-index.txt');

        //iterate over array
        foreach($postNames as $post) {
          echo "<div class='blogPost'>";
          //remove trailing whitespace
          $post = trim($post);
          //get the whole file as a string and put in newPost variable
          $newPost = file_get_contents('./blog-posts/'."$post");
          echo $newPost;
          echo "<hr>";
          echo "</div>";
        }
      ?>

    …

    </html>
{%endhighlight%}

The PHP script runs through all the file-names stored in the index and creates
posts out of them.

The server side
---

There's some trickery and static code living on the server side, unfortunately.
First, the /var/www/html that Apache uses to find a home folder has been
rerouted.

{%highlight bash%}
$ ls /var/www/html lrwxrwxrwx 1 root 20 Mar 30 06:18 /var/www/html \
-> /home/hjort/my-site//
{%endhighlight%}

As you can see, it now points to a certain folder in my home folder, with the
following structure.

{%highlight bash%}
├── blog-posts
│   ├── my-post.md.html
│   ├── .post-index.txt
{%endhighlight%}

The bash script ha a global variable pointing to the same folder as the
variable $rootpath in the bash script.

Missing features
---

Suffice to say, a lot of important functionality is missing in blogit. Here's
are some things I want to fix in the future:

* Setting the global variables, so that it's easy to change what destination
  and even server without manually changing the code.
* Removing published posts.
* Rearranging posts.
* Quickly undoing latest push.
* Editing markdown directly on the server, and then automatically update the
  posts accordingly.

Help!
---

If you looked at this and went "Yuck! This code is garbage!" – please let me
know! Give me a shout on GitHub
