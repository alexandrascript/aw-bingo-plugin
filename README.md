# README #

The Bingo Card Plugin was created for WordPress 4.8 and above. The plugin is powered by vanilla JavaScript and CSS, no additional libraries required.

**Warning**: installing WordPress's <a href="https://jetpack.com">Jetpack plugin</a> has been known to cause errors. This plugin may have conflicts and not work as expected.

### What is this repository for?

* This plugin is for implementing bingo cards on WordPress posts and custom post types.
* Version 1.1

### Required assets

For each Bingo board you should have the following images:

* 24 or more "bingo cards" uploaded directly to your post. These should be square images, either JPG or PNG. I recommend size 150px x 150px.
* 1 free space image. This should be the same size as the bingo cards.
* 1 bingo header image, width 650px
* 3 winner images. Recommended size 500px x 300px


There are now demo images available in the folder `/demo`. Upload the images in `/demo/bingo-cards` directly to your WordPress post. The other images should be uploaded directly to the Media gallery.

### Instructions

1. Upload the Bingo Plugin on your WordPress installation.
1. Activate the plugin.
1. Create a post and add the two shortcodes `[bingocard]` `[bingo_gallery]`
   + If using the Gutenberg editor, you must use the **Shortcode** block to insert the shortcodes. Please include two separate blocks, so each shortcode has its own.
   + If using the Classic editor, add the two shortcodes with a break in between them.
1. Upload at least 24 images for Bingo directly to your post. Images should be square.
   + If using the Gutenberg editor, add an image block and click the **Media Library** button.
   + If using the Classic editor, click the **Add Media** button above the WYSIWYG.
   + DO NOT include the featured image, free space image, or winner images. DO NOT upload any images directly to the post that you do not want in rotation on the bingo card.
1. Upload the remaining images (free space, winner cards, featured post image, etc) directly to the Media Library. DO NOT attach those images to the post.
1. Go to Settings > Bingo Card Settings
1. Add the post ID for your bingo card will to "Bingo Card 1 Post ID".
1. (Optional) add a header image URL to your bingo card. If this step is not completed, a default image will be used.
1. Add the free space image URL for Card 1. If this step is not completed, a default image will be used.
1. Add winner card image URLs to be used for social media sharing.
1. Save the settings.

Repeat these steps for up to three posts.

### About the author

Alexandra White is an occasional WordPress developer, who built this plugin while working at WNET.

[![ko-fi](https://www.ko-fi.com/img/githubbutton_sm.svg)](https://ko-fi.com/A244AFZ)
