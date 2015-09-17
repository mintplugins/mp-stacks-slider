<?php 
/**
 * This file contains the function which hooks to a brick's content output
 *
 * @since 1.0.0
 *
 * @package    MP Stacks Slider
 * @subpackage Functions
 *
 * @copyright  Copyright (c) 2015, Mint Plugins
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author     Philip Johnston
 */

/**
 * This function hooks to the brick css output. If it is supposed to be an 'slider', then it will add the css for the slider to the brick's css
 *
 * @access   public
 * @since    1.0.0
 * @return   void
 */
function mp_stacks_brick_content_output_css_slider( $css_output, $post_id, $first_content_type, $second_content_type ){

	if ( $first_content_type != 'slider' && $second_content_type != 'slider' ){
		return $css_output;	
	}
	
	//Enqueue Flex Slider css
	wp_enqueue_style( 'flexslider_css', plugins_url( 'css/flexslider.css', dirname( __FILE__ ) ), array(), MP_STACKS_SLIDER_VERSION );
	
	//Should this slideshow be on by default?
	$mp_stacks_nav_color = get_post_meta( $post_id, 'mp_stacks_nav_color', true );
	$mp_stacks_nav_color = empty( $mp_stacks_nav_color ) ? '#fff' : $mp_stacks_nav_color;
	
	//Show Navigation Dots?
	$mp_stacks_show_nav = get_post_meta( $post_id, 'mp_stacks_show_nav', true );
	
	if ( empty( $mp_stacks_show_nav ) || $mp_stacks_show_nav  == 'bottom_center_inside' ){
		$mp_stacks_show_nav = 'bottom:1px; text-align: center;';
	}
	elseif ( $mp_stacks_show_nav == 'bottom_center_outside' ){
		$mp_stacks_show_nav = 'bottom:-35px; text-align: center;';
	}
	else if ( $mp_stacks_show_nav == 'bottom_left_inside' ){
		$mp_stacks_show_nav = 'bottom:1px; text-align: left;';
	}
	else if ( $mp_stacks_show_nav == 'bottom_left_outside' ){
		$mp_stacks_show_nav = 'bottom:-35px; text-align: left;';
	}
	else if ( $mp_stacks_show_nav == 'bottom_right_inside' ){
		$mp_stacks_show_nav = 'bottom:1px; text-align: right;';
	}
	else if ( $mp_stacks_show_nav == 'bottom_right_outside' ){
		$mp_stacks_show_nav = 'bottom:-35px; text-align: right;';
	}
	if ( $mp_stacks_show_nav  == 'top_center_inside' ){
		$mp_stacks_show_nav = 'top:15px; text-align: center;';
	}
	elseif ( $mp_stacks_show_nav == 'top_center_outside' ){
		$mp_stacks_show_nav = 'top:-35px; text-align: center;';
	}
	else if ( $mp_stacks_show_nav == 'top_left_inside' ){
		$mp_stacks_show_nav = 'top:15px; text-align: left;';
	}
	else if ( $mp_stacks_show_nav == 'top_left_outside' ){
		$mp_stacks_show_nav = 'top:-35px; text-align: left;';
	}
	else if ( $mp_stacks_show_nav == 'top_right_inside' ){
		$mp_stacks_show_nav = 'top:15px; text-align: right;';
	}
	else if ( $mp_stacks_show_nav == 'top_right_outside' ){
		$mp_stacks_show_nav = 'top:-35px; text-align: right;';
	}
	
	//CSS for the slider. We hide the container before it's loaded and show it upon load using JS
	$css_slider_output = 
	'#mp-stacks-slider-container-' . $post_id . '{
		display:none;
		vertical-align:bottom;
		width:100%;	
	}
	#mp-stacks-slider-' . $post_id . ' {
		position:relative;
		overflow:visible!important;
	}
	#mp-stacks-slider-' . $post_id . ' .mp-stacks-item img{
		display: block;
		width: 100%;
		height: auto;
		margin:0px;
	}
	#mp-stacks-slider-' . $post_id . ' .flex-control-nav{
		opacity:0;/*We\'ll turn this back on when it\'s loaded using JS */
		z-index:999;	
		' . $mp_stacks_show_nav . '
		transition: all 0.2s ease-in-out;
	}
	#mp-stacks-slider-' . $post_id . ' .flex-active,
	#mp-stacks-slider-' . $post_id . ' a{
		color: ' . $mp_stacks_nav_color . ';
		background-color: ' . $mp_stacks_nav_color . ';
		background-color: ' . $mp_stacks_nav_color . ';
		opacity:.5;
	}
	#mp-stacks-slider-' . $post_id . ' .flex-active{
		opacity:.9;
	}
	#mp-stacks-image-slides-' . $post_id . '{
		margin-bottom:-13px;	
	}
	#mp-stacks-image-slides-' . $post_id . ',
	#mp-stacks-image-slides-' . $post_id . ' li{
		margin-top:0px;
		margin-right:0px;
		margin-bottom:0px;
		margin-left:0px;
		width:100%;	
	}
	#mp-stacks-image-slides-' . $post_id . ' .mp-core-oembed-full-width-img{
		visibility: hidden;
	}';
	
	return $css_slider_output . $css_output;
		
}
add_filter('mp_brick_additional_css', 'mp_stacks_brick_content_output_css_slider', 10, 4);

/**
 * This function hooks to the brick output. If it is supposed to be a 'slider', then it will output the slider
 *
 * @access   public
 * @since    1.0.0
 * @return   void
 */
function mp_stacks_brick_content_output_slider($default_content_output, $mp_stacks_content_type, $brick_id){
	
	//If this stack content type isn't set to be an slider	
	if ($mp_stacks_content_type != 'slider'){
		return $default_content_output; 	
	}
	
	//Enqueue Flex Slider Js
	wp_enqueue_script( 'flexslider_js', plugins_url( 'js/jquery.flexslider.js', dirname( __FILE__ ) ), array( 'jquery' ), MP_STACKS_SLIDER_VERSION, true );
	
	//Set default value for $content_output to NULL
	$content_output = NULL;	
	
	//Should this slideshow be on by default?
	$mp_stacks_slideshow_on = get_post_meta( $brick_id, 'mp_stacks_slideshow_on', true );
	$mp_stacks_slideshow_on = empty( $mp_stacks_slideshow_on ) ? 'true' : $mp_stacks_slideshow_on;
	
	//Slideshow Speed
	$mp_stacks_slider_speed = get_post_meta( $brick_id, 'mp_stacks_slider_speed', true );
	$mp_stacks_slider_speed = empty( $mp_stacks_slider_speed ) ? '5000' : $mp_stacks_slider_speed * 1000;
	
	//Animation Style
	$mp_stacks_animation_style = get_post_meta( $brick_id, 'mp_stacks_animation_style', true );
	$mp_stacks_animation_style = empty( $mp_stacks_animation_style ) ? 'fade' : $mp_stacks_animation_style;
	
	//Show Navigation Dots?
	$mp_stacks_show_nav = mp_core_get_post_meta( $brick_id, 'mp_stacks_show_nav', 'true' );
	$mp_stacks_show_nav = $mp_stacks_show_nav == 'false' ? 'false' : 'true';
		
	$js_output = '
		
	var mp_stacks_slider_' . $brick_id . ';
	
	//Set up the slider on page load
	jQuery(document).ready(function($) {
		
		//$( window ).load(function(){
		
			$("#mp-stacks-slider-container-' . $brick_id . '").css( "display", "inline-block" );
				
			mp_stacks_slider_' . $brick_id . ' = $("#mp-stacks-slider-' . $brick_id . '").flexslider({
			
				animation: "' . $mp_stacks_animation_style . '",              //String: Select your animation type, "fade" or "slide"
				easing: "swing",               //{NEW} String: Determines the easing method used in jQuery transitions. jQuery easing plugin is supported!
				direction: "horizontal",        //String: Select the sliding direction, "horizontal" or "vertical"
				reverse: false,                 //{NEW} Boolean: Reverse the animation direction
				animationLoop: true,             //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
				smoothHeight: true,            //{NEW} Boolean: Allow height of the slider to animate smoothly in horizontal mode  
				startAt: 0,                     //Integer: The slide that the slider should start on. Array notation (0 = first slide)
				slideshow: ' . $mp_stacks_slideshow_on . ',                //Boolean: Animate slider automatically
				slideshowSpeed: ' . $mp_stacks_slider_speed . ',           //Integer: Set the speed of the slideshow cycling, in milliseconds
				animationSpeed: 600,            //Integer: Set the speed of animations, in milliseconds
				initDelay: 0,                   //{NEW} Integer: Set an initialization delay, in milliseconds
				randomize: false,               //Boolean: Randomize slide order
				 
				// Usability features
				useCSS: true,                   //{NEW} Boolean: Slider will use CSS3 transitions if available
				touch: true,                    //{NEW} Boolean: Allow touch swipe navigation of the slider on touch-enabled devices
				video: false,                   //{NEW} Boolean: If using video in the slider, will prevent CSS3 3D Transforms to avoid graphical glitches
				 
				// Primary Controls
				controlNav: ' . $mp_stacks_show_nav . ',               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
				directionNav: false,             //Boolean: Create navigation for previous/next navigation? (true/false)
				prevText: "Previous",           //String: Set the text for the "previous" directionNav item
				nextText: "Next",               //String: Set the text for the "next" directionNav item
				 
				// Secondary Navigation
				keyboard: true,                 //Boolean: Allow slider navigating via keyboard left/right keys
				multipleKeyboard: false,        //{NEW} Boolean: Allow keyboard navigation to affect multiple sliders. Default behavior cuts out keyboard navigation with more than one slider present.
				mousewheel: false,              //{UPDATED} Boolean: Requires jquery.mousewheel.js (https://github.com/brandonaaron/jquery-mousewheel) - Allows slider navigating via mousewheel
				pausePlay: false,               //Boolean: Create pause/play dynamic element
				pauseText: "Pause",             //String: Set the text for the "pause" pausePlay item
				playText: "Play",               //String: Set the text for the "play" pausePlay item
				
				start: function(){ //Callback: function(slider) - Fires when the slider loads the first slide
					$("#mp-stacks-slider-' . $brick_id . ' .flex-control-nav").css( "opacity", "1" );			
				},
			
			});
		
		});
		
    });
	
	</script>';
		
	//Get the array of images
	$slider_images = get_post_meta( $brick_id, 'mp_stacks_slider_images', true );
	
	//Get the width the images should be 
	$mp_stacks_slider_width = get_post_meta( $brick_id, 'mp_stacks_slider_width', true );
	$mp_stacks_slider_width = empty( $mp_stacks_slider_width ) ? 1000 : $mp_stacks_slider_width;
	
	//Get the height the images should be 
	$mp_stacks_slider_height = get_post_meta( $brick_id, 'mp_stacks_slider_height', true );
	
	//Get the speed the slideshow should be
	$mp_stacks_slideshow_speed = get_post_meta( $brick_id, 'mp_stacks_slideshow_speed', true );
	$mp_stacks_slideshow_speed = empty( $mp_stacks_slideshow_speed ) ? 5000 : $mp_stacks_slideshow_speed;
	
	ob_start(); ?>
	
    <div id="mp-stacks-slider-container-<?php echo $brick_id; ?>" class="mp-stacks-slider-container" style="display:none;">
    	
        <?php echo $js_output; ?>
        
        <div id="mp-stacks-slider-<?php echo $brick_id; ?>" class="mp-stacks-slider">
        
            <ul id="mp-stacks-image-slides-<?php echo $brick_id; ?>" class="slides">
                
                <?php foreach( $slider_images as $slider_image ) {
                    
                    ?><li class="mp-stacks-item">
                    	<?php 
						//If there is an image
						if ( !empty( $slider_image['mp_stacks_slider_image_url'] ) ){ 
                        	if ( !empty( $mp_stacks_slider_height ) && $mp_stacks_slider_height > 0 ){ ?>
                    			<img src="<?php echo mp_aq_resize( $slider_image['mp_stacks_slider_image_url'], $mp_stacks_slider_width, $mp_stacks_slider_height, true ); ?>" />
                            <?php }
							else{?>
								<img src="<?php echo mp_aq_resize( $slider_image['mp_stacks_slider_image_url'], $mp_stacks_slider_width, NULL, false ); ?>" />
							<?php }
                        }
						//If there is a video
						else if ( !empty( $slider_image['mp_stacks_slider_video_url'] ) ){ 
							
							$args = array(
								'min_width' => NULL,
								'max_width' => NULL,
								'iframe_css_id' => NULL,
								'iframe_css_class' => NULL,
							);
			
							echo mp_core_oembed_get( $slider_image['mp_stacks_slider_video_url'], $args );
						} ?>
                      </li>
					<?php
                    
                } ?>
            
            </ul>
            
        </div>
    
    </div>
    
    <?php
	
	//Pull in the existing MP Stacks inline js string which is output the Footer.
	global $mp_stacks_footer_inline_js;
	$mp_stacks_footer_inline_js[ 'mp-stacks-slider-' . $brick_id ] = $js_output;
	
	//Return
	return ob_get_clean();
	
}
add_filter('mp_stacks_brick_content_output', 'mp_stacks_brick_content_output_slider', 10, 3);