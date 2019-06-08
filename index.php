<?php
/**
 * @package WordPress
 * @subpackage rocket
 * @since 0.1
 */
wp_deregister_script('jquery' );
wp_register_script('jquery', 'https://code.jquery.com/jquery-3.4.1.min.js');
wp_enqueue_script('jquery' );
wp_enqueue_script('chartjs','https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js');
wp_enqueue_style('chartcss','https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css');
wp_enqueue_script('main', get_template_directory_uri().'/script.js', array('jquery'));
get_header();
?>
<div style="width:100%">
	<div style="width:50%">
		<canvas id="chartOne" width="400" height="400"></canvas>
	</div>
	<div style="width:50%">
		<canvas id="chartTwo" width="400" height="400"></canvas>
	</div>
</div>
<?php
get_footer();
