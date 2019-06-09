<?php
/**
 * @package WordPress
 * @subpackage rocket
 * @since 0.1
 */
get_header();
?>

<div class="container">
	<div class="row">
		<h3 class="m-auto">Статистика по новостройкам г. Санкт-Петербург</h3>
	</div>
	<div class="row">
		<div class="col-5  facet-filter">
			<canvas id="doughnutChart"  height="250"></canvas>
		</div>
		<div class=" col-6 ml-4 facet-filter">
			<canvas id="barChart" height="250"></canvas>
		</div>
		<div class="col-2 d-none">
			<span>Регион:</span>
			<select id="regionsSelect" class="js-regions-select">
				<option value="0" selected>г. Санкт-Петербург</option>
				<option value="2">г. Москва</option>
				<option value="3">Республика Коми</option>
			</select>
		</div>
	</div>
	<div class="row">
	</div>
	<!---
		<div class="col-6">
			<canvas id="barChart" width="400" height="400"></canvas>
		</div>
	<table id="table_id" class="display">
    <thead>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
    </tbody>
	</table>


	<div style="width:50%">
		<canvas id="radarChart" width="400" height="400"></canvas>
	</div>
	--->

</div>
<script>
jQuery(document).ready(function($) {
	main($);
});
</script>
<?php
get_footer();
