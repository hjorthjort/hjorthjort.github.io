---
layout: post
title: The server-log script
date: 2015-03-31 13:00:00 +0100
categories: old-site
--- 

I figured I would want to see the traffic to my site, so I gave it a go with
another script, after realizing I didn't want to memorize long commands and go
to the apache log directory (which I for some reason can't cd in to, even with
sudo) every time I wanted to check my logs.

So I wrote another little script.

*Note: This only works for Ubuntu and, I think, Debian. Other systems have
their logfiles in different locations.*

{%highlight bash%}
  !/bin/bash

    #Get a full printout of the number of accesses made every day.
    function day {
            sudo awk '{print $4}' /var/log/apache2/access.log \
            | cut -d: -f1 | uniq -c
    }

    #Get requests per hour on day given in format "31 Mar"
    function hour {
            sudo grep "$1/$2" /var/log/apache2/access.log \
            | cut -d[ -f2 | cut -d] -f1 | awk -F: '{print $2":00"}' \
            | sort -n | uniq -c
    }

    if [ $1 == "day" ]; then
            day
    fi

    if [ $1 == "hour" ]; then
            hour $2 $3
    fi
{%endhighlight%}

Examples
---

Get all days

{%highlight bash%}

  $ sudo server-log day
  346 [29/Mar/2015
 1019 [30/Mar/2015
   42 [31/Mar/2015

{%endhighlight%}

Get per hour today

{%highlight bash%}

$ sudo server-log hour 30 Mar
     34 00:00
     94 01:00
     94 02:00
     65 03:00
     78 04:00
     58 05:00
     54 06:00
     28 07:00
     68 08:00
     69 09:00
     15 10:00
     29 11:00
     25 12:00
     25 13:00
     37 14:00
    161 15:00
     66 16:00
      4 17:00
      3 18:00
     11 19:00
      1 23:00

{%endhighlight%}

That's about it. I'm sure there's a better way. Let me know if you have one.
You can email me at rikard.hjort@*that-google-mail-address*.

**Super thanks to Jacob Nicholson at Inmotion Hosting who wrote <u>the blog
post</u> where I got the commands I used. I'll be sure to go and understand
them better when I have time.**
