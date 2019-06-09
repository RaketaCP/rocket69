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
	</div>
</section>

<?php
get_footer();
?>
