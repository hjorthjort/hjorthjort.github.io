---
layout: post
title: "Always See Your Next Appointment in Your Status Bar"
date: "2020-09-09 10:52:30 +0200"
thumbnail : 
    url: "/assets/img/gcal-status/i3status.png"
---

If you use Google Calendar, here's a neat trick to quickly see your next appointment in a dashboard, status bar, or similar.
I use it with i3status, but it works just as well with any dashboard tool.

![A picture of my i3 status bar, with my next appointment in green]( {{ "/assets/img/gcal-status/i3status.png" }} )

I have it configured to only show *one* event, and only if it starts in the next 24 hours, but you can configure this as you like.

## `gcalcli` -- Command Line Tool for Google Calendar

First, install [`gcalcli`](https://github.com/insanum/gcalcli).

Try it out by running `gcalcli agenda`.
This will prompt you to login.
After you have logged in you should get a list of upcoming appointments with times.
Try `gcalcli agenda` again.
This time you should not have to login (this is important, since we want to use `gcalcli` for automatic scripting).
If you're having issues, consult the documentation in the repository.

## Use Crontab to Fetch Next Event to a File

Now, run `crontab -e` and edit your crontab file to contain the following entry:

```crontab
# Get today's agenda, starting now and going to the end of the day.
# Keep first line only.
# Delete the date.
# Avoid the long space between time and title, repalce by colon.
# Add a message at the bottom, will show if there are no events in the selected period.
*/5 * * * * export DIR="<ATTENTION: Choose a directory>" ; gcalcli --refresh --nocolor agenda --military --nostarted --nodeclined --tsv "`date`" "`date -d '+1 day'`" | sed -s '/00:00.*00:00/d' | awk 'BEGIN{FS="\t"}{print $2 "-" $4 ": " $5}' | head -1 > $DIR/next_appointment.txt.tmp && rm $DIR/next_appointment.txt ; mv $DIR/next_appointment.txt.tmp $DIR/next_appointment.txt
``**

**NOTE**: Change the location of the temporary file to suit you.
I have a `tmp/` directory in my home directory that I point to.

This is crude, but fairly robust.

The `gcalcli` command will give you all upcoming events that fulfill the following:
- start in the next 24 hours,
- has not yet started (good way to ensure you don't show ongoing all-day events),
- you haven't declined.

Then, all-day event are deleted with the first `sed` command (they are displayed as running from midnight to midnight).
After that, the output is formatted with `awk`, and the first event is extracted with `head -1`.
The output redirected to a temporary file, any existing file is removed, and the tempfile is moved to it's place.

Note that this uses 

## Showing The Appointment in i3status

Add the following to your `.i3status.conf`  file:

```
read_file gcal {
        format = "%content"
        format_bad = "%title: no cal file"
        path = "<ATTENTION: Same directory as above>/next_appointment.txt"
        Max_characters = 60
}
```

## Configuring To Suit You

Some configurations you might want to make this suit you better:
- Change time window.
  See where it says `'+1 day'`?
  Change that as you like, you can use `'+12 hours'` or `'+1 week'`, for example.
  I chose 1 day for UI purposes -- I can show only the time and not the day of the event without any confusion.
- Use 12-hour format or 24-hour format.
  For 24-hour format, use the `--military` flag.
  For 12-hour format, use the `--no-military` flag[^1].
- You can format the text some other way than `<START_TIME>-<END_TIME>: <TITLE>`, by modifying the `awk` command.


## That's It

I find it very relaxing to have my next appointment available at a glance.
Most importantly, it helps me relax knowing how much time I have to for myself before I'm needed somewhere.
This works well, since I only put things in my calendar which are events that happen at particular times, or slices of time for specific work I have carved out and need to respect.
I don't use my calendar for regular TODOs.
I work by a version of the David Allen "Getting Things Done" method (commonly called GTD), which emphasizes this.

[^1]: Okay, this actually doesn't seem to work at the moment. See this issue: https://github.com/insanum/gcalcli/issues/563
Hopefully it will be fixed soon.
