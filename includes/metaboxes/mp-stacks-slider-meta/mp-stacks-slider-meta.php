<?php
/**
 * This page contains functions for modifying the metabox for slider as a media type
 *
 * @link http://mintplugins.com/doc/
 * @since 1.0.0
 *
 * @package    MP Stacks Slider
 * @subpackage Functions
 *
 * @copyright   Copyright (c) 2014, Mint Plugins
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author      Philip Johnston
 */
 
/**
 * Add Image Slider as a Media Type to the dropdown
 *
 * @since    1.0.0
 * @link     http://mintplugins.com/doc/
 * @param    array $args See link for description.
 * @return   void
 */
function mp_stacks_slider_create_meta_box(){
	
	/**
	 * Array which stores all info about the new metabox
	 *
	 */
	$mp_stacks_slider_add_meta_box = array(
		'metabox_id' => 'mp_stacks_slider_metabox', 
		'metabox_title' => __( '"Slider" Content-Type', 'mp_stacks_slider'), 
		'metabox_posttype' => 'mp_brick', 
		'metabox_context' => 'advanced', 
		'metabox_priority' => 'low' 
	);
	
	/**
	 * Array which stores all info about the options within the metabox
	 *
	 */
	$mp_stacks_slider_items_array = array(
		array(
			'field_id'			=> 'mp_stacks_navigation_settings',
			'field_title' 	=> __( 'Slider Navigation Settings:', 'mp_stacks_slider'),
			'field_description' 	=> __( '', 'mp_stacks_slider' ),
			'field_type' 	=> 'showhider',
			'field_value' => '',
		),
		array(
			'field_id'			=> 'mp_stacks_show_nav',
			'field_title' 	=> __( 'Navigation Dots\' Position', 'mp_stacks_slider'),
			'field_description' 	=> __( 'Where should we position the navigation dots? Default: Bottom, Center, Inside', 'mp_stacks_slider' ),
			'field_type' 	=> 'select',
			'field_value' => 'bottom_center_inside',
			'field_select_values' 	=> array( 
				'bottom_center_inside' => __("Bottom, Center, Inside", 'mp_stacks_slider'), 
				'bottom_center_outside' => __("Bottom, Center, Outside", 'mp_stacks_slider'), 
				
				'bottom_left_inside' => __("Bottom, Left, Inside", 'mp_stacks_slider'), 
				'bottom_left_outside' => __("Bottom, Left, Outside", 'mp_stacks_slider'), 
				
				'bottom_right_inside' => __("Bottom, Right, Inside", 'mp_stacks_slider'), 
				'bottom_right_outside' => __("Bottom, Right, Outside", 'mp_stacks_slider'), 
				
				'top_center_inside' => __("Top, Center, Inside", 'mp_stacks_slider'), 
				'top_center_outside' => __("Top, Center, Outside", 'mp_stacks_slider'), 
				
				'top_left_inside' => __("Top, Left, Inside", 'mp_stacks_slider'), 
				'top_left_outside' => __("Top, Left, Outside", 'mp_stacks_slider'), 
				
				'top_right_inside' => __("Top, Right, Inside", 'mp_stacks_slider'), 
				'top_right_outside' => __("Top, Right, Outside", 'mp_stacks_slider'), 				
				
				'false' => __("Don't Show Dots", 'mp_stacks_slider')),
				
			'field_showhider' => 'mp_stacks_navigation_settings',
		),
		array(
			'field_id'			=> 'mp_stacks_nav_color',
			'field_title' 	=> __( 'Navigation Dot Colors:', 'mp_stacks_slider'),
			'field_description' 	=> __( 'What color should the navigation dots be? Default: White', 'mp_stacks_slider' ),
			'field_type' 	=> 'colorpicker',
			'field_value' => '#FFF',
			'field_showhider' => 'mp_stacks_navigation_settings',
		),
		array(
			'field_id'			=> 'mp_stacks_slideshow_settings',
			'field_title' 	=> __( 'Slideshow Settings:', 'mp_stacks_slider'),
			'field_description' 	=> __( '', 'mp_stacks_slider' ),
			'field_type' 	=> 'showhider',
			'field_value' => '',
		),
		array(
			'field_id'			=> 'mp_stacks_slideshow_on',
			'field_title' 	=> __( 'Auto-Slide:', 'mp_stacks_slider'),
			'field_description' 	=> __( 'Should the images auto-slide? Default: On', 'mp_stacks_slider' ),
			'field_type' 	=> 'select',
			'field_select_values' 	=> array( 'true' => __("On", 'mp_stacks_slider'), 'false' => __("Off", 'mp_stacks_slider')),
			'field_value' => 'true',
			'field_showhider' => 'mp_stacks_slideshow_settings',
		),
		array(
			'field_id'			=> 'mp_stacks_animation_style',
			'field_title' 	=> __( 'Animation Style:', 'mp_stacks_slider'),
			'field_description' 	=> __( 'What style shoud the slide animation be? Default: Fade', 'mp_stacks_slider' ),
			'field_type' 	=> 'select',
			'field_select_values' 	=> array( 'fade' => __("Fade", 'mp_stacks_slider'), 'slide' => __("Slide", 'mp_stacks_slider')),
			'field_value' => 'fade',
			'field_showhider' => 'mp_stacks_slideshow_settings',
		),
		array(
			'field_id'			=> 'mp_stacks_slider_speed',
			'field_title' 	=> __( 'Slide Speed:', 'mp_stacks_slider'),
			'field_description' 	=> __( 'How many seconds should each slide show for? Default: 4', 'mp_stacks_slider' ),
			'field_type' 	=> 'number',
			'field_value' => '4',
			'field_showhider' => 'mp_stacks_slideshow_settings',
		),
		array(
			'field_id'			=> 'mp_stacks_slider_sizes',
			'field_title' 	=> __( 'Slider Image Sizes :', 'mp_stacks_slider'),
			'field_description' 	=> __( '', 'mp_stacks_slider' ),
			'field_type' 	=> 'showhider',
			'field_value' => '',
		),
		array(
			'field_id'			=> 'mp_stacks_slider_width',
			'field_title' 	=> __( 'Slider Image Width :', 'mp_stacks_slider'),
			'field_description' 	=> __( 'How many pixels wide should the slider images be? Default: 1000', 'mp_stacks_slider' ),
			'field_type' 	=> 'number',
			'field_value' => '1000',
			'field_showhider' => 'mp_stacks_slider_sizes',
		),
		array(
			'field_id'			=> 'mp_stacks_slider_height',
			'field_title' 	=> __( 'Slider Image Height :', 'mp_stacks_slider'),
			'field_description' 	=> __( 'How many pixels high should the slider images be? Default: 0. Set this to 0 to scale the image without cropping it.', 'mp_stacks_slider' ),
			'field_type' 	=> 'number',
			'field_value' => '0',
			'field_showhider' => 'mp_stacks_slider_sizes',
		),
		array(
			'field_id'			=> 'mp_stacks_slider_description',
			'field_title' 	=> __( 'Slider Images:', 'mp_stacks_slider'),
			'field_description' 	=> __( 'Select the images you\'d like to use for this slider below. Re-order by dragging and dropping.', 'mp_stacks_slider' ),
			'field_type' 	=> 'basictext',
			'field_value' => '',
		),
		array(
			'field_id'	 => 'mp_stacks_slider_image_title',
			'field_title' => __( 'Slide', 'mp_stacks'),
			'field_description' => __( '', 'mp_stacks' ),
			'field_type' => 'repeatertitle',
			'field_value' => '',
			'field_repeater' => 'mp_stacks_slider_images'
		),
		array(
			'field_id'			=> 'mp_stacks_slider_image_url',
			'field_title' 	=> __( 'Slide Image', 'mp_stacks_slider'),
			'field_description' 	=> __( 'Upload the image to use for this slider image.', 'mp_stacks_slider' ),
			'field_type' 	=> 'mediaupload',
			'field_value' => '',
			'field_repeater' => 'mp_stacks_slider_images',
		),
		array(
			'field_id'			=> 'mp_stacks_slider_video_url',
			'field_title' 	=> __( 'Slide Video (Shows if "Slide Image" is blank)', 'mp_stacks_slider'),
			'field_description' 	=> __( 'Enter the URL or embed code to the YouTube or Vimeo video.', 'mp_stacks_slider' ),
			'field_type' 	=> 'textarea',
			'field_value' => '',
			'field_repeater' => 'mp_stacks_slider_images',
		)
	);
	
	
	/**
	 * Custom filter to allow for add-on plugins to hook in their own data for add_meta_box array
	 */
	$mp_stacks_slider_add_meta_box = has_filter('mp_stacks_slider_meta_box_array') ? apply_filters( 'mp_stacks_slider_meta_box_array', $mp_stacks_slider_add_meta_box) : $mp_stacks_slider_add_meta_box;
	
	//Globalize the and populate mp_stacks_features_items_array (do this before filter hooks are run)
	global $global_mp_stacks_slider_items_array;
	$global_mp_stacks_slider_items_array = $mp_stacks_slider_items_array;
	
	/**
	 * Custom filter to allow for add on plugins to hook in their own extra fields 
	 */
	$mp_stacks_slider_items_array = has_filter('mp_stacks_slider_items_array') ? apply_filters( 'mp_stacks_slider_items_array', $mp_stacks_slider_items_array) : $mp_stacks_slider_items_array;
	
	/**
	 * Create Metabox class
	 */
	global $mp_stacks_slider_meta_box;
	$mp_stacks_slider_meta_box = new MP_CORE_Metabox($mp_stacks_slider_add_meta_box, $mp_stacks_slider_items_array);
}
add_action('mp_brick_metabox', 'mp_stacks_slider_create_meta_box');