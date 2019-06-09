<?php
/**
 * Шаблон для отображения отдельного застройщика
 *
 * @package WordPress
 * @subpackage rocket
 * @since rocket 0.1
 */
get_header();
?>

<section class="company-page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="block">
					<div class="row">
						<div class="col-md-4 col-sm-12">
							<img src="<?php the_field('company_logo'); ?>">
							<span class="company-name"><?php the_field('company_name'); ?></span>
						</div>
						<div class="col-md-8 col-sm-12">
							<div class="company-meta clearfix">
								<div class="item">
									<div class="title">Годы<br>работы</div>
									<div class="value">2002-2019</div>
								</div>
								<div class="item">
									<div class="title">Сдано<br>проектов</div>
									<div class="value">111</div>
								</div>
								<div class="item">
									<div class="title">Строится<br>проектов</div>
									<div class="value">15</div>
								</div>
								<div class="item">
									<div class="title">Строительство<br>заморожено</div>
									<div class="value">0</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
				<div class="col-6">
					<div class="inner">
						<canvas id="doughnutChart"  height="250"></canvas>
					</div>
				</div>
				<div class=" col-6">
					<div class="inner">
						<canvas id="barChart" height="250"></canvas>
					</div>
				</div>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<div class="facet-filter">
					<div class="title">Поиск по параметрам:</div>
					<div class="facet">
						<?php echo do_shortcode('[facetwp facet="building_name"]'); ?>
					</div>
					<div class="facet">
						<label>Регион:</label>
						<?php echo do_shortcode('[facetwp facet="building_region"]'); ?>
					</div>
					<div class="facet">
						<label>Город:</label>
						<?php echo do_shortcode('[facetwp facet="building_city"]'); ?>
					</div>
					<div class="facet-reset clearfix">
						<button onclick="FWP.reset()">Сбросить</button>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<?php
					$args = array(
						'post_type' => 'estate',
						'posts_per_page' => 20,
						'facetwp' => true
					);
					$query = new WP_Query($args);
				?>
				<div class="facetwp-template">
					<table id="companies-table" class="data-table">
						<thead>
							<tr>
								<th>Название компании</th>
								<th>Регион</th>
								<th>Адрес</th>
								<th>Начало строительства</th>
								<th>Заявленная дата окончания</th>
								<th>Статус</th>
							</tr>
						</thead>
						<tbody>
							<?php while($query->have_posts()) {
								$query->the_post(); ?>
								<tr>
									<td>
										<a href="<?php echo get_permalink(); ?>">
											<span><?php the_title(); ?></span>
										</a>
									</td>
									<td><?php the_field('building_region'); ?></td>
									<td><?php the_field('building_city'); ?>, <?php the_field('building_street'); ?>, <?php the_field('building_house'); ?></td>
									<td><?php the_field('building_start_date'); ?></td>
									<td><?php the_field('building_estimated_finish_date'); ?></td>
									<td><?php the_field('building_state'); ?></td>
								</tr>
							<?php } WP_reset_query();?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
jQuery(document).ready(function($) {
	main($,"<?php the_field('company_name'); ?>");
});
</script>
<?php
get_footer();
?>
