=== theme-tweak ===
Contributors: Keep2theCode
Donate link: http://keep2thecode.fether.net
Tags: style, css, customize, icons
Requires at least: 3.3
Tested up to: 3.5
Stable tag: 2.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Do minor changes to any theme styling, and easily display site images: logo, favicon, smartphone icon, and sharing icon.

== Description ==
IMPORTANT: If you are updating this plugin from an older version, be sure to have backups of any stylesheets or icons, because you will need to re-upload them via the new form.

This plugin allows you to "tweak" or do minor overrides to the style for any theme, much like a child theme. But it also makes it easy to show images for your site's logo, url, smartphone bookmark, and social sharing at sites such as Facebook.

For styles, first create a style sheet for the theme you want to adjust. For example, if you have a theme called soverycool, you might name your style sheet soverycool.css. Your file only needs to contain those style elements you'd like to change.

Next, upload it via the Upload File form. Once your file is uploaded, just insert its name into the css filename box and press Set Style. If you have several themes, you can keep all of your custom style sheets in that directory as long as they have different names. Then just enter the name for whichever theme you're using at the time.

To stop using your custom style, just remove the name from the css filename box and press Set Style. You do not need to actually delete your files from the uploads directory.

For icons, upload them via the Upload File form and repeat for each icon. The names have to be favicon.ico, phone.png, share.png, and logo.png. Changing them is as easy as uploading new files with the same name. For your site logo to appear, the following code needs to be added to your theme's header in the place you want it to appear: `<?php thtw_logo(); ?>`

== Installation ==

1. Upload `theme-tweak` to the `/wp-content/plugins/` directory
2. Create any style sheets and/or icons you may have for your themes.
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Go to Settings and choose Theme Tweak
5. If you have a custom style sheet, enter the name of your style sheet and press the Set Style button, then upload it via the Upload File form.
6. If you have custom images, upload them one at a time via the Upload File form.

== Frequently Asked Questions ==

= I am upgrading from an earlier version, will my old files still work? =

You will need to upload all those files again, this time via the forms on the Theme Tweak Settings page. The style sheet name should still be set from before, if you used that.

= Is it important how I name the files? =

For styles, only the extension (.css) matters, but it would be a good idea to name the file after the theme it overrides. For icons, they must be named exactly as shown in the Description. 

= What are those icon files anyway? =
The favicon.ico file is the site url image that appears in the address bar of your browser. There are free services online where you can create your own, and tutorials for making it with whatever graphics program you may have. It can't just be .png or .jpg and renamed, but must be created as an .ico file. 

The phone.png image is what will appear if someone bookmarks your site via their smartphone. The size isn't critical, though roughly square is ideal, but it has to be a .png file.

The share.png image also has to be a .png file, but beyond that you can make it any shape or size. This icon is what will appear if someone shares a post from your blog on a site such as Facebook, rather than picking the first image it sees. Facebook recommends an image that is at least 200px at its minimum dimension.

The logo.png image must be a .png file as well, and like the other images, it will only appear if the file is uploaded. This one requires code added to the header.php file of your theme where you want it to appear: `<?php thtw_logo(); ?>`

== Screenshots ==

1. Theme Tweak Options page


== Changelog ==

= 2.0 =
* Added functionality for form-based file uploads rather than manual uploads via FTP. The uploads directory replaces the styles and icons directories, so all files will need to be uploaded anew. This is separate from the WordPress media uploader.

= 1.6 =
* Added functionality for site logo, changed required names for some images.

= 1.5 =
* Added functionality for favicon, smartphone icon, and sharing icon.

= 1.0 =
* Initial release

== Upgrade Notice ==

2.0 Added functionality for form-based file uploads rather than manual uploads via FTP. The uploads directory replaces the styles and icons directories, so all files will need to be uploaded anew. This is separate from the WordPress media uploader.
