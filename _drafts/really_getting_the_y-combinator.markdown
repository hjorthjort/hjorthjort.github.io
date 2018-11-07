---
layout: post
title: "Deriving the Y-combinator"
---

If you're amything like me, you are 1) interested in lambda calculus, and 2) a
bit dissatisifed. You may or may not know about the Y-combinator, and its
immense importance. It is the construct than enables recursion. There are also
other cool combinators. And here's how they are usually explained to me:

**Clever person**: The Y-combinator looks like this.
**Me**: Jeez, that's hard to pronounce ...
**CP**: You just apply it to anything like this, and it works!
**Me**: Huh. But why?
**CP**: Why it works? Just try it and you will see it works!
**Me**: Yeah, but... How? How did you come up with this?
**CP**: I didn't. But it works!

Wholly unsatisfactory. I want to understand how I could construct it. I don't think Haskell Curry just stared at the problem of recursion in lambda calculus until a really cool expression jumped up at him an introduced itself as "Mr. Y". Or maybe it did (logicans, am I right), but I'm an engineer, and I want ways, methods and techniques.

First a word about math and proofs. As anyone who has ever done math knows, it's not a straightforward process. It requires various degrees of knowledge, strategy, imagination, inspiration and luck to come up with a good proof. Constructing a proof may take many turns, with sound decisions along the way and looking in just the right direction at just the right time. But that is not how proofs are presented in books. They work more like a map, which is great if you're trying to just find your way, but worthless if you're trying to learn the art of finding your own way in unknown territory (which is really the point of learning math at all). TODO (Euclids prime proof)

The thing that often bugs me about most resources on lambda calculus[^resources] is that they tend to be "clever". They show you a construction, and that it works. But more than in the other branches of math I've covered, the constructions seem to appear out of thin air. That makes it both more boring to learn, and harder to remember (the number of times I've looked up the Y-combinator just to forget it 3 secondes later...)

It turns out it's actually not that hard to just "figure out" the Y-combinator.
Specifically, We want to figure out a combinator (closed expression) that, when
given another expression ("function") *f* as a parameter, just creates a new
function which applies *f* endlessly to its input. So

```
(Y foo) = foo (Y foo) = foo (foo (Y foo)) = foo (foo (...foo (Y foo)...))
```

This is called a "fixed point combinator", and there are several ways to do it, but we will arrive at the classical representation of the Y-combinator.

There are a few tricks to it, though. Let's give it a shot! I will try as best
as I can to only take steps that seem logical and motivated in the sear

Also I took a lot of inspiration from the lambda calculus alligator game, which
is an absolutely delightful way to teach it and a great visual construction. I
don't draw crocodiles very well, but I adopt a similar pstructure of
presentation as trees, with intermediate "hatching" steps, because that is now
how I do these things when working them out myself.

[^resources]: If you know good resources that take a more constructive approach, please share!
