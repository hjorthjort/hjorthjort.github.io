---
layout: post
title: "An idea for vim snippets"
date: "2016-04-01 12:17:02 +0200"
category: ideas
---

Sitting with LaTeX right now writing a troublesome article, I have encountered a serious problem to my workflow: I find myself repeatedly typing things such as 

```tex
$\mathsf{rev}(n), n \in \mathbb{N}$
```

which gives me this:

![A formula rendered by the above LaTeX code]({{ site.url }}/assets/latex_rev_n.png)

Which is alright, if it wasn't for the fact that I *have to write it a hundred damn times*. All in all, these kinds of very special wordings probably doubles the time I have to spend writing, perhaps triples it. Writing something down on paper takes a fraction of the time it takes to write it out in LaTeX when I want it too look just right. I will rarely wan't to write "rev" without formatting it in sans serif, at least in this document. So doing it by hand all the time seems to me like a violation of DRY. Why shouldn't writing obey DRY? 

I'm using Vim, so here are some things I could do about it:

* Use vim-snippets and UltraSnips (I already do) to create snippets for the things I write often.
* Use `sed` to do global search and replace, preferrably using some smart notation to distinguish "rev" and "N" above from the occurences that you would expect in regular text.

The first approach seems reasonable, except I won't use "rev" and "N" the same way in my *other* documents. Call me pedantic, but I don't want some shortcuts that are only relevant for one project to litter in my general snippets file. And if I were to have a bunch of ongoing projects, each with their own special need for snippets, then it could   quicky become a mess.

The second approach would work fine in general. However, when I'm writing I like to be able to see my document as it emerges. I prefer looking at compiled pdf:s when reading my arguments than looking at source markup code. And since all my special signatures to be replaced (say, _rev_ that i could then `%/s/_rev_/\\mathsf{rev}/g`) wouldn't compile well, I would have to replace everytime I wanted an updated version of my document to look at, which I suspect in the end would be as much work as just typing it in.

## Introducing the idea

Here's what I propose (and intend to dig my teeth into myself if I decide to learn vim-script and someone else doesn't beat me to it):

> A 'temp-snip' plugin for creating temporary vim-snippets, that would integrate with existing, well made vim packages such as vim-snippets and UltraSnips.

Here's my proposed usage:

```vim
:TempSnip rev='\mathsf{rev}'
```

This would allow you to write something like this:

![Writing the word 'rev' in vim gives a snippet that would expand to \mathsf{rev}]({{ sit.url }}/assets/latex_snippet.png)

I would also be able to put all these temp snippets in a separate file that I could source whenever I opened the document, so that I wouldn't have to restate them whenever I closed my document.

So if this exists and I've overlooked it, please let me know. Otherwise, let's make it happen! First one there wins ice cream!
