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
		wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.4.1.min.js','','',true);
		wp_enqueue_script('chartjs', '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js','','',true);
		wp_enqueue_script('datatables', '//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css','','',true);
		wp_enqueue_script('main', get_template_directory_uri() . '/script.js', array('jquery'),'',true);
	}
}

// Регистрация стилей
add_action('wp_print_styles', 'add_styles');
if (!function_exists('add_styles')) {
	function add_styles() {
	    if(is_admin()) return false;
		wp_enqueue_style('chartcss', '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css');
		wp_enqueue_style('datatables', '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js');
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
		'publicly_queryable'  => false,
		'exclude_from_search' => true,
		'menu_icon'           => 'dashicons-admin-multisite', 
		'supports'            => array('title', 'custom-fields'),
		'has_archive'         => false,
		'rewrite'             => true,
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
		'publicly_queryable'  => false,
		'exclude_from_search' => true,
		'menu_icon'           => 'dashicons-location-alt', 
		'supports'            => array('title', 'custom-fields'),
		'has_archive'         => false,
		'rewrite'             => true,
	));
}


// Регистрация полей сущностей
include ('acf.php');