<?php



/**
*	Setup Theme post custom fields
**/
include (TEMPLATEPATH . "/lib/theme-post-custom-fields.php");


//Get custom function
include (TEMPLATEPATH . "/lib/custom.lib.php");


//Get custom shortcode
include (TEMPLATEPATH . "/lib/shortcode.lib.php");


/**
*	Setup Menu
**/
include (TEMPLATEPATH . "/lib/menu.lib.php");
    

/*
	Begin creating admin optinos
*/

$themename = "Eze";
$shortname = "eze";

$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array(
	0		=> "Choose a category"
);
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}

$pages = get_pages(array('parent' => 0));
$wp_pages = array(
	0		=> "Choose a page"
);
foreach ($pages as $page_list ) {
       $wp_pages[$page_list->ID] = $page_list->post_title;
}

$eze_handle = opendir(TEMPLATEPATH.'/css/skins');
$eze_seze_arr = array();

while (false!==($eze_file = readdir($eze_handle))) {
	if ($eze_file != "." && $eze_file != ".." && $eze_file != ".DS_Store") {
		$eze_file_name = basename($eze_file, '.css');
		$eze_name = str_replace('_', ' ', $eze_file_name);

		$eze_seze_arr[$eze_file_name] = $eze_name;
	}
}
closedir($eze_handle);
asort($eze_seze_arr);


$options = array (
 
//Begin admin header
array( 
		"name" => $themename." Options",
		"type" => "title"
),
//End admin header
 

//Begin first tab "General"
array( 
		"name" => "General",
		"type" => "section"
)
,

array( "type" => "open"),

array( "name" => "Skins",
	"desc" => "Select the css file for the theme, to customize it just duplicate the css file, rename it and tweak inside. The file also contains the google maps style colors and the countries to highlight list",
	"id" => $shortname."_skin",
	"type" => "select",
	"options" => $eze_seze_arr,
	"std" => "white"
),

array( "name" => "Your Logo (Image URL)",
	"desc" => "put the logo in your media folder",
	"id" => $shortname."_logo",
	"type" => "text",
	"std" => "logo.png",
),
array( "name" => "Google Analytics Domain ID ",
	"desc" => "Get analytics on your site. Simply give us your Google Analytics Domain ID (something like UA-123456-1)",
	"id" => $shortname."_ga_id",
	"type" => "text",
	"std" => ""

),
array( "name" => "Custom Favicon",
	"desc" => "A favicon is a 16x16 pixel icon that represents your site; paste the URL to a .ico image that you want to use as the image, put it inside the media folder",
	"id" => $shortname."_favicon",
	"type" => "text",
	"std" => "favIcon.png",
),
array( "name" => "Custom Facebook Thumb",
	"desc" => "facebook image to appear in likes and shares, put it inside the media folder",
	"id" => $shortname."_fbThumb",
	"type" => "text",
	"std" => "fbThumb.png",
),
	
array( "type" => "close"),
//End first tab "General"

//Begin fourth tab "Homepage"
array( "name" => "Homepage",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Homepage category",
	"desc" => "Choose a category from which content show on Homepage",
	"id" => $shortname."_home_cat",
	"type" => "select",
	"options" => $wp_cats,
	"std" => "Choose a category"
),
array( "type" => "close"),
//End fourth tab "Homepage"


//Begin second tab "Gallery"
array( "name" => "Gallery",
	"type" => "section"),
array( "type" => "open"),
    
array( "name" => "gallery orient",
	"desc" => "horizontal or vertical",
	"id" => $shortname."_galleryOrient",
	"type" => "text",
	"std" => "horizontal"

),
array( "name" => "show left categories off-Canvas",
	"desc" => "yes or no",
	"id" => $shortname."_showLeftCatList",
	"type" => "text",
	"std" => "yes"

),
array( "name" => "Gallery image width (in pixels)",
	"desc" => "Enter number of width for Gallery image",
	"id" => $shortname."_gallery_width",
	"type" => "text",
	"size" => "40px",
	"std" => "74",
),
array( "name" => "Gallery image height (in pixels)",
	"desc" => "Enter number of height for Gallery image",
	"id" => $shortname."_gallery_height",
	"type" => "text",
	"size" => "40px",
	"std" => "190",
)
,array( "name" => "media Folder",
	"desc" => "root folder for all the media",
	"id" => $shortname."_mediaRoot",
	"type" => "text",
	"std" => "_media",
)
,array( "name" => "high resolution folder",
	"desc" => "high resolution folder",
	"id" => $shortname."_highRes",
	"type" => "text",
	"std" => "highRes",
)
,array( "name" => "mid resolution folder",
	"desc" => "mid resolution folder",
	"id" => $shortname."_midRes",
	"type" => "text",
	"std" => "midRes",
)
,array( "name" => "thumbs folder",
	"desc" => "thumbs folder",
	"id" => $shortname."_thumbs",
	"type" => "text",
	"std" => "thumbs",
)
,array( "name" => "facebook thumbs folder",
	"desc" => "facebook thumbs folder",
	"id" => $shortname."_fbThumbs",
	"type" => "text",
	"std" => "fbThumbs",
),


array( "type" => "close"),
//End second tab "Gallery"


//Begin second tab "Blog"
array( "name" => "Blog",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Choose page for blog",
	"desc" => "Choose a page from which your blog posts to display",
	"id" => $shortname."_blog_page",
	"type" => "select",
	"options" => $wp_pages,
	"std" => "Choose a page"),

array( "name" => "Blog category",
	"desc" => "Choose a category from which content show as Blog posts",
	"id" => $shortname."_blog_cat",
	"type" => "select",
	"options" => $wp_cats,
	"std" => "Choose a category"
),
array( "type" => "close"),
//End second tab "Blog"


//Begin fourth tab "Contact"
array( "name" => "Contact",
	"type" => "section"),
array( "type" => "open"),
	
array( "name" => "Choose page for contact form",
	"desc" => "Choose a page from which your contact form to display",
	"id" => $shortname."_contact_page",
	"type" => "select",
	"options" => $wp_pages,
	"std" => "Choose a page"),
array( "name" => "Your email address",
	"desc" => "Enter which email address will be sent from contact form",
	"id" => $shortname."_contact_email",
	"type" => "text",
	"std" => ""

),
//End fourth tab "Contact"

//Begin fifth tab "top bar, Posts options, Footer & Maps"
array( "type" => "close"),
array( "name" => "TopBar, Posts options, Footer & Maps",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Footer text",
	"desc" => "Enter footer text ex. copyright description",
	"id" => $shortname."_footer_text",
	"type" => "textarea",
	"std" => ""),
array( "name" => "topBar Text",
	"desc" => "Enter the top bar text or html to insert",
	"id" => $shortname."_topBar_text",
	"type" => "textarea",
	"std" => ""),    
array( "name" => "show Credits",
	"desc" => "show or hide credits fieldfrom post",
	"id" => $shortname."_showCredits",
	"type" => "text",
	"std" => "yes"

),
array( "name" => "show exif Info",
	"desc" => "show or hide exif info taken from the image file",
	"id" => $shortname."_showExif",
	"type" => "text",
	"std" => "yes"

),
array( "name" => "show post content",
	"desc" => "show or hide the post content",
	"id" => $shortname."_showContent",
	"type" => "text",
	"std" => "yes"

),
array( "name" => "google Maps Skins",
	"desc" => "Select the skin for the world-map page",
	"id" => $shortname."_skin",
	"type" => "select",
	"options" => $eze_seze_arr,
	"std" => "white"
),


    
//End fifth tab "Footer"

 
array( "type" => "close")
 
);


function eze_add_admin() {
 
global $themename, $shortname, $options;
 
if ( isset($_GET['page']) && $_GET['page'] == basename(__FILE__) ) {
 
	if ( isset($_REQUEST['action']) && 'save' == $_REQUEST['action'] ) {
 
		foreach ($options as $value) 
		{
			update_option( $value['id'], $_REQUEST[ $value['id'] ] );
		}
 
foreach ($options as $value) {
	if( isset( $_REQUEST[ $value['id'] ] ) ) { 
		if($value['id'] != $shortname."_sidebar0")
		{
			update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); 
		}
		elseif(isset($_REQUEST[ $value['id'] ]) && !empty($_REQUEST[ $value['id'] ]))
		{
			//get last sidebar serialize array
			$current_sidebar = get_option($shortname."_sidebar");
			$current_sidebar[ $_REQUEST[ $value['id'] ] ] = $_REQUEST[ $value['id'] ];

			update_option( $shortname."_sidebar", $current_sidebar );
		}
	} 
	else 
	{ 
		delete_option( $value['id'] ); 
	} 
}

 
	header("Location: admin.php?page=functions.php&saved=true");
 
} 
else if( isset($_REQUEST['action']) && 'reset' == $_REQUEST['action'] ) {
 
	foreach ($options as $value) {
		delete_option( $value['id'] ); }
 
	header("Location: admin.php?page=functions.php&reset=true");
 
}
}
 
add_menu_page($themename, $themename, 'administrator', basename(__FILE__), 'eze_admin');
}

function eze_add_init() {

$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/functions/functions.css", false, "1.0", "all");
wp_enqueue_script("rm_script", $file_dir."/functions/rm_script.js", false, "1.0");

}
function eze_admin() {
 
global $themename, $shortname, $options;
$i=0;
 
if ( isset($_REQUEST['saved']) &&  $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( isset($_REQUEST['reset']) &&  $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
 
?>
	<div class="wrap rm_wrap">
	<h2><?php echo $themename; ?> Settings</h2>

	<div class="rm_opts">
	<form method="post"><?php foreach ($options as $value) {
switch ( $value['type'] ) {
 
case "open":
?> <?php break;
 
case "close":
?>
	
	</div>
	</div>
	<br />


	<?php break;
 
case "title":
?>
	<br />


<?php break;
 
case 'text':
	
	//if sidebar input then not show default value
	if($value['id'] != $shortname."_sidebar0")
	{
		$default_val = get_settings( $value['id'] );
	}
	else
	{
		$default_val = '';	
	}
?>

	<div class="rm_input rm_text"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	<input name="<?php echo $value['id']; ?>"
		id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>"
		value="<?php if ($default_val != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>"
		<?php if(!empty($value['size'])) { echo 'style="width:'.$value['size'].'"'; } ?> />
		<small><?php echo $value['desc']; ?></small>
	<div class="clearfix"></div>
	
	<?php
	if($value['id'] == $shortname."_sidebar0")
	{
		$current_sidebar = get_option($shortname."_sidebar");
		
		if(!empty($current_sidebar))
		{
	?>
		<ul id="current_sidebar" class="rm_list">

	<?php
		foreach($current_sidebar as $sidebar)
		{
	?> 
			
			<li id="<?=$sidebar?>"><?=$sidebar?> ( <a href="/wp-admin/admin.php?page=functions.php" class="sidebar_del" rel="<?=$sidebar?>">Delete</a> )</li>
	
	<?php
		}
	?>
	
		</ul>
	
	<?php
		}
	}
	?>

	</div>
	<?php
break;

case 'password':
?>

	<div class="rm_input rm_text"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	<input name="<?php echo $value['id']; ?>"
		id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>"
		value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>"
		<?php if(!empty($value['size'])) { echo 'style="width:'.$value['size'].'"'; } ?> />
	<small><?php echo $value['desc']; ?></small>
	<div class="clearfix"></div>

	</div>
	<?php
break;
 
case 'textarea':
?>

	<div class="rm_input rm_textarea"><label
		for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	<textarea name="<?php echo $value['id']; ?>"
		type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
	<small><?php echo $value['desc']; ?></small>
	<div class="clearfix"></div>

	</div>

	<?php
break;
 
case 'select':
?>

	<div class="rm_input rm_select"><label
		for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

	<select name="<?php echo $value['id']; ?>"
		id="<?php echo $value['id']; ?>">
		<?php foreach ($value['options'] as $key => $option) { ?>
		<option
		<?php if (get_settings( $value['id'] ) == $key) { echo 'selected="selected"'; } ?>
			value="<?php echo $key; ?>"><?php echo $option; ?></option>
		<?php } ?>
	</select> <small><?php echo $value['desc']; ?></small>
	<div class="clearfix"></div>
	</div>
	<?php
break;
 
case "checkbox":
?>

	<div class="rm_input rm_checkbox"><label
		for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

	<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
	<input type="checkbox" name="<?php echo $value['id']; ?>"
		id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />


	<small><?php echo $value['desc']; ?></small>
	<div class="clearfix"></div>
	</div>
	<?php break; 
case "section":

$i++;

?>

	<div class="rm_section">
	<div class="rm_title">
	<h3><img
		src="<?php bloginfo('template_directory')?>/functions/images/trans.png"
		class="inactive" alt="""><?php echo $value['name']; ?></h3>
	<span class="submit"><input name="save<?php echo $i; ?>" type="submit"
		value="Save changes" /> </span>
	<div class="clearfix"></div>
	</div>
	<div class="rm_options"><?php break;
 
}
}
?> <input type="hidden" name="action" value="save" />
	</form>
	<form method="post"><!-- p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p --></form>
	</div>


	<?php
}

add_action('admin_init', 'eze_add_init');
add_action('admin_menu', 'eze_add_admin');

/*
	End creating admin options
*/

//Make widget support shortcode
add_filter('widget_text', 'do_shortcode');
?>
