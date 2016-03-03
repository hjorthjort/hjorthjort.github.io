---
layout: post
title: Tiny update
date: 2015-03-31 19:57:00 +0100
categories: old-site
--- 

I changed the if-statements at the end of the script below to

{%highlight bash%}

    if [ $1 == "day" ]; then
            day
    elif [ $1 == "hour" ]; then

            if [ $2 == "today" ]; then
                    hour `date | awk {'print $3 " " $2'}`
            else    hour $2 $3
            fi
    fi

{%endhighlight%}

And now I can do this

{%highlight bash%}

$ sudo server-log hour today
      3 00:00
      4 01:00
      4 03:00
      9 04:00
      2 05:00
      1 06:00

{%endhighlight%}

So now I'm happy, after a good days work (other work than this, that is).

Thinking about getting to work on the PHP of the site. Get som dates and stuff in here, so it looks like a real blog. Oh well.

**G'night.**
