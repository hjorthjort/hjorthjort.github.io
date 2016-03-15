---
layout: post
title: "How to study"
date: "2016-03-10 00:21:41 +0100"
---

SCRATCHPAD
----------

Alt title: How to learn a subject

### My motivation to write this

I reflect a lot on these subjects. I want to put them down in print. It is something I want to have an open dialogue about. And something I want to share. And have critiqued.

I am working from the assumption that the main point of studying is becoming more prepared for having the most suitable career for you. I'm focusing on *studying* here – there are other important parts of a students life. How to weigh them? I don't know. But when it comes to the studying part, whatever priority you give it, I have a few thoughts I'd like to share.

### Most important: what is the end goal? Or: Why Do We Study?

You likely want to focus on the stuff that a) you have a slim chance of learning when you start working and b) getting to a point where you can act confidently on your knowledge (a.k.a. you don't need to check the back of the book to feel sure).

a)
--

Because you will spend a lifetime learning in the field. This knowledge can be vary shallow – most of us know a "web developer with 5 years experience" that basically does the same stuff over and over, writes a huge amount of inpenetrable code and knows a lot about CSS but can't really tell you how it actually works. Because yes, it *is* possible to spend a lot of time and effort on something and only improving slightly.

What you want is what Tim Urban describes as "tree-trunk knowledge" – the kind of knowledge that lets you reason from the ground up about how something works, which means you can devise your own, novel solutions to problems.

This is what I like about math. It's almost always tree trunk. It's how the subject is designed. You should be able to prove most anything from a fairly low level and up, and most people who like to study math can do that.

It's also why I think you should go and learn anything "low level" in you line of interest. If it's business – go do more calculus or psychology. If it's psychology, go read neurology. If it's neurology, go read about AI. 

What we want to get at is the stuff in the realm where you often find yourself being glad that you know it because it helps you understand what is going on, but yet the stuff that is far enough away from your field that you would feel bad asking an employer for time off to study up on it. The stuff that is not so obviously useful that you will learn it anyway, but that still gives you a deeper understanding of your field.

b)
--

Here is where I think many students trip up without realizing it. Passing a lab means nothing. Being able to do an exam question that is similar to exam questions that you already practiced on is pretty useful. It might be good practice, or training wheels, but for the rest of your life, it won't matter. What will matter is whether that knowledge you were supposed to absorb (that faculty and professors with some experience thought you really ought to have) is *readily available* for you when you need it. That means you should be able to apply that knowledge on relevant situations, and do so with confidence. For example, being able to do complexity analysis in programming by analyzing a few for-loops is pretty much an exam-type question. But when, in the wild, you encounter a function that does some calling elsewhere and has a few strange conditionals, can you even handwave about its complexity? Are you studying to be able to reason about a few loops? Or do you wan't to add real power tools to the toolkit you will be carrying into novel challenges that you have no idea what they will consist of?

Should I attend lectures?
-------------------------

Learning vs practicing
----------------------

Time spent acquiring new knowledge vs time spent practicing and fortifying it.

Think of learning a new area as building a model house. Then reading, attending lectures and watching videos is like making the detailed plans. Practicing is like actually building. If you learn a new way to solve a differential equation, then you have planned it out. It makes perfect sense, and you are confident you will only have to go through the motions when it is time to actually build it. But a lot of the time, there is an unexpected snag – some part of the plan is hazily drawn right where precision is needed. Maybe you realize you are missing an important tool. That gives you an opportunity to correct those shortcomings, and be more prepared next time.

The metaphore works on one more level: making to detailed a plan is hard, especially if you've never drawn a house before. It's likely better to do some rough planning for the whole building, then plan a detail, then build that, iterating as you go. Then, one day, you will be ready to draw and build a house from scratch – which is the goal.

Learning can be simpler than practicing: It's easier to pick up the book than to get pen and paper and get to work. Which is fine. I could probably have a higher practice/learning ratio, but I like reading, so I'm fine.

Pen and paper vs mental images
------------------------------

This is an interesting one.

Mental images: good for being able to think well fast. If you practice this you become better at coming up with intricate thoughts while walking, showering or anything else creativeity-inducing.

Pen and paper: Moves you forward quicker. Let's you mind interact with something physical, which helps learning. Generally a better approach for solving a problem.

Middle ground: Novel stuff, pen and paper. If you already know how to do it with pen and paper (like some standard equation solving or drawing a graph problem) then try doing it only in your head some time and check your answer.

Memory tricks
-------------

Ribbing stuff: for when you need to put some stuff in your head for a while. Good for keeping new concepts in your head so you can repeat them while doing dishes or walking.

Speaking heresy: Memorization is a good placeholder for real knowledge
----------------------------------------------------------------------

The wording is important here. Memorization is a *placeholder*, not a replacement.

I often find myself struggling to figure out how to solve a problem. (Implementing a working quicksort is one example.) I can spend a few hours, stuck. Some people say: "Move on and come back later". That is pretty good advice, but it's common that it leaves a big hole in your understanding. And maybe you will figure it out later, if you remember to return. Say, for example, that you're struggling with quicksort (like I *always* do). Then you could move on.

Or you could memorize this:

    algorithm quicksort(A, lo, hi) is
        if lo < hi then
            p := partition(A, lo, hi)
            quicksort(A, lo, p – 1)
            quicksort(A, p + 1, hi)

    algorithm partition(A, lo, hi) is
        pivot := A[hi]
        i := lo        // place for swapping
        for j := lo to hi – 1 do
            if A[j] ≤ pivot then
                swap A[i] with A[j]
                i := i + 1
        swap A[i] with A[hi]
        return i

*(Source: [Wikipedia][quicksort-wiki])*

It really doesn't take that much. Write it down a few times. Memorize it. I know people think memorization is pointless, but it is not.

If knowledge is a toolbox, than memorizing means carrying a tool around with you, even when you don't know how to use it! While just "moving on" is leaving it behind, hoping you find it again some time. If you carry it with you, then chances are you will be picking it up one day, inspecting it and realizing how it actually works! And how to use it! If you just leave it behind, then you won't have these epiphanies. You might, at best, remember that there is such a tool (quicksort) and what it is good for (sorting), but you won't casually be out walking one day when it hits you, in all it's glory: "This is how this shit works!"

I often do this in math. If I don't get it even after some trying, I memorize how to do it. Then I will be using it every now and then. There is a good chance that, while using it, I will get to know it more intimately, and maybe even come to understand it.

Don't be afraid to memorize. Memorizing is just safekeeping the stuff you really want (or need) for later, when your mind is ready.

Fortyfing knowledge
-------------------

Exam focus vs knowledge focus
-----------------------------

Passing matters. Grades matter. It's hard to focus on deep knowledge as the exam draws closer. *So do that in the first weeks, until the exam fear creeps up*. Focus on the interesting and thought provoking parts of the material to begin with. That is what you will bring with you for the rest of your professional life. As the exam draws closer, I tend to naturally be drawn to testing that I know what I need to pass.

Just finding the solution vs understanding the underlying problem and the thinking behind the solution
------------------------------------------------------------------------------------------------------

Often programmers just need to get stuff done. So we look for solutions. Google pages that have titles that sound vaguely familiar to or problem. Look for anything that resembles a code block that could fit into our method bodies on a StackOverflow page that asks about the exact same error message that we have.

And that's just life. We are lazy. And there are arbitrary deadlines. And honestly, doesn't it *feel* like we learned something?

Only next time we have a similar problem (or even the same one, if a few weeks have passed) we are out code-scavenging again.

I think of this as the *teach a man to fish* saying.

> Teach yourself what will help and you solve a problem today.
> Understand the underlying logic and you solve problems for a lifetime.

If you spend some time – sometimes half an hour, sometimes a whole work day or two – understanding the new tools you're using, their implementation and their idioms, you can reason about stuff from first principles. You can solve novel problems. You can improve your understanding with each new bit of information you learn. You're teaching yourself to fish.

On the other hand, if you just memorize quicksort or how to horizontally align your div on the page, then you are *scavening for fish*. And you rely on other good fishermen to have strewn some out here and there for you to find, right in the places you can think to look.

Testing yourself
----------------

Imagine you built a hanglider for yourself. You followed all the instructions, checked every nut and bolt, and you feel confident that it should manage to fly. Are you willing to jump of a cliff with it?

Likely not. You'd test it in a safe environment first. Low altitude, strength tests, etc. 

This is what I feel is going on when someone prepares for a test without doing anything resembling the test. Yes, you have the knowledge. But are you sure it will show up when you are sitting there with a test and under time pressure? Are you sure you know the important details by heart? Are you sure there isn't something you forgot to think of that would make your hanglider plummet when whit gets real?

You want to test your knowledge before you put it to use. This holds outside of school too: You learn something important – make sure to try it out on something that resembles a real situation, so that you have it down when the time comes.

I often feel it's scary to do some old exams, trying my beautiful hang glider from a cliff with a sea of rubber foam under. Because I feel certain that my hanglider works – I'm so proud of it! – and if it fails, my confidence drops like my meat body would under that huge uniwing. It can feel awkward. But still: I'd rather know beforehand than on the day of my big flight show! Even if I don't intend to do any improvements, it's better to know.

How do I know that I'm ready?

There is no such thing as dicipline, only fooling yourself into being productive
--------------------------------------------------------------------------------

Go somewhere quiet. Make a plan. Don't try to will yourself into learning when it is not working. Recall your motivation, or figure it out.

### Motivation

I really, truly believe that there is no need to do anything. You don't have to pass this exam. You may want to. Why? Because otherwise you might fall behind. What consequences would that have? Studying over the summer or taking longer time to finish – maybe not finis. Maybe lose money. 

There is a motivation: Avoiding those things. But a better way of putting it is: You are already there! Those bad consequences are what is waiting, because that is what will happen if you don't do anything. I always start a course with the assumption that I'm failing it – because I am. I couldn't pass the exam or use the knowledge I was supposed to absorb. So then I have X weeks to remedy that, but I always try to make sure I don't think I will pass through some extrapolation based on previous results – that would mean my motivation is to *remain where I think I am*. That's shitty motivation. Climbing is more fun than hanging. Create climbing motivations.

### Just do it?

Don't trust people who say "Just do it". Those people just have good habits and want to attribute it to "willpower". But they have areas of their life where they fail, stall and procrastinate. Their "willpower" doesn't disappear in those situations – it was never there! They are just lacking the habits or the motivation.


LINKS
=====

[quicksort-wiki]: https://en.wikipedia.org/wiki/Quicksort#Lomuto_partition_scheme
