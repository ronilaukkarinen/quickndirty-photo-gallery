## Quick & dirty photo gallery

Fast and hassle-free way to display a photo gallery - *just one PHP file to a web server and that's it!*

## [Demo](https://rolle.wtf/quickndirty-photo-gallery/)

![Screenshot](https://rolle.wtf/quickndirty-photo-gallery.png "Screenshot")

## Background story

I often need to show quickly some photos to my friends and wouldn't like to hassle with Dropbox or Google Photo sharing all the time. It's often just easier to move folder to a sshfs-mounted remote folder and that's it. 

But wait, nginx doesn't have any directory listing... what was that 2000s-era one-file-php gallery? oh, but it was really ugly. I have to create one of my own, with more options while still retaining the simplicity. And so quick 'n dirty gallery was born.

## Features 

- Automatic thumbnail generation
- Responsive columns
- Masonry and full photo layouts
- Paging

## Requirements

- Apache or NGINX webserver
- PHP or HHVM
- php-imagick module

## Usage

1. Copy or clone index.php
2. Transfer index.php to a directory with images
3. That's it!

## Options

- `$gallerytitle` - The title of your gallery, goes to `<title>` tag
- `$layout` - Choose between `masonry` grid layout, or `full`. Full stacks the photos 100% full width.
- `$pics_per_page` - How many pictures to show per page
- `$starting_page` - If `$pics_per_page` is less than photo amount, which page to start the gallery when entering index
- `$columns_desktop` - How many columns to show on big screens. Applies only to masonry layout.
- `$columns_ipad` - How many columns to show on iPad screen. Applies only to masonry layout.