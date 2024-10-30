<?php  
/* 
	Bizlisting plugin shortcode function last updated 3/18 to include emergency field features 
	added to output and query. 
	based on Display Posts Shortcode by Bill Erickson - an excellent example of an elegant and powerful plugin
*/

add_shortcode( 'display-businesses', 'bizlisting_shortcode' );
function bizlisting_shortcode( $bizlisting_shortcode_args ) {

	// put the input arguments aside 
	$input_args = $bizlisting_shortcode_args;

	// Array the shortcode args 
	$bizlisting_shortcode_args = shortcode_atts( array(
		'category'             => '',
		'category_display'     => '',
		'category_id'          => false,
		'category_label'       => '',
		'content_class'        => 'content',
		'content_length'	   => '50',
		'date_format'          => '(n/j/Y)',
		'date'                 => '',
		'date_column'          => 'post_date',
		'date_compare'         => '=',
		'date_query_before'    => '',
		'date_query_after'     => '',
		'date_query_column'    => '',
		'date_query_compare'   => '',
		'disable_this'    => false,
		'excerpt_length'       => false,
		'excerpt_more'         => false,
		'excerpt_more_link'    => false,
		'exclude'              => false,
		'exclude_current'      => false,
		'id'                   => false,
		'ignore_sticky_posts'  => false,
		'image_size'           => false,
		'meta_key'             => '',
		'meta_value'           => '',
		'no_posts_message'     => '',
		'offset'               => 0,
		'order'                => 'DESC',
		'orderby'              => 'date',
		'post_parent'          => false,
		'post_status'          => 'publish',
		'posts_per_page'       => '10',
		'tag'                  => '',
		'tax_operator'         => 'IN',
		'tax_include_children' => true,
		'tax_term'             => false,
		'taxonomy'             => false,
		'time'                 => '',
		'include_author'       => false,
		'include_content'      => false,
		'include_date'         => false,
		'include_date_modified'=> false,
		'include_excerpt'      => false,
		'include_link'         => true,
		'include_title'        => true,
		'include_emerg_hrs'	   => true,
		'emerg_hrs_length'     => false,
		'only_emerg_noted'     => false, 
		'include_street_addr'  => true,
		'title'                => '',
		'wrapper'              => 'div',
		'wrapper_class'        => 'display-localbiz-listing',
		'wrapper_id'           => false,
	), $bizlisting_shortcode_args, 'display-businesses' );

	// End early if shortcode should be turned off
	if( $bizlisting_shortcode_args['disable_this'] )
		return;

	$category             = sanitize_text_field( $bizlisting_shortcode_args['category'] );
	$category_display     = 'true' == $bizlisting_shortcode_args['category_display'] ? 'category' : sanitize_text_field( $bizlisting_shortcode_args['category_display'] );
	$category_id          = intval( $bizlisting_shortcode_args['category_id'] );
	$category_label       = sanitize_text_field( $bizlisting_shortcode_args['category_label'] );
	$content_class        = array_map( 'sanitize_html_class', ( explode( ' ', $bizlisting_shortcode_args['content_class'] ) ) );
	$content_length       = intval( $bizlisting_shortcode_args['content_length'] );
	$date_format          = sanitize_text_field( $bizlisting_shortcode_args['date_format'] );
	$date                 = sanitize_text_field( $bizlisting_shortcode_args['date'] );
	$date_column          = sanitize_text_field( $bizlisting_shortcode_args['date_column'] );
	$date_compare         = sanitize_text_field( $bizlisting_shortcode_args['date_compare'] );
	$date_query_before    = sanitize_text_field( $bizlisting_shortcode_args['date_query_before'] );
	$date_query_after     = sanitize_text_field( $bizlisting_shortcode_args['date_query_after'] );
	$date_query_column    = sanitize_text_field( $bizlisting_shortcode_args['date_query_column'] );
	$date_query_compare   = sanitize_text_field( $bizlisting_shortcode_args['date_query_compare'] );
	$excerpt_length       = intval( $bizlisting_shortcode_args['excerpt_length'] );
	$excerpt_more         = sanitize_text_field( $bizlisting_shortcode_args['excerpt_more'] );
	$excerpt_more_link    = filter_var( $bizlisting_shortcode_args['excerpt_more_link'], FILTER_VALIDATE_BOOLEAN );
	$exclude              = $bizlisting_shortcode_args['exclude']; // Sanitized later as an array of integers
	$exclude_current      = filter_var( $bizlisting_shortcode_args['exclude_current'], FILTER_VALIDATE_BOOLEAN );
	$id                   = $bizlisting_shortcode_args['id']; // Sanitized later as an array of integers
	$ignore_sticky_posts  = filter_var( $bizlisting_shortcode_args['ignore_sticky_posts'], FILTER_VALIDATE_BOOLEAN );
	$image_size           = sanitize_key( $bizlisting_shortcode_args['image_size'] );
	$meta_key             = sanitize_text_field( $bizlisting_shortcode_args['meta_key'] );
	$meta_value           = sanitize_text_field( $bizlisting_shortcode_args['meta_value'] );
	$no_posts_message     = sanitize_text_field( $bizlisting_shortcode_args['no_posts_message'] );
	$offset               = intval( $bizlisting_shortcode_args['offset'] );
	$order                = sanitize_key( $bizlisting_shortcode_args['order'] );
	$orderby              = sanitize_key( $bizlisting_shortcode_args['orderby'] );
	$post_parent          = $bizlisting_shortcode_args['post_parent']; // Validated later, after check for 'current'
	$post_status          = $bizlisting_shortcode_args['post_status']; // Validated later as one of a few values
	$post_type            = 'localbiz';
	$posts_per_page       = intval( $bizlisting_shortcode_args['posts_per_page'] );
	$tag                  = sanitize_text_field( $bizlisting_shortcode_args['tag'] );
	$tax_operator         = $bizlisting_shortcode_args['tax_operator']; // Validated later as one of a few values
	$tax_include_children = filter_var( $bizlisting_shortcode_args['tax_include_children'], FILTER_VALIDATE_BOOLEAN );
	$tax_term             = sanitize_text_field( $bizlisting_shortcode_args['tax_term'] );
	$taxonomy             = sanitize_key( $bizlisting_shortcode_args['taxonomy'] );
	$time                 = sanitize_text_field( $bizlisting_shortcode_args['time'] );
	$shortcode_title      = sanitize_text_field( $bizlisting_shortcode_args['title'] );
	$include_title        = filter_var( $bizlisting_shortcode_args['include_title'], FILTER_VALIDATE_BOOLEAN );
	$include_author       = filter_var( $bizlisting_shortcode_args['include_author'], FILTER_VALIDATE_BOOLEAN );
	$include_content      = filter_var( $bizlisting_shortcode_args['include_content'], FILTER_VALIDATE_BOOLEAN );
	$include_date         = filter_var( $bizlisting_shortcode_args['include_date'], FILTER_VALIDATE_BOOLEAN );
	$include_date_modified= filter_var( $bizlisting_shortcode_args['include_date_modified'], FILTER_VALIDATE_BOOLEAN );
	$include_excerpt      = filter_var( $bizlisting_shortcode_args['include_excerpt'], FILTER_VALIDATE_BOOLEAN );
	$include_link         = filter_var( $bizlisting_shortcode_args['include_link'], FILTER_VALIDATE_BOOLEAN );
	$include_emerg_hrs    = filter_var( $bizlisting_shortcode_args['include_emerg_hrs'], FILTER_VALIDATE_BOOLEAN );
	$emerg_hrs_length     = intval( $bizlisting_shortcode_args['emerg_hrs_length'] );
	$only_emerg_noted     = filter_var( $bizlisting_shortcode_args['only_emerg_noted'], FILTER_VALIDATE_BOOLEAN );
	$include_street_addr  = filter_var( $bizlisting_shortcode_args['include_street_addr'], FILTER_VALIDATE_BOOLEAN );	
	$wrapper              = sanitize_text_field( $bizlisting_shortcode_args['wrapper'] );
	$wrapper_class        = array_map( 'sanitize_html_class', ( explode( ' ', $bizlisting_shortcode_args['wrapper_class'] ) ) );

	if( !empty( $wrapper_class ) )
		$wrapper_class = ' class="' . implode( ' ', $wrapper_class ) . '"';
	$wrapper_id = sanitize_html_class( $bizlisting_shortcode_args['wrapper_id'] );
	if( !empty( $wrapper_id ) )
		$wrapper_id = ' id="' . $wrapper_id . '"';

	// Set up initial query for post
	$query_args = array(
		'cat'                 => $category_id,
		'category_name'       => $category,
		'order'               => $order,
		'orderby'             => $orderby,
		'perm'                => 'readable',
		'post_type'           => explode( ',', $post_type ),
		'posts_per_page'      => $posts_per_page,
		'tag'                 => $tag,
	);

	// Date query.
	if ( ! empty( $date ) || ! empty( $time ) || ! empty( $date_query_after ) || ! empty( $date_query_before ) ) {
		$initial_date_query = $date_query_top_lvl = array();

		$valid_date_columns = array(
			'post_date', 'post_date_gmt', 'post_modified', 'post_modified_gmt',
			'comment_date', 'comment_date_gmt'
		);

		$valid_compare_ops = array( '=', '!=', '>', '>=', '<', '<=', 'IN', 'NOT IN', 'BETWEEN', 'NOT BETWEEN' );

		// Sanitize and add date segments.
		$dates = bizlisting_sanitize_date_time( $date );
		if ( ! empty( $dates ) ) {
			if ( is_string( $dates ) ) {
				$timestamp = strtotime( $dates );
				$dates = array(
					'year'   => date( 'Y', $timestamp ),
					'month'  => date( 'm', $timestamp ),
					'day'    => date( 'd', $timestamp ),
				);
			}
			foreach ( $dates as $argument => $segment ) {
				$initial_date_query[ $argument ] = $segment;
			}
		}

		// Sanitize and add time segments.
		$times = bizlisting_sanitize_date_time( $time, 'time' );
		if ( ! empty( $times ) ) {
			foreach ( $times as $argument => $segment ) {
				$initial_date_query[ $argument ] = $segment;
			}
		}

		// Date query 'before' argument.
		$before = bizlisting_sanitize_date_time( $date_query_before, 'date', true );
		if ( ! empty( $before ) ) {
			$initial_date_query['before'] = $before;
		}

		// Date query 'after' argument.
		$after = bizlisting_sanitize_date_time( $date_query_after, 'date', true );
		if ( ! empty( $after ) ) {
			$initial_date_query['after'] = $after;
		}

		// Date query 'column' argument.
		if ( ! empty( $date_query_column ) && in_array( $date_query_column, $valid_date_columns ) ) {
			$initial_date_query['column'] = $date_query_column;
		}

		// Date query 'compare' argument.
		if ( ! empty( $date_query_compare ) && in_array( $date_query_compare, $valid_compare_ops ) ) {
			$initial_date_query['compare'] = $date_query_compare;
		}

		//
		// Top-level date_query arguments. Only valid arguments will be added.
		//

		// 'column' argument.
		if ( ! empty( $date_column ) && in_array( $date_column, $valid_date_columns ) ) {
			$date_query_top_lvl['column'] = $date_column;
		}

		// 'compare' argument.
		if ( ! empty( $date_compare ) && in_array( $date_compare, $valid_compare_ops ) ) {
			$date_query_top_lvl['compare'] = $date_compare;
		}

		// Bring in the initial date query.
		if ( ! empty( $initial_date_query ) ) {
			$date_query_top_lvl[] = $initial_date_query;
		}

		// Date queries.
		$query_args['date_query'] = $date_query_top_lvl;
	}

	// Ignore Sticky Posts
	if( $ignore_sticky_posts )
		$query_args['ignore_sticky_posts'] = true;

	// Meta key (for ordering)
	if( !empty( $meta_key ) )
		$query_args['meta_key'] = $meta_key;

	// Meta value (for simple meta queries)
	if( !empty( $meta_value ) )
		$query_args['meta_value'] = $meta_value;

	// If Post IDs
	if( $id ) {
		$posts_in = array_map( 'intval', explode( ',', $id ) );
		$query_args['post__in'] = $posts_in;
	}

	// If Exclude
	$post__not_in = array();
	if( !empty( $exclude ) ) {
		$post__not_in = array_map( 'intval', explode( ',', $exclude ) );
	}
	if( is_singular() && $exclude_current ) {
		$post__not_in[] = get_the_ID();
	}
	if( !empty( $post__not_in ) ) {
		$query_args['post__not_in'] = $post__not_in;
	}

	// Post Author
	if( !empty( $author ) ) {
		if( 'current' == $author && is_user_logged_in() )
			$query_args['author_name'] = wp_get_current_user()->user_login;
		elseif( 'current' == $author )
			$query_args['meta_key'] = 'dps_no_results';
		else
			$query_args['author_name'] = $author;
	}

	// Offset
	if( !empty( $offset ) )
		$query_args['offset'] = $offset;

	// Post Status
	$post_status = explode( ', ', $post_status );
	$validated = array();
	$available = array( 'publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit', 'trash', 'any' );
	foreach ( $post_status as $unvalidated )
		if ( in_array( $unvalidated, $available ) )
			$validated[] = $unvalidated;
	if( !empty( $validated ) )
		$query_args['post_status'] = $validated;


	// If taxonomy attributes, create a taxonomy query
	if ( !empty( $taxonomy ) && !empty( $tax_term ) ) {

		if( 'current' == $tax_term ) {
			global $post;
			$terms = wp_get_post_terms(get_the_ID(), $taxonomy);
			$tax_term = array();
			foreach ($terms as $term) {
				$tax_term[] = $term->slug;
			}
		}else{
			// Term string to array
			$tax_term = explode( ', ', $tax_term );
		}

		// Validate operator
		if( !in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) )
			$tax_operator = 'IN';

		$tax_args = array(
			'tax_query' => array(
				array(
					'taxonomy'         => $taxonomy,
					'field'            => 'slug',
					'terms'            => $tax_term,
					'operator'         => $tax_operator,
					'include_children' => $tax_include_children,
				)
			)
		);

		// Check for multiple taxonomy queries
		$count = 2;
		$more_tax_queries = false;
		while(
			isset( $input_args['taxonomy_' . $count] ) && !empty( $input_args['taxonomy_' . $count] ) &&
			isset( $input_args['tax_' . $count . '_term'] ) && !empty( $input_args['tax_' . $count . '_term'] )
		):

			// Sanitize values
			$more_tax_queries = true;
			$taxonomy = sanitize_key( $input_args['taxonomy_' . $count] );
	 		$terms = explode( ', ', sanitize_text_field( $input_args['tax_' . $count . '_term'] ) );
	 		$tax_operator = isset( $input_args['tax_' . $count . '_operator'] ) ? $input_args['tax_' . $count . '_operator'] : 'IN';
	 		$tax_operator = in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ? $tax_operator : 'IN';
	 		$tax_include_children = isset( $input_args['tax_' . $count . '_include_children'] ) ? filter_var( $bizlisting_shortcode_args['tax_' . $count . '_include_children'], FILTER_VALIDATE_BOOLEAN ) : true;

	 		$tax_args['tax_query'][] = array(
	 			'taxonomy'         => $taxonomy,
	 			'field'            => 'slug',
	 			'terms'            => $terms,
	 			'operator'         => $tax_operator,
	 			'include_children' => $tax_include_children,
	 		);

			$count++;

		endwhile;

		if( $more_tax_queries ):
			$tax_relation = 'AND';
			if( isset( $input_args['tax_relation'] ) && in_array( $input_args['tax_relation'], array( 'AND', 'OR' ) ) )
				$tax_relation = $input_args['tax_relation'];
			$tax_args['tax_query']['relation'] = $tax_relation;
		endif;

		$query_args = array_merge_recursive( $query_args, $tax_args );
	}

	// If post parent attribute, set up parent
	if( $post_parent !== false ) {
		if( 'current' == $post_parent ) {
			global $post;
			$post_parent = get_the_ID();
		}
		$query_args['post_parent'] = intval( $post_parent );
	}

	// If $only_emerg_noted 
	
	if ( $only_emerg_noted  !== false ) {
		
		$meta_args = array(
			'meta_query' => array(
'				relation'		=> 'OR',
				array(
					'key'            => 'bizlisting_corona_business_hours',
					'value'            => '',
					'compare'         => '!='
				),
				
				array(
					'key'            => 'bizlisting_corona_instructions',
					'value'            => '',
					'compare'         => '!='
				),

			)
		);
	
		$query_args = array_merge_recursive( $query_args, $meta_args );
	}
	
	// Set up html elements used to wrap the posts.
	// Default is ul/li, but can also be ol/li and div/div
	$wrapper_options = array( 'ul', 'ol', 'div' );
	if( ! in_array( $wrapper, $wrapper_options ) )
		$wrapper = 'ul';
	$inner_wrapper = 'div' == $wrapper ? 'div' : 'li';

	/**
	 * Filter the arguments passed to WP_Query.
	 *
	 * @since 1.7
	 *
	 * @param array $args          Parsed arguments to pass to WP_Query.
	 * @param array $input_args Original attributes passed to the shortcode.
	 */
	$listing = new WP_Query( apply_filters( 'bizlisting_shortcode_args', $query_args, $input_args ) );
	if ( ! $listing->have_posts() ) {
		/**
		 * Filter content to display if no posts match the current query.
		 *
		 * @param string $no_posts_message Content to display, returned via {@see wpautop()}.
		 */
		return apply_filters( 'bizlisting_shortcode_no_results', wpautop( $no_posts_message ) );
	}

	$inner = '';
	while ( $listing->have_posts() ): $listing->the_post(); global $post;

		$image = $date = $author = $excerpt = $content = $street_addr ='';

		if ( $include_title && $include_link ) {
			/** This filter is documented in wp-includes/link-template.php */
			$title = '<a class="localbiz-title" href="' . apply_filters( 'the_permalink', get_permalink() ) . '">' . get_the_title() . '</a>';

		} elseif( $include_title ) {
			$title = '<span class="localbiz-title">' . get_the_title() . '</span>';

		} else {
			$title = '';
		}

		if ( $image_size && has_post_thumbnail() && $include_link ) {
			$image = '<a class="localbiz-logo" href="' . get_permalink() . '">' . get_the_post_thumbnail( get_the_ID(), $image_size ) . '</a> ';

		} elseif( $image_size && has_post_thumbnail() ) {
			$image = '<span class="localbiz-logo">' . get_the_post_thumbnail( get_the_ID(), $image_size ) . '</span> ';

		}

		if ( $include_date ) {
			$date = ' <span class="date">' . get_the_date( $date_format ) . '</span>';
		} elseif ( $include_date_modified ) {
			$date = ' <span class="date">' . get_the_modified_date( $date_format ) . '</span>';
		}

		if( $include_author )
			/**
			 * Filter the HTML markup to display author information for the current post.
			 *
			 * @since Unknown
			 *
			 * @param string $author_output HTML markup to display author information.
			 */
			$author = apply_filters( 'bizlisting_shortcode_author', ' <span class="author">by ' . get_the_author() . '</span>', $original_atts );

		if ( $include_excerpt ) {

			// Custom build excerpt based on shortcode parameters
			if( $excerpt_length || $excerpt_more || $excerpt_more_link ) {

				$length = $excerpt_length ? $excerpt_length : apply_filters( 'excerpt_length', 55 );
				$more   = $excerpt_more ? $excerpt_more : apply_filters( 'excerpt_more', '' );
				$more   = $excerpt_more_link ? ' <a href="' . get_permalink() . '">' . $more . '</a>' : ' ' . $more;

				if( has_excerpt() && apply_filters( 'bizlisting_shortcode_full_manual_excerpt', false ) ) {
					$excerpt = $post->post_excerpt . $more;
				} elseif( has_excerpt() ) {
					$excerpt = wp_trim_words( strip_shortcodes( $post->post_excerpt ), $length, $more );
				} else {
					$excerpt = wp_trim_words( strip_shortcodes( $post->post_content ), $length, $more );
				}


			// Use default, can customize with WP filters
			} else {
				$excerpt = get_the_excerpt();
			}

			$excerpt = '<span class="excerpt">' . $excerpt . '</span>';


		}
	
		if ( $include_street_addr ) {
			$street_addr  = esc_attr( get_post_meta( $post->ID, 'bizlisting_streetaddr1', true ) );
			$street_addr  = ' <span class="street_addr">' . $street_addr. '</span>';
		} else {
			$street_addr='';
		}
	
	
		if ( $include_emerg_hrs ) {

			
			$emerg_business_hours = esc_attr( get_post_meta( $post->ID, 'bizlisting_corona_business_hours', true ) );
			$emerg_business_instructions = esc_attr( get_post_meta( $post->ID, 'bizlisting_corona_instructions', true ) );
			
			
			// Custom build excerpt based on shortcode parameters
			if( $emerg_hrs_length ) {

				$length = $emerg_hrs_length ? $emerg_hrs_length : apply_filters( 'emerg_hrs_length', 55 );


				if( $emerg_business_hours ) {
					$emerg_business_hours = wp_trim_words( strip_shortcodes( $emerg_business_hours ), $length );
				} 

			// Use default, can customize with WP filters
			} 
			$emerg_business_hours = '<span class="emerg_hrs">' . $emerg_business_hours . '</span>';
			if ($emerg_business_instructions) {
				$emerg_business_hours .='<a class="localbiz-more-link" href="' . get_permalink() . '">More info ...</a>';
			}


		} else {
			$emerg_business_hours='';
		}

		if( $include_content ) {
			add_filter( 'shortcode_atts_bizlisting', 'bizlisting_display_posts_off', 10, 3 );
			/** This filter is documented in wp-includes/post-template.php */
			$content = '<div class="' . implode( ' ', $content_class ) . '">' . apply_filters( 'the_content', substr(get_the_content(),0, $content_length ) ) . '</div>';
			remove_filter( 'shortcode_atts_bizlisting', 'bizlisting_display_posts_off', 10, 3 );
		}

		// Display categories the post is in
		$category_display_text = '';

		if( $category_display && is_object_in_taxonomy( get_post_type(), $category_display ) ) {
			$category_display_text = PHP_EOL.'Met the condition'.PHP_EOL;
			$terms = get_the_terms( get_the_ID(), $category_display );
			$term_output = array();
			foreach( $terms as $term )
				$term_output[] = '<a href="' . get_term_link( $term, $category_display ) . '">' . $term->name . '</a>';
			$category_display_text = ' <span class="localbiz-category"><span class="localbiz-category-label">' . $category_label . '</span> ' . implode( ', ', $term_output ) . '</span>';

			/**
			 * Filter the list of categories attached to the current post.
			 *
			 * @since 2.4.2
			 *
			 * @param string   $category_display Current Category Display text
			 */
			$category_display_text = apply_filters( 'bizlisting_shortcode_category_display', $category_display_text );

		}

		$class = array( 'listing-item' );

		/**
		 * Filter the post classes for the inner wrapper element of the current post.
		 *
		 * @since 2.2
		 *
		 * @param array    $class         Post classes.
		 * @param WP_Post  $post          Post object.
		 * @param WP_Query $listing       WP_Query object for the posts listing.
		 * @param array    $input_args    Original attributes passed to the shortcode.
		 */
		$class = array_map( 'sanitize_html_class', apply_filters( 'bizlisting_shortcode_post_class', $class, $post, $listing, $input_args ) );
		$output = PHP_EOL.'<' . $inner_wrapper . ' class="' . implode( ' ', $class ) . '">'.PHP_EOL.$category_display_text .PHP_EOL. $image .PHP_EOL. $title .PHP_EOL. $date .PHP_EOL. $author .PHP_EOL.$street_addr.PHP_EOL. $emerg_business_hours .PHP_EOL. $excerpt .PHP_EOL. $content .PHP_EOL.  '</' . $inner_wrapper . '>'.PHP_EOL;

		/**
		 * Filter the HTML markup for output via the shortcode.
		 *
		 * @since 0.1.5
		 *
		 * @param string $output        The shortcode's HTML output.
		 * @param array  $input_args    Original attributes passed to the shortcode.
		 * @param string $image         HTML markup for the post's featured image element.
		 * @param string $title         HTML markup for the post's title element.
		 * @param string $date          HTML markup for the post's date element.
		 * @param string $excerpt       HTML markup for the post's excerpt element.
		 * @param string $inner_wrapper Type of container to use for the post's inner wrapper element.
		 * @param string $content       The post's content.
		 * @param string $class         Space-separated list of post classes to supply to the $inner_wrapper element.
		 */
		$inner .= apply_filters( 'bizlisting_shortcode_output', $output, $input_args, $image, $title, $date, $excerpt, $inner_wrapper, $content, $class );

	endwhile; wp_reset_postdata();

	/**
	 * Filter the shortcode output's opening outer wrapper element.
	 *
	 * @since 1.7
	 *
	 * @param string $wrapper_open  HTML markup for the opening outer wrapper element.
	 * @param array  $input_args Original attributes passed to the shortcode.
	 */
	$open = apply_filters( 'bizlisting_shortcode_wrapper_open', '<' . $wrapper . $wrapper_class . $wrapper_id . '>', $input_args );

	/**
	 * Filter the shortcode output's closing outer wrapper element.
	 *
	 * @since 1.7
	 *
	 * @param string $wrapper_close HTML markup for the closing outer wrapper element.
	 * @param array  $input_args Original attributes passed to the shortcode.
	 */
	$close = apply_filters( 'bizlisting_shortcode_wrapper_close', '</' . $wrapper . '>', $input_args );

	$return = '';

	if( $shortcode_title ) {

		/**
		 * Filter the shortcode output title tag element.
		 *
		 * @since 2.3
		 *
		 * @param string $tag           Type of element to use for the output title tag. Default 'h2'.
		 * @param array  $input_args Original attributes passed to the shortcode.
		 */
		$title_tag = apply_filters( 'bizlisting_shortcode_title_tag', 'h2', $input_args );

		$return .= '<' . $title_tag . ' class="display-posts-title">' . $shortcode_title . '</' . $title_tag . '>' . "\n";
	}

	$return .= $open . $inner . $close;

	return $return;
}

/**
 * Sanitize the segments of a given date or time for a date query.
 *
 * Accepts times entered in the 'HH:MM:SS' or 'HH:MM' formats, and dates
 * entered in the 'YYYY-MM-DD' format.
 *
 * @param string $date_time      Date or time string to sanitize the parts of.
 * @param string $type           Optional. Type of value to sanitize. Accepts
 *                               'date' or 'time'. Default 'date'.
 * @param bool   $accepts_string Optional. Whether the return value accepts a string.
 *                               Default false.
 * @return array|string Array of valid date or time segments, a timestamp, otherwise
 *                      an empty array.
 */
function bizlisting_sanitize_date_time( $date_time, $type = 'date', $accepts_string = false ) {
	if ( empty( $date_time ) || ! in_array( $type, array( 'date', 'time' ) ) ) {
		return array();
	}

	$segments = array();

	/*
	 * If $date_time is not a strictly-formatted date or time, attempt to salvage it with
	 * as strototime()-ready string. This is supported by the 'date', 'date_query_before',
	 * and 'date_query_after' attributes.
	 */
	if (
		true === $accepts_string
		&& ( false !== strpos( $date_time, ' ' ) || false === strpos( $date_time, '-' ) )
	) {
		if ( false !== $timestamp = strtotime( $date_time ) ) {
			return $date_time;
		}
	}

	$parts = array_map( 'absint', explode( 'date' == $type ? '-' : ':', $date_time ) );

	// Date.
	if ( 'date' == $type ) {
		// Defaults to 2001 for years, January for months, and 1 for days.
		$year = $month = $day = 1;

		if ( count( $parts ) >= 3 ) {
			list( $year, $month, $day ) = $parts;

			$year  = ( $year  >= 1 && $year  <= 9999 ) ? $year  : 1;
			$month = ( $month >= 1 && $month <= 12   ) ? $month : 1;
			$day   = ( $day   >= 1 && $day   <= 31   ) ? $day   : 1;
		}

		$segments = array(
			'year'  => $year,
			'month' => $month,
			'day'   => $day
		);

	// Time.
	} elseif ( 'time' == $type ) {
		// Defaults to 0 for all segments.
		$hour = $minute = $second = 0;

		switch( count( $parts ) ) {
			case 3 :
				list( $hour, $minute, $second ) = $parts;
				$hour   = ( $hour   >= 0 && $hour   <= 23 ) ? $hour   : 0;
				$minute = ( $minute >= 0 && $minute <= 60 ) ? $minute : 0;

				$second = ( $second >= 0 && $second <= 60 ) ? $second : 0;
				break;
			case 2 :
				list( $hour, $minute ) = $parts;
				$hour   = ( $hour   >= 0 && $hour   <= 23 ) ? $hour   : 0;
				$minute = ( $minute >= 0 && $minute <= 60 ) ? $minute : 0;
				break;
			default : break;
		}

		$segments = array(
			'hour'   => $hour,
			'minute' => $minute,
			'second' => $second
		);
	}

	/**
	 * Filter the sanitized segments for the given date or time string.
	 *
	 * @since 2.5
	 *
	 * @param array  $segments  Array of sanitized date or time segments, e.g. hour, minute, second,
	 *                          or year, month, day, depending on the value of the $type parameter.
	 * @param string $date_time Date or time string. Dates are formatted 'YYYY-MM-DD', and times are
	 *                          formatted 'HH:MM:SS' or 'HH:MM'.
	 * @param string $type      Type of string to sanitize. Can be either 'date' or 'time'.
	 */
	return apply_filters( 'bizlisting_shortcode_sanitized_segments', $segments, $date_time, $type );
}

/**
 * Turn off display posts shortcode
 * If display full post content, any uses of [display-posts] are disabled
 *
 * @param array $out, returned shortcode values
 * @param array $pairs, list of supported attributes and their defaults
 * @param array $atts, original shortcode attributes
 * @return array $out
 */
function bizlisting_display_posts_off( $out, $pairs, $atts ) {
	/**
	 * Filter whether to disable the display-posts shortcode.
	 *
	 * The function and filter were added for backward-compatibility with
	 * 2.3 behavior in certain circumstances.
	 *
	 * @since 2.4
	 *
	 * @param bool $disable Whether to disable the display-posts shortcode. Default true.
	 */
	$out['display_posts_off'] = apply_filters( 'bizlisting_shortcode_inception_override', true );
	return $out;
}