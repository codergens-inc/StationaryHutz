<?php
/***********************************************************/
// Staff Template options
/***********************************************************/
$prefix = 'tmpmela_staff_list_';
$TM_META_BOXES[] = array(
	'id'		=> 'tmpmela_staff_list_columns',
	'title' 	=> esc_html__('TM - List Options', 'kartpul'),
	'pages' 	=> array( 'page' ),
	'context' 	=> 'normal',
	'priority' 	=> 'high',
	'local_images' => true,
	'fields' 	=> array(	
		// Show number of posts per page
		array(
			'name'			=> esc_html__('Number of posts per page:', 'kartpul'),
			'id'    		=> "{$prefix}posts_per_page",
			'type'  		=> 'text',
			'std'   		=> '5',
		),
	),
	'display_on'	=> array( 'template' => array(
		'page-templates/staff-list.php',
	) ),
);
$prefix = 'tmpmela_staff_box_';
$TM_META_BOXES[] = array(
	'id'		=> 'tmpmela_staff_box_columns',
	'title' 	=> esc_html__('TM - Box Options', 'kartpul'),
	'pages' 	=> array( 'page' ),
	'context' 	=> 'normal',
	'priority' 	=> 'high',
	'local_images' => true,
	'fields' 	=> array(	
		// Show posts per column
		array(
			'name'    		=> esc_html__('Columns Options:', 'kartpul'),
			'id'      		=> "{$prefix}columns",
			'type'    		=> 'radio',
			'std'			=> 'two',
			'options'		=> array(
				'two'		=> 'Two',
				'three'		=> 'Three',
				'four'		=> 'Four', 
			)
		),
		// Show number of posts per page
		array(
			'name'			=> esc_html__('Number of posts per page:', 'kartpul'),
			'id'    		=> "{$prefix}posts_per_page",
			'type'  		=> 'text',
			'std'   		=> '5',
		),
	),
	'display_on'	=> array( 'template' => array(
		'page-templates/staff-box.php'
	) ),
);
?>