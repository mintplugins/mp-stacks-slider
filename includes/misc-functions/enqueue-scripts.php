<?php
/**
 * This file contains the enqueue scripts function for the slider plugin
 *
 * @since 1.0.0
 *
 * @package    MP Stacks Slider
 * @subpackage Functions
 *
 * @copyright  Copyright (c) 2014, Mint Plugins
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author     Philip Johnston
 */
 
/**
 * Enqueue JS and CSS for slider 
 *
 * @access   public
 * @since    1.0.0
 * @return   void
 */

/**
 * Enqueue css and js
 *
 * Filter: mp_stacks_slider_css_location
 */
function mp_stacks_slider_enqueue_scripts(){
			
	//Enqueue Owl Slider css
	wp_enqueue_style( 'flexslider_css', plugins_url( 'css/flexslider.css', dirname( __FILE__ ) ) );
	
	//Enqueue Flex Slider Js
	wp_enqueue_script( 'flexslider_js', plugins_url( 'js/jquery.flexslider-min.js', dirname( __FILE__ ) ), array( 'jquery' ), true, false );

}
add_action( 'wp_enqueue_scripts', 'mp_stacks_slider_enqueue_scripts' );