EzequielM-WP-Theme
==================

This is a responsive, touch & mobile compatible php bootstrap, Jquery Leaflet and Mapbox API based theme for Wordpress. Designed for any image driven blogin' experience. Optimized to show lots of images even in slow devices. 
Both front end theme and back end Admiin panel tools provided.

[photos.ezequielm.com](http://photos.ezequielm.com) wordpress theme. Read below for all the Features and roadmap!

Demo site (my site!) -> [**Here**](http://photos.ezequielm.com)

![My image](wp-content/themes/EzequielM/screenshotsPages.jpeg)


Version 2.0b:
------------------
changelog:
* Based on Bootstrap, JQuery, Leaflet and Mapbox
* improved performance for lower end devices
* admin control panel, posts quick edit, and bulk edit
* single post panel moved to the left
* replaced googleMaps with leaflet and opensource mapbox
* location breadcrumbs added to thumbnail mouse over
* better structured categories
* custom modified js leaftlet clusters to spiderfy thumbnails at a zoom level
* custom mapbox style



The theme features:
------------------
* responsive website
* mobile and touch compatible
* auto size and adjustments for desktop, tablet and mobiles
* top menu for main categories and pages
* customize layout from 1 to 12 photos per row, for each: desktop tabler and mobiles
* top fixed bar and footer, for related links, information, copyright, or even adds
* custom fields for:
  1. gps Coords
  2. thumbnail
  3. midRes
  4. HighRes (using leaflet)
  7. facebook og and twitte card tags
  8. copyrights, license and photo info credits

HELP NEEDED:
------------
After failing to find a nice image driven theme for wordpress to show my photos that would not look like every other theme. I started doing my own. Quickly it grew up into quite big enough project, with lots of features added over a period of one year and a half.
Now, I'm planning to extend it and making it more flexible for people to use it and customize, keeping it openSource, while retaining the original idea of the image driven blogging.

Feel like contributing? fork away!


Looking forward to hear from you!


To do:
------
* general House Keeping
* wordpress 100% compatible code needed
* search by color need better color picker, jquerys one?
* when pressing back on the browser, the rgb fields are correct, but picker gets resetted
* replace krpano for gigapan viz with mapbox or other opensource tool
* make
* get controls from inside wp-admin panel theme editor for:
  1. columns count for sm, md, lg
  2. thumbs size and ratio
  3. select the category to do breadcrumbs on mouse over
* bring comments back to the theme
* and probably a lot more

Quick setup on a existing wordpress:
--------------------------
Compatible with wordpress 3 to 3.9 and php versions 3 to 5.x

1. copy this entire repo to your wordpress folder
2. desired, create a new database for your wordpress photo blog
3. login to your wp-admin
4. go to themes and select the Eze theme
5. go to eze settings, and click on every save changes in the page to force the site and admin Options into the DB.
6. read below "testing" to quickly setup 1 image and view the theme.

Quick start up for coding on local environment:
--------------------------
Compatible with wordpress 3 to 3.9 and php versions 3 to 5.x

1. Install apache, mySql, php, and phpMyAdmin
2. activate apache's modRewrite module
3. change you home dir configuration (ie: /var/www/html) from override None to override All
4. if you are in a RedHat based distro (redhat, centos, or fedora), either configure SELinux properly or disable it.
4. copy this entire repo to your www root
5. from your ../wwwRootFolder do chown -R apache * to transfer the files ownership to the apache user. This will avoid wordpress to ask for an ftp password and having to setup an ftp server when uploading files or installing plugins
5. chown apache -r
4. set permissions as stated in wordpress codex
5. create your database in utf8-unicode
6. modify the wp-config.php to include you DB name, username, password, host,
7. login to your wp-admin
8. go to eze settings, and click on every save changes in the page to force the site and admin Options into the DB.

Testing:
--------

ca-dirtCart.jpg is supplied for testing purposes

1. create a post with a test title, and add "ca-dirtCart.jpg" (without quotes) to the small img, midRes, and highRes images. Set the lat and long coords to 13.61117537 and 106.49906158
8. create a second, a third and a forth post, with the same information.
9. open you http://localhost to see the them working
10. click on any of the images
11. When inside the post, click on the mid resolution image to see the left panel sliding in with the photo info, post content, highResolution link, gps coords with google maps thumbnail, and tags/categories the photo is included in.
12. You can also open http://localhost/world-map to see the picture tagged with a marker inside the map, click on it to see the facebook thumbnail, and click on the thumbnail to go to the post.
