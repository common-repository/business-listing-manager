<?php 
function bizlisting_admin_settings()
{
	if (!current_user_can('manage_options')) {
        wp_die('You do not have sufficient permissions to access this page.');
    }
	
	?>

<style>
.bizlisting_admin_form_wrapper, .bizlisting_admin_help_wrapper {
	margin: 0 auto;
	padding: 12px;
	width: 100%;
}
.bizlisting_admin_row	{
	display: grid;
	grid-template-columns: repeat(12,1fr);
	grid-column-gap: 1rem;
	grid-row-gap: 1rem;
	width:100%;
}
.bizlisting_admin_cell_full {
	grid-column:span 12;
	padding:3px;
}
.bizlisting_admin_cell_one_half {
	grid-column:span 6;
	padding:3px;
}
.bizlisting_admin_cell_one_third {
	grid-column:span 4;
	padding:3px;
}	
.bizlisting_admin_cell_one_quarter {
	grid-column:span 3;
	padding:3px;
}	
.bizlisting_admin_cell_one_sixth {
	grid-column:span 2;
	padding:3px;
}
.bizlisting_admin_section, .bizlisting_admin_help_section {
	background-color: #ffffff;
	width: 90%;
	padding:15px;
	margin: 15px 20px 15px 0;
	border: 1px solid #aaaaaa; 
}
</style>
<div class="bizlisting_admin_form_wrapper">
	<div class="bizlisting_admin_section">	
		<h2>Business Listing Plugin Setup and Configuration</h2>
		<p> Business Listing Plugin is designed to create directories of businesses. Each business listed gets its own webpage and unique URL.  </p>
		<p>Created and published by <a href="https://jason.pelish.org">Jason Pelish</a> from <a href="https://www.massiveimpressions.com/">Massive Impressions</a></p>
		<p>More information can be found about this plugin here: <a href="https://www.massiveimpressions.com/business-listing-plugin-for-wordpress/">https://www.massiveimpressions.com/business-listing-plugin-for-wordpress/ </a></p>
	</div>
		<div class="bizlisting_admin_section">	
			<h2>Configuration</h2>



<?php

$bizlisting_google_maps_api_key='';
$bizlisting_enable_emergency_mode='';

	if( isset( $_POST['_wpnonce'] ) &&  wp_verify_nonce( $_POST['_wpnonce'], 'bizlisting_settings_option_page_action' ) ){  
	

	if( isset( $_POST['bizlisting_google_maps_api_key'] ) ) {
		update_option( 'bizlisting_google_maps_api_key', esc_attr( $_POST['bizlisting_google_maps_api_key'])  );
	} else {
		update_option( 'bizlisting_google_maps_api_key', $bizlisting_google_maps_api_key );
	}

	if( isset( $_POST['bizlisting_enable_emergency_mode'] ) ) {
		update_option( 'bizlisting_enable_emergency_mode', esc_attr( $_POST['bizlisting_enable_emergency_mode'])  );
	} else {
		update_option( 'bizlisting_enable_emergency_mode', $bizlisting_enable_emergency_mode );
	}
	
	

	echo "<p><strong>Settings Saved!</strong></p>";
} else {
	if (isset($_POST['bizlisting_google_maps_api_key']) ) {
		echo "<p><strong>Settings  NOT Saved!</strong></p>";
	}
}

?>


<form method="POST">
<h3>Google API Key</h3>
	<p>The Google Maps API key is necessary for displaying maps on your site. The key can only be obtained from Google. <a href="https://developers.google.com/maps/gmp-get-started" target="_blank" >Get one here.</a> </p>	
<p>
    <label for="bizlisting_google_maps_api_key">Google Maps API Key</label>
    <input type="text" name="bizlisting_google_maps_api_key" id="bizlisting_google_maps_api_key" value="<?php echo esc_attr( get_option( 'bizlisting_google_maps_api_key' )); ?>">
</p>
<h3>Emergency Mode</h3>
<p>The Emergency Mode option governs whether emergency info is show or not on individual business pages. It does not impact the behavior of the shortcode. </p>
<p>
    <label for="bizlisting_enable_emergency_mode">Enable Emergency Mode</label>
    <input type="checkbox" name="bizlisting_enable_emergency_mode" id="bizlisting_enable_emergency_mode" value="1" <?php 
	$bizlisting_enable_emergency_mode = esc_attr( get_option( 'bizlisting_enable_emergency_mode' ));
	if ($bizlisting_enable_emergency_mode) { echo 'checked="checked"'; } 
	  ?>>
</p>
	
<p>
    <?php wp_nonce_field( 'bizlisting_settings_option_page_action' ); ?>
    <input type="submit" value="Save" class="button button-primary button-large">
</p>

</form>
</div>
</div>
<?php }
function bizlisting_manager_help() {
	if (!current_user_can('manage_options')) {
        wp_die('You do not have sufficient permissions to access this page.');
    }

	
?> 
<div id="bizlisting_admin_help_wrapper">
	
	<div class="bizlisting_admin_help_section">	
		<h2>Business Listing Plugin Setup and Configuration</h2>
		<p> Business Listing Plugin is designed to create directories of businesses. Each business listed gets its own webpage and unique URL.  </p>
	</div>
	<div class="bizlisting_admin_help_section">	
		<h3>Shortcode Instructions</h3>
		<p>This plugin comes with the ability to show multiple businesses in one view. The shortcode is <pre>[display-businesses]</pre>. </p>
		<h4>Shorcode Parameters</h4>
		<ul>
			<li><strong>include_street_addr</strong> - true/false - controls whether street address line 1 is added after the business name </li>
			<li><strong>only_emerg_noted </strong>- true/false - only shows businesses that have non-blank values for either emergency hours or emergency instructions</li>
			<li><strong>include_emerg_hrs</strong> - true/false - emergency hours are indluded in the output after the street address </li>
			<li><strong>emerg_hrs_length</strong> - whole numbers - The maximum number of words  </li>
			<li><strong>include_emerg_hrs</strong> - true/false - emergency hours are indluded in the output after the street address </li>
			<li><strong>category_display</strong> - artwork category slugs - limit the businesses shown to those belonging to the single taxonomy </li>
			<li><strong>include_excerpt</strong> - true/false - controls whether the excerpt HTML is added  </li>
			<li><strong>image_size</strong> -  thumbnail, medium, large, fullsize  - controls the dimensions that the business logo is shown in </li>
			<li><strong>posts_per_page</strong> -  thumbnail, medium, large, fullsize  - controls the dimensions that the business logo is shown in </li>
			<li><strong>wrapper_id</strong> -  text - adds this id value to the single div wrapper around the outside all of the listings  </li>
			<li><strong>orderby</strong> -  date, title  - defines the field the listings are ordered by </li>
			<li><strong>order</strong> -  date, title  - defines the field the listings are ordered by </li>
	</ul>
		<p>Here's an example of how this shortcode was leveraged in the case where emergency hours needed to be shown. 
			 <pre>[display-businesses include_street_addr="true" only_emerg_noted="true" include_emerg_hrs="true"</pre><pre> emerg_hrs_length="20" category_display="localbiz_category" include_excerpt="false"</pre><pre> image_size="medium" posts_per_page="40" wrapper_id="biz-listing" orderby="date" order="DESC"]</pre></p>
	</div>	
	<div class="bizlisting_admin_help_section">	
		<p>In order to make the field "Cuisine" appear and behave as intended there must be a category manually added after this plugin is installed. That Business Listing Category must have a slug value: "restaurants".</p>
		<p>In order to make the field "Religious Organizaiton" drive the Schema used and behave as intended there must be a category manually added after this plugin is installed. That Business Listing Category must have a slug value: "religious".</p>
		<p>In order to make the fields "Practice Specialty" appear and behave as intended there must be a category manually added after this plugin is installed. That Business Listing Category must have a slug value: "legal".</p>
	</div>	
	<div class="bizlisting_admin_help_section">	
		<p>If you have questions about this plugin and want to learn more: <a href="https://www.massiveimpressions.com/forums/forum/business-listing-plugin-support-faqs/" target="_blank" >support for this plugin is provided by Massive Impressions.</a></p>
		<ul>
		<li>* How to let visitors create their own listings without needing a WordPress login. (requires Gravity Forms)</li>
		<li>* Discussion on CSS Styling.</li>
		<li>* Recommended categories.</li>
		<li>* Give suggestions on what features you'd like to see.</li>
		</ul>
		</ul>
	<div>	
</div>
<?php }