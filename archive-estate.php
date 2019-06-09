<?php
get_header(); ?>

<section class="archive-company-page">
	<div class="container">
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
				<div class="facetwp-template">
					<table id="companies-table" class="data-table">
						<thead>
							<tr>
								<th>Название объекта</th>
								<th>Дата начала строительства</th>
								<th>Дата окончания строительства</th>
								<th>Статус</th>
							</tr>
						</thead>
						<tbody>
							<?php while(have_posts()) {
								the_post(); ?>
								<tr>
									<td>
										<span><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></span>
									</td>
									<td><?php the_field('building_start_date'); ?></td>
									<td><?php the_field('building_real_finish_date'); ?></td>
									<td><?php the_field('building_state'); ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
?>