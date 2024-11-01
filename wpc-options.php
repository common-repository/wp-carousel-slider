<?php
// create custom plugin settings menu
add_action('admin_menu', 'wcs_menu');

function wcs_menu() {

	//create new top-level menu
	add_menu_page('WP Carousel Slider Options', 'WP Carousel', 'administrator', 'wpc_options', 'wpc_options',plugins_url('/images/icon.png', __FILE__));

	//call register settings function
	add_action( 'admin_init', 'register_mysettings' );
}

define( 'WCS_DIRECTORY', plugin_dir_path(__FILE__) );


function wcs_admin_scripts() {
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_register_script('my-upload',plugins_url('/js/my-script.js', __FILE__), array('jquery','media-upload','thickbox'));wp_enqueue_script('my-upload');
wp_register_script('tabs',plugins_url('/js/tabs.js', __FILE__));
wp_register_script('expand',plugins_url('/js/expand.js', __FILE__));
wp_register_script('jquerya',plugins_url('/js/jquery.js', __FILE__));
wp_enqueue_script('expand');
wp_enqueue_script('tabs');
wp_enqueue_script('jquerya');
}

function wcs_admin_styles() {
wp_enqueue_style('thickbox');
wp_enqueue_style('my-custom-style',plugins_url('/css/style-options.css', __FILE__),false,'1.1','all');
}


if (isset($_GET['page']) && $_GET['page'] == 'wpc_options') {
add_action('admin_print_scripts', 'wcs_admin_scripts');
add_action('admin_print_styles', 'wcs_admin_styles');
}


function register_mysettings() {
	//register our settings
	register_setting( 'wpc_options', 'slider_wpc_options');
}
function img_cont(){
	$img_conter = 0;
	$options = get_option('slider_wpc_options');
 if( !empty($options['sometext-csiu1']))$img_conter++;
 if( !empty($options['sometext-csiu2']))$img_conter++;
 if( !empty($options['sometext-csiu3']))$img_conter++;
 if( !empty($options['sometext-csiu4']))$img_conter++;
 if( !empty($options['sometext-csiu5']))$img_conter++;
 if( !empty($options['sometext-csiu6']))$img_conter++;
 if( !empty($options['sometext-csiu7']))$img_conter++;
 if( !empty($options['sometext-csiu8']))$img_conter++;
 if( !empty($options['sometext-csiu9']))$img_conter++;
 if( !empty($options['sometext-csiu10']))$img_conter++;
 return $img_conter;
	
}
function wpc_options() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
    <div class="metabox-holder columns-2">
    <div id="head-box"><img class="header-icon" src="<?php echo plugins_url('/images/carousel.png', __FILE__) ?>" /><h2>Wp Carousel Slider<br />
<span>Version 0.7.2</span></h2><h3 class="img-conter"><?php if(img_cont() !== 0){ echo "<span>You are Using Images <span class='large'>". img_cont()." of 10</span></span>";}?></h3></div>
<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
        <div class="updated fade"><p><strong><?php _e( 'Options saved', 'sliderwpc' ); ?></strong></p></div>
		<?php endif; ?>
		<?php if(img_cont() == 0){ ?>
        <div class="error fade"><p><strong><?php _e( 'Please Add Images in Slider', 'sliderwpc' ); ?></strong></p></div>
        <?php } ?>
 	<div class="wrap">
		


        <form method="post" action="options.php">
			<?php settings_fields( 'wpc_options' ); ?>
            <?php do_settings_sections( 'wpc_options' ); ?>
			<?php $options = get_option( 'slider_wpc_options' ); ?>
  <?php          
  $select_options = array(
	'0' => array(
		'value' =>	'left',
		'label' => __( 'Left', 'sampletheme' )
	),
	'1' => array(
		'value' =>	'right',
		'label' => __( 'Right', 'sampletheme' )
	),
); ?>	
        <div class="inside">
        <div id="tabContainer">
        <div class="tabs">
        <ul>
        <li id="tabHeader_3">Gerneral Settings</li>
        <li id="tabHeader_4">Slider Images</li>
        <li id="tabHeader_5">Slider Usages</li>
        <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
      </ul>
    </div>
    <div class="tabscontent">
      <div class="tabpage" id="tabpage_3">
        <h2>General Settings</h2>
        <p>Leave Blank Fields to use Default Settings</p>
       
<table class="form-table">
<tr valign="top"><th scope="row"><?php _e( 'Slider Width', 'sliderwpc' ); ?></th>
					<td>
						<input id="slider_wpc_options[sometext-cswidth]" class="regular-text" type="text" name="slider_wpc_options[sometext-cswidth]" value="<?php esc_attr_e( $options['sometext-cswidth'] ); ?>" /><br />
						<label class="description" for="slider_wpc_options[sometext-cswidth]"><?php _e( 'Width of Slider . <b>Default :720</b>', 'sliderwpc' ); ?></label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Slider Height', 'sliderwpc' ); ?></th>
					<td>
						<input id="slider_wpc_options[sometext-csheight]" class="regular-text" type="text" name="slider_wpc_options[sometext-csheight]" value="<?php esc_attr_e( $options['sometext-csheight'] ); ?>" /><br />
						<label class="description" for="slider_wpc_options[sometext-csheight]"><?php _e( 'Height of Slider. <b>Default: 500</b>', 'sliderwpc' ); ?></label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Horizontal Position', 'sliderwpc' ); ?></th>
					<td>
						<input id="slider_wpc_options[sometext-csxp]" class="regular-text" type="text" name="slider_wpc_options[sometext-csxp]" value="<?php esc_attr_e( $options['sometext-csxp'] ); ?>" /><br />
						<label class="description" for="slider_wpc_options[sometext-csxp]"><?php _e( 'Horizontal Position of slider. <b>Default: 360</b>', 'sliderwpc' ); ?></label>
					</td></tr>

<tr valign="top"><th scope="row"><?php _e( 'Vertical Position', 'sliderwpc' ); ?></th>
					<td>
						<input id="slider_wpc_options[sometext-csyp]" class="regular-text" type="text" name="slider_wpc_options[sometext-csyp]" value="<?php esc_attr_e( $options['sometext-csyp'] ); ?>" /><br />
						<label class="description" for="slider_wpc_options[sometext-csyp]"><?php _e( 'Vertical Position of slider. <b>Default: 120</b>', 'sliderwpc' ); ?></label>
					</td></tr>
                    <tr valign="top"><th scope="row"><?php _e( 'Horizontal Radius', 'sliderwpc' ); ?></th>
					<td>
						<input id="slider_wpc_options[sometext-csxr]" class="regular-text" type="text" name="slider_wpc_options[sometext-csxr]" value="<?php esc_attr_e( $options['sometext-csxr'] ); ?>" /><br />
						<label class="description" for="slider_wpc_options[sometext-csxr]"><?php _e( 'Horizontal Radius of slider. <b>Default: 300</b>', 'sliderwpc' ); ?></label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Vertical Radius', 'sliderwpc' ); ?></th>
					<td>
						<input id="slider_wpc_options[sometext-csvr]" class="regular-text" type="text" name="slider_wpc_options[sometext-csvr]" value="<?php esc_attr_e( $options['sometext-csvr'] ); ?>" /><br />
						<label class="description" for="slider_wpc_options[sometext-csvr]"><?php _e( 'Vertical Radius of slider. <b>Default: 50</b>', 'sliderwpc' ); ?></label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Speed', 'sliderwpc' ); ?></th>
					<td>
						<input id="slider_wpc_options[sometext-csspeed]" class="regular-text" type="text" name="slider_wpc_options[sometext-csspeed]" value="<?php esc_attr_e( $options['sometext-csspeed'] ); ?>" /><br />
						<label class="description" for="slider_wpc_options[sometext-csspeed]"><?php _e( 'Speed of Slider. <b>Default: 0.2</b>', 'sliderwpc' ); ?></label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Rotation Delay', 'sliderwpc' ); ?></th>
					<td>
						<input id="slider_wpc_options[sometext-csrd]" class="regular-text" type="text" name="slider_wpc_options[sometext-csrd]" value="<?php esc_attr_e( $options['sometext-csrd'] ); ?>" /><br />
						<label class="description" for="slider_wpc_options[sometext-csrd]"><?php _e( 'Rotation Delay in Mileseconds. <b>Default: 3000</b>', 'sliderwpc' ); ?></label>
					</td></tr>
                    <tr valign="top"><th scope="row"><?php _e( 'Mouse Wheel', 'sliderwpc' ); ?></th>
					<td>
						<input id="slider_wpc_options[option2]" name="slider_wpc_options[option2]" type="checkbox" value="1" <?php checked( '1', $options['option2'] ); ?> />
						<label class="description" for="slider_wpc_options[option2]"><?php _e( 'Enable', 'sliderwpc' ); ?></label><br />
<label class="description" for="slider_wpc_options[option2]"><?php _e( 'Scroll Mouse Wheel Rotation Directions', 'sliderwpc' ); ?></label>
					</td>
				</tr>
                <tr valign="top"><th scope="row"><?php _e( 'Rotation Direction', 'sliderwpc' ); ?></th>
					<td>
						<select name="slider_wpc_options[selectinput]">
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
						</select><br />

						<label class="description" for="slider_wpc_options[selectinput]"><?php _e( 'Select Rotation Direction', 'sliderwpc' ); ?></label>
					</td>
				</tr>
                 <tr valign="top"><th scope="row"><?php _e( 'Navigation Buttons', 'sampletheme' ); ?></th>
					<td>
						<input id="slider_wpc_options[option3]" name="slider_wpc_options[option3]" type="checkbox" value="1" <?php checked( '1', $options['option3'] ); ?> />
						<label class="description" for="slider_wpc_options[option3]"><?php _e( 'Enable', 'sampletheme' ); ?></label><br /><label class="description">Navigation Buttons to Control the Images</label>
					</td>
                    <tr valign="top"><th scope="row"><?php _e( 'Title and Description', 'sampletheme' ); ?></th>
					<td>
						<input id="slider_wpc_options[option4]" name="slider_wpc_options[option4]" type="checkbox" value="1" <?php checked( '1', $options['option4'] ); ?> />
						<label class="description" for="slider_wpc_options[option4]"><?php _e( 'Enable', 'sampletheme' ); ?></label><br /><label class="description">Image Title and Descriptions</label>
                        </td>
                        </tr>
                        
                    
			</table>
            </div>
      <div class="tabpage" id="tabpage_4">
        <h2>Slider Images</h2>

<div class="wrapper2">
<div class="expand_top"><div class="expand_all">Expand All</div></div>
<div class="expand_wrapper">
	<h2 class="expand_heading"><a href="#">Image 1</a></h2>
	
	<div class="toggle_container">
		<div class="box">
	<table class="form-table">
<tr valign="top"><th scope="row"><?php _e( 'Image URL 1 (Thumbnail)', 'sliderwpc' ); ?></th>
					<td>
<input id="upload_logoa" type="text" size="36" name="slider_wpc_options[sometext-csiu1]" value="<?php esc_attr_e( $options['sometext-csiu1'] ); ?>" /> <input id="upload_logo_buttona" type="button" value="Upload Image" />
<label for="upload_logoa">
<br /><small>Enter Image URL. Leave Blank if you do not want to add</small>
</label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Title 1', 'sliderwpc' ); ?></th>
					<td>
						<input id="slider_wpc_options[sometext-csit1]" class="regular-text" type="text" name="slider_wpc_options[sometext-csit1]" value="<?php esc_attr_e( $options['sometext-csit1'] ); ?>" /><br />
						<label class="description" for="slider_wpc_options[sometext-csit1]"><?php _e( '<small>Enter Title of Image</small>', 'sliderwpc' ); ?></label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Description 1', 'sliderwpc' ); ?></th>
					<td>
						<input id="slider_wpc_options[sometext-csid1]" class="regular-text" type="text" name="slider_wpc_options[sometext-csid1]" value="<?php esc_attr_e( $options['sometext-csid1'] ); ?>" /><br />

						<label class="description" for="slider_wpc_options[sometext-csid1]"><?php _e( '<small>Enter Description of Image</small>', 'sliderwpc' ); ?></label>
					</td></tr>

<tr valign="top">
<th scope="row">
<?php _e( 'Light Box Image URL', 'sliderwpc' ); ?></th>
					<td>
<input id="upload_logob" type="text" size="36" name="slider_wpc_options[sometext-cslb1]" value="<?php esc_attr_e( $options['sometext-cslb1'] ); ?>" /> <input id="upload_logo_buttonb" type="button" value="Upload Image" />
<label for="upload_logo">
<br /><small>Enter Image URL. Leave Blank if you do not want to add</small>
</label>
					</td></tr>
			</table>
		</div>
	</div>
	
	<h2 class="expand_heading"><a href="#">Image 2</a></h2>

	<div class="toggle_container">
		<div class="box">
    <table class="form-table">
<tr valign="top"><th scope="row"><?php _e( 'Image URL 2 (Thumbnail)', 'sliderwpc' ); ?></th>
					<td>
                    
                    <input id="upload_logoc" type="text" size="36" name="slider_wpc_options[sometext-csiu2]" value="<?php esc_attr_e( $options['sometext-csiu2'] ); ?>" /> <input id="upload_logo_buttonc" type="button" value="Upload Image" />
<label for="upload_logo">
<br /><small>Enter Image URL. Leave Blank if you do not want to add</small>
</label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Title 2', 'sliderwpc' ); ?></th>
					<td>
						<input id="slider_wpc_options[sometext-csit2]" class="regular-text" type="text" name="slider_wpc_options[sometext-csit2]" value="<?php esc_attr_e( $options['sometext-csit2'] ); ?>" /><br />

						<label class="description" for="slider_wpc_options[sometext-csit2]"><?php _e( '<small>Enter Title of Image</small>', 'sliderwpc' ); ?></label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Description 2', 'sliderwpc' ); ?></th>
					<td>
						<input id="slider_wpc_options[sometext-csid2]" class="regular-text" type="text" name="slider_wpc_options[sometext-csid2]" value="<?php esc_attr_e( $options['sometext-csid2'] ); ?>" /><br />

						<label class="description" for="slider_wpc_options[sometext-csid2]"><?php _e( '<small>Enter Description of Image</small>', 'sliderwpc' ); ?></label>
					</td></tr>

<tr valign="top"><th scope="row"><?php _e( 'Light Box Image URL', 'sliderwpc' ); ?></th>
					<td>
						<input id="upload_logod" type="text" size="36" name="slider_wpc_options[sometext-cslb2]" value="<?php esc_attr_e( $options['sometext-cslb2'] ); ?>" /> <input id="upload_logo_buttond" type="button" value="Upload Image" />
						<label class="description" for="slider_wpc_options[sometext-cslb2]"><br /><small>Enter Light Box Image URL</small></label>
					</td></tr>
			</table>
		</div>

	</div>
	
	<h2 class="expand_heading"><a href="#">Image 3</a></h2>
	<div class="toggle_container">
		<div class="box">
	<table class="form-table">
<tr valign="top"><th scope="row"><?php _e( 'Image URL 3 (Thumbnail)', 'sliderwpc' ); ?></th>
					<td>
                    
                    <input id="upload_logoe" type="text" size="36" name="slider_wpc_options[sometext-csiu3]" value="<?php esc_attr_e( $options['sometext-csiu3'] ); ?>" /> <input id="upload_logo_buttone" type="button" value="Upload Image" />
<label for="upload_logo">
<br /><small>Enter Image URL. Leave Blank if you do not want to add</small>
</label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Title 3', 'sliderwpc' ); ?></th>
					<td>
						<input id="slider_wpc_options[sometext-csit3]" class="regular-text" type="text" name="slider_wpc_options[sometext-csit3]" value="<?php esc_attr_e( $options['sometext-csit3'] ); ?>" /><br />

						<label class="description" for="slider_wpc_options[sometext-csit3]"><?php _e( '<small>Enter Title of Image</small>', 'sliderwpc' ); ?></label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Description 3', 'sliderwpc' ); ?></th>
					<td>
						<input id="slider_wpc_options[sometext-csid3]" class="regular-text" type="text" name="slider_wpc_options[sometext-csid3]" value="<?php esc_attr_e( $options['sometext-csid3'] ); ?>" /><br />

						<label class="description" for="slider_wpc_options[sometext-csid3]"><?php _e( '<small>Enter Description of Image</small>', 'sliderwpc' ); ?></label>
					</td></tr>

<tr valign="top"><th scope="row"><?php _e( 'Light Box Image URL', 'sliderwpc' ); ?></th>
					<td>
						<input id="upload_logof" type="text" size="36" name="slider_wpc_options[sometext-cslb3]" value="<?php esc_attr_e( $options['sometext-cslb3'] ); ?>" /> <input id="upload_logo_buttonf" type="button" value="Upload Image" />
						<label class="description" for="slider_wpc_options[sometext-cslb3]"><br /><small>Enter Light Box Image URL</small></label>
					</td></tr>
			</table>
		</div>
	</div>
	
	<h2 class="expand_heading"><a href="#">Image 4</a></h2>
	<div class="toggle_container">
		<div class="box">
        <table class="form-table">
<tr valign="top"><th scope="row"><?php _e( 'Image URL 4 (Thumbnail)', 'sliderwpc' ); ?></th>
					<td>
                    
                    <input id="upload_logog" type="text" size="36" name="slider_wpc_options[sometext-csiu4]" value="<?php esc_attr_e( $options['sometext-csiu4'] ); ?>" /> <input id="upload_logo_buttong" type="button" value="Upload Image" />
<label for="upload_logo">
<br /><small>Enter Image URL. Leave Blank if you do not want to add</small>
</label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Title 4', 'sliderwpc' ); ?></th>
					<td>
						<input id="slider_wpc_options[sometext-csit4]" class="regular-text" type="text" name="slider_wpc_options[sometext-csit4]" value="<?php esc_attr_e( $options['sometext-csit4'] ); ?>" /><br />

						<label class="description" for="slider_wpc_options[sometext-csit4]"><?php _e( '<small>Enter Title of Image</small>', 'sliderwpc' ); ?></label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Description 4', 'sliderwpc' ); ?></th>
					<td>
						<input id="slider_wpc_options[sometext-csid4]" class="regular-text" type="text" name="slider_wpc_options[sometext-csid4]" value="<?php esc_attr_e( $options['sometext-csid4'] ); ?>" /><br />

						<label class="description" for="slider_wpc_options[sometext-csid4]"><?php _e( '<small>Enter Description of Image</small>', 'sliderwpc' ); ?></label>
					</td></tr>

<tr valign="top"><th scope="row"><?php _e( 'Light Box Image URL', 'sliderwpc' ); ?></th>
					<td>
						<input id="upload_logoh" type="text" size="36" name="slider_wpc_options[sometext-cslb4]" value="<?php esc_attr_e( $options['sometext-cslb4'] ); ?>" /><input id="upload_logo_buttonh" type="button" value="Upload Image" />
						<label class="description" for="slider_wpc_options[sometext-cslb4]"><br /><small>Enter Light Box Image URL</small></label>
					</td></tr>
			</table>
		</div>
	</div>
    
    <h2 class="expand_heading"><a href="#">Image 5</a></h2>
	<div class="toggle_container">
		<div class="box">
        <table class="form-table">
<tr valign="top"><th scope="row"><?php _e( 'Image URL 5 (Thumbnail)', 'sliderwpc' ); ?></th>
					<td>
                    
                    <input id="upload_logoi" type="text" size="36" name="slider_wpc_options[sometext-csiu5]" value="<?php esc_attr_e( $options['sometext-csiu5'] ); ?>" /> <input id="upload_logo_buttoni" type="button" value="Upload Image" />
<label for="upload_logo">
<br /><small>Enter Image URL. Leave Blank if you do not want to add</small>
</label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Title 5', 'sliderwpc' ); ?></th>
					<td>
						<input id="slider_wpc_options[sometext-csit5]" class="regular-text" type="text" name="slider_wpc_options[sometext-csit5]" value="<?php esc_attr_e( $options['sometext-csit5'] ); ?>" /><br />

						<label class="description" for="slider_wpc_options[sometext-csit5]"><?php _e( '<small>Enter Title of Image</small>', 'sliderwpc' ); ?></label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Description 5', 'sliderwpc' ); ?></th>
					<td>
						<input id="slider_wpc_options[sometext-csid5]" class="regular-text" type="text" name="slider_wpc_options[sometext-csid5]" value="<?php esc_attr_e( $options['sometext-csid5'] ); ?>" /><br />

						<label class="description" for="slider_wpc_options[sometext-csid5]"><?php _e( '<small>Enter Description of Image</small>', 'sliderwpc' ); ?></label>
					</td></tr>

<tr valign="top"><th scope="row"><?php _e( 'Light Box Image URL', 'sliderwpc' ); ?></th>
					<td>
						<input id="upload_logoj" type="text" size="36" name="slider_wpc_options[sometext-cslb5]" value="<?php esc_attr_e( $options['sometext-cslb5'] ); ?>" /> <input id="upload_logo_buttonj" type="button" value="Upload Image" />
						<label class="description" for="slider_wpc_options[sometext-cslb6]"><br /><small>Enter Light Box Image URL</small></label>
					</td></tr>
			</table>
		</div>
	</div>
    
    <h2 class="expand_heading"><a href="#">Image 6</a></h2>
	<div class="toggle_container">
		<div class="box">
        <table class="form-table">
<tr valign="top"><th scope="row"><?php _e( 'Image URL 6 (Thumbnail)', 'sliderwpc' ); ?></th>
					<td>
                    
                    <input id="upload_logok" type="text" size="36" name="slider_wpc_options[sometext-csiu6]" value="<?php esc_attr_e( $options['sometext-csiu6'] ); ?>" /> <input id="upload_logo_buttonk" type="button" value="Upload Image" />
<label for="upload_logo">
<br /><small>Enter Image URL. Leave Blank if you do not want to add</small>
</label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Title 6', 'sliderwpc' ); ?></th>
					<td>
						<input id="slider_wpc_options[sometext-csit6]" class="regular-text" type="text" name="slider_wpc_options[sometext-csit6]" value="<?php esc_attr_e( $options['sometext-csit6'] ); ?>" /><br />

						<label class="description" for="slider_wpc_options[sometext-csit6]"><?php _e( '<small>Enter Title of Image</small>', 'sliderwpc' ); ?></label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Description 6', 'sliderwpc' ); ?></th>
					<td>
						<input id="slider_wpc_options[sometext-csid6]" class="regular-text" type="text" name="slider_wpc_options[sometext-csid6]" value="<?php esc_attr_e( $options['sometext-csid6'] ); ?>" /><br />

						<label class="description" for="slider_wpc_options[sometext-csid6]"><?php _e( '<small>Enter Description of Image</small>', 'sliderwpc' ); ?></label>
					</td></tr>

<tr valign="top"><th scope="row"><?php _e( 'Light Box Image URL', 'sliderwpc' ); ?></th>
					<td>
						<input id="upload_logol" type="text" size="36" name="slider_wpc_options[sometext-cslb6]" value="<?php esc_attr_e( $options['sometext-cslb6'] ); ?>" /> <input id="upload_logo_buttonl" type="button" value="Upload Image" />
						<label class="description" for="slider_wpc_options[sometext-cslb6]"><br /><small>Enter Light Box Image URL</small></label>
					</td></tr>
			</table>
		</div>
	</div>
    
    <h2 class="expand_heading"><a href="#">Image 7</a></h2>
	<div class="toggle_container">
		<div class="box">
        <table class="form-table">
<tr valign="top"><th scope="row"><?php _e( 'Image URL 7 (Thumbnail)', 'sliderwpc' ); ?></th>
					<td>
                    
                    <input id="upload_logom" type="text" size="36" name="slider_wpc_options[sometext-csiu7]" value="<?php esc_attr_e( $options['sometext-csiu7'] ); ?>" /> <input id="upload_logo_buttonm" type="button" value="Upload Image" />
<label for="upload_logo">
<br /><small>Enter Image URL. Leave Blank if you do not want to add</small>
</label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Title 7', 'sliderwpc' ); ?></th>
					<td>
						<input id="slider_wpc_options[sometext-csit7]" class="regular-text" type="text" name="slider_wpc_options[sometext-csit7]" value="<?php esc_attr_e( $options['sometext-csit7'] ); ?>" /><br />

						<label class="description" for="slider_wpc_options[sometext-csit7]"><?php _e( '<small>Enter Title of Image</small>', 'sliderwpc' ); ?></label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Description 7', 'sliderwpc' ); ?></th>
					<td>
						<input id="slider_wpc_options[sometext-csid7]" class="regular-text" type="text" name="slider_wpc_options[sometext-csid7]" value="<?php esc_attr_e( $options['sometext-csid7'] ); ?>" /><br />

						<label class="description" for="slider_wpc_options[sometext-csid7]"><?php _e( '<small>Enter Description of Image</small>', 'sliderwpc' ); ?></label>
					</td></tr>

<tr valign="top"><th scope="row"><?php _e( 'Light Box Image URL', 'sliderwpc' ); ?></th>
					<td>
						<input id="upload_logon" type="text" size="36" name="slider_wpc_options[sometext-cslb7]" value="<?php esc_attr_e( $options['sometext-cslb7'] ); ?>" /> <input id="upload_logo_buttonn" type="button" value="Upload Image" />
						<label class="description" for="slider_wpc_options[sometext-cslb7]"><br /><small>Enter Light Box Image URL</small></label>
					</td></tr>
			</table>
		</div>
	</div>
    <h2 class="expand_heading"><a href="#">Image 8</a></h2>
	<div class="toggle_container">
		<div class="box">
        <table class="form-table">
<tr valign="top"><th scope="row"><?php _e( 'Image URL 8 (Thumbnail)', 'sliderwpc' ); ?></th>
					<td>
                    
                    <input id="upload_logoo" type="text" size="36" name="slider_wpc_options[sometext-csiu8]" value="<?php esc_attr_e( $options['sometext-csiu8'] ); ?>" /> <input id="upload_logo_buttono" type="button" value="Upload Image" />
<label for="upload_logo">
<br /><small>Enter Image URL. Leave Blank if you do not want to add</small>
</label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Title 8', 'sliderwpc' ); ?></th>
					<td>
						<input id="slider_wpc_options[sometext-csit8]" class="regular-text" type="text" name="slider_wpc_options[sometext-csit8]" value="<?php esc_attr_e( $options['sometext-csit8'] ); ?>" /><br />

						<label class="description" for="slider_wpc_options[sometext-csit8]"><?php _e( '<small>Enter Title of Image</small>', 'sliderwpc' ); ?></label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Description 8', 'sliderwpc' ); ?></th>
					<td>
						<input id="slider_wpc_options[sometext-csid8]" class="regular-text" type="text" name="slider_wpc_options[sometext-csid8]" value="<?php esc_attr_e( $options['sometext-csid8'] ); ?>" /><br />

						<label class="description" for="slider_wpc_options[sometext-csid8]"><?php _e( '<small>Enter Description of Image</small>', 'sliderwpc' ); ?></label>
					</td></tr>

<tr valign="top"><th scope="row"><?php _e( 'Light Box Image URL', 'sliderwpc' ); ?></th>
					<td>
						<input id="upload_logop" type="text" size="36" name="slider_wpc_options[sometext-cslb8]" value="<?php esc_attr_e( $options['sometext-cslb8'] ); ?>" /> <input id="upload_logo_buttonp" type="button" value="Upload Image" />
						<label class="description" for="slider_wpc_options[sometext-cslb8]"><br /><small>Enter Light Box Image URL</small></label>
					</td></tr>
			</table>
		</div>
	</div>
    <h2 class="expand_heading"><a href="#">Image 9</a></h2>
	<div class="toggle_container">
		<div class="box">
        <table class="form-table">
<tr valign="top"><th scope="row"><?php _e( 'Image URL 9 (Thumbnail)', 'sliderwpc' ); ?></th>
					<td>
                    
                    <input id="upload_logoq" type="text" size="36" name="slider_wpc_options[sometext-csiu9]" value="<?php esc_attr_e( $options['sometext-csiu9'] ); ?>" /> <input id="upload_logo_buttonq" type="button" value="Upload Image" />
<label for="upload_logo">
<br /><small>Enter Image URL. Leave Blank if you do not want to add</small>
</label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Title 9', 'sliderwpc' ); ?></th>
					<td>
						<input id="slider_wpc_options[sometext-csit9]" class="regular-text" type="text" name="slider_wpc_options[sometext-csit9]" value="<?php esc_attr_e( $options['sometext-csit9'] ); ?>" /><br />

						<label class="description" for="slider_wpc_options[sometext-csit9]"><?php _e( '<small>Enter Title of Image</small>', 'sliderwpc' ); ?></label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Description 9', 'sliderwpc' ); ?></th>
					<td>
						<input id="slider_wpc_options[sometext-csid9]" class="regular-text" type="text" name="slider_wpc_options[sometext-csid9]" value="<?php esc_attr_e( $options['sometext-csid9'] ); ?>" /><br />

						<label class="description" for="slider_wpc_options[sometext-csid9]"><?php _e( '<small>Enter Description of Image</small>', 'sliderwpc' ); ?></label>
					</td></tr>

<tr valign="top"><th scope="row"><?php _e( 'Light Box Image URL', 'sliderwpc' ); ?></th>
					<td>
						<input id="upload_logor" type="text" size="36" name="slider_wpc_options[sometext-cslb9]" value="<?php esc_attr_e( $options['sometext-cslb9'] ); ?>" /> <input id="upload_logo_buttonr" type="button" value="Upload Image" />
						<label class="description" for="slider_wpc_options[sometext-cslb9]"><br /><small>Enter Light Box Image URL</small></label>
					</td></tr>
			</table>
		</div>
	</div>
    <h2 class="expand_heading"><a href="#">Image 10</a></h2>
	<div class="toggle_container">
		<div class="box">
        <table class="form-table">
<tr valign="top"><th scope="row"><?php _e( 'Image URL 10 (Thumbnail)', 'sliderwpc' ); ?></th>
					<td>
                    
                    <input id="upload_logos" type="text" size="36" name="slider_wpc_options[sometext-csiu10]" value="<?php esc_attr_e( $options['sometext-csiu10'] ); ?>" /> <input id="upload_logo_buttons" type="button" value="Upload Image" />
<label for="upload_logo">
<br /><small>Enter Image URL. Leave Blank if you do not want to add</small>
</label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Title 10', 'sliderwpc' ); ?></th>
					<td>
						<input id="slider_wpc_options[sometext-csit10]" class="regular-text" type="text" name="slider_wpc_options[sometext-csit10]" value="<?php esc_attr_e( $options['sometext-csit10'] ); ?>" /><br />

						<label class="description" for="slider_wpc_options[sometext-csit10]"><?php _e( '<small>Enter Title of Image</small>', 'sliderwpc' ); ?></label>
					</td></tr>
<tr valign="top"><th scope="row"><?php _e( 'Image Description 10', 'sliderwpc' ); ?></th>
					<td>
						<input id="slider_wpc_options[sometext-csid10]" class="regular-text" type="text" name="slider_wpc_options[sometext-csid10]" value="<?php esc_attr_e( $options['sometext-csid10'] ); ?>" /><br />

						<label class="description" for="slider_wpc_options[sometext-csid10]"><?php _e( '<small>Enter Description of Image</small>', 'sliderwpc' ); ?></label>
					</td></tr>

<tr valign="top"><th scope="row"><?php _e( 'Light Box Image URL', 'sliderwpc' ); ?></th>
					<td>
						<input id="upload_logot" type="text" size="36" name="slider_wpc_options[sometext-cslb10]" value="<?php esc_attr_e( $options['sometext-cslb10'] ); ?>" /> <input id="upload_logo_buttont" type="button" value="Upload Image" />
						<label class="description" for="slider_wpc_options[sometext-cslb10]"><br /><small>Enter Light Box Image URL</small></label>
					</td></tr>
			</table>
		</div>
	</div>
	
</div>

</div>
</div>
	  <div class="tabpage" id="tabpage_5">
        <h2>Slider Usages</h2>
        <p>There are two ways to use slider<br />1. Use the shortcode <code>[wp-carousel]</code> in the content area of a page or post where you want the slider to appear. <br />2. Use <code>echo do_shortcode('[wp-carousel]');</code> in you theme page or post PHP file.</p>
            </div>
            </div>

			
        </div>
			</div>
        <p class="submit" style="clear:both">
				<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>
		 
	</div>
    <div id="postbox-container-1" class="inner-sidebar">
					<div class="meta-box-sortables" id="side-sortables"><div class="postbox " id="credits-notes">
<div title="Click to toggle" class="handlediv"><br></div><h3 class="hndle"><span>Credits</span></h3>
<div class="inside">

		<div id="credits">
			<p>Development: <a href="http://pluginsforwp.net/">Gulzar Ahmed</a></p>

			<p>Additional UI: <a href="http://theiwebsolutions.com/">iWebSolutions</a></p>

					</div>

		<div id="contrib-note">
			<center><p>If you find this plugin useful, or are using it commercially, please consider</p>
<form style="text-align: center;" action="https://www.paypal.com/cgi-bin/webscr" method="post"><input type="hidden" name="cmd" value="_s-xclick" />
<input type="hidden" name="hosted_button_id" value="XUNV7HH2STFQS" />
<input type="image" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" alt="PayPal - The safer, easier way to pay online!" />
<img src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" alt="" width="1" height="1" border="0" /></form>

			<p>Thanks!</p></center>
            <div id="fb-root"></div>
            <center>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like" data-href="http://www.facebook.com/pages/WordPress-Carousel-Slider/410186132357145?ref=hl" data-send="false" data-width="250" data-show-faces="false"></div>
</center>
		</div>

		<div id="copyright">
			<p>&copy; 2011-2012 Plugins for WP. Proud to be <a href="https://www.gnu.org/licenses/gpl-2.0.html">GPLv2 (or later) licensed</a>.</p>
			<p id="vpm-credit">Built by <a href="http://pluginsforwp.net/">Plugins For Wp</a></p>
		</div>
		</div>
</div>
</div>				</div>
	<div id="postbox-container-1" class="inner-sidebar">
					<div class="meta-box-sortables" id="side-sortables"><div class="postbox " id="credits-notes">
<div title="Click to toggle" class="handlediv"><br></div><h3 class="hndle"><span>Offers</span></h3>
<div class="inside" style="padding:0">
<iframe src="http://pluginsforwp.net/offers.html" name="iframe_a"  scrolling="no" width="100%" height="250"></iframe>
		</div>
</div>
</div>				</div>
	</div>
	<?php
}
