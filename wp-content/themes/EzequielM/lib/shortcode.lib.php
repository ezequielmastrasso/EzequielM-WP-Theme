<?php

// [dropcap foo="foo-value"]
function dropcap_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'style' => 1
	), $atts));
	
	//get first char
	$first_char = substr($content, 0, 1);
	$text_len = strlen($content);
	$rest_text = substr($content, 1, $text_len);

	$return_html = '<span class="dropcap'.$style.'">'.$first_char.'</span>';
	$return_html.= do_shortcode($rest_text);
	
	return $return_html;
}
add_shortcode('dropcap', 'dropcap_func');




// [quote foo="foo-value"]
function quote_func($atts, $content) {
	
	$return_html = '<blockquote>'.do_shortcode($content).'</blockquote>';
	
	return $return_html;
}
add_shortcode('quote', 'quote_func');



// [button foo="foo-value"]
function button_func($atts) {

	//extract short code attr
	extract(shortcode_atts(array(
		'text' => 'something',
		'link' => '',
		'size' => '',
		'align' => '',
	), $atts));
	
	if(!empty($size))
	{
		$size.= '_';
	}
	
	$return_html = '<a class="'.$size.'button '.$align.'" href="'.$link.'">';
	$return_html.= '<span>'.$text.'</span>';
	$return_html.= '</a>';
	
	return $return_html;
}
add_shortcode('button', 'button_func');


function frame_left_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'src' => '',
		'href' => '',
	), $atts));
	
	$return_html = '<div class="frame_left">';
	
	if(!empty($href))
	{
		$return_html.= '<a href="'.$href.'" class="img_frame">';
	}
	
	$return_html.= '<img src="'.$src.'" alt=""/>';
	
	if(!empty($href))
	{
		$return_html.= '</a>';
	}
	
	if(!empty($content))
	{
		$return_html.= '<span class="caption">'.$content.'</span>';
	}
	
	$return_html.= '</div>';
	
	return $return_html;
}
add_shortcode('frame_left', 'frame_left_func');




function frame_right_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'src' => '',
		'href' => '',
	), $atts));
	
	$return_html = '<div class="frame_right">';
	
	if(!empty($href))
	{
		$return_html.= '<a href="'.$href.'" class="img_frame">';
	}
	
	$return_html.= '<img src="'.$src.'" alt=""/>';
	
	if(!empty($href))
	{
		$return_html.= '</a>';
	}
	
	if(!empty($content))
	{
		$return_html.= '<span class="caption">'.$content.'</span>';
	}
	
	$return_html.= '</div>';
	
	return $return_html;
}
add_shortcode('frame_right', 'frame_right_func');



function frame_center_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'src' => '',
		'href' => '',
	), $atts));
	
	$return_html = '<div class="frame_center">';
	
	if(!empty($href))
	{
		$return_html.= '<a href="'.$href.'" class="img_frame">';
	}
	
	$return_html.= '<img src="'.$src.'" alt=""/>';
	
	if(!empty($href))
	{
		$return_html.= '</a>';
	}
	
	if(!empty($content))
	{
		$return_html.= '<span class="caption">'.$content.'</span>';
	}
	
	$return_html.= '</div>';
	
	return $return_html;
}
add_shortcode('frame_center', 'frame_center_func');




function arrow_list_func($atts, $content) {
	
	$return_html = '<ul class="arrow_list">'.html_entity_decode(strip_tags($content,'<li><a>')).'</ul>';
	
	return $return_html;
}
add_shortcode('arrow_list', 'arrow_list_func');



function one_half_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'class' => '',
	), $atts));
	
	$return_html = '<div class="one_half '.$class.'">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_half', 'one_half_func');




function one_half_last_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'class' => '',
	), $atts));
	
	$return_html = '<div class="one_half last '.$class.'">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_half_last', 'one_half_last_func');



function one_third_func($atts, $content) {
	
	$return_html = '<div class="one_third">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_third', 'one_third_func');




function one_third_last_func($atts, $content) {
	
	$return_html = '<div class="one_third last">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_third_last', 'one_third_last_func');



function two_third_func($atts, $content) {
	
	$return_html = '<div class="two_third">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('two_third', 'two_third_func');




function two_third_last_func($atts, $content) {
	
	$return_html = '<div class="two_third last">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('two_third_last', 'two_third_last_func');




function one_fourth_func($atts, $content) {
	
	$return_html = '<div class="one_fourth">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_fourth', 'one_fourth_func');




function one_fourth_last_func($atts, $content) {
	
	$return_html = '<div class="one_fourth last">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_fourth_last', 'one_fourth_last_func');



function one_fifth_func($atts, $content) {
	
	$return_html = '<div class="one_fifth">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_fifth', 'one_fifth_func');




function one_fifth_last_func($atts, $content) {
	
	$return_html = '<div class="one_fifth last">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_fifth_last', 'one_fifth_last_func');



function one_sixth_func($atts, $content) {
	
	$return_html = '<div class="one_sixth">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_sixth', 'one_sixth_func');




function one_sixth_last_func($atts, $content) {
	
	$return_html = '<div class="one_sixth last">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_sixth_last', 'one_sixth_last_func');


?>