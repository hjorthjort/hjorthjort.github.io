---
layout: post
title: "Let's start calling code \"performative prose\""
date: "2016-11-25 20:00:35 +0100"
---

I think "performative prose" is a perfect nickname for certain type of  code. The reason is
not because all code is prose – or at least not *good* prose – but rather
because that is what code *should* be a lot of times.[^performative]

I've recently developed a strong
fondness of all lines of code that read like sentences, which describe what
they do; "I take this thing and do that to it and then I'll give you this
back". Of course, this idea is not novel in itself, but I think the nickname
is.

Some code is like math, which is actually what code is more closely related to
in a semantic way. Like

```java
long reservationID = (long) roomReservation[(int)roomNumber];
		if (reservationID < 0) return false;
		for (int i=0; i < bookingMessage.length; i++ ){
			if (bookingMessage[i]==reservationID)
			{
				return true;
			}
		} 
		return false;
```

or this piece of Haskell

```haskell
wordCount = putStr . unlines . map (\(n, w) -> w ++ ": " ++ show n) 
            . map (\x -> (length x, head x))
            . group . sort . words
```

Even though the variable names might be chosen to be highly expressive, it's
not prose – it's math, or at least a subset of math: algorithms in the Java
example, and algebra in the haskell example.

So, this is one quality code can posess. Thight, clear, lacking in anything
superflous. THe names refer more to what the thing really *is*, rather than
how it would fit into a piece of writing.

This, on the other hand, is an example of performative prose:

```haskell
isSudoku su@(SudokuOf rows) = correctHeight && correctWidth && correctCells
    where
        correctHeight = size == length rows
        correctWidth  = (\row -> length row == size) `all` rows
        correctCells   = allCells isValidCell {-in-} su
        isValidCell   = True `maybe` (\n -> n>=1 && n<=size)
```

Performative prose is holistic, not reductionist. In it, functions beg to be
handled in a certain way – just like words in prose, in how they invoke
meaning, what other words they attach to well, how they fit into a whole. They
are self contained in the semantic sense (hopefully, don't you be using any
`goto`-style spaghetti, your'e better than that), but their naming and uses
reveal more intention.

Look at the functions `allCells` and `isValidCell`, how their names were picked for
them to marry well. That is prosaic. It is hard, but often it is worth the
while, in the mental strain it might save you, and the happiness it sometimes
bring when you really pull it off, and every time you read those lines
thereafter.

Another example, in Java, which like all C-style languages makes writing prose
really, really hard. But so is writing angry yet respectinducing letters in
Swedish or speaking gender-neutrally in German. That doesn't mean there is no
point in it. Sometimes, it's worth doing when you realize you are in a
situation where you can do it well.

```java
inTheEventOf(Event x) {
    if (x.isNull()) return;
    else
        ourCopy = x;
        x.status = wasRecognisedBy(this);
        throw x;
}
```

The same principle applies as in speech writing: read it out loud. Does it
sound funny, or does it roll of your tounge? Can you insert the prepositions
and conjunctions effortlessly, or do you need to reconstruct the whole
sentence when you get to the end of it?

This is not an ordering of kinds of code. Both have their place. But I think
the reign of what we just call "code", that is the algorithmic style of
writing, has been long and strong, I hope to see that the rise of declarative
and functional programming will bring forth more code written to be understood
by someone new to the language, new to the framework, or, in the best of
worlds, new to code altogether.

[^performative]: I think the "performative" part of the nickname is more obivous than the "prose" part, since most people understand that being "performative" kinda means that it "does something to the world". Even so, if you want to dive deeper into what performativity means in the context of human language (and its central role in some of the humanities), go ahead and read a section in the [Stanford Encyclopedia of Philosophy](http://plato.stanford.edu/entries/speech-acts/#ConForHowSayMakItSo).
