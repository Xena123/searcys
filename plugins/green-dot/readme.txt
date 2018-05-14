=== Fanatic Green Dot ===
Contributors: patrikniebur, goffstock
Author URI: http://www.fanaticdesign.co.uk
Plugin URI: http://www.fanaticdesign.co.uk
Tested up to: 4.7.5

Adds editable content blocks with user friendly green dots for easy editing

== Description ==
Adds editable content blocks with user friendly green dots for easy editing

== Installation ==
Installing this plugin adds four new post types to your Wordpress site: Blocks, Nuggets, Single Lines, and Image Blocks. These post types can be turned on or off via the plugin settings found at settings/fanatic setup.

= Creating a New Fanatic Block

New Fanatic blocks are created using the fanaticBlock() function:

fanaticBlock( $embed, $style="", $count=1, $type="block", $addButton=false )
* $embed (string)	Unique identification for connecting content to a area on a page (e.g. $post->ID . "random_string")
* $style (string)	Style of displayed blocks(required)
* $count (int)	Number of blocks to be returned
* $type  (string)	Post type: gd_block, gd_single_line, gd_nugget, gd_image
* $addButton (bool) Show '+' button to add additional blocks when actual blocks < $count

= Creating Fanatic Block Template

The $style argument needs to match the name of a file in plugins/green_dot/templates/.  This file contains the php & html needed to generate the content displayed on the page.

For instance, if you had a block called social icon, you could use fanaticBlock( 'social-' . $post->ID, social_icon, 5, 'block', true ) and create a file called plugins/green_dot/templates/social_icon.php.

= Adding a front-end edit block button

You can add the edit icon to any block or content area by using the function gd_insertEdit();

== Changelog ==
= v1.0 (17 May 2017) =
* Merged Fanatic Blocks plugin into Green Dot plugin
* Added add block Button argument to fanaticBlock() function
* Added logic for when to display add block Button
