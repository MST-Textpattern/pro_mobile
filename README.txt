pro_mobile:

Handy little wrapper tag to display different content/code to mobile browsers, needed it, made it, shared it :)

Version 0.4, ‘opera mobi’ agent supported now!

Option 1:

<txp:pro_mobile> // Show mobile content here </txp:pro_mobile>
Option 2:

Use as an if/else:

<txp:pro_mobile> // Mobile content here <txp:else /> // Regular content here </txp:pro_mobile>
Option 3:

Define custom content per browser

<txp:pro_if_mobile name="iPad" > You have an iPad lucky thing! </txp:pro_if_mobile>

Names available for you to use include:

    iphone
    ipod
    ipad
    aspen
    nexus
    dream
    android
    cupcake
    blackberry9500
    blackberry9530
    opera mini
    opera mobi
    webos
    incognito
    webmate

Option 4:

Feel free to wrap tags!

<txp:pro_mobile> Welcome mobile user! <txp:pro_if_mobile name="opera mini"> You use opera mini, great browser! </txp:pro_if_mobile> <txp:pro_if_mobile name="android"> You use android, great browser! </txp:pro_if_mobile> <txp:else /> // normal content </txp:pro_mobile>

You can do a lot with media queries in the head of your textpattern page, see my web site for code examples on how to create mobile version of your site with media queries alone, however there will still always be times you want a custom message, such as a custom Ipad message with instructions on how to add that page to the home screen etc. But I would recommend a heavy reliance on media queries over device ‘sniffing’ for your overall tactic, do post any questions/feedback here too!
