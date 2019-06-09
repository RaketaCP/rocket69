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
		<div class="col-md-12">
			<div class="facet-filter">
				<div class="title">Поиск по параметрам:</div>
				<div class="facet">
					<?php echo do_shortcode('[facetwp facet="categories"]'); ?>
				</div>
				<div class="facet">
					<label>Регион:</label>
					<?php echo do_shortcode('[facetwp facet="region"]'); ?>
				</div>
				<div class="facet">
					<label>Город:</label>
					<?php echo do_shortcode('[facetwp facet="city"]'); ?>
				</div>
				<div class="facet-reset clearfix">
					<button onclick="FWP.reset()">Сбросить</button>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-6">
			<div class="inner">
				<canvas id="doughnutChart"  height="200"></canvas>
			</div>
		</div>
		<div class="col-6">
			<div class="inner">
				<canvas id="barChart" height="200"></canvas>
			</div>
		</div>
		<div class="d-none">
			<span>Регион:</span>
			<select id="regionsSelect" class="js-regions-select">
				<option value="0" selected>г. Санкт-Петербург</option>
				<option value="2">г. Москва</option>
				<option value="3">Республика Коми</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?php
				$args = array(
					'post_type' => 'company',
					'posts_per_page' => 20,
					'facetwp' => true
				);
				$query = new WP_Query( $args );
			?>
			<div class="facetwp-template">
				<table id="companies-table" class="data-table">
					<thead>
						<tr>
							<th>Название компании</th>
							<th>Сдано проектов</th>
							<th>Строится</th>
							<th>Заморожено</th>
							<th>Рейтинг</th>
						</tr>
					</thead>
					<tbody>
						<?php while($query->have_posts()) {
							$query->the_post(); ?>
							<tr>
								<td>
									<a href="<?php echo get_permalink(); ?>">
										<span class="table-logo" style="background: url(<?php the_field('company_logo'); ?>); background-size: contain; background-repeat: no-repeat; background-position: 50% 50%;"></span>
											
										<span><?php the_title(); ?></span>
									</a>
								</td>
								<td><?php the_field('company_finished_projects'); ?></td>
								<td><?php the_field('company_current_projects'); ?></td>
								<td><?php the_field('company_frozen_projects'); ?></td>
								<td><?php the_field('company_rating'); ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
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
<script>
jQuery(document).ready(function($) {
	main($);
});
</script>
<?php
get_footer();
