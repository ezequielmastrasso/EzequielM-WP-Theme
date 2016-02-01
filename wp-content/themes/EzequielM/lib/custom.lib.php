<?php
/**
*	Custom function to get current URL
**/
function curPageURL() {
 	$pageURL = 'http';
 	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 	$pageURL .= "://";
 	if ($_SERVER["SERVER_PORT"] != "80") {
 	 $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 	} else {
 	 $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 	}
 	return $pageURL;
}
    
function eze_debug($arr)
{
	echo '<pre>';
	print_r($arr);
	echo '</pre>';
}

function gen_pagination($total,$currentPage,$baseLink,$nextPrev=true,$limit=10) 
{ 
    if(!$total OR !$currentPage OR !$baseLink) 
    { 
        return false; 
    } 

    //Total Number of pages 
    $totalPages = ceil($total/$limit); 
     
    //Text to use after number of pages 
    //$txtPagesAfter = ($totalPages==1)? " page": " pages"; 
     
    //Start off the list. 
    //$txtPageList = '<br />'.$totalPages.$txtPagesAfter.' : <br />'; 
     
    //Show only 3 pages before current page(so that we don't have too many pages) 
    $min = ($page - 3 < $totalPages && $currentPage-3 > 0) ? $currentPage-3 : 1; 
     
    //Show only 3 pages after current page(so that we don't have too many pages) 
    $max = ($page + 3 > $totalPages) ? $totalPages : $currentPage+3; 
     
    //Variable for the actual page links 
    $pageLinks = ""; 
     
    //Loop to generate the page links 
    for($i=$min;$i<=$max;$i++) 
    { 
        if($currentPage==$i) 
        { 
            //Current Page 
            $pageLinks .= '<a href="#" class="active">'.$i.'</a>';  
        } 
        elseif($max <= $totalPages OR $i <= $totalPages) 
        { 
            $pageLinks .= '<a href="'.$baseLink.'&page='.$i.'" class="slide">'.$i.'</a>'; 
        } 
    } 
     
    if($nextPrev) 
    { 
        //Next and previous links 
        $next = ($currentPage + 1 > $totalPages) ? false : '<a href="'.$baseLink.'&page='.($currentPage + 1).'" class="slide">Next</a>'; 
         
        $prev = ($currentPage - 1 <= 0 ) ? false : '<a href="'.$baseLink.'&page='.($currentPage - 1).'" class="slide">Previous</a>'; 
    } 
     
    if($totalPages > 1)
    {
    	return '<br class="clear"/><div class="pagination">'.$txtPageList.$prev.$pageLinks.$next.'</div>'; 
    }
    else
    {
    	return '';
    }
     
} 

function count_shortcode($content = '')
{
	$return = array();
	
	if(!empty($content))
	{
		$pattern = get_shortcode_regex();
    	$count = preg_match_all('/'.$pattern.'/s', $content, $matches);
    	
    	$return['total'] = $count;
    	
    	if(isset($matches[0]))
    	{
    		foreach($matches[0] as $match)
    		{
    			$return['content'][] = substr_replace($match ,"",-1);
    		}
    	}
	}
	
	return $return;
}

function eze_breadcrumbs() {
 
  $delimiter = '&raquo;';
  $name = 'Home'; //text for the 'Home' link
  $currentBefore = '<span class="current">';
  $currentAfter = '</span>';
 
  if ( !is_home() && !is_front_page() || is_paged() ) {
 
    echo '<div id="crumbs">';
 
    global $post;
    $home = get_bloginfo('url');
    echo '<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $currentBefore . 'Archive by category &#39;';
      single_cat_title();
      echo '&#39;' . $currentAfter;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('d') . $currentAfter;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('F') . $currentAfter;
 
    } elseif ( is_year() ) {
      echo $currentBefore . get_the_time('Y') . $currentAfter;
 
    } elseif ( is_single() && !is_attachment() ) {
      $cat = get_the_category(); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_search() ) {
      echo $currentBefore . 'Search results for &#39;' . get_search_query() . '&#39;' . $currentAfter;
 
    } elseif ( is_tag() ) {
      echo $currentBefore . 'Posts tagged &#39;';
      single_tag_title();
      echo '&#39;' . $currentAfter;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $currentBefore . 'Articles posted by ' . $userdata->display_name . $currentAfter;
 
    } elseif ( is_404() ) {
      echo $currentBefore . 'Error 404' . $currentAfter;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
  }
}
    
/**
*	Setup blog comment style
**/
function eze_comment($comment, $args, $depth) 
{
	$GLOBALS['comment'] = $comment; ?>
   
	<div class="comment" id="comment-<?php comment_ID() ?>">
		<div class="left">
         	<?php echo get_avatar($comment,$size='50',$default='<path_to_url>' ); ?>
      	</div>
      

      	<div class="right">
			<?php if ($comment->comment_approved == '0') : ?>
         		<em><?php _e('(Your comment is awaiting moderation.)') ?></em>
         		<br />
      		<?php endif; ?>
			
      		<?php comment_text() ?>
      		<p class="comment-reply-link"><?php comment_reply_link(array_merge( $args, array('depth' => $depth,
'reply_text' => '
Reply', 'login_text' => 'Log in to reply to this', 'max_depth' => $args['max_depth']))) ?></p>

      	</div>
    </div>
<?php
}


function eze_twitter($echo = TRUE)
{
	include("twitter.lib.php");
	$cache_path = TEMPLATEPATH."/cache/";
	$tweets_cache = $cache_path."twitter.txt";
	
	if(!is_dir($cache_path))
	{
		mkdir($cache_path);
	}
	
	//if read from cache if file more than 60 minutes cache
	if(file_exists($tweets_cache) && (time()-filemtime($tweets_cache) < 3600))
	{
		$timeline = simplexml_load_file($tweets_cache);
	}
	//if get from twitter
	else
	{
		//Get twitter username and password
		$username = get_option('png_twitter_username');
		$password = get_option('png_twitter_password');
		
		$twitter = new Twitter($username, $password);
		eze_debug($twitter);
		
		// This array is passed into getMentions, for this example we will pass a blank array
		// Options can include: page, count, since_id, max_id
		$arrOptions = Array('count' => 5);
		
		$timeline = $twitter->getUserTimeline($arrOptions);
		eze_debug($timeline);
		echo $twitter->last_api_call;
	
		if(is_dir(TEMPLATEPATH.'/cache'))
		{
			// Open the file and erase the contents if any
			$fp = fopen($tweets_cache, "w");
				
			// Write the data to the file
			fwrite($fp, $timeline);
				
				
			// Close the file
			fclose($fp);
				
		}
		
		// Convert the xml document into an array
		$timeline = simplexml_load_string($timeline);
	}

	$return_html = '';
	
	if(isset($timeline->status) && !empty($timeline->status))
	{
		
		$return_html.= '<ul class="posts twitter">';
	
	
		foreach($timeline->status as $status)
		{ 
	
			$return_html.= '<li>';
			$return_html.= '<a href="http://twitter.com/'.$username.'/status/'.$status->id.'">'.$status->text.'</a> '.eze_ago(strtotime($status->created_at));
			$return_html.= '</li>';
	
		}
	
		$return_html.= '</ul>';
	

	}
	
	if($echo)
	{
		echo $return_html;
	}
	else
	{
		return $return_html;
	}
}


function eze_ago($timestamp){
   $difference = time() - $timestamp;
   $periods = array("second", "minute", "hour", "day", "week", "month", "years", "decade");
   $lengths = array("60","60","24","7","4.35","12","10");
   for($j = 0; $difference >= $lengths[$j]; $j++)
   $difference /= $lengths[$j];
   $difference = round($difference);
   if($difference != 1) $periods[$j].= "s";
   $text = "$difference $periods[$j] ago";
   return $text;
}


// Substring without losing word meaning and
// tiny words (length 3 by default) are included on the result.
// "..." is added if result do not reach original string length

function eze_substr($str, $length, $minword = 3)
{
    $sub = '';
    $len = 0;
    
    foreach (explode(' ', $str) as $word)
    {
        $part = (($sub != '') ? ' ' : '') . $word;
        $sub .= $part;
        $len += strlen($part);
        
        if (strlen($word) > $minword && strlen($sub) >= $length)
        {
            break;
        }
    }
    
    return $sub . (($len < strlen($str)) ? '...' : '');
}


/**
*	Setup recent posts widget
**/
function eze_posts($sort = 'recent', $echo = TRUE) 
{
	$png_blog_cat = get_option('png_blog_cat'); 
	$return_html = '';
	
	if($sort == 'recent')
	{
		$posts = get_posts('numberposts=3&order=DESC&orderby=date&category='.$png_blog_cat);
		$title = 'Recent Posts';
	}
	else
	{
		global $wpdb;
		
		$query = "SELECT ID, post_title, post_content FROM {$wpdb->posts} p ";
		$query.= "LEFT OUTER JOIN wp_term_relationships r ON r.object_id = p.ID ";
		$query.= "LEFT OUTER JOIN wp_terms t ON t.term_id = r.term_taxonomy_id WHERE t.term_id = ".$png_blog_cat." AND p.post_type = 'post' ";
		$query.= "ORDER BY p.comment_count DESC LIMIT 0,3";
		
		$posts = $wpdb->get_results($query);
		$title = 'Popular Posts';
	}
	
	if(!empty($posts))
	{

		$return_html.= '<h2 class="widgettitle">'.$title.'</h2>';
		$return_html.= '<ul class="posts blog">';

			foreach($posts as $post)
			{
				$image_thumb = get_post_meta($post->ID, 'blog_thumb_image_url', true);
				$return_html.= '<li><img src="'.get_bloginfo( 'stylesheet_directory' ).'/timthumb.php?src='.$image_thumb.'&h=75&w=75&zc=1" alt="" /> <a href="'.get_permalink($post->ID).'">';
				$return_html.= $post->post_title.'</a><br />';
				$return_html.= eze_substr(strip_shortcodes($post->post_content), 110).'</li>';

			}	

		$return_html.= '</ul>';

	}
	
	if($echo)
	{
		echo $return_html;
	}
	else
	{
		return $return_html;
	}
}


function theme_queue_js(){
  if (!is_admin()){
    if (!is_page() AND is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }
  }
}
add_action('get_header', 'theme_queue_js');




add_filter( 'manage_post_posts_columns', 'rachel_carden_managing_my_posts_columns', 4, 9 );
function rachel_carden_managing_my_posts_columns( $columns, $post_type ) {

         $new_columns = array();
         foreach( $columns as $key => $value ) {
            $new_columns[ $key ] = $value;
            if ( $key == 'title' )
                $new_columns[ 'gallery_image_url' ] = 'gallery_image_url';
                $new_columns[ 'gallery_coordLatitude' ] = 'gallery_coordLatitude';
                $new_columns[ 'gallery_coordLongitude' ] = 'gallery_coordLongitude';
                $new_columns[ 'credits' ] = 'credits';
                $new_columns[ 'gallery_buyPrint_url' ] = 'gallery_buyPrint_url';
                $new_columns[ 'gallery_alternative_url' ] = 'gallery_alternative_url';
                
         }
         return $new_columns;

}

add_action( 'manage_posts_custom_column', 'rachel_carden_populating_my_posts_columns', 10, 2 );
function rachel_carden_populating_my_posts_columns( $column_name, $post_id ) {
   switch( $column_name ) {
        case 'gallery_image_url':
           echo '<div id="gallery_image_url-' . $post_id . '">' . get_post_meta( $post_id, 'gallery_image_url', true ) . '</div>';
           break;
        case 'gallery_coordLatitude':
           echo '<div id="gallery_coordLatitude-' . $post_id . '">' . get_post_meta( $post_id, 'gallery_coordLatitude', true ) . '</div>';
           break;
        case 'gallery_coordLongitude':
           echo '<div id="gallery_coordLongitude-' . $post_id . '">' . get_post_meta( $post_id, 'gallery_coordLongitude', true ) . '</div>';
           break;
        case 'credits':
           echo '<div id="credits-' . $post_id . '">' . get_post_meta( $post_id, 'credits', true ) . '</div>';
           break;
        case 'gallery_buyPrint_url':
            echo '<div id="gallery_buyPrint_url-' . $post_id . '">' . get_post_meta( $post_id, 'gallery_buyPrint_url', true ) . '</div>';
            break;
        case 'gallery_alternative_url':
            echo '<div id="gallery_alternative_url-' . $post_id . '">' . get_post_meta( $post_id, 'gallery_alternative_url', true ) . '</div>';
            break;
   }
}









add_action( 'bulk_edit_custom_box', 'rachel_carden_add_to_bulk_quick_edit_custom_box', 10, 2 );
add_action( 'quick_edit_custom_box', 'rachel_carden_add_to_bulk_quick_edit_custom_box', 10, 2 );
function rachel_carden_add_to_bulk_quick_edit_custom_box( $column_name, $post_type ) {

         switch( $column_name ) {
            case 'gallery_image_url':
               ?><fieldset class="inline-edit-col-right">
                  <div class="inline-edit-group">
                     <label>
                        <span class="title">gallery_image_url</span>
                        <input type="text" name="gallery_image_url" value="" />
                     </label>
                  </div>
               </fieldset><?php
               break;
           case 'gallery_coordLatitude':
               ?><fieldset class="inline-edit-col-right">
                  <div class="inline-edit-group">
                     <label>
                        <span class="title">gallery_coordLatitude</span>
                        <input type="text" name="gallery_coordLatitude" value="" />
                     </label>
                  </div>
               </fieldset><?php
               break;
           case 'gallery_coordLongitude':
               ?><fieldset class="inline-edit-col-right">
                  <div class="inline-edit-group">
                     <label>
                        <span class="title">gallery_coordLongitude</span>
                        <input type="text" name="gallery_coordLongitude" value="" />
                     </label>
                  </div>
               </fieldset><?php
               break;
           case 'credits':
               ?><fieldset class="inline-edit-col-right">
                  <div class="inline-edit-group">
                     <label>
                        <span class="title">credits</span>
                        <input type="text" name="credits" value="" />
                     </label>
                  </div>
               </fieldset><?php
               break;
           case 'gallery_buyPrint_url':
               ?><fieldset class="inline-edit-col-right">
                  <div class="inline-edit-group">
                     <label>
                        <span class="title">gallery_buyPrint_url</span>
                        <input type="text" name="gallery_buyPrint_url" value="" />
                     </label>
                  </div>
               </fieldset><?php
               break;
           case 'gallery_alternative_url':
               ?><fieldset class="inline-edit-col-right">
                  <div class="inline-edit-group">
                     <label>
                        <span class="title">gallery_alternative_url</span>
                        <input type="text" name="gallery_alternative_url" value="" />
                     </label>
                  </div>
               </fieldset><?php
               break;
         }
}











add_action( 'admin_print_scripts-edit.php', 'rachel_carden_enqueue_edit_scripts' );
function rachel_carden_enqueue_edit_scripts() {
   wp_enqueue_script( 'rachel-carden-admin-edit', get_bloginfo( 'stylesheet_directory' ) . '/quick_edit.js', array( 'jquery', 'inline-edit-post' ), '', true );
}

?>