<?php

add_action('wp_ajax_get_companies_data', 'get_companies_data');
add_action('wp_ajax_nopriv_get_companies_data', 'get_companies_data');
function get_companies_data() {
	
	$ret = array();
	
	$query = new WP_Query(array(
		'post_type' => 'company',
		'post_status' => 'publish'
	));

	while ($query->have_posts()) {
		$query->the_post();
		$postID = get_the_ID();
		
		$companyName = get_the_title($postID);
		$companyLogo = get_field('company_logo', $postID);
		
		$estates = array();
		
		$posts = get_field('company_estates', $postID);
		
		
		if($posts) {
			foreach($posts as $post) {
				setup_postdata($post);
				
				$estates = array(
					'buildingStartDate'				=> get_field('building_start_date', $post->ID),
					'buildingEstimatedFinishDate'	=> get_field('building_estimated_finish_date', $post->ID),
					'buildingRealFinishDate'		=> get_field('building_real_finish_date', $post->ID),
					'buildingState'					=> get_field('building_state', $post->ID),
					'buildingRegion'				=> get_field('building_region', $post->ID),
					'buildingCity'					=> get_field('building_city', $post->ID),
					'buildingStreet'				=> get_field('building_street', $post->ID),
					'buildingHouse'					=> get_field('building_house', $post->ID),
					'buildingMap'					=> get_field('building_map', $post->ID)
				);
				
				wp_reset_postdata();
			}
		}
		
		$ret[] = array(
			'companyName'	=> get_the_title($postID),
			'companyLogo'	=> get_field('company_logo', $postID),
			'estates'		=> $estates		
		);
	}

	wp_reset_query();
	
	echo json_encode($ret);
	
}

?>