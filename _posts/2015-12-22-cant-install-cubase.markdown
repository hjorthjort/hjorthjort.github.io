---
layout: post
title: Can't install Cubase on Mac running Yosemite or El Capitan? Here's how you fix it.
date: 2015-12-22 22:04:00 +0100
categories: old-site
---

**Important: A few month after this post came up, Steinberg put out a tool called "Steinberg Application Installer Tool" that should solve the problem this post addresses. I suggest you try to use that, even if "Installer Tools" in general might be the most annoying thing you can have on your computer after virus-inducing toolbars. You can get it [here][tool].**

So, you want to be down with the times, hip with the kids, keep your ear to the ground. You want the latest version of OS X. And why not! I looks good, feels good, and everyone is doing it these days! What could go wrong?

Oh, what's that? You have an old Cubase version and it won't install on your fancy new OS or machine? Well, there's only one (cheap and easy) way around that. Let's get hacking.

## TL;DR

Running Yosemite or above and installing an old version of Cubase? Getting the error message

> Wrong Mac OS X Version

> You need at least Mac OS X 10.5.0 to install this software

![]({{ site.url }}/assets/cubase/error.jpg)

and then the installer shuts down?

Follow the instructions right below to fix it.

<a name="Cubase.md.html">If you want to know what's going on, go to the</a> [Explanation](#explain) section.

## Lightning guide – Just the quick fix

**Important: This is not an official solution. I don't gurantee your program will work properly installed this way. However, I have not encountered any problems after my installation, and I guess your only other option is to downgrade your OS or buy a newer version of Cubase.**

Okay, so this might be a bit long for a "quick" fix, but trust me, it's really fast. I just want to make sure to take you through all the steps.

If you are trying to install one of the slightly older versions of Cubase on a Mac running Yosemite or El Capitan, you will get this error.

> Wrong Mac OS X Version You need at least Mac OS X 10.5.0 to install this software

Which is super weird, since that is Mac OS X 10.5.0 is Leopard, which is 8 years old.

### Here's the quick fix

1:  If you are installing from a CD, take the folder called **"Cubase X for MacOS X"** or something similar and **copy it** to your computer, e.g., your Desktop. You can do this by dragging and dropping.

2:  Open the folder. Right-click on the installer package named "Cubase X" and select "Show Package Contents". Navigate into Contents.

![]({{ site.url }}/assets/cubase/folder.jpg)

![]({{ site.url }}/assets/cubase/package-contents.jpg)

![]({{ site.url }}/assets/cubase/contents.jpg)

![]({{ site.url }}/assets/cubase/select-distribution.jpg)

3:  Right-click on the text file called "distribution.dist" and open in TextEdit or any other raw text editor.

#### And here's the actual fix:

Find this section:

{%highlight javascript%}
    function pm_install_check()
    {
      if(!(system.version.ProductVersion >= '10.5.0')) 
      {
        my.result.title = 'Wrong Mac OS X Version';
        my.result.message = 'You need at least Mac OS X 10.5.0 to install this software';
        my.result.type = 'Fatal';
        return false;
      }
      return true;
    }
{%endhighlight%}

Now remove the everything from `if` to the first closing curly bracket. Here's what you're left with:

{%highlight javascript%}
     function pm_install_check()
            {
              return true;
            }
{%endhighlight%}

Save and close the file. Then, go into to your copy of the original folder, doubleclick the .mpkg file and install as usual.

**Before**

![]({{ site.url }}/assets/cubase/highlight-function.jpg)

**After**

![]({{ site.url }}/assets/cubase/deleted.jpg)

4: After you're done installing, it might be a good idea to open Cubase, go to the menu and check for and install any updates.

#### Done!

You are done! Be happy and creative!

**And don't sue me if anything goes wrong. Any risk is your own.**

<a name="explain"></a>

## Wait, did I just remove something important?

**Short answer:** Yes. But it was also broken.

**Long answer:**

What you just removed was a really important piece of code that makes sure you don't accidentaly install Cubase on a version of Mac OS X that is too old. Which is a good thing. However, it is only code in the **installer** – you didn't change anything in the actual program you installed.

**So why was it telling me I was running an ancient version of OS X? I have the latest one!!!**

Because a programmer got lazy/was stressed/had a brain fart/thought "deal with it later", which are all basically different ways of saying the same thing when it comes to programming. Either that, or Steinberg aren't to keen on keeping their software alive forever. Probably a combination of both.

That code up there is pretty readable. You can probably understand it just by looking at it. Here it is again:

{%highlight javascript%}
    function pm_install_check()
    {
      if(!(system.version.ProductVersion >= '10.5.0')) 
      {
        my.result.title = 'Wrong Mac OS X Version';
        my.result.message = 'You need at least Mac OS X 10.5.0 to install this software';
        my.result.type = 'Fatal';
        return false;
      }
      return true;
    }
{%endhighlight%}

This piece of code is supposed to make sure your product version (your OS) is new enough. If it is, the piece of code returns "true", meaning "all is good in the hood!". If your OS is too old, it should tell you with an error message and the abort.

Only, this piece of code fails at this pretty basic task. Why? Because it checks whether the *string* '10.5.0' is "smaller or equal" to whatever your product version is. '10.5.0' isn't a number. So how do you compare which string is "larger"? Alphabetically. (Or rather, alphanumericaly. But let's not split hairs). Basically, the code checks that your current OS version would come after '10.5.0' in an alphabetical ordering. If it comes before, it kills the installation with the error message you encuntered.

This works pretty well. '10.6.x' (Snow Leopard) comes after '10.5.0' in alphabetical ordering. So does '10.9.5' (The last version of Mavericks). But then comes the problem. '10.10.x' (Yosemite) and '10.11.x' (El Capitan) come *before* '10.5.0' in the alphabet! So the code does what the programmer instructed it to and throws an error, but that is not what the code *should* do.

So what did you do? You removed that whole version check. Now the installer could run on any version of OS X and not complain (not at this stage, at least). That is, of course, unsafe. But since you know you are running a newer version, you should be OK.

* * *

Hope that helped. Email me at hjort[squirell-a]hjorthjort{dot}com if you have any quetions or anything to add. Happy hacking! And happy hit-making!

[tool]: http://www.steinberg.net/en/support/content_und_zubehoer/content_and_accessories_sait.html
