---
layout: post
title: The problem with 8^8 (or "Just Checking Your Math On That")
date: 2015-05-18 06:12:00 +0100
categories: old-posts

thumbnail:
    url: "/assets/eight-eight-footer.png"

---

*Disclaimer: I feel pretty confident about the numbers but I am by no means a
mathematician and I might have gotten something wrong. If I did, please let me
know at my gmail address rikard.hjort*

This new thing is going viral! It's called [8^8][88] and it's a pretty rad idea.
Basically, they ask you eight multiple choice questions with eight possible
answers to each, which arguably puts you on an 8-dimensional scale of
personality. If anyone else gives the exact same answer to every question, you
get an email and you are considered "matched with that person".

The pitch is "Find you soulmate!" which might be a bit over the top, but I get
that you want to create a hype. I'm mostly curious to find out what the kind of
person that answered the same as me on all those questions is like.

Given the fact that I generally tend to dislike people who are very much like
me (very talkative, a bit naïve, among other things – an ENTP on the
Myers-Briggs-scale, if that interests you) I don't think I'd hit it off with
that person. But given that there are 8^8, or 16,777,216, different ways to
answer that questionnaire, I'm very curious to find out who my match might be.
It should be a learning experience.

The Math
---

<iframe width="420" height="315" src="https://www.youtube.com/embed/XKVZEDiPLXk" frameborder="0" allowfullscreen></iframe>

When I shared the link on Facebook my friend pointed out an interesting thing. At the bottom of the page, they have a footer. At the time of this writing, here's what it looks like:

![Original footer]({{ site.url }}/assets/eight-eight-footer.png)

**He said that didn't seem very promising. I thought it seemed very unlikely.**

I thought about it and realized why I thought this was off: It's very much like
"[The Birthday Problem][birthday-problem]", sometimes referred to as "The Birthday Paradox" since
the result is counter intuitive. It basically says: "If there are more than 23
people in a room, there's a higher than 50 % chance that two or more of them
have the same birthday."

So I figured I'd run the numbers and, like I thought, something was off. Unlike
Zuckerberg in that clip, I did not get the same thing, which is *not* that
strange. This isn't basic arithemtic and the results aren't obvious. I had to
use a good deal of googling and Wolfram Alpha.

Anyway, here is the full email I sent to the kind people at uuave who created
the site.

(I don't go in to the details of there being some configurations that are more
likely than others. For example, the combination of "Learning how to manage and
lead teams" and "Talent and charisma" on two of the questions might be more
likely than the former combined with going to parties and staying "As far as
possible, stick to people you know and get along with". I just assume every
combination is equally likely, which should be pretty close to the truth.)

> Hey guys! Cool site. Tried out the test today, and looking forward to see if I get a match.
> 
> Just a tiny thing. My friend pointed out your meter in the footer. Right now it says:
> 
> 56,156 TESTS 0 MATCHES
> 
> So, that’s weird, right? Is your matches counter not updating?
> 
> Basically what you have here is the Birthday Problem: if n people gather in a room, what are the chances that at least two of them share a birthday, if birthdays are evenly distributed throughout the year?
> 
> Only in your case, it’s not 365 ”days”, it’s 16,777,216.
> 
> I might be missing something here, but that should give us a probability of at least two people matching thus far at a whooping 99.99999999999999999999999999999999999999715018232799 percent.
> 
> So, I figure something might be off. Just wanted to let you guys know.
> 
> Here’s the math: [http://mathworld.wolfram.com/BirthdayProblem.html][wolfram-birthday]. The equation to use is: 
>
> ![eqatuion1](http://mathworld.wolfram.com/images/equations/BirthdayProblem/Inline15.gif) 
 = 
 ![equation2](http://mathworld.wolfram.com/images/equations/BirthdayProblem/Inline20.gif)
>
> And here’s what Wolfram spits out: 
> [http://www.wolframalpha.com/input/?i=1-%288%5E8%29%21%2F%28%288%5E8-56156%29%21*%288%5E8%29%5E56156%29][wolfram-calculation]
> 
> Once again, great work, keep it up!
> 
> //Rikard

So, I figured that was that. No biggie. Maybe it's just an updating issue, who
knows. That felt like the good deed for the day, and I really didn't feel like
*too* much of a math douche. But when browsing for their email, I found this
other strange thing. On their (About) page, there is this statement:

The even more Math
---

![About page]({{ site.url }}/assets/eight-eight-about.png)

If I was in doubt of my own mathy assessments on the previous issue, on this
one I felt pretty confident. This is way, way of. And I think that there was
something about them invoking the words "the laws of probability" and following
it up with a real swing-and-miss that made me decide to put aside the fact that
I have an early meeting and a full day of testing ahead of me tomorrow and dig
deeper in my limited knowledge of known math problems.

The number of combinations that someone has answered won't be eaten up at a
steady pace. Rather, the more people answer, the harder it will be to get a
unique combination (or the easier it will be to find a match, if you will). For
example: when half of the combinations are "taken", every other person who
answers should be getting a match.

Fortunately, a vague math bell rang on this one as well. I knew there was a
problem about baseball cards or something, so I googled around, and there it
was: [The Coupon Collector's Problem.][coupon-collector]

This one was a lot trickier to find a good solution for, largely because I
couldn't figure out what would constitute a "solution". I decided a good
measure should be what I said above: at what point will half of the
combinations be "taken"?

So I sent them one more email. I elaborated a little on my first one and this
time I tried to be a little constructive as well.


> Also, this statement on the About page is kind of strange:
> 
> > For 8^8 to start matching soulmates with each other, statistically, at
> > least 16,777,216 users need to have taken the 8^8 test. Once we hit that
> > number, according to the laws of probability, every new 8^8 user should
> > result in a match.
> 
> You actually reach a 50 percent chance of at least one match being made after
> about 5 000 people have taken the test. According to the laws of probability
> – more specifically, the Coupon collector’s problem
> ([http://en.wikipedia.org/wiki/Coupon_collector%27s_problem][coupon-collector])
> – it will take, on average, 288,781,992 before every possible combination of
> answers has been given. Here’s the calculation in Wolfram:
> [http://www.wolframalpha.com/input/?i=8%5E8*HarmonicNumber%288%5E8%29](wolfram-coupon-calculation).
> 
> A more proper way to phrase your statement would be something along the
> lines: ”8^8 will start matching soulmates very soon. After 11,629,079 people
> have taken the test, every second person who takes the test will get a hit.”
> (Source on that last part:
> [http://www.wolframalpha.com/input/?i=8%5E8*%28HarmonicNumber%288%5E8%29+-+HarmonicNumber%288%5E8%2F2%29%29)][wolfram-improved-calculation].

I'll keep you posted on their replies, if I get any. They seem to be getting a
lot of traction and attention, so the emails about obscure math problems
shouldn't really make the top of the answer-ASAP list.

Math aside, you should check out the site and do the test. It's a really cool
idea, and I'm dying to hear peoples stories about their matches.

Go to [8x8x8x8x8x8x8x8.com][88]!

[88]: https://8x8x8x8x8x8x8x8.com/ "8^8"
[birthday-problem]: http://en.wikipedia.org/wiki/Birthday_problem "The Birthday Problem"
[coupon-collector]: http://en.wikipedia.org/wiki/Coupon_collector%27s_problem "The Coupon Collectors Problem"
[wolfram-birthday]: href="http://mathworld.wolfram.com/BirthdayProblem.html "Wolfram Alpha on the Brithday Problem"
[wolfram-calculation]:  http://www.wolframalpha.com/input/?i=1-%288%5E8%29%21%2F%28%288%5E8-56156%29%21*%288%5E8%29%5E56156%29 "Wolfram Alpha Calculation"
[wolfram-coupon-calculation]: http://www.wolframalpha.com/input/?i=8%5E8*HarmonicNumber%288%5E8%29 "Coupon Collector Calculation"
[wolfram-improved-calculation]: http://www.wolframalpha.com/input/?i=8%5E8*%28HarmonicNumber%288%5E8%29+-+HarmonicNumber%288%5E8%2F2%29%29 "Improved calculation"
