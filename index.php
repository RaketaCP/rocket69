<?php
/**
 * @package WordPress
 * @subpackage rocket
 * @since 0.1
 */
get_header();
?>
<div class="wrapper">
	<div style="width:50%">
		<canvas id="doughnutChart" width="400" height="400"></canvas>
	</div>
	<div style="width:50%">
		<canvas id="barChart" width="400" height="400"></canvas>
	</div>
	<div style="width:50%">
		<canvas id="radarChart" width="400" height="400"></canvas>
	</div>
</div>
<?php
get_footer();
