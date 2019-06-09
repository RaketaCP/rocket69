<?php
/**
 * @package WordPress
 * @subpackage rocket
 * @since 0.1
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-sm-12">
					<div class="region-select">Ваш регион: <span style="border-bottom: 1px dashed white;">Санкт-Петербург</span></div>
				</div>
				<div class="col-md-3 col-sm-12">
					<?php get_search_form(); ?>
				</div>
				<div class="col-md-4 col-sm-12">
					<div class="lang-select">
						<img src="<?php echo get_template_directory_uri() . '/assets/img/russia-flag-icon-32.png'; ?>">
						<span>РУ</span>
					</div>
					<div class="vis-imp-link">Версия для слабовидящих</div>
				</div>
			</div>
		</div>
	</header>
	<div class="menu">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-expand-lg navbar-light">
						<a class="navbar-brand" href="/"><img src="<?php echo get_template_directory_uri() . '/assets/img/logo.png'; ?>"></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarNavDropdown">
							<ul class="navbar-nav">
								<li class="nav-item">
									<a class="nav-link" href="/company">Застройщики</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="/estate">Объекты</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">Статистика</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">Новости</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">FAQ</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>
