=== MP Stacks + Slider ===
Contributors: johnstonphilip
Donate link: http://mintplugins.com/
Tags: message bar, header
Requires at least: 3.5
Tested up to: 4.4
Stable tag: 1.0.1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Show an image/video slider on any page, at any time, anywhere on your website. Just put make a brick using “MP Stacks”, put the stack on a page, and set the brick’s Content-Type to be “Slider”.

== Description ==

Show an image/video slider on any page, at any time, anywhere on your website. Just put make a brick using “MP Stacks”, put the stack on a page, and set the brick’s Content-Type to be “Slider”.

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the 'mp-stacks-slider’ folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Build Bricks under the “Stacks and Bricks” menu. 
4. Publish your bricks into a “Stack”.
5. Put Stacks on pages using the shortcode or the “Add Stack” button.

== Frequently Asked Questions ==

See full instructions at http://mintplugins.com/doc/mp-stacks

== Screenshots ==


== Changelog ==

= 1.0.1.1 = November 26, 2020
* Add alt text support to slider images.

= 1.0.1.0 = January 6, 2016
* Update FlexSlider to 2.6.0
* Temporarily set all sliders to fade mode until responsive slide issue is resolved.

= 1.0.0.9 = December 30, 2015
* Make sure that the images in the slider with links don't get the opacity settings that the navigation dots do.

= 1.0.0.8 = November 11, 2015
* Added the ability for each slide to have its own link complete with Open Types including Lightboxes at custom sizes.

= 1.0.0.7 = September 17, 2015
* Removed "inline-block" from flex-control-nav li 
* Brick Metabox controls now load using ajax.
* Admin Metabox Scripts now enqueued only when needed.
* CSS Change: "width:100%" added for #mp-stacks-slider-container-' . $post_id . ' and #mp-stacks-image-slides-' . $post_id . ' .mp-core-oembed-full-width-img
* Front End Scripts now enqueued only when needed.

= 1.0.0.6 = March 18, 2015
* Enable slideshow upon window.load - this way the page is loaded properly before the slider is made visible.

= 1.0.0.5 = March 7, 2015
* Made sure to remove all margins on ul and li objects in the slider.

= 1.0.0.4 = February 1, 2015
* Better meta description for slider height.

= 1.0.0.3 = January 5, 2015
* Fixed bug with accidental dependancy on MP Stacks + Gallery.
* Better reset values for meta options.
* Better Image Cropping.

= 1.0.0.2 = September 18, 2014
* Changed update files to work properly with licensing

= 1.0.0.1 = July 24, 2014
* Fixed utility code page for mp-stacks-developer from “Image Slider” to just “Slider”
* Better CSS positioning for navigation dots

= 1.0.0.0 = June 7, 2014
* Original release
