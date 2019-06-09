<?php
/**
 * @package WordPress
 * @subpackage rocket
 * @since 0.1
 */


// Регистрация скриптов
add_action('wp_footer', 'add_scripts');
if (!function_exists('add_scripts')) {
	function add_scripts() {
		if(is_admin()) return false;
		wp_deregister_script('jquery');
		wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.4.1.min.js', '', '', true);
		wp_enqueue_script('chartjs', '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js', '', '', true);
		wp_enqueue_script('bootstrapjs', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', '', '', true);
		wp_enqueue_script('datatables', '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js', '', '', true);
		wp_enqueue_script('datatables-bs4', '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js', '', '', true);
		wp_enqueue_script('font-awesome', '//kit.fontawesome.com/e58598f5db.js', '', '', true);
		wp_enqueue_script('main', get_template_directory_uri() . '/script.js', array('jquery'), '', true);
		wp_localize_script('main', 'AJAX', 
			array(
				'url' => admin_url('admin-ajax.php')
			)
		);  
	}
}

// Регистрация стилей
add_action('wp_print_styles', 'add_styles');
if (!function_exists('add_styles')) {
	function add_styles() {
	    if(is_admin()) return false;
		wp_enqueue_style('chartcss', '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css');
		wp_enqueue_style('datatables', '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js');
		wp_enqueue_style('datatables-bs4', '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css');
		wp_enqueue_style('poppercss', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js');
		wp_enqueue_style('bootstrapcss', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
		wp_enqueue_style('roboto-font', '//fonts.googleapis.com/css?family=Roboto&display=swap');
		wp_enqueue_style('main', get_template_directory_uri() . '/style.css');
	}
}

// Регистрация сущностей
add_action('init', 'register_post_types');
function register_post_types() {
	register_post_type('estate', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Объекты недвижимости',
			'singular_name'      => 'Объект недвижимости',
			'add_new'            => 'Добавить объект недвижимости',
			'add_new_item'       => 'Добавление объекта недвижимости',
			'edit_item'          => 'Редактирование объекта недвижимости',
			'new_item'           => 'Новый объект недвижимости',
			'view_item'          => 'Смотреть объект недвижимости',
			'search_items'       => 'Искать объект невидижмости',
			'not_found'          => 'Объектов недвижимости не найдено',
			'not_found_in_trash' => 'Объектов невидижмости в корзине не найдено',
			'menu_name'          => 'Недвижимость',
		),
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'menu_icon'           => 'dashicons-admin-multisite', 
		'supports'            => array('title', 'custom-fields'),
		'has_archive'         => true,
	));
	
	register_post_type('company', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Застройщики',
			'singular_name'      => 'Застройщик',
			'add_new'            => 'Добавить застройщика',
			'add_new_item'       => 'Добавление застройщика',
			'edit_item'          => 'Редактирование застройщика',
			'new_item'           => 'Новый застройщик',
			'view_item'          => 'Смотреть застройщика',
			'search_items'       => 'Искать застройщика',
			'not_found'          => 'Застройщиков не найдено',
			'not_found_in_trash' => 'Застройщиков в корзине не найдено',
			'menu_name'          => 'Застройщики',
		),
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'menu_icon'           => 'dashicons-location-alt', 
		'supports'            => array('title', 'custom-fields'),
		'has_archive'         => true,
	));
}


// Регистрация полей сущностей
include ('acf.php');

// AJAX функции
include ('ajax.php');

// По каким типам записей будет производиться поиск
add_filter('pre_get_posts', 'init_post_types_search');
function init_post_types_search($query) {
    if($query->is_search) {
		$query->set('post_type', array('company', 'estate'));
    }
    
    return $query; 
}


add_filter( 'facetwp_is_main_query', function( $bool, $query ) {
    return ( true === $query->get( 'facetwp' ) ) ? true : $bool;
}, 10, 2 );