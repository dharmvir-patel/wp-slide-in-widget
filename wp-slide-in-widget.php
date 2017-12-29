<?php
   /*
   Plugin Name: WP Slide in Widget
   Plugin URI: http://www.digitalcahoots.com
   Description: Add simple slide in widget to your website.
   Version: 0.0.1
   Author: Dharmvir Patel
   Author URI: http://www.digitalcahoots.com/dharmvir/
   License: GPL2
   */
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

define( 'WP_SLIDE_IN_PLUGIN_URL',   plugin_dir_url( __FILE__ ) );
define( 'WP_SLIDE_IN_PLUGIN_VERSION', '0.0.1' );

/**
 * Register our sidebars and widgetized areas.
 *
 */

function dv_sliding_widgets_init() {

	register_sidebar( array(
		'name'          => 'Sliding Widget',
		'id'            => 'sliding_widget_1',
		'before_widget' => '<div class="dv-slide-in">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="wp-title dv-slide">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'dv_sliding_widgets_init' );

function dv_sliding_widgets_display() {
	if ( is_active_sidebar( 'sliding_widget_1' ) ) :
    ?>
    <div id="slideout">
	    <div id="slidecontent">
	        <?php dynamic_sidebar( 'sliding_widget_1' ); ?>
	    </div>
	    <div id="clickme">
	    </div>
	</div>
	<?php
	endif;

}
add_action( 'wp_footer', 'dv_sliding_widgets_display' );

/*
* Enqueue required scripts
* CSS and JS
*/

add_action( 'wp_enqueue_scripts', 'dv_sliding_widgets_scripts', 20, 1);
function dv_sliding_widgets_scripts(){
			
	// Load custom javascript			
	wp_enqueue_script(				
		'slidingwidget',				
		 WP_SLIDE_IN_PLUGIN_URL. 'assets/js/slidingwidget.js'
	);			
	// Load custom css		
	wp_enqueue_style(				
		'slidingwidget',				
		 WP_SLIDE_IN_PLUGIN_URL. 'assets/css/slidingwidget.css'
	);
}

/*
*  Settings Page
* 
*/
// create custom plugin settings menu
add_action('admin_menu', 'dv_sliding_widgets_create_menu');

function dv_sliding_widgets_create_menu() {

	//create new top-level menu
	add_menu_page('Slide In  Widgets', 'Slide In Widget', 'administrator', __FILE__, 'dv_sliding_widgets_settings_page' , '' );

	//call register settings function
	add_action( 'admin_init', 'register_dv_sliding_widgets_settings' );
}


function register_dv_sliding_widgets_settings() {
	//register our settings
	register_setting( 'dvsw-settings-group', 'dvsw_icon_url' );
	register_setting( 'dvsw-settings-group', 'dvsw_width' );
	register_setting( 'dvsw-settings-group', 'dvsw_height' );
	register_setting( 'dvsw-settings-group', 'dvsw_background' );
	register_setting( 'dvsw-settings-group', 'dvsw_font_color' );
	register_setting( 'dvsw-settings-group', 'dvsw_position_top' );
}

function dv_sliding_widgets_settings_page() {
?>
<div class="wrap">
<h1>Slide In Widget Settings</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'dvsw-settings-group' ); ?>
    <?php do_settings_sections( 'dvsw-settings-group' ); ?>

    <table class="form-table">
        <tr valign="top">
        <th scope="row">Icon URL</th>
        <td><input type="text" name="dvsw_icon_url" value="<?php echo esc_attr( get_option('dvsw_icon_url') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Widget Width</th>
        <td><input type="text" name="dvsw_width" value="<?php echo esc_attr( get_option('dvsw_width') ); ?>" /> px</td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Widget Height</th>
        <td><input type="text" name="dvsw_height" value="<?php echo esc_attr( get_option('dvsw_height') ); ?>" /> px</td>
        </tr>

        <tr valign="top">
        <th scope="row">Widget Background</th>
        <td><input type="text" name="dvsw_background" value="<?php echo esc_attr( get_option('dvsw_background') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Font Color</th>
        <td><input type="text" name="dvsw_font_color" value="<?php echo esc_attr( get_option('dvsw_font_color') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Position Top</th>
        <td><input type="text" name="dvsw_position_top" value="<?php echo esc_attr( get_option('dvsw_position_top') ); ?>" /></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>