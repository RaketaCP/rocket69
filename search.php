<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package rocket
 * @since rocket 0.1
 */

get_header(); ?> 
<section>
	<div class="container">
		<div class="row">
			<div class="">
				<h1><?php printf('Поиск по строке: %s', get_search_query()); ?></h1>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php get_template_part('loop'); ?>
				<?php endwhile;
				else: echo '<p>Нет записей.</p>'; endif; ?>	 
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>