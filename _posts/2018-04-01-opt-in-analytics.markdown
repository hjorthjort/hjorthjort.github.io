---
layout: post
title: "Opt-in Analytics"
date: "2018-04-01 23:24:56 +0900"
---

TL;DR: If you don't want Google Analytics to report anonymous user statistics for me for this site, and you want to browse it anonymously, scroll to the bottom and click the "Google Analytics" logo.

Quick update: I put a little Google Analytics logo in the footer of this site. It advertises the fact that I do use some analytics (almost all the JavaScript I use on this site), and it also lets you turn it off, permanently.

I believe tracking should be transparent and that you as a reader should be in charge of when and how you allow it to happen. But pragmatically, I understand not many people will opt in to being analyzed, especially since many people navigate here only once, and many other will not even see or care about the option. I also think putting up a pop-up to ask you whether you want to be tracked is a bit obnoxious. I feel this new feature strikes a good balance.

The implementation is simple. If you turn off tracking, a cookie is stored indefinitely in your browser, registering that you want privacy. The JavaScript for running anlaytics is wrapped in a conditional that checks wheter you have opted for privacy. If that is the case, the Google Analytics JavaScript code is never run at all.

The UX is rough at the moment, and I do still load some Google fonts and other resources. I'll probably make sure it all gets turned off at some point.
