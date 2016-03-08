---
layout: post
title: Fuck Ransomware
date: 2016-03-08 11:00:00 +0100
categories: security
---

I read that there is now a large scale ransomware haunting Mac users. It's called [KeRanger][paloalto-keranger] and has infected the 2.90 installer of the BitTorrent client [Transmission][transmission]. This happened 4 days ago, on March 4. There are patches now. I don't know how many people were affected.

Ransomware quick guide
----------------------

Basically, ransomware is a malware that goes through all the files on your computure that it thinks are important to you, the user – photos, documents, spreadsheets, and so forth – and encrypts them with a [public key][public-key-enc]. This kind of encryption works like a padlock: anyone can lock it, but you need the key to open it. The crooks have that key, and they will sell it to you for 1 Bitcoin, which is a decent amount of money.

From what I gather, most of these ransomwares are made from a [simple open source solution][ransomC] that can be run easily from the command line, so any script-kiddie can starting making money this way, if they can get their malware into a reputable software pack. In this case, they managed to replace the Transmission installers with their own, and they signed it with their own certificate (or someone elses). This means that the installer was distributed from a "trusted source" in Turkey, and the Apple installer therefore didn't issue any warnings like it would if the installer came from an unidentified source. Go to [Palo Alto Networks blog post about KeRanger][paloalto-keranger] if you want to read more about the technical aspects of the malware.

Fast, ad hoc protection mechanism
---------------------------------

From what I gather, these ransomwares traverse the file system in the regular order: serially (no parallization) and from the root directory. Encrypting a file with 2048 bit RSA can take a while, so if you can halt the encryption somehow, you might catch it in time, before too much damage is done.[^unix-recover] Some people have suggested that you put a huge file (like a 4GB Windows installer) at the top of your home directory or something similar, which would buy some time. That way, if you spend a lot of time in your file system (like me, I `cd` and `ls` and `tree` and `grep` my way through the day) then you are likely to find some traces of the malware working before it has come too far.

Some people have suggested that these ransomware tend to follow symlinks, which would make sense. If you have a symlink to something in you Documents directory, it's likely something that ransomers would like to encrypt. So I made myself a little guard-file.

{%highlight bash%}
$ cd ~
$ ln -s /dev/random 0000fuck_ransomware.doc
{%endhighlight%}

See? That symlinks to `/dev/random`, which behaves like a never ending file – you will never get and end-of-file in there. I tried encrypting it with `openssl` and RSA, which of course didn't work. Since the whole file needs to be read before it can be encrypted, the encryption never stops – you can never read the whole file.

Now, I put this in my home directory. That means it comes before my Documents, Dropbox, Code, Blog – everything. Meaning the encryption should halt at this file forever, or at least until a timeout.[^caveat]

So is it wise to rely on this alone? Fuck no.

Epilogue: Real protection – my view on security
---------------

This was for fun. A better security measure is installing security patches, and keeping your stuff synched in a decent way. Anf here we get to my philosphy on real security.

That is the basics of avoiding damage. But to me, there is always a risk of damage. Shit breaks. So yes, I keep all my important stuff synched. I use Dropbox (with versioning) and git with GitHub or BitBucket for pretty much everything. Yesterday, I was staying at a friends house and needed to do some work. I used her computer, installed brew, installed git, installed Java SDK, and within 10 minutes I was up an running with a decent setup.[^setup] If my computer gets attacked and all my shit gets encrypted, those fuckers better know how to use `git push --force` and how to rewrite git history, otherwise they don't do shit but make me annoyed while I wipe my computer and take much needed day off from coding. 

To me, being secure is not about being out of harms way – it's about being able to roll with the punches. Could my computer break? Yes, and I make sure nothing unreplaceable would go down with it. Could my house burn down? Of course. And I would loose some stuff I cherish, but nothing that I couldn't either a) replace or b) live without. I couldn't imagine living a life where I worried about my stuff too much, when there is so much else to worry about – my health, people around me, and serious bigger-picture stuff. You shouldn't either. So whenever you create, save or store something, think this thought:

> Either I save and back this up at a redundant place, or I'm okay with it being lost forever.

This goes for anything you create or cherish, and even your TODO:s and appointments: If it is not saved, then consider it lost. If you find it later by chance, than that is just a perk. But never count on recollection or a single place of storage to do the job for you

Be safe.


[^caveat]: Or maybe this doesn't do shit. Maybe the ransomwares out there don't follow symlinks to avoid encrypting the same file several times. Maybe they use timeouts to avoid spending time on really large files. I will be sure to look more at ransomware source code when I get the chance.

[^unix-recover]: This "stopping damage at some point in the file system" makes me think of this wonderful post: [Unix Recovery Legend][unix-rec], which is about how you save a system that has been halfway destroyed.

[^setup]: I did mis my dotfiles and vim plugins though, but I didn't want to install my configs, since they are harder to remove than brew installation.

[paloalto-keranger]: http://researchcenter.paloaltonetworks.com/2016/03/new-os-x-ransomware-keranger-infected-transmission-bittorrent-client-installer/
[public-key-enc]: https://en.wikipedia.org/wiki/Public-key_cryptography
[ransomC]: https://nakedsecurity.sophos.com/2015/11/11/ransomware-meets-linux-on-the-command-line/
[transmission]: https://www.transmissionbt.com/
[unix-rec]: http://www.ee.ryerson.ca/~elf/hack/recovery.html
