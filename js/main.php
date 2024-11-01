<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );
function my_admin_scripts() {
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_register_script('my-upload', THESIS_CUSTOM_FOLDER.'/plus/my-script.js', array('jquery','media-upload','thickbox'));wp_enqueue_script('my-upload');
wp_register_script( 'tabs', THESIS_CUSTOM_FOLDER. '/plus/tabs.js');
wp_register_script( 'expand', THESIS_CUSTOM_FOLDER. '/plus/expand.js');
wp_register_script( 'jquerya', THESIS_CUSTOM_FOLDER. '/plus/jquery.js');
wp_enqueue_script('expand');
wp_enqueue_script('tabs');
wp_enqueue_script('jquerya');
}

function my_admin_styles() {
wp_enqueue_style('thickbox');
wp_enqueue_style('my-custom-style',  THESIS_CUSTOM_FOLDER . '/plus/style.css',false,'1.1','all');
}


if (isset($_GET['page']) && $_GET['page'] == 'theme_options') {
add_action('admin_print_scripts', 'my_admin_scripts');

}
add_action('admin_print_styles', 'my_admin_styles');

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'sample_options', 'sample_theme_options', 'theme_options_validate' );
}
define( 'ADMIN_IMAGES',get_bloginfo('stylesheet_directory').'/custom'.thesis_multisite_support().'/images/plusic.png' );
define( 'ADMIN_PLUS',get_bloginfo('stylesheet_directory').'/custom'.thesis_multisite_support().'/' );

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_submenu_page('thesis-options', __('Thesis Plus', 'sampletheme'), __( 'Thesis Plus', 'sampletheme' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page', ADMIN_IMAGES );
}

/**
 * Create arrays for our select and radio options
 */
$select_options = array(
	'0' => array(
		'value' =>	'right',
		'label' => __( 'Right', 'sampletheme' )
	),
	'1' => array(
		'value' =>	'left',
		'label' => __( 'Left', 'sampletheme' )
	),
);

$radio_options = array(
	'yes' => array(
		'value' => 'yes',
		'label' => __( 'Yes', 'sampletheme' )
	),
	'no' => array(
		'value' => 'no',
		'label' => __( 'No', 'sampletheme' )
	),
	'maybe' => array(
		'value' => 'maybe',
		'label' => __( 'Maybe', 'sampletheme' )
	)
);

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
 	<div class="wrap"><img src="<?php echo get_bloginfo('stylesheet_directory').'/custom'.thesis_multisite_support().'/images/plusi.png'; ?>" width="32" height="32" style="float:left; margin:5px 10px 0 0; "/>
		<?php  echo "<h2>" . 'Thesis Plus'. __( ' Version 1.5', 'sampletheme' ) . "</h2>"; ?><br />



		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'sampletheme' ); ?></strong></p></div>
		<?php endif; ?>
        <form method="post" action="options.php">
			<?php settings_fields( 'sample_options' ); ?>
			<?php $options = get_option( 'sample_theme_options' ); ?>
        
            <div id="support-threads-box" class="postbox" style="width:99%; float:left; clear:right; margin-right:10px;">
        <div title="Click to toggle" class="handlediv"><br></div>
		<h3 class="hndle" style="padding:6px 12px;">Thesis Plus Theme Options</h3>		
        <div class="inside">
        <div id="tabContainer">
        <div class="tabs">
        <ul>
        <li id="tabHeader_1">General Settings</li>
        <li id="tabHeader_2">Mobile Options</li>
        <li id="tabHeader_3">Carousel Slider Settings</li>
        <li id="tabHeader_4">Carousel Slider Images</li>
      </ul>
    </div>
    <div class="tabscontent">
      <div class="tabpage" id="tabpage_1">
        <h2>General Settings</h2>
<table class="form-table">                    
                     <?php
				/**
				 * A sample text input option
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'City Name', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-sub]" class="regular-text" type="text" name="sample_theme_options[sometext-sub]" value="<?php esc_attr_e( $options['sometext-sub'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-sub]"><?php _e( 'Enter your City', 'sampletheme' ); ?></label>
					</td>
                    <tr valign="top"><th scope="row"><?php _e( 'Site Title', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-title]" class="regular-text" type="text" name="sample_theme_options[sometext-title]" value="<?php esc_attr_e( $options['sometext-title'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-title]"><?php _e( 'Enter your Site Title', 'sampletheme' ); ?></label>
					</td>
                    <tr valign="top"><th scope="row"><?php _e( 'Hotline Title', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-htitle]" class="regular-text" type="text" name="sample_theme_options[sometext-htitle]" value="<?php esc_attr_e( $options['sometext-htitle'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-htitle]"><?php _e( 'Enter your hotline title', 'sampletheme' ); ?></label>
					</td>
                    
                    <tr valign="top"><th scope="row"><?php _e( 'Hotline Number', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-hnum]" class="regular-text" type="text" name="sample_theme_options[sometext-hnum]" value="<?php esc_attr_e( $options['sometext-hnum'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-hnum]"><?php _e( 'Enter your hotline Number', 'sampletheme' ); ?></label>
					</td>
                    <tr valign="top"><th scope="row"><?php _e( 'Enable 480x60 Advertisment', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[option1]" name="sample_theme_options[option1]" type="checkbox" value="1" <?php checked( '1', $options['option1'] ); ?> />
						<label class="description" for="sample_theme_options[option1]"><?php _e( 'Enable', 'sampletheme' ); ?></label>
					</td>
				</tr>

                    
			</table>
            </div>
            <div class="tabpage" id="tabpage_2">
        <h2>Mobile Options</h2>
<table class="form-table">
 <tr valign="top"><th scope="row"><?php _e( 'Coupon Image URL', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-cpu]" class="regular-text" type="text" name="sample_theme_options[sometext-cpu]" value="<?php esc_attr_e( $options['sometext-cpu'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-cpu]"><?php _e( 'Enter your coupon Image URL', 'sampletheme' ); ?></label>
					</td>
                     <tr valign="top"><th scope="row"><?php _e( 'Coupon Text', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-ctt]" class="regular-text" type="text" name="sample_theme_options[sometext-ctt]" value="<?php esc_attr_e( $options['sometext-ctt'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-ctt]"><?php _e( 'Enter your coupon text', 'sampletheme' ); ?></label>
					</td>
                     <tr valign="top"><th scope="row"><?php _e( 'Schedule Service Text', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-sst]" class="regular-text" type="text" name="sample_theme_options[sometext-sst]" value="<?php esc_attr_e( $options['sometext-sst'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-sst]"><?php _e( 'Enter your Schedule Service Button Text', 'sampletheme' ); ?></label>
					</td>
                     <tr valign="top"><th scope="row"><?php _e( 'Schedule Service URL', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-ssu]" class="regular-text" type="text" name="sample_theme_options[sometext-ssu]" value="<?php esc_attr_e( $options['sometext-ssu'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-ssu]"><?php _e( 'Enter your Schedule Service URL', 'sampletheme' ); ?></label>
                          <tr valign="top"><th scope="row"><?php _e( 'Call Numbers', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-calln]" class="regular-text" type="text" name="sample_theme_options[sometext-calln]" value="<?php esc_attr_e( $options['sometext-calln'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-calln]"><?php _e( 'Enter you call numbers. Please do not enter space between the numbers', 'sampletheme' ); ?></label>
					</td>
                    
			</table>
            </div>
      <div class="tabpage" id="tabpage_3">
        <h2>Carousel Slider Settings</h2>
<table class="form-table">
<tr valign="top"><th scope="row"><?php _e( 'Slider Width', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-cswidth]" class="regular-text" type="text" name="sample_theme_options[sometext-cswidth]" value="<?php esc_attr_e( $options['sometext-cswidth'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-cswidth]"><?php _e( 'px Width of Slider in . Default:780', 'sampletheme' ); ?></label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Slider Height', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-csheight]" class="regular-text" type="text" name="sample_theme_options[sometext-csheight]" value="<?php esc_attr_e( $options['sometext-csheight'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-csheight]"><?php _e( 'px Height of Slider. Default:500', 'sampletheme' ); ?></label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Horizontal Position', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-csxp]" class="regular-text" type="text" name="sample_theme_options[sometext-csxp]" value="<?php esc_attr_e( $options['sometext-csxp'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-csxp]"><?php _e( 'Horizontal Position of slider. Default:390', 'sampletheme' ); ?></label>
					</td></tr>

<tr valign="top"><th scope="row"><?php _e( 'Vertical Position', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-csyp]" class="regular-text" type="text" name="sample_theme_options[sometext-csyp]" value="<?php esc_attr_e( $options['sometext-csyp'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-csyp]"><?php _e( 'Vertical Position of slider. Default:120', 'sampletheme' ); ?></label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Vertical Radius', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-csvr]" class="regular-text" type="text" name="sample_theme_options[sometext-csvr]" value="<?php esc_attr_e( $options['sometext-csvr'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-csvr]"><?php _e( 'Vertical Radius of slider. Default:50', 'sampletheme' ); ?></label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Speed', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-csspeed]" class="regular-text" type="text" name="sample_theme_options[sometext-csspeed]" value="<?php esc_attr_e( $options['sometext-csspeed'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-csspeed]"><?php _e( 'Speed of Slider. Default: 0.04', 'sampletheme' ); ?></label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Rotation Delay', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-csrd]" class="regular-text" type="text" name="sample_theme_options[sometext-csrd]" value="<?php esc_attr_e( $options['sometext-csrd'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-csrd]"><?php _e( 'Rotation Delay. Default:850', 'sampletheme' ); ?></label>
					</td></tr>
                    <tr valign="top"><th scope="row"><?php _e( 'Mouse Wheel', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[option2]" name="sample_theme_options[option2]" type="checkbox" value="1" <?php checked( '1', $options['option2'] ); ?> />
						<label class="description" for="sample_theme_options[option2]"><?php _e( 'Enable', 'sampletheme' ); ?></label>
					</td>
                    <tr valign="top"><th scope="row"><?php _e( 'Navigation Buttons', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[option3]" name="sample_theme_options[option3]" type="checkbox" value="1" <?php checked( '1', $options['option3'] ); ?> />
						<label class="description" for="sample_theme_options[option3]"><?php _e( 'Enable', 'sampletheme' ); ?></label>
					</td>
                    <tr valign="top"><th scope="row"><?php _e( 'Title and Description', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[option4]" name="sample_theme_options[option4]" type="checkbox" value="1" <?php checked( '1', $options['option4'] ); ?> />
						<label class="description" for="sample_theme_options[option4]"><?php _e( 'Enable', 'sampletheme' ); ?></label>
					</td>
				</tr>
                <tr valign="top"><th scope="row"><?php _e( 'Rotation Direction', 'sampletheme' ); ?></th>
					<td>
						<select name="sample_theme_options[selectinput]">
							<?php
								$selected = $options['selectinput'];
								$p = '';
								$r = '';

								foreach ( $select_options as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
						</select>
						<label class="description" for="sample_theme_options[selectinput]"><?php _e( 'Select Rotation Direction', 'sampletheme' ); ?></label>
					</td>
				</tr>
                    
			</table>
            </div>
            <div class="tabpage" id="tabpage_4">
        <h2>Carousel Slider Images</h2>

<div class="wrapper2">
<div class="expand_top"><div class="expand_all">Expand All</div></div>
<div class="expand_wrapper">
	<h2 class="expand_heading"><a href="#">Image 1</a></h2>
	
	<div class="toggle_container">
		<div class="box">
	<table class="form-table">
<tr valign="top"><th scope="row"><?php _e( 'Image URL 1', 'sampletheme' ); ?></th>
					<td>
                    
                    <input id="upload_logo" type="text" size="36" name="sample_theme_options[sometext-csiu1]" value="<?php esc_attr_e( $options['sometext-csiu1'] ); ?>" /> <input id="upload_logo_button" type="button" value="Upload Image" />
<label for="upload_logo">
<br /><small>Enter Image URL. Leave Blank if you do not want to add</small>
</label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Title 1', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-csit1]" class="regular-text" type="text" name="sample_theme_options[sometext-csit1]" value="<?php esc_attr_e( $options['sometext-csit1'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-csit1]"><?php _e( 'Enter Title of Image', 'sampletheme' ); ?></label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Description 1', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-csid1]" class="regular-text" type="text" name="sample_theme_options[sometext-csid1]" value="<?php esc_attr_e( $options['sometext-csid1'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-csid1]"><?php _e( 'Enter Description of Image', 'sampletheme' ); ?></label>
					</td></tr>

<tr valign="top"><th scope="row"><?php _e( 'Light Box Image URL', 'sampletheme' ); ?></th>
					<td>
						<input id="upload_light" type="text" size="36" name="sample_theme_options[sometext-cslb]" value="<?php esc_attr_e( $options['sometext-cslb'] ); ?>" /> <input id="upload_lbutton" type="button" value="Upload Image" />
						<label class="description" for="sample_theme_options[sometext-cslb]"><br /><small>Enter Light Box Image URL</small></label>
					</td></tr>
			</table>
		</div>
	</div>
	
	<h2 class="expand_heading"><a href="#">Image 2</a></h2>

	<div class="toggle_container">
		<div class="box">
    <table class="form-table">
<tr valign="top"><th scope="row"><?php _e( 'Image URL 2', 'sampletheme' ); ?></th>
					<td>
                    
                    <input id="upload_logo2" type="text" size="36" name="sample_theme_options[sometext-csiu12]" value="<?php esc_attr_e( $options['sometext-csiu12'] ); ?>" /> <input id="upload_logo_button2" type="button" value="Upload Image" />
<label for="upload_logo">
<br /><small>Enter Image URL. Leave Blank if you do not want to add</small>
</label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Title 2', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-csit2]" class="regular-text" type="text" name="sample_theme_options[sometext-csit2]" value="<?php esc_attr_e( $options['sometext-csit2'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-csit2]"><?php _e( 'Enter Title of Image', 'sampletheme' ); ?></label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Description 2', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-csid2]" class="regular-text" type="text" name="sample_theme_options[sometext-csid2]" value="<?php esc_attr_e( $options['sometext-csid2'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-csid2]"><?php _e( 'Enter Description of Image', 'sampletheme' ); ?></label>
					</td></tr>

<tr valign="top"><th scope="row"><?php _e( 'Light Box Image URL', 'sampletheme' ); ?></th>
					<td>
						<input id="upload_light2" type="text" size="36" name="sample_theme_options[sometext-cslb2]" value="<?php esc_attr_e( $options['sometext-cslb2'] ); ?>" /> <input id="upload_lbutton2" type="button" value="Upload Image" />
						<label class="description" for="sample_theme_options[sometext-cslb2]"><br /><small>Enter Light Box Image URL</small></label>
					</td></tr>
			</table>
		</div>

	</div>
	
	<h2 class="expand_heading"><a href="#">Image 3</a></h2>
	<div class="toggle_container">
		<div class="box">
	<table class="form-table">
<tr valign="top"><th scope="row"><?php _e( 'Image URL 3', 'sampletheme' ); ?></th>
					<td>
                    
                    <input id="upload_logo3" type="text" size="36" name="sample_theme_options[sometext-csiu3]" value="<?php esc_attr_e( $options['sometext-csiu3'] ); ?>" /> <input id="upload_logo_button3" type="button" value="Upload Image" />
<label for="upload_logo">
<br /><small>Enter Image URL. Leave Blank if you do not want to add</small>
</label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Title 3', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-csit3]" class="regular-text" type="text" name="sample_theme_options[sometext-csit3]" value="<?php esc_attr_e( $options['sometext-csit3'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-csit3]"><?php _e( 'Enter Title of Image', 'sampletheme' ); ?></label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Description 3', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-csid3]" class="regular-text" type="text" name="sample_theme_options[sometext-csid3]" value="<?php esc_attr_e( $options['sometext-csid3'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-csid3]"><?php _e( 'Enter Description of Image', 'sampletheme' ); ?></label>
					</td></tr>

<tr valign="top"><th scope="row"><?php _e( 'Light Box Image URL', 'sampletheme' ); ?></th>
					<td>
						<input id="upload_light3" type="text" size="36" name="sample_theme_options[sometext-cslb3]" value="<?php esc_attr_e( $options['sometext-cslb3'] ); ?>" /> <input id="upload_lbutton3" type="button" value="Upload Image" />
						<label class="description" for="sample_theme_options[sometext-cslb3]"><br /><small>Enter Light Box Image URL</small></label>
					</td></tr>
			</table>
		</div>
	</div>
	
	<h2 class="expand_heading"><a href="#">Image 4</a></h2>
	<div class="toggle_container">
		<div class="box">
        <table class="form-table">
<tr valign="top"><th scope="row"><?php _e( 'Image URL 4', 'sampletheme' ); ?></th>
					<td>
                    
                    <input id="upload_logo4" type="text" size="36" name="sample_theme_options[sometext-csiu4]" value="<?php esc_attr_e( $options['sometext-csiu4'] ); ?>" /> <input id="upload_logo_button4" type="button" value="Upload Image" />
<label for="upload_logo">
<br /><small>Enter Image URL. Leave Blank if you do not want to add</small>
</label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Title 4', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-csit4]" class="regular-text" type="text" name="sample_theme_options[sometext-csit4]" value="<?php esc_attr_e( $options['sometext-csit4'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-csit4]"><?php _e( 'Enter Title of Image', 'sampletheme' ); ?></label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Description 4', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-csid4]" class="regular-text" type="text" name="sample_theme_options[sometext-csid4]" value="<?php esc_attr_e( $options['sometext-csid4'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-csid4]"><?php _e( 'Enter Description of Image', 'sampletheme' ); ?></label>
					</td></tr>

<tr valign="top"><th scope="row"><?php _e( 'Light Box Image URL', 'sampletheme' ); ?></th>
					<td>
						<input id="upload_light4" type="text" size="36" name="sample_theme_options[sometext-cslb4]" value="<?php esc_attr_e( $options['sometext-cslb4'] ); ?>" /> <input id="upload_lbutton4" type="button" value="Upload Image" />
						<label class="description" for="sample_theme_options[sometext-cslb4]"><br /><small>Enter Light Box Image URL</small></label>
					</td></tr>
			</table>
		</div>
	</div>
    
    <h2 class="expand_heading"><a href="#">Image 5</a></h2>
	<div class="toggle_container">
		<div class="box">
        <table class="form-table">
<tr valign="top"><th scope="row"><?php _e( 'Image URL 5', 'sampletheme' ); ?></th>
					<td>
                    
                    <input id="upload_logo5" type="text" size="36" name="sample_theme_options[sometext-csiu5]" value="<?php esc_attr_e( $options['sometext-csiu5'] ); ?>" /> <input id="upload_logo_button5" type="button" value="Upload Image" />
<label for="upload_logo">
<br /><small>Enter Image URL. Leave Blank if you do not want to add</small>
</label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Title 5', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-csit5]" class="regular-text" type="text" name="sample_theme_options[sometext-csit5]" value="<?php esc_attr_e( $options['sometext-csit5'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-csit5]"><?php _e( 'Enter Title of Image', 'sampletheme' ); ?></label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Description 5', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-csid5]" class="regular-text" type="text" name="sample_theme_options[sometext-csid5]" value="<?php esc_attr_e( $options['sometext-csid5'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-csid5]"><?php _e( 'Enter Description of Image', 'sampletheme' ); ?></label>
					</td></tr>

<tr valign="top"><th scope="row"><?php _e( 'Light Box Image URL', 'sampletheme' ); ?></th>
					<td>
						<input id="upload_light6" type="text" size="36" name="sample_theme_options[sometext-cslb6]" value="<?php esc_attr_e( $options['sometext-cslb6'] ); ?>" /> <input id="upload_lbutton6" type="button" value="Upload Image" />
						<label class="description" for="sample_theme_options[sometext-cslb6]"><br /><small>Enter Light Box Image URL</small></label>
					</td></tr>
			</table>
		</div>
	</div>
    
    <h2 class="expand_heading"><a href="#">Image 6</a></h2>
	<div class="toggle_container">
		<div class="box">
        <table class="form-table">
<tr valign="top"><th scope="row"><?php _e( 'Image URL 6', 'sampletheme' ); ?></th>
					<td>
                    
                    <input id="upload_logo6" type="text" size="36" name="sample_theme_options[sometext-csiu6]" value="<?php esc_attr_e( $options['sometext-csiu6'] ); ?>" /> <input id="upload_logo_button6" type="button" value="Upload Image" />
<label for="upload_logo">
<br /><small>Enter Image URL. Leave Blank if you do not want to add</small>
</label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Title 6', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-csit6]" class="regular-text" type="text" name="sample_theme_options[sometext-csit6]" value="<?php esc_attr_e( $options['sometext-csit6'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-csit6]"><?php _e( 'Enter Title of Image', 'sampletheme' ); ?></label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Description 6', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-csid6]" class="regular-text" type="text" name="sample_theme_options[sometext-csid6]" value="<?php esc_attr_e( $options['sometext-csid6'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-csid6]"><?php _e( 'Enter Description of Image', 'sampletheme' ); ?></label>
					</td></tr>

<tr valign="top"><th scope="row"><?php _e( 'Light Box Image URL', 'sampletheme' ); ?></th>
					<td>
						<input id="upload_light6" type="text" size="36" name="sample_theme_options[sometext-cslb6]" value="<?php esc_attr_e( $options['sometext-cslb6'] ); ?>" /> <input id="upload_lbutton6" type="button" value="Upload Image" />
						<label class="description" for="sample_theme_options[sometext-cslb6]"><br /><small>Enter Light Box Image URL</small></label>
					</td></tr>
			</table>
		</div>
	</div>
    
    <h2 class="expand_heading"><a href="#">Image 7</a></h2>
	<div class="toggle_container">
		<div class="box">
        <table class="form-table">
<tr valign="top"><th scope="row"><?php _e( 'Image URL 7', 'sampletheme' ); ?></th>
					<td>
                    
                    <input id="upload_logo7" type="text" size="36" name="sample_theme_options[sometext-csiu7]" value="<?php esc_attr_e( $options['sometext-csiu7'] ); ?>" /> <input id="upload_logo_button7" type="button" value="Upload Image" />
<label for="upload_logo">
<br /><small>Enter Image URL. Leave Blank if you do not want to add</small>
</label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Title 7', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-csit7]" class="regular-text" type="text" name="sample_theme_options[sometext-csit7]" value="<?php esc_attr_e( $options['sometext-csit7'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-csit7]"><?php _e( 'Enter Title of Image', 'sampletheme' ); ?></label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Description 7', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-csid7]" class="regular-text" type="text" name="sample_theme_options[sometext-csid7]" value="<?php esc_attr_e( $options['sometext-csid7'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-csid7]"><?php _e( 'Enter Description of Image', 'sampletheme' ); ?></label>
					</td></tr>

<tr valign="top"><th scope="row"><?php _e( 'Light Box Image URL', 'sampletheme' ); ?></th>
					<td>
						<input id="upload_light7" type="text" size="36" name="sample_theme_options[sometext-cslb7]" value="<?php esc_attr_e( $options['sometext-cslb7'] ); ?>" /> <input id="upload_lbutton7" type="button" value="Upload Image" />
						<label class="description" for="sample_theme_options[sometext-cslb7]"><br /><small>Enter Light Box Image URL</small></label>
					</td></tr>
			</table>
		</div>
	</div>
    
    <h2 class="expand_heading"><a href="#">Image 8</a></h2>
	<div class="toggle_container">
		<div class="box">
        <table class="form-table">
<tr valign="top"><th scope="row"><?php _e( 'Image URL 8', 'sampletheme' ); ?></th>
					<td>
                    
                    <input id="upload_logo8" type="text" size="36" name="sample_theme_options[sometext-csiu8]" value="<?php esc_attr_e( $options['sometext-csiu8'] ); ?>" /> <input id="upload_logo_button8" type="button" value="Upload Image" />
<label for="upload_logo">
<br /><small>Enter Image URL. Leave Blank if you do not want to add</small>
</label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Title 8', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-csit8]" class="regular-text" type="text" name="sample_theme_options[sometext-csit8]" value="<?php esc_attr_e( $options['sometext-csit8'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-csit8]"><?php _e( 'Enter Title of Image', 'sampletheme' ); ?></label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Description 8', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext-csid8]" class="regular-text" type="text" name="sample_theme_options[sometext-csid8]" value="<?php esc_attr_e( $options['sometext-csid8'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext-csid8]"><?php _e( 'Enter Description of Image', 'sampletheme' ); ?></label>
					</td></tr>

<tr valign="top"><th scope="row"><?php _e( 'Light Box Image URL', 'sampletheme' ); ?></th>
					<td>
						<input id="upload_light8" type="text" size="36" name="sample_theme_options[sometext-cslb8]" value="<?php esc_attr_e( $options['sometext-cslb8'] ); ?>" /> <input id="upload_lbutton8" type="button" value="Upload Image" />
						<label class="description" for="sample_theme_options[sometext-cslb8]"><br /><small>Enter Light Box Image URL</small></label>
					</td></tr>
			</table>
		</div>
	</div>
	
</div>

</div>
</div>
            </div>
            </div>

			
        </div>
			</div>
        <p class="submit" style="clear:both">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'sampletheme' ); ?>" />
			</p>
		</form>
		
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $select_options, $radio_options;

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['option1'] ) )
		$input['option1'] = null;
	$input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );


	// Say our textarea option must be safe text with the allowed tags for posts
	$input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );

	return $input;
}
