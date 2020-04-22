---
layout: post
title: "Analogies, similes and metaphors as Functors: A Gently Introduction to Category Theory"
date: "2020-04-22 22:06:00 +0200"
thumbnail:
    url: "https://bartoszmilewski.files.wordpress.com/2015/01/functor.jpg"
featured: true
---

I got [nerd-sniped](https://xkcd.com/356/).
Someone asked a very basic question about functors on [Reddit](https://www.reddit.com/r/functionalprogramming/comments/g5m65l/understanding_functors/) and I got carried away, producing a 1250 word answer.

Here is the question and answer in full:

## Question

Hey, everybody -

I've been "FP-pilled" and am working to understand how all this fits together so I can use some of these fascinating principles in my code. Unfortunately, the idea of functors is pretty darn abstract and I'm having trouble separating it from functions. The idea of a mapping function F => (a -> b) -> F a -> F b is helpful, but I'm wondering if I can draw a parallel that isn't mathematical to help cement the difference.

In my studies, I pulled out a notebook and started writing in it. I wrote, "I hate when I understand a concept for like a moment and then it's whisked away like dandelion fluff on the wind." (excuse my prose).

Then I considered that simile. A functor hidden in it would be the mapping of the concept of my understanding being swiped away (by my insufficient neurotransmitters?) TO the dandelion fluff being swiped away (by the wind). In a weird sort of cross-disciplinary way, similes are examples of functors, as they describe similar relationships between unrelated things, except they don't have the laws that functors must follow.

So the functor could accept "my understanding" as `a` OR "dandelion fluff" as `a` and return null even though ideas and dandelion fluff are completely different categories, since one tangibly exists and the other is simple thought.

Basically, my question is this: Am I even close to right with this train of thought? If not, where does it collapse?

## Answer

I like the idea of functors being like similies. You translate something from one domain to another, while keeping some of the structure.

>So the functor could accept "my understanding" as \`a\` OR "dandelion fluff" as \`a\`  and return null even though ideas and dandelion fluff are completely  different categories, since one tangibly exists and the other is simple  thought.

I'm not so sure what's going on here. But here's how I would do it. I would let the functor be the simile that connects different domains. Bear with me, because I might have taken this too far:

Define the world of mental processes. Keep it small at first: there is an object, `u`, which is your understanding of functors; there is also an object, `n`, which is your non-understanding of functors, and an arrow for forgetting, `f`, from understanding to non-understanding. That arrow is the "swiping away" of your understanding. So you have a *category* of two *objects* with an *arrow* between them which describes in some way how your brain works.

    u --------f---------> n

Then define the world of dandelion fluff states, where being on the plant is one object, `p`, and drifting in the air is one object, `a`, and the arrow from one to the other, `w` is the "swiping away" by the wind. Again, two objects, one arrow, grouped together in one category.

    p --------w---------> a

So let's start with what you're describing (mental processes) as the base and define the functor `S` as going from the world of mental processes to the world of dandelions. The "S" stands for "simile" because you are embedding mental processes into the plant world by using this simile.

So, the way you described it, `S u = p`, `S n = a` and `S f = w`. So understanding is related to being on the plant, not understanding is being related to being in the air, and the swiping-aways are related.

So far so good! Your simile holds up perfectly. But what if we describe mental processes a little better?

      --------f--------->
    u                     n
      <-------g----------   

There's another arrow in there now, `g`, for "getting it". And if you compose the two, you are back in understanding (or non-understanding). It may not be the exact same way of understanding (getting it and forgetting it still kinda changes your state of non-understanding), I'm not saying that `f . g` has no effect, it just takes you from non-understanding to understanding to back again.

But what about our simile? What is `S g`? Is there some way to go from being in the air to being back on the plant? Not really, right. So in a sense, the simile breaks down because you no longer have a functor, since you can't find a way to map every arrow in your base category to one in your target category. Also, for the simile to work, things need to compose properly. There has to be a simile to `g . f`, that is, forgetting it and then getting it again, and it also has to work for `g . f . g. f . g`, etc. How would we design that category?

Here's an idea: let's be less "stateful" in the dandelion category. Instead, assume there is only one object, `d`, for "there are dandelions with fluff", and the wind can always sweep fluff from a dandelion somewhere, so you can always go from `d` to `d` via `w`. Also we will need an arrow that says "nothing happens", called `id`. This is always implicitly present -- there is always a function `id : a -> a` \-- but let's be explicit about it in the next diagram

    w ↻  d  ↺ id

Whenever we do `w`, the wind grabs some dandelion fluff in the world and whisks it off. So there is really also an arrow from `d` to itself labeled `w . w`, `w . w . w`, etc., for every number of `w`s, indicating "fluff has been whisked of so and so many times".

So, now both the states "understanding" and "non-understanding" in our mental category map to "there are dandelions with fluff", or `S u = S n = d`, and forgetting maps to the wind doing its thing, so `S f = w`. Since the simile doesn't say anything about "getting it" doing anything, let's say that `S g = id`. Now, does our simile preserve the structure of what we are describing (our mind)? Let's see.

Forgetting, then getting it again corresponds to `g . f` in our mental category. The simile for it would be `S (g . f)`. The correct simile is a single "wind whisking fluff away" event, with no particular description of the "getting it again" part, so we should expect `S (g . f) = w`. But `w = id . w` (because `id` does nothing), and `id = S g` so `S (g . f) = w = (S g) . (S f)`. That's great, because it means our simile preserves composition! Composing two events in the mental category gives you \*the exact same result\* as composing the corresponding events in the dandelion category. (You should check that `S (f . g) = (S f) . (S g)`, too, but that's just as easy). The cool thing is that now we have a proper functor, because the simile actually preserves the structure of the thing we are describing. You could add any number of objects and arrows to the mental category, have the functor `S` map all objects to `d` and all other arrows to `id`, and it still works: your functor is now a simile from "everything that ever goes on in your brain" to "the number of times I've forgotten a certain concept". You have reduced a massive structure -- your mind -- to a single thing you were trying to capture with your metaphor.

You have stepped into an extremely fruitful practice in abstract mathematics: collapsing one big complex thing into a smaller, simpler thing, in a way that preserves some relevant inner structure of the complex thing. It's super useful in group theory, logic, algebra, and -- the thing we did here -- category theory. And, when you think about it, this is what mathematics is: collapsing something complex (a piece of the world) into a world of symbols and manipulations on those symbols, in a way that preserves the relationships between what you do with the symbols and what happens in the world. Buying two apples when you already have one apple give you three apples, and 2 + 1 = 3. But also 3 = 1 + 2, so having one apple and buying two also gives you three apples. Or, mapping the world of your mental processes to two dots and two arrows is also a collapsing something complex into somethingwhich manageable, but is still useful. Am I making sense, or am I sounding like a babbling lunatic.

Hope that makes things weird enough to seem interesting, and intuitive enough to seem useful. Enjoy FP! It only gets stranger from here.

Final notes:

1. The last dandelion category is what is called "a monoid", if you're curious. Don't worry about it if that seems a bit much, but you may encounter them more in the future.
2. Really, the `id` arrow was present for all objects in all our categories, but we didn't mention them explicitly. It is actually an important part of any functor `F` for which `F a = b` that `F id_a = id_b`, which is to say it "preserves identity".
3. If this was Haskell (not sure what FP you are learning), you would write `fmap g` instead of `S g`, and use some other function to map the objects to eachother.
4. The best way to think of `fmap` is not "it takes 3 arguments", but rather "it takes a function in one category, `f : a -> b` and returns a function in the category the functor maps to, `fmap f : F a -> F b`. Yay, currying!

## Epilogue

I've recently been brushing up on my group theory, just getting to the interesting parts about homomorphisms, normal subgroups and their isomorphisms, so I've been a bit caught up with the idea of what it means to embed a certain mathematical structure in another.

What caught me this time was a brilliant detail: the author likened *functors* to *similes* (or metaphors, or analogies, [who can keep up](https://xkcd.com/762/)).[^1]
This struck me as quite deep: the proper simile is the one that preserves the relevant parts of the structure of what you are trying to describe, and the [overextended metaphor](https://www.smbc-comics.com/index.php?id=1846) is one in which this structure is not preserved.
A *good* metaphor/simile/analogy (just "analogy" from now on) is one in which the structure the reader implicitly gathers is relevant maps correctly to the domain being described.
So, likening love to a rose is a bad analogy because you are only picking some arbitrary properties of the rose and equating them to love.
Likening parenthood to running a company, on the other hand, preserves a lot of the structure of the parenthood.
For example, you are a "manager" in both situations, many of your duties can be fairly directly translated (cleaning up messes, making future plans, giving feedback), and also the composition of relationship between objects is preserved (giving feedback in order to clean up fewer messes to make sure future plans can proceed, for example).
To some extent, I think analogies resonate exactly when they provide an obvious embedding of a domain in a way that seems, at least intuitively, to be structure preserving.

Anyway, all I know about category theory is from coding Haskell, reading Wikipedia, [this beautiful little book by José Meseguer](https://courses.engr.illinois.edu/cs477/sp2010/book.pdf), and [Category Theory for Programmers](https://bartoszmilewski.com/2014/10/28/category-theory-for-programmers-the-preface/) by Bartosz Milewski (available online and in printed form). I am but no means an expert, but I at least know what a functor is.
I wanted to cover naturality---which would describe a mapping between two analogies, and describe which one is more powerful by which one can be embedded within the other---but I wanted to keep things light.

[^1]: If I would make any distinction, I'd say a simile is like an isomorphism, a metaphor is like a mapping (non-structure preserving) and an analogy is like a general homomorphism in that it's meant to be strucutre preserving and can be either very complex or quite simplifying.
