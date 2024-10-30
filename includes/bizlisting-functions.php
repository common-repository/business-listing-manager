<?php
/*

File: bizlisting_function.php
Business Listing Manager
Version: 2.0. - Updated 3/18/2020

*/
global $wp_query;

add_action('admin_menu', 'bizlisting_add_menu_link');

function bizlisting_add_menu_link() {
    // Add the top-level admin menu
    $page_title = 'Business Listings Settings';
    $menu_title = 'Business Listings';
    $capability = 'manage_options';
    $menu_slug = 'bizlisting-manager-settings';
    $function = 'bizlisting_admin_settings';
    add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function);

    // Add submenu page with same slug as parent to ensure no duplicates
    $sub_menu_title = 'Settings';
    add_submenu_page($menu_slug, $page_title, $sub_menu_title, $capability, $menu_slug, $function);

    // Now add the submenu page for Help
    $submenu_page_title = 'Business Listings Help';
    $submenu_title = 'Help';
    $submenu_slug = 'bizlisting-manager-help';
    $submenu_function = 'bizlisting_manager_help';
    add_submenu_page($menu_slug, $submenu_page_title, $submenu_title, $capability, $submenu_slug, $submenu_function);
}

// Custom Post Parameters for type: 'localbiz'
function bizlisting_custom_post_localbiz() {

  $bizlisting_labels = array(
    'name'               => __( 'Local Businesses' ),
    'singular_name'      => __( 'LocalBiz' ),
    'add_new'            => __( 'Add New LocalBiz' ),
    'add_new_item'       => __( 'Add New LocalBiz' ),
    'edit_item'          => __( 'Edit LocalBiz' ),
    'new_item'           => __( 'New LocalBiz' ),
    'all_items'          => __( 'All LocalBizzes' ),
    'view_item'          => __( 'View LocalBiz' ),
    'search_items'       => __( 'Search LocalBizzes' ),
    'featured_image'     => 'BizLogo',
    'set_featured_image' => 'Add BizLogo'
  );
 
  $bizlisting_args = array(
    'labels'            => $bizlisting_labels,
    'description'       => 'Holds local businesses and business specific data',
    'public'            => true,
    'public-queryable'  => true,
    'menu_position'     => 5,
    'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
    'has_archive'       => true,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'has_archive'       => true,
    'query_var'         => 'localbiz',
	'show_in_rest' => true
  );

  register_post_type( 'localbiz', $bizlisting_args);
}

// Custom Taxonomy Parameters for custom type: 'localbiz' creates taxonomy 'localbiz_category'
function bizlisting_my_taxonomies_localbiz() {

$bizlisting_labels = array(
    'name'              => _x( 'LocalBiz Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'LocalBiz Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search LocalBiz Categories' ),
    'all_items'         => __( 'All LocalBiz Categories' ),
    'parent_item'       => __( 'Parent LocalBiz Category' ),
    'parent_item_colon' => __( 'Parent LocalBiz Category:' ),
    'edit_item'         => __( 'Edit LocalBiz Category' ),
    'update_item'       => __( 'Update LocalBiz Category' ),
    'add_new_item'      => __( 'Add New LocalBiz Category' ),
    'new_item_name'     => __( 'New LocalBiz Category' ),
    'menu_name'         => __( ' LocalBiz Categories' ),
  );

$bizlisting_args = array(
    'labels' => $bizlisting_labels,
    'hierarchical' => true,
	'public' => true, 
	'query_var'             => true,
    'show_admin_column' => true,
	'show_ui' => true,
    'rewrite'               => array(
         'slug'              => 'localbiz_category',
         'with_front'        => false 
      ),
	'show_in_rest' => true	
  );
  register_taxonomy( 'localbiz_category', 'localbiz', $bizlisting_args );
}
add_action( 'init', 'bizlisting_custom_post_localbiz' );
add_action( 'init', 'bizlisting_my_taxonomies_localbiz', 0 );


function bizlisting_register_meta_boxes() {
    add_meta_box( 'bizlisting-1', __( 'Local Business Details', 'bizlisting' ), 'bizlisting_display_callback', 'localbiz' );
}
add_action( 'add_meta_boxes', 'bizlisting_register_meta_boxes' );

function bizlisting_display_callback( $post ) {
    include plugin_dir_path( __FILE__ ) . './bizlisting-edit-form.php';
}

// Save the localbiz info from the Edit Localbiz page
function bizlisting_save_meta_box( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( $parent_id = wp_is_post_revision( $post_id ) ) {
        $post_id = $parent_id;
    }
    $bizlisting_fields = [
        'bizlisting_phonenum',
        'bizlisting_faxnum',
        'bizlisting_streetaddr1',
		'bizlisting_streetaddr2',
		'bizlisting_city',
		'bizlisting_state',
		'bizlisting_zip',
		'bizlisting_url',
		'bizlisting_contact_email',		
		'bizlisting_contact',		
		'bizlisting_contact_phone',		
		'bizlisting_opened_date',		
		'bizlisting_opened_city',		
		'bizlisting_naics',		
		'bizlisting_price',
		'bizlisting_latitude',
		'bizlisting_longitude',
		'bizlisting_religious',
		'bizlisting_showgooglemap',
		'bizlisting_normal_business_hours',
		'bizlisting_corona_business_hours',
		'bizlisting_corona_instructions'
		
    ];
	
	//Sanitize Text only fields
	
    foreach ( $bizlisting_fields as $bizlisting_field ) {
        if ( array_key_exists( $bizlisting_field, $_POST ) ) {

			if (trim($_POST[$bizlisting_field])== '') {
				// if the field value is simply empty then set the value to an empty string
				update_post_meta( $post_id, $bizlisting_field, '' );
			 	
			} else {  
				
				// Validation Stuff
				// check for specific fields
				
				if (($bizlisting_field=='bizlisting_contact_email') && strlen(trim($_POST['bizlisting_contact_email']))>0) {
					// Validate contact email value is an email 
					if ( is_email(sanitize_email( $_POST['bizlisting_contact_email'] )))  {
						update_post_meta( $post_id, 'bizlisting_contact_email', sanitize_email( $_POST['bizlisting_contact_email'] ) );
					} else {
						// do not save the email field
					}
				} elseif ($bizlisting_field=='bizlisting_url') {
					// Validate business website is an acutal URL 
					 if (esc_url_raw( $_POST['bizlisting_url'] ) === $_POST['bizlisting_url'] )  {
						update_post_meta( $post_id, 'bizlisting_url', esc_url_raw( $_POST['bizlisting_url'] ) );
					} else {
						// do not save the URL field
					}
				} elseif ($bizlisting_field=='bizlisting_latitude') {
					// Validate latitude is a numeric 
					 if (is_numeric(sanitize_text_field( $_POST['bizlisting_latitude']) ) )  {
						update_post_meta( $post_id, 'bizlisting_latitude', sanitize_text_field( $_POST['bizlisting_latitude'] ) );
					} else {
						// do not save the latitude field
					}
				} elseif ($bizlisting_field=='bizlisting_longitude') {
					// Validate longitude is a numeric 
					 if (is_numeric(sanitize_text_field( $_POST['bizlisting_longitude']) ) )  {
						update_post_meta( $post_id, 'bizlisting_longitude', sanitize_text_field( $_POST['bizlisting_longitude'] ) );
					} else {
						// do not save the longitude field
					}	
				} elseif ($bizlisting_field=='bizlisting_price') {
					// Validate price is a numeric and not larger than 5 
					 if ((is_numeric(sanitize_text_field( $_POST['bizlisting_price']) ) ) &&( esc_url_raw( $_POST['bizlisting_price']) <6  ) ) {
						update_post_meta( $post_id, 'bizlisting_price', sanitize_text_field( $_POST['bizlisting_price'] ) );
					} else {
						// do not save the price field
					}
				} elseif ($bizlisting_field=='bizlisting_religious') {
					// Validate religious designiation is one of the 
					 if ( (sanitize_text_field( $_POST['bizlisting_religious'] ) == 'N/A' ) || (sanitize_text_field( $_POST['bizlisting_religious'] ) == 'Buddhist Temples' ) || (sanitize_text_field( $_POST['bizlisting_religious'] ) == 'Churches' ) || (sanitize_text_field( $_POST['bizlisting_religious'] ) == 'Hindu Temples' ) || (sanitize_text_field( $_POST['bizlisting_religious'] ) == 'Mosques' ) || (sanitize_text_field( $_POST['bizlisting_religious'] ) == 'Sikh Temples' ) || (sanitize_text_field( $_POST['bizlisting_religious'] ) == 'Synagogues' ))  {
						update_post_meta( $post_id, 'bizlisting_religious', sanitize_text_field( $_POST['bizlisting_religious'] ) );
					} else {
						// do not save the religious field
					}
				} elseif ($bizlisting_field=='bizlisting_showgooglemap') {
					// Validate price is a numeric 
					 if ( (sanitize_text_field( $_POST['bizlisting_showgooglemap'] ) == 'name' ) || (sanitize_text_field( $_POST['bizlisting_showgooglemap'] ) == 'latlong' ) || (sanitize_text_field( $_POST['bizlisting_showgooglemap'] ) == 'no' ))  {
						update_post_meta( $post_id, 'bizlisting_showgooglemap', sanitize_text_field( $_POST['bizlisting_showgooglemap'] ) );
					} else {
						// do not save the showgooglemap field
					}
				} else {
					// It's not a field that can be necessarily validated
					// make sure it's not unreasonably long (500 characters)
					if (strlen($_POST[$bizlisting_field]) <500  )   {
						update_post_meta( $post_id, $bizlisting_field, sanitize_text_field( $_POST[$bizlisting_field] ) );
					} else {
					// do not update the field on the basis that it's too long and most likey not entered properly		
					}
					
				}
			}
        }
     }

	if (isset($_POST['bizlisting_cuisine'])) {
		delete_post_meta(   $post_id , 'bizlisting_cuisine' );
		foreach ( $_POST['bizlisting_cuisine'] as $bizlisting_cuisine ) {
			add_post_meta( $post_id, 'bizlisting_cuisine', sanitize_text_field($bizlisting_cuisine)  );
		}
	}
	if (isset($_POST['bizlisting_lawtype'])) {
		delete_post_meta(   $post_id , 'bizlisting_lawtype' );
		foreach ( $_POST['bizlisting_lawtype'] as $bizlisting_lawtype ) {
			add_post_meta( $post_id, 'bizlisting_lawtype', sanitize_text_field($bizlisting_lawtype)  );
		}
	}
}
add_action( 'save_post', 'bizlisting_save_meta_box' );

function bizlisting_show_post_meta($content) {
	
	$bizlisting_google_api_key='';
	$bizlisting_enable_emergency_mode='false';
	
	$bizlisting_google_api_key=esc_attr( get_option( 'bizlisting_google_maps_api_key' ));
	$bizlisting_enable_emergency_mode=esc_attr( get_option( 'bizlisting_enable_emergency_mode' ));

	
	global $post;
	$bizlisting_sum="";
	$bizlisting_specific_fields="";

	if ('localbiz'==get_post_type($post->ID)) { 

		$bizlisting_name=get_the_title(); 
		$bizlisting_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
		$bizlisting_phonenum = get_post_meta( $post->ID, 'bizlisting_phonenum', true ); 
		$bizlisting_faxnum = get_post_meta( $post->ID, 'bizlisting_faxnum', true ); 
		$bizlisting_streetaddr1 = get_post_meta( $post->ID, 'bizlisting_streetaddr1', true ); 
		$bizlisting_streetaddr2 = get_post_meta( $post->ID, 'bizlisting_streetaddr2', true ); 
		$bizlisting_city = get_post_meta( $post->ID, 'bizlisting_city', true ); 
		$bizlisting_state = get_post_meta( $post->ID, 'bizlisting_state', true ); 
		$bizlisting_zip = get_post_meta( $post->ID, 'bizlisting_zip', true ); 
		$bizlisting_url = get_post_meta( $post->ID, 'bizlisting_url', true ); 
		$bizlisting_contact_email = get_post_meta( $post->ID, 'bizlisting_contact_email', true ); 
		$bizlisting_opened_date = get_post_meta( $post->ID, 'bizlisting_opened_date', true ); 
		$bizlisting_opened_city = get_post_meta( $post->ID, 'bizlisting_opened_city', true ); 
		$bizlisting_naics = get_post_meta( $post->ID, 'bizlisting_naics', true ); 
		$bizlisting_price = get_post_meta( $post->ID, 'bizlisting_price', true ); 
		$bizlisting_latitude = get_post_meta( $post->ID, 'bizlisting_latitude', true ); 
		$bizlisting_longitude = get_post_meta( $post->ID, 'bizlisting_longitude', true ); 
		$bizlisting_showgooglemap = get_post_meta( $post->ID, 'bizlisting_showgooglemap', true ); 
		$bizlisting_cuisine = get_post_meta( $post->ID, 'bizlisting_cuisine'); 
		$bizlisting_lawtype = get_post_meta( $post->ID, 'bizlisting_lawtype'); 
		$bizlisting_religious = get_post_meta( $post->ID, 'bizlisting_religious'); 
		$bizlisting_normal_business_hours = esc_attr( get_post_meta( get_the_ID(), 'bizlisting_normal_business_hours', true ) ); 
		$bizlisting_corona_business_hours = esc_attr( get_post_meta( get_the_ID(), 'bizlisting_corona_business_hours', true ) );
		$bizlisting_corona_instructions = esc_attr( get_post_meta( get_the_ID(), 'bizlisting_corona_instructions', true ) );
		
	
		$bizlisting_sum.='<tr><td colspan="2"><span itemprop="name"><strong>'.$bizlisting_name.' </strong></span></td></tr>'.PHP_EOL; 
		
		if (( ($bizlisting_corona_business_hours) || ($bizlisting_corona_instructions)) &&  ($bizlisting_enable_emergency_mode) ) { 
			
			$bizlisting_sum.='<tr bgcolor="#FF0000"><td bgcolor="#FF0000" padding="0" style="background-color:#FF0000; padding:0;" colspan="2"> &nbsp;</td>';
			$bizlisting_sum.="</td></tr>".PHP_EOL;
			
			$bizlisting_sum.='<tr bgcolor="#FF0000"><td>Notice:</td><td align="left">';
			$bizlisting_sum.='<span itemprop="alertNotice">During this time of National Emergency, this business has adjusted hours and/or operations explained below:* </span>'; 
			$bizlisting_sum.="</td></tr>".PHP_EOL;
			
			if (!empty(trim($bizlisting_corona_business_hours))) { 
				$bizlisting_sum.='<tr><td>Adjusted National Emergency Hours:</td><td align="left">';
				$bizlisting_sum.='<span itemprop="emergencyBusinessHours">'.$bizlisting_corona_business_hours.'</span>'; 
				$bizlisting_sum.="</td></tr>".PHP_EOL;
				//$bizlisting_json.='"emergencyBusinessHours": "'.$bizlisting_corona_business_hours.'",'.PHP_EOL;
			}

			if (!empty(trim($bizlisting_corona_instructions))) { 
				$bizlisting_sum.='<tr><td>Special Notice to Customers & Employees:</td><td align="left">';
				$bizlisting_sum.='<span itemprop="emergencyBusinessInstructions">'.$bizlisting_corona_instructions.'</span>'; 
				$bizlisting_sum.="</td></tr>".PHP_EOL;
				//$bizlisting_json.='"emergencyBusinessInstructions": "'.$bizlisting_corona_instructions.'",'.PHP_EOL;
			}
			
			$bizlisting_sum.='<tr bgcolor="#FF0000"><td bgcolor="#FF0000" padding="0" style="background-color:#FF0000; padding:0;" colspan="2"> &nbsp;</td>';
			$bizlisting_sum.="</td></tr>".PHP_EOL;
			
		}



		
		if (!empty(trim($bizlisting_streetaddr1))) {
			$bizlisting_sum.='<tr><td>Address:</td><td align="left">'.PHP_EOL;
			$bizlisting_sum.='<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">'.PHP_EOL; 
			$bizlisting_sum.='<span itemprop="streetAddress">'.esc_html($bizlisting_streetaddr1).' <br /> '.esc_html($bizlisting_streetaddr2).' </span>'.PHP_EOL; 
			$bizlisting_sum.='<span itemprop="addressLocality">'.esc_html($bizlisting_city).' </span>'.PHP_EOL; 
			$bizlisting_sum.='<span itemprop="addressRegion">'.esc_html($bizlisting_state).'</span>'.PHP_EOL; 
			$bizlisting_sum.='<span itemprop="postalCode">'.esc_html($bizlisting_zip).'</span>'.PHP_EOL; 
			$bizlisting_sum.="</div></td></tr>".PHP_EOL;

		}


		
		if (!empty(trim($bizlisting_phonenum))) { 
			$bizlisting_sum.='<tr><td>Phone:</td><td align="left">';
			$bizlisting_sum.='<span itemprop="telephone">'.esc_html($bizlisting_phonenum).'</span>'; 
			$bizlisting_sum.="</td></tr>".PHP_EOL;

		}
		if (!empty(trim($bizlisting_faxnum))) { 
			$bizlisting_sum.='<tr><td>Fax:</td><td align="left">';
			$bizlisting_sum.='<span itemprop="faxNumber">'.esc_html($bizlisting_faxnum).'</span>'; 
			$bizlisting_sum.="</td></tr>".PHP_EOL;

		}
		if (!empty(trim($bizlisting_url))) { 
			$bizlisting_sum.='<tr><td>Website:</td><td align="left">';
			$bizlisting_sum.='<a itemprop="url" href="'.esc_url($bizlisting_url).'">'.esc_url($bizlisting_url).'</a>'; 
			$bizlisting_sum.="</td></tr>".PHP_EOL;
			
		}
		if (!empty(trim($bizlisting_contact_email))) { 
			$bizlisting_sum.='<tr><td>Email:</td><td align="left">';
			$bizlisting_sum.='<a itemprop="email" href="mailto:'.esc_html($bizlisting_contact_email).'">'.esc_html($bizlisting_contact_email).'</a>'; 
			$bizlisting_sum.="</td></tr>".PHP_EOL;
	
		}
		if (!empty(trim($bizlisting_opened_date))) { 
			$bizlisting_sum.='<tr><td>Opened:</td><td align="left">';
			$bizlisting_sum.='<span itemprop="foundingDate">'.esc_html($bizlisting_opened_date).'</span>'; 
			$bizlisting_sum.="</td></tr>".PHP_EOL;

		}
		if (!empty(trim($bizlisting_opened_city))) { 
			$bizlisting_sum.='<tr><td>Founded in:</td><td align="left">';
			$bizlisting_sum.='<span itemprop="foundingLocation">'.esc_html($bizlisting_opened_city).'</span>'; 
			$bizlisting_sum.="</td></tr>".PHP_EOL;
		}	
		if (!empty(trim($bizlisting_naics))) { 
			$bizlisting_sum.='<tr><td>NAICS:</td><td align="left">';
			$bizlisting_sum.='<span itemprop="naics">'.esc_html($bizlisting_naics).'</span>'; 
			$bizlisting_sum.="</td></tr>".PHP_EOL;

		}	
		if (!empty(trim($bizlisting_price))) { 
			$bizlisting_sum.='<tr><td>Price Range:</td><td align="left">';
			$bizlisting_sum.='<span itemprop="priceRange">';
			for ($price_xx = 1; $price_xx <= $bizlisting_price; $price_xx++) {
				$bizlisting_sum.='$ ';
			} 
			$bizlisting_sum.='</span>'; 
			$bizlisting_sum.="</td></tr>".PHP_EOL;	
			
			
		if (!empty(trim($bizlisting_image))) { 
			$bizlisting_sum.='<tr style="display: none; visibility: hidden;"><td>Image URL </td><td align="left">';
			$bizlisting_sum.='<span itemprop="image">'.$bizlisting_image.'</span>'; 
			$bizlisting_sum.="</td></tr>".PHP_EOL;
		}	

		}		
		
		if (!empty(trim($bizlisting_normal_business_hours))) { 
			$bizlisting_sum.='<tr><td>Standard Business Hours: </td><td align="left">';
			$bizlisting_sum.='<span itemprop="businessHours">'.$bizlisting_normal_business_hours.'</span>'; 
			$bizlisting_sum.="</td></tr>".PHP_EOL;
			//$bizlisting_json.='"businessHours": "'.$bizlisting_normal_business_hours.'",'.PHP_EOL;
		}
		
		
  		if (has_term('religion', 'localbiz_category') ) {
			// the religious designation only impacts the schema designated, not any itemprops
	
			$bizlisintg_schema_designation="http://schema.org/PlaceOfWorship";
			if($bizlisting_religious=='Buddhist Temples') { $bizlisintg_schema_designation="http://schema.org/BuddhistTemple";} 
			if($bizlisting_religious=='Church') { $bizlisintg_schema_designation="http://schema.org/Church";} 
			if($bizlisting_religious=='Hindu Temples') { $bizlisintg_schema_designation="http://schema.org/HinduTemple";} 
			if($bizlisting_religious=='Mosques') { $bizlisintg_schema_designation="http://schema.org/Mosque";} 
			if($bizlisting_religious=='Synagogues') { $bizlisintg_schema_designation="http://schema.org/Synagogue";} 
			
		}


		//add the right schema designation depending on category
  		if (has_term('restaurants', 'localbiz_category') ) {
			$bizlisintg_schema_designation="http://schema.org/Restaurant";


			$bizlisintg_specific_fields.='<tr><td>Cuisine</td><td align="left"><span itemprop="servesCuisine">';

			$bizlisintg_item_count=0;
			foreach($bizlisting_cuisine as $biz_cuisine) {
				$bizlisintg_specific_fields.='<span itemprop="servesCuisine">'.esc_html($biz_cuisine).'</span></br>';

				if ($bizlisintg_item_count>0) { $bizlisting_specific_json.=',';} 
				$bizlisintg_item_count++;
			}
			$bizlisintg_specific_fields.="</td></tr>".PHP_EOL;


		} elseif (has_term('legal', 'localbiz_category') ) {
			$bizlisintg_schema_designation="http://schema.org/LegalService";

			$bizlisintg_specific_fields.='<tr><td>Practice Specialty:</td><td align="left">';

			$bizlisintg_item_count=0;
			foreach($bizlisting_lawtype as $biz_lawtype) {
				$bizlisintg_specific_fields.='<span itemprop="knowsAbout">'.esc_html($biz_lawtype).'</span></br>';
				$bizlisintg_item_count++;
				
			}
			$bizlisintg_specific_fields.=' </span></td></tr>'.PHP_EOL;

		} else {
			$bizlisintg_schema_designation='http://schema.org/LocalBusiness';
		}

		
		$bizlisintg_content_front='<div itemscope itemtype="'.esc_attr($bizlisintg_schema_designation).'">'.PHP_EOL.'<table width="100%" class="bizlistingdetails">'.PHP_EOL;
		$bizlisintg_content_back='</table></div>'.PHP_EOL;

		$bizlisting_map="";
		if ((!empty(trim($bizlisting_showgooglemap))) && (trim($bizlisting_showgooglemap)=='latlong' )) {
			 
			if ((!empty(trim($bizlisting_latitude))) && (!empty(trim($bizlisting_longitude))) ) { 

				$bizlisting_map.='<iframe width="90%" height="400" frameborder="0" style="border:0"';
				$bizlisting_map.='src="https://www.google.com/maps/embed/v1/place?key='.esc_html($bizlisting_google_api_key);
	  			$bizlisting_map.='&q='.esc_html($bizlisting_latitude).','.esc_html($bizlisting_longitude);
				$bizlisting_map.='&zoom=19&maptype=satellite" allowfullscreen></iframe>'.PHP_EOL;
			}
		} elseif ((!empty(trim($bizlisting_showgooglemap))) && (trim($bizlisting_showgooglemap)=='name' )) {

				$bizlisting_map.='<iframe width="90%" height="400" frameborder="0" style="border:0"';
				$bizlisting_map.='src="https://www.google.com/maps/embed/v1/place?key='.esc_html($bizlisting_google_api_key);
				$bizlisting_map.='&q='.esc_html($bizlisting_name).','.esc_html($bizlisting_city).','.esc_html($bizlisting_state);
				$bizlisting_map.='&zoom=19&maptype=satellite" allowfullscreen></iframe>'.PHP_EOL;
		
		}	

		$content_disclaimer='';
		
		$content.=$bizlisintg_content_front.$bizlisting_sum.$bizlisting_specific_fields.$bizlisintg_content_back.$bizlisting_map.$content_disclaimer;
		/*
		$bizlisting_json_context=' "@context": "http://schema.org",'.PHP_EOL;
		
		$json_content=$bizlisting_json_front.$bizlisting_json_context.$bizlisting_json_type.$bizlisting_json.$bizlisting_specific_json.$bizlisting_json_back;
		
		$content.=$json_content;
		*/ 
	}
	return $content; 
}
add_filter( 'the_content', 'bizlisting_show_post_meta', 60); 


