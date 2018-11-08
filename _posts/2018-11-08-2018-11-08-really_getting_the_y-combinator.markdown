---
layout: post
title: "Deriving the Y-combinator"
---
*Note: I assume you already know some lambda calculus, at least how to apply an expression to a function. If you need a primer, look [here](https://ebzzry.io/en/lambda-calculus/), especially the section called "Function application".*

If you're amything like me, you are 1) interested in lambda calculus, and 2) a
bit dissatisifed. You may or may not know about the Y-combinator, and its
immense importance. It is a construct than enables recursion, and as a result [causes some problems](https://en.wikipedia.org/wiki/Curry%27s_paradox#Lambda_calculus). There are also
other cool combinators. And here's how they are usually explained to me:

**Clever person**: The Y-combinator looks like this. [Shows me some lambda expression.]

**Me**: Oh cool, how does it work?

**CP**: You just apply it to anything like this, and causes recursion!

**Me**: Huh. But why?

**CP**: Why it causes recursion? Just try it and you will see it works!

**Me**: Yeah, but... How? How did you come up with this?

**CP**: I didn't. But it works!

Wholly unsatisfactory. I want to understand how I could construct it. I don't
think Haskell Curry just stared at the problem of recursion in lambda calculus
until a really cool expression jumped up at him an introduced itself as "Mr. Y".
Or maybe it did -- logicans, am I right? -- but I'm an engineer, and I want ways,
methods and techniques.


An aside about math and proofs
===

As anyone who has ever tried to construct a proof knows, it's
not a straightforward process. It requires various degrees of knowledge,
strategy, imagination, inspiration and luck to come up with a good proof.
Constructing a proof may take many turns and dead ends, but in the end it
usually comes down to making some sound decisions along the way and
looking in just the right direction at just the right time. But that is not how
proofs are presented in books. They work more like a map, which is great if
you're trying to just find your way, but worthless if you're trying to learn the
art of finding your own way in unknown territory (which is really the point of
learning math at all).

The thing that often bugs me about most resources on lambda calculus[^resources]
is that they tend to be "clever". They show you a construction, and that it
works. But more than in the other branches of math I've covered, the
constructions seem to appear out of thin air. That makes it both more boring to
learn, and harder to remember (the number of times I've looked up the
Y-combinator just to forget it 3 secondes later...)

The Y-combinator
===

A combinator is just a lambda expression *with no free variables*. The point of
having combinators is that you can combine them (duh) and in theory, work only
with a set of ready-made combinator functions and never worry about the details
of making your own λ-abstractions, etc. It becomes more like doing
arithmetic: you are applying multiplication `*` without worrying too mch of the
definition, just by knowing how that specific function it is supposed to
transform its inputs into an output.

It turns out it's actually not that hard to just "figure out" the Y-combinator.
Specifically, we want to figure out a combinator that, when
given another expression ("function") *f* as a parameter, just creates a new
function which applies *f* endlessly to its input.

```
(Y foo) => foo (Y foo) => foo (foo (Y foo)) => foo (foo (...foo (Y foo)...))
```

`=>` is my way of writing "reduces to". An expression that works like this is
called a "fixed point combinator", because successive applications don't
change the value: if `x = f(x) = f(f(x)) = ...`, then `x` is a fixed point of `f`.
A cool property is that an expression is never fully reduced: there is always a
new reduction to be made, because there is always a `Y foo` left in there.


Deriving the Y-combinator
==

There are a few tricks to this. Let's give it a shot! I will try as best
as I can to only take steps that seem logical and motivated our search.

 I took a lot of inspiration from the [lambda calculus alligator
 game](http://worrydream.com/AlligatorEggs/) (make sure to click that link if
 you haven't seen it before!), which
is an absolutely delightful way to teach it and a great visual construction. I
don't draw crocodiles very well, but I adopt a similar structure of
presentation as trees, with intermediate "hatching" steps, because that is now
how I do these things when working them out myself.

Okay, so we want to come up with a fixed point combinator. That seems a bit
hard. Can we start with something simpler? Well, I mentioned above that the
fixed point combinator is never completely reduced. That is how it can keep
growing infinitely. So let's see if we can just create that infinite behavior.

Intermediate step: Deriving a looping combinator
--

So the first thing I want to try constructing is a combinator that
1. never reduces to normal form, meaning there is always more reductions to be made, and
2. always looks the same after each reduction.

It should behave like this:

```
loop => loop => loop => ...
```

This is of course a pretty pointless tool, but it's the simplest example I can think of that 

So, first off, can we guess some structure of the `loop` expression. Well, we
want it to keep applying forever, so it must be a function application

![loop = (lambda x . foo) x ]({{ "/assets/img/y-combinator/omega1.jpg" }})

Now let's reduce it. I use an intermediate step in my reduction, where an expression "lights up", because it is about to be modified by what was just applied to it.

![loop = (lambda x . foo) x ]({{ "/assets/img/y-combinator/omega2.jpg" }})

Okay, that's interesting. We don't know anything about the body of the function,
`foo`, but when reducing this simple expression, it of course just turns in to
`foo`, by the rules of β-reduction. That's because we just replaced the bound
`x` with a free `x`.

But we learned something. The body, foo, must reduce to the full structure of
`loop`, λ-abstraction and all. But if we try to just plug that into the first
λ-expression, we get another `foo` in the body we need to expand, and so on
forever. That's exactly the behavior we were looking for, but we need to be
careful in how we reason. So let's look at something else we learned: `foo` must have an `x` term to the right, because it's supposed to look the same as what it started from. So let's replace `foo` by another expression, `bar x`, and see what happens.

![loop = (lambda x . foo) x ]({{ "/assets/img/y-combinator/omega3.jpg" }})

Great, that looks a little more as what we started with -- at least now there's still an `x` to the right. But we lost the λ-abstraction around bar, and we can't just make `bar` a λ-abstraction with an body that contains a λ-abstraction, etc., because that would go on forever.

What we can try to do is to make the right `x`, the one we're applying to all of
this, a λ-abstraction. That way, we might be able to insert it into `bar`. Let's
just see what happens

![loop = (lambda x . foo) x ]({{ "/assets/img/y-combinator/omega4.jpg" }})

Perfect! The `x` next to `bar` ensures the right side is the same after
reduction, and I kept the lighting around `bar` to indicate it is not done
reducing (because we don't know if it contains any more instances of `x` that we
would need to update, but let's not sweat it.)

Okay, so we don't know what `bar` is. Let's try the simplest possible
expression it could be, and see what happens.

![loop = (lambda x . foo) x ]({{ "/assets/img/y-combinator/omega5.jpg" }})

We're getting close. Look at the expression before and after reduction: it's
strikingly similar. The only problem is that the right side completely took over
and is now on both the right and left. But we are not actually using `baz` for
anything yet, so we can just replace it with whatever. And if we want it to be
the same as before the reduction, it looks like `baz` should be `x x`. Let's try.

![loop = (lambda x . foo) x ]({{ "/assets/img/y-combinator/omega5.jpg" }})

We did it! The initial expression is the same as the reduced expression, and we
can now do the same reduction again, and get the same result! The final
expression is

```
loop = (λ x . x x) (λ x . x x)
```

This combinator of course have a name. It's called the ω-combinator. (ω is a small omega).


[^resources]: If you know good resources that take a more constructive approach, please share!
