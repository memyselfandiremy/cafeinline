=== Gallery Custom Links ===
Contributors: TigrouMeow
Tags: custom, links, gallery, gutenberg
Requires at least: 4.9
Tested up to: 5.0
Stable tag: 1.0.7

Gallery Custom Links allows you to link images from galleries to a specified URL. Tested with WordPress Gallery, Gutenberg, the Meow Gallery and others.

== Description ==

Gallery Custom Links allows you to link images from galleries to a specified URL. Tested with WordPress Gallery, Gutenberg, the Meow Gallery and others. The official page is here: [Gallery Custom Links](https://meowapps.com/plugin/gallery-custom-links/).

=== Usage ===

Two fields are added to your images, in your Media Library: Link URL and Link Target. If, at least, the Link URL is set up, this image will link to that URL every time it is used within a gallery. Lightbox will be automatically disabled for those images.

=== Compatibility ===

It currently works with the native WP Gallery, the Gutenberg Gallery, and the [Meow Gallery](https://wordpress.org/plugins/meow-gallery/). It should actually work with any gallery plugin using the 'gallery' class and Responsive Images (src-set). Let me know if you would like more galleries to be supported, it should be easy.

=== Filters ===

You can optimize (run the plugin only on the pages where you need it) and support more galleries (through CSS classes) easily by using filters. To know more about this, visit the official page, here: [Gallery Custom Links](https://meowapps.com/plugin/gallery-custom-links/).

=== Thanks ===

The motivation to build this plugin came from my users who had issues trying to use WP Gallery Custom Links. I realized that this plugin was working extremely well with the standard gallery, but would require too much rewriting for Gutenberg and other galleries, hence the creation of this plugin. I hope it will help.

Languages: English.

== Installation ==

1. Upload `gallery-custom-links` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Upgrade Notice ==

Replace all the files. Nothing else to do.

== Changelog ==

= 1.0.7 =
* Update: Not using OB anymore; going through the content filter (this behavior can be changed internally), better and faster this way.
* Fix: Avoid issues with static variables which are not registered on older PHP versions.

= 1.0.6 =
* Fix: Now works with the most tenacious lightboxes.
* Update: The way the HTML was modified to make sure it is compliant.

= 1.0.5 =
* Add: Filter to let the user enables/disables the plugin depending on conditions. Check the official page to know more about this: [Gallery Custom Links](https://meowapps.com/plugin/gallery-custom-links/).

= 1.0.4 =
* Fix: Support images embedded in a few layer of tags before the link tag.
* Add: Added a class on the a-tag, for the ones who would like to add some styling to linked images. The Meow Lightbox is already handling this, by avoiding showing a zoom cursor when hovering images.
* Add: Compatibility with extra galleries is made through a filter (which anybody can use) and the file mgcl_extra.php.
* Info: If you like the plugin, your reviews are welcome [here](https://wordpress.org/support/plugin/gallery-custom-links/reviews/?rate=5#new-post. ) :) Thank you!

= 1.0.2 =
* Fix: Now works with thumbnails in src.
* Update: Optimization (does not regenerate pages which aren't impacted by changes).
* Update: DiDom from 1.13 to 1.14.1.

= 1.0.0 =
* Update: If the ID of the Media is not found in the HTML, it will resolve it through the DB from the filename.

= 0.0.1 =
* First release.

== Screenshots ==

1. The fields.
