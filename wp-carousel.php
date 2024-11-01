<?php
/*
Plugin Name: WP Carousel Slider
Plugin URI: http://www.pluginsforwp.net
Description: WP carousel slider is powerful jQuery based wordpress carousel slider. It has left and right rotations directions. Easy navigation allow you to rotate slides in left and right the directions, Slides reflection and mouse wheel rotation. 
Version:0.7.2
Author: Gulzar Ahmed
Author URI: http://www.theiwebsolutions.com
License:GPL2
*/
/* DEFINE DIRECTORY CONSTANTS */
define( 'WCS_PATH', plugin_dir_path(__FILE__) );
define( 'WCSPATH' , plugin_basename(__FILE__));

/* WCS Options File */
require WCS_PATH . '/wpc-options.php';

/* Core Functions */
function shortbar_wcs( $atts ) {
	js24();
	ob_start();
	 ?>
	<div id="images_move" style=" margin:0 auto; width:<?php
 $options = get_option('slider_wpc_options');
 if( empty($options['sometext-cswidth'])){
	 echo '720';
 }else{
	$options = get_option('slider_wpc_options'); echo $options['sometext-cswidth'];
 } ?>px; height:<?php
 $options = get_option('slider_wpc_options');
 if( empty($options['sometext-csheight'])){
	 echo '500';
 }else{
	$options = get_option('slider_wpc_options'); echo $options['sometext-csheight'];
 } ?>px; overflow:scroll;">
 
 <?php /* Image Generation Process */
 $options = get_option('slider_wpc_options');
 if( !empty($options['sometext-csiu1'])){?>
  <a href="<?php echo $options['sometext-cslb1']; ?>" rel='lightbox' title="<?php echo $options['sometext-csid1']; ?>"><img class="cloudcarousel" src="<?php echo $options['sometext-csiu1']; ?>" alt="<?php echo $options['sometext-csid1']; ?>" title="<?php echo $options['sometext-csit1']; ?>" /></a> 
<?php }
 if( !empty($options['sometext-csiu2'])){ ?>
  <a href="<?php echo $options['sometext-cslb2']; ?>" rel='lightbox' title="<?php echo $options['sometext-csid2']; ?>"><img class="cloudcarousel" src="<?php echo $options['sometext-csiu2']; ?>" alt="<?php echo $options['sometext-csid2']; ?>" title="<?php  echo $options['sometext-csit2']; ?>" /></a>
<?php }
 if( !empty($options['sometext-csiu3'])){ ?>
  <a href='<?php echo $options['sometext-cslb3']; ?>' rel='lightbox' title="<?php echo $options['sometext-csid3']; ?>"><img class="cloudcarousel" src="<?php echo $options['sometext-csiu3']; ?>" alt="<?php echo $options['sometext-csid3']; ?>" title="<?php echo $options['sometext-csit3']; ?>" /></a>
<?php }
 if( !empty($options['sometext-csiu4'])){ ?>
  <a href='<?php echo $options['sometext-cslb4']; ?>' rel='lightbox' title="<?php echo $options['sometext-csid4']; ?>"><img class="cloudcarousel" src="<?php echo $options['sometext-csiu4']; ?>" alt="<?php echo $options['sometext-csid4']; ?>" title="<?php echo $options['sometext-csit4']; ?>" /></a>
<?php }
 if( !empty($options['sometext-csiu5'])){ ?>
  <a href='<?php echo $options['sometext-cslb5']; ?>' rel='lightbox' title="<?php echo $options['sometext-csid5']; ?>"><img class="cloudcarousel" src="<?php  echo $options['sometext-csiu5']; ?>" alt="<?php echo $options['sometext-csid5']; ?>" title="<?php echo $options['sometext-csit5']; ?>" /></a>
<?php }
 if( !empty($options['sometext-csiu6'])){ ?>
  <a href='<?php echo $options['sometext-cslb6']; ?>' rel='lightbox' title="<?php echo $options['sometext-csid6']; ?>"><img class="cloudcarousel" src="<?php echo $options['sometext-csiu6']; ?>" alt="<?php  echo $options['sometext-csid6']; ?>" title="<?php echo $options['sometext-csit6']; ?>" /></a>
<?php }
 if( !empty($options['sometext-csiu7'])){ ?>
  <a href='<?php echo $options['sometext-cslb7']; ?>' rel='lightbox' title="<?php echo $options['sometext-csid7']; ?>"><img class="cloudcarousel" src="<?php echo $options['sometext-csiu7']; ?>" alt="<?php echo $options['sometext-csid7']; ?>" title="<?php echo $options['sometext-csit7']; ?>" /></a>
<?php } 
 if( !empty($options['sometext-csiu8'])){ ?>
  <a href='<?php echo $options['sometext-cslb8']; ?>' rel='lightbox' title="<?php echo $options['sometext-csid8']; ?>"><img class="cloudcarousel" src="<?php echo $options['sometext-csiu8']; ?>" alt="<?php echo $options['sometext-csid8']; ?>" title="<?php echo $options['sometext-csit8']; ?>" /></a>
<?php } 
if( !empty($options['sometext-csiu9'])){ ?>
  <a href='<?php echo $options['sometext-cslb9']; ?>' rel='lightbox' title="<?php echo $options['sometext-csid9']; ?>"><img class="cloudcarousel" src="<?php echo $options['sometext-csiu9']; ?>" alt="<?php echo $options['sometext-csid9']; ?>" title="<?php echo $options['sometext-csit9']; ?>" /></a>
<?php }
if( !empty($options['sometext-csiu10'])){ ?>
  <a href='<?php echo $options['sometext-cslb10']; ?>' rel='lightbox' title="<?php echo $options['sometext-csid10']; ?>"><img class="cloudcarousel" src="<?php echo $options['sometext-csiu10']; ?>" alt="<?php echo $options['sometext-csid10']; ?>" title="<?php echo $options['sometext-csit10']; ?>" /></a>
<?php } ?>
<h2 id="da-vinci-title"></h2>
<h3 id="da-vinci-alt"></h3>
<div id="but1" class="carouselLeft" style="position:absolute;top:20px;right:60px;"></div>
<div id="but2" class="carouselRight" style="position:absolute;top:20px;right:20px;"></div>      
</div>
<?php   $html = ob_get_contents();
    ob_end_clean();
    return $html;
}
add_shortcode( 'wp-carousel', 'shortbar_wcs' );
function js24(){ ?>
    <link rel="stylesheet" href="<?php echo plugins_url('/css/style.css', __FILE__); ?>" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo plugins_url('/css/slimbox2.css', __FILE__); ?>" type="text/css" media="screen" />
	<script type="text/javascript" src="<?php echo plugins_url('/js/jquery.min.js', __FILE__); ?>"></script>
	<script type="text/JavaScript" src="<?php echo plugins_url('/js/jquery.mousewheel.js', __FILE__); ?>"></script>
	<script type="text/JavaScript" src="<?php echo plugins_url('/js/slimbox2.js', __FILE__); ?>"></script>
	<script type="text/JavaScript" src="<?php echo plugins_url('js/cloud-carousel.1.0.5.js', __FILE__); ?>"></script>
	<script type="text/javascript">
$(document).ready(function(){
	$("#images_move").CloudCarousel( { 
		reflHeight: 56,
		reflGap:2,
		<?php
$options = get_option('slider_wpc_options');
 	
	if( $options['option4'] != 0){
	echo "titleBox: $('#da-vinci-title'),
	altBox: $('#da-vinci-alt'),";
 
 }
 if( $options['option3'] != 0){
	 
	 echo "buttonLeft: $('#but1'),
	 buttonRight: $('#but2'),";
 
 } ?>
	yRadius:<?php
 if( empty($options['sometext-csvr'])){
	 echo '50';
	 }else{
	 echo $options['sometext-csvr'];
	 } ?>,
 	xRadius:<?php
	 if( empty($options['sometext-csxr'])){
	 echo '300';
	 }else{
	 echo $options['sometext-csxr'];
	 } ?>,
	autoRotate: '<?php $options = get_option('slider_wpc_options'); echo $options['selectinput']; ?>',
	xPos: <?php
 	if( empty($options['sometext-csxp'])){
	 echo '360';
	 }else{
	 echo $options['sometext-csxp'];
 	} ?>,
	yPos: <?php
	 $options = get_option('slider_wpc_options');
	 if( empty($options['sometext-csyp'])){
	 echo '120';
	 }else{	 
	echo $options['sometext-csyp'];
	 } ?>,
	speed:<?php
	 if( empty($options['sometext-csspeed'])){
	 echo '0.2';
	 }else{
	echo $options['sometext-csspeed'];
	} ?>,
	mouseWheel:<?php
 	$options = get_option('slider_wpc_options');
	if( $options['option2'] == 0){
	 echo 'false';
	 }else{
	 echo 'true';
	 } ?>,
	autoRotateDelay: <?php
	if( empty($options['sometext-csrd'])){
	echo '3000';
 	}else{ 
	echo $options['sometext-csrd'];
	 } ?>,
	FPS:30,
	});
});
</script>
<?php }

