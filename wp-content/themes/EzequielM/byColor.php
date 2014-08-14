    
    <?php

/**

 * The main template file.

 * @package WordPress

 * @subpackage EzequielM
 * 
 * Template Name: byColor

 */

/** 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off
**/




if (is_home()) {
    //Redirect to category set in settings if page is Home
    $eze_home_cat = get_option('eze_home_cat');
    $category_link = get_category_link( $eze_home_cat);
    wp_redirect($category_link); exit;
}
//Get site Options from admin panel
$siteurl=  get_site_url();
$eze_gallery__mediaRoot = get_option('eze_mediaRoot');
$eze_gallery_width = get_option('eze_gallery_width');
$eze_gallery_height = get_option('eze_gallery_height');
$eze_gallery_highResFolder = get_option('eze_highRes');
$eze_gallery_midRes = get_option('eze_midRes');    
$eze_gallery_thumbs = get_option('eze_thumbs');
$padding= get_option('eze_gallery_padding') . "px " . get_option('eze_gallery_padding') . "px " . get_option('eze_gallery_padding') . "px 0px" ;
$numberOfRows= intval(get_option('eze_gallery_rows')) ;

$eze_gallery_sort = get_option('eze_gallery_sort'); 
if(empty($eze_gallery_sort))
{
	$eze_gallery_sort = 'DESC';
}

$cat = get_category(get_query_var('cat'),false);
$all_photos = get_posts('numberposts=-1&order='.$eze_gallery_sort.'&orderby=menu_order&category='.$cat->cat_ID);


$photosPerPage = 32;
$cnt = count($all_photos);
$amountOfPages=intval($cnt / $photosPerPage);
if (($cnt % $photosPerPage)!=0 ){
    $amountOfPages=$amountOfPages+1;
}

$pages= array_chunk($all_photos, $photosPerPage);


include 'byColor.xml';
include 'php-color/Color.php';

        
$images = new SimpleXMLElement($xmlstr);


$searchColor= new Color();

$searchColor ->fromRgbInt ($_GET['r'],
                            $_GET['g'],
                            $_GET['b']);
$searchDistance=$_GET['range'];

if (!$searchDistance){
    $searchColor ->fromRgbInt (255,
                            255,
                            255);
    $searchDistance=0;
}

get_header();
do_shortcode(the_content());

 
if(!empty($all_photos)) { ?>
    <div class="section " id="section0">
    <!-- Begin content -->
    <div style="width: 100%;height:100%;margin: 0 auto;margin-top: 100px;vertical-align: top;text-align: left;overflow-y: auto">
        <div>
    if you dont see any images here after a seach, try a higher search range or select another color to search<br><br>
    <p ><input value="9EFF1F" style="background-image: none; background-color: rgb(0, 0, 0); color: rgb(0, 0, 0);" autocomplete="off" class="color{pickerFaceColor:'transparent',pickerFace:3,pickerBorder:0,pickerInsetColor:'black'}" id="myColor" onchange="
    document.getElementById('red').value = this.color.rgb[0]*255;
    document.getElementById('green').value = this.color.rgb[1]*255;
    document.getElementById('blue').value = this.color.rgb[2]*255;">
    <input type="button" onclick="myfunction()" value="searchByColor">
    searchRange-><input value="190" id="range" size="5" maxlength="3" class=hexColor> _____ R-><input value="158" id="red" size="1" maxlength="3" class=hexColor>  G-><input value="255" id="green" size="1" maxlength="3" class=hexColor>  B-><input value="31" id="blue" size="1" maxlength="3" class=hexColor> 
    <br>
    <br>
    <br>
    </div>
    
    <?php foreach($all_photos as $key => $photo){
        $title=$photo->post_title;
        $image_url = get_post_meta($photo->ID, 'gallery_image_url', true);
        $small_image_url = get_post_meta($photo->ID, 'gallery_preview_image_url', true);
        $image_url_permalink = get_permalink( $photo->ID );
        $gallery_buyPrint_url= get_post_meta($photo->ID, 'gallery_buyPrint_url', true);
        $small_image_url= $siteurl . '/' . $eze_gallery__mediaRoot . '/'. $eze_gallery_thumbs . '/' . $small_image_url ;
        foreach ($images->image as $image) {
            if ($image->title==$title){
                $dominantColor = new Color ();
                $dominantColor ->fromRgbInt($image->dominantColorR,
                                            $image->dominantColorG,
                                            $image->dominantColorB);
                $paletteColor01 = new Color ();
                $paletteColor01 ->fromRgbInt($image->paletteColor01R,
                                            $image->paletteColor01G,
                                            $image->paletteColor01B);
                $paletteColor02 = new Color ();
                $paletteColor02 ->fromRgbInt($image->paletteColor02R,
                                            $image->paletteColor02G,
                                            $image->paletteColor02B);
                $paletteColor03 = new Color ();
                $paletteColor03 ->fromRgbInt($image->paletteColor03R,
                                            $image->paletteColor03G,
                                            $image->paletteColor03B);
                $distance = $dominantColor->getDistanceRgbFrom($searchColor);
                $distance1 = $paletteColor01->getDistanceRgbFrom($searchColor);
                $distance2 = $paletteColor02->getDistanceRgbFrom($searchColor);
                $distance3 = $paletteColor03->getDistanceRgbFrom($searchColor);
                if ($distance<$searchDistance || $distance1<$searchDistance || $distance2<$searchDistance || $distance<$searchDistance){?>
                    <a href="<?php echo $image_url_permalink ?>" >
                        <img src="<?php echo $small_image_url?>" class="border" alt="" style="max-width: 4%;min-width: 4%"/> 
                    </a>

                <?php } ?>
            <?php } ?>
        <?php } ?>
    <?php } ?>
    </div>
<?php   } ?>

     
<?php get_footer(); ?>


