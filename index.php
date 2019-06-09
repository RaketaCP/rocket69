<?php
/**
 * @package WordPress
 * @subpackage rocket
 * @since 0.1
 */
get_header();
?>


<div class="conatainer">
	<div class="row">
		<div class="offset-3 col-6">
			<canvas id="doughnutChart" width="400" height="400"></canvas>
		</div>
		<div class="col-3">
			<span>Регион:</span>
			<select id="regionsSelect" class="js-regions-select">
				<option value="0" selected>Все</option>
				<option value="1">г. Санкт-Петербург</option>
				<option value="2">г. Москва</option>
				<option value="3">Республика Коми</option>
			</select>
		</div>
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
<?php
get_footer();
