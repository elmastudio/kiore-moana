<?php
/**
 * Available Kiore Moana Shortcodes
 *
 *
 * @package Kiore Moana
 * @since Kiore Moana 1.0.4
 */

 /*-----------------------------------------------------------------------------------*/
 /* Kiore Moana Shortcodes
 /*-----------------------------------------------------------------------------------*/
 // Enable shortcodes in widget areas
 add_filter( 'widget_text', 'do_shortcode' );

 // Replace WP autop formatting
 if (!function_exists( "kioremoana_remove_wpautop")) {
	 function kioremoana_remove_wpautop($content) {
		 $content = do_shortcode( shortcode_unautop( $content ) );
		 $content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content);
		 return $content;
	 }
 }

 /*-----------------------------------------------------------------------------------*/
 /* Multi Columns Shortcodes
 /* Don't forget to add "_last" behind the shortcode if it is the last column.
 /*-----------------------------------------------------------------------------------*/

 // Two Columns
 function kioremoana_shortcode_two_columns_one( $atts, $content = null ) {
		return '<div class="two-columns-one">' . kioremoana_remove_wpautop($content) . '</div>';
 }
 add_shortcode( 'two_columns_one', 'kioremoana_shortcode_two_columns_one' );

 function kioremoana_shortcode_two_columns_one_last( $atts, $content = null ) {
		return '<div class="two-columns-one last">' . kioremoana_remove_wpautop($content) . '</div>';
 }
 add_shortcode( 'two_columns_one_last', 'kioremoana_shortcode_two_columns_one_last' );

 // Three Columns
 function kioremoana_shortcode_three_columns_one($atts, $content = null) {
		return '<div class="three-columns-one">' . kioremoana_remove_wpautop($content) . '</div>';
 }
 add_shortcode( 'three_columns_one', 'kioremoana_shortcode_three_columns_one' );

 function kioremoana_shortcode_three_columns_one_last($atts, $content = null) {
		return '<div class="three-columns-one last">' . kioremoana_remove_wpautop($content) . '</div>';
 }
 add_shortcode( 'three_columns_one_last', 'kioremoana_shortcode_three_columns_one_last' );

 function kioremoana_shortcode_three_columns_two($atts, $content = null) {
		return '<div class="three-columns-two">' . kioremoana_remove_wpautop($content) . '</div>';
 }
 add_shortcode( 'three_columns_two', 'kioremoana_shortcode_three_columns_two' );

 function kioremoana_shortcode_three_columns_two_last($atts, $content = null) {
		return '<div class="three-columns-two last">' . kioremoana_remove_wpautop($content) . '</div>';
 }
 add_shortcode( 'three_columns_two_last', 'kioremoana_shortcode_three_columns_two_last' );

 // Four Columns
 function kioremoana_shortcode_four_columns_one($atts, $content = null) {
		return '<div class="four-columns-one">' . kioremoana_remove_wpautop($content) . '</div>';
 }
 add_shortcode( 'four_columns_one', 'kioremoana_shortcode_four_columns_one' );

 function kioremoana_shortcode_four_columns_one_last($atts, $content = null) {
		return '<div class="four-columns-one last">' . kioremoana_remove_wpautop($content) . '</div>';
 }
 add_shortcode( 'four_columns_one_last', 'kioremoana_shortcode_four_columns_one_last' );

 function kioremoana_shortcode_four_columns_two($atts, $content = null) {
		return '<div class="four-columns-two">' . kioremoana_remove_wpautop($content) . '</div>';
 }
 add_shortcode( 'four_columns_two', 'kioremoana_shortcode_four_columns_two' );

 function kioremoana_shortcode_four_columns_two_last($atts, $content = null) {
		return '<div class="four-columns-two last">' . kioremoana_remove_wpautop($content) . '</div>';
 }
 add_shortcode( 'four_columns_two_last', 'kioremoana_shortcode_four_columns_two_last' );

 function kioremoana_shortcode_four_columns_three($atts, $content = null) {
		return '<div class="four-columns-three">' . kioremoana_remove_wpautop($content) . '</div>';
 }
 add_shortcode( 'four_columns_three', 'kioremoana_shortcode_four_columns_three' );

 function kioremoana_shortcode_four_columns_three_last($atts, $content = null) {
		return '<div class="four-columns-three last">' . kioremoana_remove_wpautop($content) . '</div>';
 }
 add_shortcode( 'four_columns_three_last', 'kioremoana_shortcode_four_columns_three_last' );


 // Divide Text Shortcode
 function kioremoana_shortcode_divider($atts, $content = null) {
		return '<div class="divider"></div>';
 }
 add_shortcode( 'divider', 'kioremoana_shortcode_divider' );

 /*-----------------------------------------------------------------------------------*/
 /* Text Highlight and Info Boxes Shortcodes
 /*-----------------------------------------------------------------------------------*/

 function kioremoana_shortcode_white_box($atts, $content = null) {
		return '<div class="white-box">' . do_shortcode( kioremoana_remove_wpautop($content) ) . '</div>';
 }
 add_shortcode( 'white_box', 'kioremoana_shortcode_white_box' );

 function kioremoana_shortcode_yellow_box($atts, $content = null) {
		return '<div class="yellow-box">' . do_shortcode( kioremoana_remove_wpautop($content) ) . '</div>';
 }
 add_shortcode( 'yellow_box', 'kioremoana_shortcode_yellow_box' );

 function kioremoana_shortcode_red_box($atts, $content = null) {
		return '<div class="red-box">' . do_shortcode( kioremoana_remove_wpautop($content) ) . '</div>';
 }
 add_shortcode( 'red_box', 'kioremoana_shortcode_red_box' );

 function kioremoana_shortcode_blue_box($atts, $content = null) {
		return '<div class="blue-box">' . do_shortcode( kioremoana_remove_wpautop($content) ) . '</div>';
 }
 add_shortcode( 'blue_box', 'kioremoana_shortcode_blue_box' );

 function kioremoana_shortcode_green_box($atts, $content = null) {
		return '<div class="green-box">' . do_shortcode( kioremoana_remove_wpautop($content) ) . '</div>';
 }
 add_shortcode( 'green_box', 'kioremoana_shortcode_green_box' );

 function kioremoana_shortcode_lightgrey_box($atts, $content = null) {
		return '<div class="lightgrey-box">' . do_shortcode( kioremoana_remove_wpautop($content) ) . '</div>';
 }
 add_shortcode( 'lightgrey_box', 'kioremoana_shortcode_lightgrey_box' );

 function kioremoana_shortcode_grey_box($atts, $content = null) {
		return '<div class="grey-box">' . do_shortcode( kioremoana_remove_wpautop($content) ) . '</div>';
 }
 add_shortcode( 'grey_box', 'kioremoana_shortcode_grey_box' );

 function kioremoana_shortcode_dark_box($atts, $content = null) {
		return '<div class="dark-box">' . do_shortcode( kioremoana_remove_wpautop($content) ) . '</div>';
 }
 add_shortcode( 'dark_box', 'kioremoana_shortcode_dark_box' );

 /*-----------------------------------------------------------------------------------*/
 /* Buttons Shortcodes
 /*-----------------------------------------------------------------------------------*/
 function kioremoana_button( $atts, $content = null ) {
		 extract(shortcode_atts(array(
		 'link'	=> '#',
		 'target' => '',
		 'color'	=> '',
		 'size'	=> '',
		'form'	=> '',
		'font'	=> '',
		 ), $atts));

	 $color = ($color) ? ' '.$color. '-btn' : '';
	 $size = ($size) ? ' '.$size. '-btn' : '';
	 $form = ($form) ? ' '.$form. '-btn' : '';
	 $font = ($font) ? ' '.$font. '-btn' : '';
	 $target = ($target == 'blank') ? ' target="_blank"' : '';

	 $out = '<a' .$target. ' class="standard-btn' .$color.$size.$form.$font. '" href="' .$link. '"><span>' .do_shortcode($content). '</span></a>';

		 return $out;
 }
 add_shortcode('button', 'kioremoana_button');

 /*-----------------------------------------------------------------------------------*/
 /* Special Font + Layout Shortcodes
 /*-----------------------------------------------------------------------------------*/
 function kioremoana_shortcode_fullwidth_content($atts, $content = null) {
		return '<div class="fullwidth-content">' . do_shortcode( kioremoana_remove_wpautop($content) ) . '</div>';
 }
 add_shortcode( 'fullwidth_content', 'kioremoana_shortcode_fullwidth_content' );

 function kioremoana_shortcode_intro_text($atts, $content = null) {
		return '<p class="slogan">' . do_shortcode( kioremoana_remove_wpautop($content) ) . '</p>';
 }
 add_shortcode( 'intro_text', 'kioremoana_shortcode_intro_text' );


 function kioremoana_shortcode_headline_border($atts, $content = null) {
		return '<h2 class="centered"><span>' . do_shortcode( kioremoana_remove_wpautop($content) ) . '</span></h2>';
 }
 add_shortcode( 'headline_border', 'kioremoana_shortcode_headline_border' );

 function kioremoana_shortcode_contact_form($atts, $content = null) {
		return '<div class="contact-form">' . do_shortcode( kioremoana_remove_wpautop($content) ) . '</div>';
 }
 add_shortcode( 'contact_form', 'kioremoana_shortcode_contact_form' );

 function kioremoana_shortcode_contact_info($atts, $content = null) {
		return '<div class="contact-info">' . do_shortcode( kioremoana_remove_wpautop($content) ) . '</div>';
 }
 add_shortcode( 'contact_info', 'kioremoana_shortcode_contact_info' );
