---
layout: post
title: What is MIDIBeat?
date: 2015-09-15 14:41:00 +0100
categories: old-site
---

It has a shitty name. It's not a supercool, profitable iPhone app. It's not disruptive. But it does something new.

This was a hack I did together with my friend [Caroline](https://github.com/carolinekabat) (the idea was hers).

## It is a MIDI sampler

Just like any other MIDI sampler. You associate a sound with a key, and then when you play that key on your MIDI instrument, that sound get played back. Nothing more.

Except that it runs in a browser. No programs needed (apart from Google Chrome).

You can use sound files from your computer. You can use files from the web, no download required. You can even get files from your Dropbox, if you'd like that.

You can play MIDIBeat by clicking keys. So if you want to try it out without a MIDI device, go ahead, even though it probabl won't be as much fun.

## What is the use?

Dunno. It seemed like a cool idea and we went for it. Maybe you want to try out playing with some samples, but don't want to fire up bulky software. Maybe you don't own any software that can do the job. The virtue of working in a browser is that it works on any device (once again, though, you'll need to use Chrome. But you can live with that, right?).

## What are the features?

*   Fast and responsive. Everything happens directly in the browser, so no loading times when playing.
*   Seriously. It is really fast. Like, no delays fast.
*   It has a web interface with keys that are pressed visually as you play. I think it makes playing more fun.
*   No restriction on number of keys you can play. The "keyboard" you see in the browser is no restriction. You can load samples into *any* key that your device can play.

## How well does it work?

Well …

After a good build-up, I'm sorry to disappoint. There are *some* issues.

1.  It mostly works with MIDI devices of the piano shape, and beatpads. The reason is that we only listen for a few select types of MIDI events, and different equipment uses different event codes. We have an idea for how to fix it, by letting you register your device simply by playing it, but we haven't gotten around to fixing it.
2.  No stopping a playing file by releasing a key. Sorry, there was no time to add that, and it would be a double hassle, since that would require the same kind of problem solving as the point above.
3.  You can get any file from the web or from your computer, or Dropbox. But you can only set start and end time for the web files, because it's a bit tricky, and we were in a hurry. We figured that web files were the most likely that people would want to trim.
4.  There's not much validation going on, so if you upload something else than a valid sound file, it might not work, and there won't be any clues as t why. Bad UX.

As always, e-mail me at hjort@[the address of this page] if you feel something else needs fixing, or if you just want to show some love. Hit us with a pull request on [GitHub](https://github.com/hjorthjort/MIDIBeat) if you want to fix any of the issues, or add an issue if you feel something else is missing.

## The background

MIDIBeat is, as most fun-but-not-fully-functional software, the child of a hackathon. This was my first big hackathon – no less than two whole days this time. And what a hack it was. Arranged by the [Way Out West](https://www.wayoutwest.se) festival and hosted over at Spotify's office, there were a lot of cool stuff being made by a lot of fun people.

Among my favorite things that got spat out by the more than twenty teams were the following, check them out:

*   [Spacesynth](https://itunes.apple.com/app/spacesynth-augmented-reality/id1032668057), a mobile syntheziser for the iPhone with a preety unique sound.
*   [Vingle](http://vingle.herokuapp.com/), like snapchat but you send song snippets!
*   Radiomast, which unfortunately isn't live yet. Basically it's a way of broadcasting radio, but you can play music on the air without paying licensing fees. The app uses Spotify to play the songs, so anyone with Spotify Premium can listen to a broadcast and also hear the music. I hope it comes live soon.

The rest of the hacks are [here](https://hackoutwest15.herokuapp.com/).
