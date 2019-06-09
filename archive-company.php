<?php
get_header(); ?>

<section class="archive-company-page">
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
			<div class="col-md-12">
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
							<?php while(have_posts()) {
								the_post(); ?>
								<tr>
									<td>
										<span class="table-logo" style="background: url(<?php the_field('company_logo'); ?>); background-size: contain; background-repeat: no-repeat; background-position: 50% 50%;"></span>
										
										<span><?php the_title(); ?></span>
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
	</div>
</section>

<?php
get_footer();
?>