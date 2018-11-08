---
layout: post
title: Hackathon!
date: 2015-05-14 17:31:00 +0100
categories: old-posts

thumbnail:
    url: https://i.imgur.com/t0XHtgJ.gif
---

TL;DR
---

Here's a fun approach to a todo manager. It's called [the STACK][stack].

Background
---

I was at my first hackathon today. Me and my friends [Saser][saser] and [Hank][hank] were at our
first hackathon today. It was a mini mini hack at the Spotify office in
Gothenburg. It was focused around [Meteor][meteor], a JavaScript framework focused on
getting things up and running as quick as humanly possible.

The first issue we encountered: none of us really know JavaScript. To be fair,
Saser and Hank knew their way around, or knew what to google for. I don't know
squat. But after two hours of a pretty fun [workshop][meteor-workshop] we at least had some
template code to work with.

The Idea
---

Earlier today while I was coding I had an idea for a simple app. I was running
around my code doing all kinds of stuff. I started with trying to implement
something fairly high level, until I realized I needed to implement a class
that was a bit more nitty-gritty. Then I started creating some utils I needed.
I left a trail of non-compiling, unfinished code behind me.

This is a pretty common pattern for me. And I recently discussing this with a friend in terms of a stack. She's not a programmer, and was intrigued by the idea of having a mental stack that you push to and pull from during the day. The problem, we concluded, is that humans suck at it.

![Stack behavior: Hank](http://i.imgur.com/t0XHtgJ.gif)

So I thought: there should be an app for that. And the next natural thought was
that it should be easy to make that app.

So when we sat there at the hackathon, I dropped the idea, and we went with it.

The web app
---

[Here's the app!][stack]

[ And here's the GitHub repo! ][stack-repo] Get forking!

I'm already using it. I love simple solutions like this, and I hope you will
to.

The problem
---

Login isn't supported. Everyone shares the stack. WHich shoul be fun to follow.
But of course, everyone should be able to have their own stack.

A small victory
---

The hackathon was about three hours of coding, and we managed to finish third,
out of about eleven teams. As first year CS students among people with bigger,
cooler ideas, we felt pretty damn proud.

Also, check out the winning hack: [collaborative piano!][piano]

[meteor-workshop]: http://slides.com/timbrandin/meteor-slack#/ "Meteor Workshop"
[meteor]: https://www.meteor.com/ "Meteor"
[piano]: http://piano2.meteor.com/ "Collaborative Piano"
[saser]: https://github.com/Saser "Saser GitHub"
[stack-repo]: https://github.com/hjorthjort/meteor-stack "The Stack on GitHub"
[stack]: stack.{{ site.url }} "The Stack"
