<?php

// This is a PLUGIN TEMPLATE for Textpattern CMS.

// Copy this file to a new name like abc_myplugin.php.  Edit the code, then
// run this file at the command line to produce a plugin for distribution:
// $ php abc_myplugin.php > abc_myplugin-0.1.txt

// Plugin name is optional.  If unset, it will be extracted from the current
// file name. Plugin names should start with a three letter prefix which is
// unique and reserved for each plugin author ("abc" is just an example).
// Uncomment and edit this line to override:
$plugin['name'] = 'pro_mobile';

// Allow raw HTML help, as opposed to Textile.
// 0 = Plugin help is in Textile format, no raw HTML allowed (default).
// 1 = Plugin help is in raw HTML.  Not recommended.
# $plugin['allow_html_help'] = 1;

$plugin['version'] = '0.4';
$plugin['author'] = 'Hilary Quinn';
$plugin['author_uri'] = 'http://www.proximowebdesign.ie';
$plugin['description'] = 'Txp tag to output content if browser is mobile based';

// Plugin load order:
// The default value of 5 would fit most plugins, while for instance comment
// spam evaluators or URL redirectors would probably want to run earlier
// (1...4) to prepare the environment for everything else that follows.
// Values 6...9 should be considered for plugins which would work late.
// This order is user-overrideable.
$plugin['order'] = '5';

// Plugin 'type' defines where the plugin is loaded
// 0 = public              : only on the public side of the website (default)
// 1 = public+admin        : on both the public and admin side
// 2 = library             : only when include_plugin() or require_plugin() is called
// 3 = admin               : only on the admin side (no AJAX)
// 4 = admin+ajax          : only on the admin side (AJAX supported)
// 5 = public+admin+ajax   : on both the public and admin side (AJAX supported)
$plugin['type'] = '0';

// Plugin "flags" signal the presence of optional capabilities to the core plugin loader.
// Use an appropriately OR-ed combination of these flags.
// The four high-order bits 0xf000 are available for this plugin's private use
if (!defined('PLUGIN_HAS_PREFS')) define('PLUGIN_HAS_PREFS', 0x0001); // This plugin wants to receive "plugin_prefs.{$plugin['name']}" events
if (!defined('PLUGIN_LIFECYCLE_NOTIFY')) define('PLUGIN_LIFECYCLE_NOTIFY', 0x0002); // This plugin wants to receive "plugin_lifecycle.{$plugin['name']}" events

$plugin['flags'] = '0';

// Plugin 'textpack' is optional. It provides i18n strings to be used in conjunction with gTxt().
// Syntax:
// ## arbitrary comment
// #@event
// #@language ISO-LANGUAGE-CODE
// abc_string_name => Localized String

/** Uncomment me, if you need a textpack
$plugin['textpack'] = <<< EOT
#@admin
#@language en-gb
abc_sample_string => Sample String
abc_one_more => One more
#@language de-de
abc_sample_string => Beispieltext
abc_one_more => Noch einer
EOT;
**/
// End of textpack

if (!defined('txpinterface'))
        @include_once('zem_tpl.php');

# --- BEGIN PLUGIN CODE ---
/*********************

pro_mobile: by Hilary Quinn - www.proximowebdesign.ie

Released as a Textpattern plugin under the GNU General Public License

Version history: 0.3

******************************************/

function pro_if_mobile($atts, $thing=NULL) {     //output content if browser type is specified

  extract(lAtts(array(
    'name'  => '',
    ),$atts));

  $user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
  if(strpos($user_agent, $name)) {
    return parse(EvalElse( $thing, true ));
  }
  return parse( EvalElse( $thing, false ) );
}

function pro_mobile($atts, $thing=NULL) {     // output all mobile content

  if ( pro_mobile_display() ) {
    return parse( EvalElse( $thing, true ) );
  }
    return parse( EvalElse( $thing, false ) );
}

function pro_mobile_display($custom_agents = array()) {
 
  $agents = array_merge($custom_agents, array(
	'iphone',           // Apple iPhone
	'ipod',             // Apple iPod touch
        'ipad',             // Apple iPad
	'aspen',            // iPhone simulator
	'nexus',            // Nexus One Android
	'dream',            // Pre 1.5 Android
	'android',          // 1.5+ Android
	'cupcake',          // 1.5+ Android
	'blackberry9500',   // Storm
	'blackberry9530',   // Storm
	'opera mini',       // Opera mobile
        'opera mobi',       // Opera mobile
	'webos',            //  Nokia Browser
	'incognito',        // Other iPhone browser
	'webmate'           // Other iPhone browser
		));
  $user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
  foreach($agents as $agent) if(strpos($user_agent, $agent)) return TRUE;
}
# --- END PLUGIN CODE ---
if (0) {
?>
<!--
# --- BEGIN PLUGIN CSS ---
<style type="text/css">
code{
display: block;
margin: 10px 0 10px 0;
padding: 10px;
background: #F4F4F2;
border-top: 1px dotted #D8D8C3;
border-bottom: 1px dotted #D8D8C3;
}
</style>
# --- END PLUGIN CSS ---
-->
<!--
# --- BEGIN PLUGIN HELP ---
<h2>V4. Support for 'opera mobi' added</h2>

<h2>Option 1:</h2>

<code>&lt;txp:pro_mobile&gt; <br />
// Show mobile content here <br />
&lt;/txp:pro_mobile&gt;</code>

<h2>Option 2:</h2>

<p>Use as an if/else: </p>

<code>&lt;txp:pro_mobile&gt; <br />
// Mobile content here <br />
&lt;txp:else /&gt; <br />
// Regular content here <br />
&lt;/txp:pro_mobile&gt;</code>

<h2>Option 3:</h2>
<p>Define custom content per browser</p>
<code>&lt;txp:pro_if_mobile name="opera mini" &gt; <br />
You use opera mini, great browser! <br />
&lt;/txp:pro_if_mobile&gt;</code>

<p>Names available for you to use include: </p>

<ul>
<li>iphone</li>
<li>ipod</li>
<li>ipad</li>
<li>aspen</li>
<li>nexus</li>
<li>dream</li>
<li>android</li>
<li>cupcake</li>
<li>blackberry9500</li>
<li>blackberry9530</li>
<li>opera mini</li>
<li>webos</li>
<li>incognito</li>
<li>webmate</li>
</ul>

<h2>Option 4:</h2>
<p>Feel free to wrap tags!</p>

<code>

&lt;txp:pro_mobile&gt; <br />

Welcome mobile user!<br />

&lt;txp:pro_if_mobile name="opera mini"&gt; <br />

You use opera mini, great browser! <br />

&lt;/txp:pro_if_mobile&gt; <br />

&lt;txp:pro_if_mobile name="android"&gt; <br />

You use android, great browser! <br />

&lt;/txp:pro_if_mobile&gt; <br />

&lt;txp:else /&gt; <br />

// normal content <br />

&lt;/txp:pro_mobile&gt;

</code>

<p>Tested with Textpattern version: 4.4.1</p>
# --- END PLUGIN HELP ---
-->
<?php
}
?>