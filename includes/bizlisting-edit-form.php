    <style scoped>
        .bizlisting_box {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr ;
            grid-row-gap: 10px;
            grid-column-gap: 20px;
        }
        .bizlisting_field {
            display: contents;
        }
		.bizlisting_field label {grid-column:  span 2; }		
		.bizlisting_field input, .bizlisting_field select {grid-column:  span 4; }
		.bizlisting_field .description {grid-column:  span 6; }		
		.bizlisting_field label {grid-column:  span 2; }		
		.bizlisting_field input.bizlisting_value, .bizlisting_field select.bizlisting_units  {grid-column:  span 2; }
		.bizlisting_field .description {grid-column:  span 6; }		

    </style>
<div class="bizlisting_box">
		<p class="meta-options bizlisting_field">
        <label for="bizlisting_corona_business_hours">Emergency Business Hours</label>
        <input id="bizlisting_corona_business_hours" type="text" name="bizlisting_corona_business_hours" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'bizlisting_corona_business_hours', true ) ); ?>">
		<span class="description">Hours that the location is open during time of emergencies. <em>not required</em> </span>
    </p>
    <p class="meta-options bizlisting_field">
        <label for="bizlisting_corona_instructions">Emergency Business Notice</label>
        <input id="bizlisting_corona_instructions" type="text" name="bizlisting_corona_instructions" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'bizlisting_corona_instructions', true ) ); ?>">
		<span class="description">A notice to people intending to visit this location that's shown during emergencies. <em>not required</em>  </span>
    </p>
    <p class="meta-options bizlisting_field">
        <label for="bizlisting_normal_business_hours">Standard Business Hours</label>
        <input id="bizlisting_normal_business_hours" type="text" name="bizlisting_normal_business_hours" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'bizlisting_normal_business_hours', true ) ); ?>">
		<span class="description">Hours that this location is open during normal, non-emergency times. <em>not required</em> </span>
    </p>
    <p class="meta-options bizlisting_field">
        <label for="bizlisting_phonenum">Main Phone Number</label>
        <input id="bizlisting_phonenum" type="text" name="bizlisting_phonenum" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'bizlisting_phonenum', true ) ); ?>">
		<span class="description">The primary phone number visitors to this location should use for inquiries. <em>not required</em>  </span>
    </p>
    <p class="meta-options bizlisting_field">
        <label for="bizlisting_faxnum">Fax Number</label>
        <input id="bizlisting_faxnum" type="text" name="bizlisting_faxnum" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'bizlisting_faxnum', true ) ); ?>">
		<span class="description">A fax is a machine that uses standard phone lines to send images of documents.  <em>not required</em>  </span>
    </p>
    <p class="meta-options bizlisting_field">
        <label for="bizlisting_streetaddr1">Street Address 1</label>
        <input id="bizlisting_streetaddr1" type="text" name="bizlisting_streetaddr1" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'bizlisting_streetaddr1', true ) ); ?>">
		<span class="description">The street address should not include apartment number, suite number etc.<em>required</em>  </span>
    </p>
    <p class="meta-options bizlisting_field">
        <label for="bizlisting_streetaddr2">Street Address 2</label>
        <input id="bizlisting_streetaddr2" type="text" name="bizlisting_streetaddr2" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'bizlisting_streetaddr2', true ) ); ?>">
		<span class="description">The seocnd line of the street address is appropriate for suite number, office number, apartment number or the equivalent.<em>not required</em>  </span>
    </p>
    <p class="meta-options bizlisting_field">
        <label for="bizlisting_city">City</label>
        <input id="bizlisting_city" type="text" name="bizlisting_city" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'bizlisting_city', true ) ); ?>">
		<span class="description">Add the name of the subdistrict if applicable. In the case of an unincorporated area, use the nearest incorporated area.<em>required</em>  </span>
    </p>
    <p class="meta-options bizlisting_field">
        <label for="bizlisting_state">State</label>
        <input id="bizlisting_state" type="text" name="bizlisting_state" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'bizlisting_state', true ) ); ?>">
		<span class="description">Use either the full name of the state or an abbreviation.<em>required</em>  </span>
    </p>
    <p class="meta-options bizlisting_field">
        <label for="bizlisting_zip">Zip Code</label>
        <input id="bizlisting_zip" type="text" name="bizlisting_zip" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'bizlisting_zip', true ) ); ?>">
		<span class="description">Use either the five digit or extended nine digit version.<em>not required</em>  </span>
    </p>
    <p class="meta-options bizlisting_field">
        <label for="bizlisting_url">Business Website Address</label>
        <input id="bizlisting_url" type="text" name="bizlisting_url" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'bizlisting_url', true ) ); ?>">
		<span class="description">Enter the full address including http:// or https:// <em>not required</em>  </span>
    </p>
    <p class="meta-options bizlisting_field">
        <label for="bizlisting_contact_email">Contact Email to Display in Business Listing</label>
        <input id="bizlisting_contact_email" type="text" name="bizlisting_contact_email" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'bizlisting_contact_email', true ) ); ?>">
		<span class="description">Enter the email address of the contact that should be displayed for this location. <em>not required</em>  </span>
    </p>
    <p class="meta-options bizlisting_field">
        <label for="bizlisting_contact">Contact Name</label>
        <input id="bizlisting_contact" type="text" name="bizlisting_contact" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'bizlisting_contact', true ) ); ?>">
		<span class="description">The primary phone number visitors to this location should use for inquiries. <em>not required</em>  </span>
    </p>
    <p class="meta-options bizlisting_field">
        <label for="bizlisting_contact_phone">Contact Phone Number</label>
        <input id="bizlisting_contact_phone" type="text" name="bizlisting_contact_phone" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'bizlisting_contact_phone', true ) ); ?>">
		<span class="description">Enter the name of the person who should be contacted for inquires around this location. <em>not required</em>  </span>
    </p>
    <p class="meta-options bizlisting_field">
        <label for="bizlisting_opened_date">Date Founded</label>
        <input id="bizlisting_opened_date" type="date" name="bizlisting_opened_date" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'bizlisting_opened_date', true ) ); ?>">
		<span class="description">What date was this location founded or opened? <em>not required</em>  </span>
    </p>
    <p class="meta-options bizlisting_field">
        <label for="bizlisting_opened_city">City Founded</label>
        <input id="bizlisting_opened_city" type="text" name="bizlisting_opened_city" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'bizlisting_opened_city', true ) ); ?>">
		<span class="description">Where was this business first founded (city name). <em>not required</em>  </span>
    </p>
    <p class="meta-options bizlisting_field">
        <label for="bizlisting_naics">NAICS Code</label>
        <input id="bizlisting_naics" type="text" name="bizlisting_naics" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'bizlisting_naics', true ) ); ?>">
		<span class="description">Find the NAICS code for the location <a href="https://www.naics.com/search/" target="_blank">here.</a> <em>not required</em>  </span>
    </p>       
    <p class="meta-options bizlisting_field">
        <label for="bizlisting_price">Price</label>
        <input id="bizlisting_price" type="number" name="bizlisting_price" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'bizlisting_price', true ) ); ?>">
		<span class="description">A value between one and five will be shown as dollar signs, indicating the relative priciness of the location. <em>not required</em>  </span>
    </p>
        <p class="meta-options bizlisting_field">
        <?php 
		$bizlisting_showgooglemap= "";
		$bizlisting_showgooglemap = esc_attr(get_post_meta( get_the_ID(),  'bizlisting_showgooglemap', true )); ?>
        <label for="bizlisting_showgooglemap">Show Google Map?  *<?php echo  $bizlisting_showgooglemap; ?>*</label>
        <select id="bizlisting_showgooglemap" name="bizlisting_showgooglemap">
                    <option value="name" <?php echo ( !empty( $bizlisting_showgooglemap ) && ($bizlisting_showgooglemap=='name' ) ? ' selected="selected"' : '' ) ?>>Show Map Based on Name of Business</option>
                   <option value="latlong" <?php echo ( !empty( $bizlisting_showgooglemap ) && ($bizlisting_showgooglemap=='latlong' ) ? ' selected="selected"' : '' ) ?>>Show Map Based on Latitude and Longitude</option>
                   <option value="no" <?php echo ( empty( $bizlisting_showgooglemap ) || ($bizlisting_showgooglemap=='no' ) ? ' selected="selected"' : '' ) ?>>Do Not Show Map </option>
         </select>
			<span class="description">Choose how the Google Maps should be shown if at all. <em>not required</em>  </span>
    </p>
        <p class="meta-options bizlisting_field">
        <label for="bizlisting_latitude">Latitude</label>
        <input id="bizlisting_latitude" type="text" name="bizlisting_latitude" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'bizlisting_latitude', true ) ); ?>">
			<span class="description">Enter the exact latitude value for the location. <em>not required</em>  </span>
    </p>
        <p class="meta-options bizlisting_field">
        <label for="bizlisting_longitude">Longitude</label>
        <input id="bizlisting_longitude" type="text" name="bizlisting_longitude" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'bizlisting_longitude', true ) ); ?>">
			<span class="description">Enter the exact latitude value for the location. <em>not required</em>  </span>
    </p>
    <p class="meta-options bizlisting_field"><?php 
		$current_selections= "";
		$current_selections = get_post_meta( get_the_ID(),  'bizlisting_lawtype' ); ?>
        
        <label for="bizlisting_lawtype">Law Practiced<br />only applied to Legal Category </label>
        <select name="bizlisting_lawtype[]" id="bizlisting_lawtype" multiple="multiple">
            <option value="Bankruptcy Law" <?php echo ( !empty( $current_selections ) && in_array( 'Bankruptcy Law', $current_selections ) ? ' selected="selected"' : '' ) ?>>Bankruptcy Law</option>
            <option value="Business Law" <?php echo ( !empty( $current_selections ) && in_array( 'Business Law', $current_selections ) ? ' selected="selected"' : '' ) ?>>Business Law</option>
            <option value="Contract Law" <?php echo ( !empty( $current_selections ) && in_array( 'Contract Law', $current_selections ) ? ' selected="selected"' : '' ) ?>>Contract Law</option>
            <option value="Criminal Defense" <?php echo ( !empty( $current_selections ) && in_array( 'Criminal Defense', $current_selections ) ? ' selected="selected"' : '' ) ?>>Criminal Defense</option>
            <option value="Civil Litigation" <?php echo ( !empty( $current_selections ) && in_array( 'Civil Litigation', $current_selections ) ? ' selected="selected"' : '' ) ?>>Civil Litigation</option>
            <option value="Divorce and Family Law" <?php echo ( !empty( $current_selections ) && in_array( 'Divorce and Family Law', $current_selections ) ? ' selected="selected"' : '' ) ?>>Divorce and Family Law</option>
            <option value="DUI Law" <?php echo ( !empty( $current_selections ) && in_array( 'DUI Law', $current_selections ) ? ' selected="selected"' : '' ) ?>>DUI Law</option>
            <option value="Employment Law" <?php echo ( !empty( $current_selections ) && in_array( 'Employment Law', $current_selections ) ? ' selected="selected"' : '' ) ?>>Employment Law</option>
            <option value="Estate Planning" <?php echo ( !empty( $current_selections ) && in_array( 'Estate Planning', $current_selections ) ? ' selected="selected"' : '' ) ?>>Estate Planning</option>
            <option value="Financial Law" <?php echo ( !empty( $current_selections ) && in_array( 'Financial Law', $current_selections ) ? ' selected="selected"' : '' ) ?>>Financial Law</option>
            <option value="General Legal Services" <?php echo ( !empty( $current_selections ) && in_array( 'General Legal Services', $current_selections ) ? ' selected="selected"' : '' ) ?>>General Legal Services</option>
            <option value="Immigration Law" <?php echo ( !empty( $current_selections ) && in_array( 'Immigration Law', $current_selections ) ? ' selected="selected"' : '' ) ?>>Immigration Law</option>
            <option value="IP and Internet Law" <?php echo ( !empty( $current_selections ) && in_array( 'IP and Internet Law', $current_selections ) ? ' selected="selected"' : '' ) ?>>IP and Internet Law</option>
            <option value="Medical Law" <?php echo ( !empty( $current_selections ) && in_array( 'Medical Law', $current_selections ) ? ' selected="selected"' : '' ) ?>>Medical Law</option>
            <option value="Mediation" <?php echo ( !empty( $current_selections ) && in_array( 'Mediation', $current_selections ) ? ' selected="selected"' : '' ) ?>>Mediation</option>
            <option value="Patent Law" <?php echo ( !empty( $current_selections ) && in_array( 'Patent Law', $current_selections ) ? ' selected="selected"' : '' ) ?>>Patent Law</option>
            <option value="Real Estate Law" <?php echo ( !empty( $current_selections ) && in_array( 'Real Estate Law', $current_selections ) ? ' selected="selected"' : '' ) ?>>Real Estate Law</option>
            <option value="Soclal Security Disability Law" <?php echo ( !empty( $current_selections ) && in_array( 'Soclal Security Disability Law', $current_selections ) ? ' selected="selected"' : '' ) ?>>Soclal Security Disability Law</option>
            <option value="Tax Law" <?php echo ( !empty( $current_selections ) && in_array( 'Tax Law', $current_selections ) ? ' selected="selected"' : '' ) ?>>Tax Law</option>
            <option value="Traffic Ticketing Law" <?php echo ( !empty( $current_selections ) && in_array( 'Traffic Ticketing Law', $current_selections ) ? ' selected="selected"' : '' ) ?>>Traffic Ticketing Law</option>
            <option value="Wills Trusts and Probates" <?php echo ( !empty( $current_selections ) && in_array( 'Wills Trusts and Probates', $current_selections ) ? ' selected="selected"' : '' ) ?>>Wills, Trusts and Probates</option>
            <option value="Workers Compensation Law" <?php echo ( !empty( $current_selections ) && in_array( 'Workers Compensation Law', $current_selections ) ? ' selected="selected"' : '' ) ?>>Workers Compensation Law</option>
            <option value="Zoning and Development Law" <?php echo ( !empty( $current_selections ) && in_array( 'Zoning and Development Law', $current_selections ) ? ' selected="selected"' : '' ) ?>>Zoning and Development Law</option>
      </select>
		<span class="description">This field only applies to businesses that are in the Legal category. <em>not required</em>  </span>
    </p> 
    <p class="meta-options bizlisting_field">        
            <?php 
		$bizlisting_religious= "";
		$bizlisting_religious = esc_attr(get_post_meta( get_the_ID(),  'bizlisting_religious', true )); ?>
        <label for="bizlisting_religious">Religious Organization<br />only applied to Religious Category *<?php echo  $bizlisting_religious; ?>*</label>
        <select name="bizlisting_religious" id="bizlisting_religious">
     
            <option value="Buddhist Temples" <?php echo ( !empty( $bizlisting_religious ) && ($bizlisting_religious == 'Buddhist Temples')  ? ' selected="selected"' : '' ) ?>>Buddhist Temples</option>
            <option value="Churches" <?php echo ( !empty( $bizlisting_religious ) && ($bizlisting_religious == 'Churches') ? ' selected="selected"' : '' ) ?>>Churches</option>
            <option value="Hindu Temples" <?php echo ( !empty( $bizlisting_religious ) && ($bizlisting_religious ==  'Hindu Temples')  ? ' selected="selected"' : '' ) ?>>Hindu Temples</option>
            <option value="Mosques" <?php echo ( !empty( $bizlisting_religious ) && ($bizlisting_religious ==  'Mosques')  ? ' selected="selected"' : '' ) ?>>Mosques</option>
            <option value="Sikh Temples" <?php echo ( !empty( $bizlisting_religious ) && ($bizlisting_religious ==  'Sikh Temples')  ? ' selected="selected"' : '' ) ?>>Sikh Temples</option>
            <option value="Synagogues" <?php echo ( !empty( $bizlisting_religious ) && ($bizlisting_religious ==  'Synagogues')  ? ' selected="selected"' : '' ) ?>>Synagogues</option>
            <option value="N/A" <?php echo ( empty( $bizlisting_religious ) || ($bizlisting_religious == 'N/A')  ? ' selected="selected"' : '' ) ?>>N/A</option>  
        </select>
		<span class="description">This value only applies to religious institutions. <em>not required</em>  </span>
    </p>    
    <p class="meta-options bizlisting_field"><?php 
		$current_selections="";		
		$current_selections = get_post_meta( get_the_ID(),  'bizlisting_cuisine' ); ?>
        
        <label for="bizlisting_cuisine">Cuisine Served<br />only applied to Restaurant Category</label>
        <select name="bizlisting_cuisine[]" id="bizlisting_cuisine" multiple="multiple">
            <option value="Afghan" <?php echo ( !empty( $current_selections ) && in_array( 'Afghan', $current_selections ) ? ' selected="selected"' : '' ) ?>>Afghan</option>
            <option value="African" <?php echo ( !empty( $current_selections ) && in_array( 'African', $current_selections ) ? ' selected="selected"' : '' ) ?>>African</option>
            <option value="American" <?php echo ( !empty( $current_selections ) && in_array( 'American', $current_selections ) ? ' selected="selected"' : '' ) ?>>American</option>
            <option value="Andalusian" <?php echo ( !empty( $current_selections ) && in_array( 'Andalusian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Andalusian</option>
            <option value="Arabian" <?php echo ( !empty( $current_selections ) && in_array( 'Arabian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Arabian</option>
            <option value="Argentine" <?php echo ( !empty( $current_selections ) && in_array( 'Argentine', $current_selections ) ? ' selected="selected"' : '' ) ?>>Argentine</option>
            <option value="Armenian" <?php echo ( !empty( $current_selections ) && in_array( 'Armenian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Armenian</option>
            <option value="Asian Fusion" <?php echo ( !empty( $current_selections ) && in_array( 'Asian Fusion', $current_selections ) ? ' selected="selected"' : '' ) ?>>Asian Fusion</option>
            <option value="Asturian" <?php echo ( !empty( $current_selections ) && in_array( 'Asturian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Asturian</option>
            <option value="Australian" <?php echo ( !empty( $current_selections ) && in_array( 'Australian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Australian</option>
            <option value="Austrian" <?php echo ( !empty( $current_selections ) && in_array( 'Austrian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Austrian</option>
            <option value="Baguettes" <?php echo ( !empty( $current_selections ) && in_array( 'Baguettes', $current_selections ) ? ' selected="selected"' : '' ) ?>>Baguettes</option>
            <option value="Bangladeshi" <?php echo ( !empty( $current_selections ) && in_array( 'Bangladeshi', $current_selections ) ? ' selected="selected"' : '' ) ?>>Bangladeshi</option>
            <option value="Barbeque" <?php echo ( !empty( $current_selections ) && in_array( 'Barbeque', $current_selections ) ? ' selected="selected"' : '' ) ?>>Barbeque</option>
            <option value="Basque" <?php echo ( !empty( $current_selections ) && in_array( 'Basque', $current_selections ) ? ' selected="selected"' : '' ) ?>>Basque</option>
            <option value="Bavarian" <?php echo ( !empty( $current_selections ) && in_array( 'Bavarian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Bavarian</option>
            <option value="Beer Garden" <?php echo ( !empty( $current_selections ) && in_array( 'Beer Garden', $current_selections ) ? ' selected="selected"' : '' ) ?>>Beer Garden</option>
            <option value="Beer Hall" <?php echo ( !empty( $current_selections ) && in_array( 'Beer Hall', $current_selections ) ? ' selected="selected"' : '' ) ?>>Beer Hall</option>
            <option value="Beisl" <?php echo ( !empty( $current_selections ) && in_array( 'Beisl', $current_selections ) ? ' selected="selected"' : '' ) ?>>Beisl</option>
            <option value="Belgian" <?php echo ( !empty( $current_selections ) && in_array( 'Belgian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Belgian</option>
            <option value="Bistros" <?php echo ( !empty( $current_selections ) && in_array( 'Bistros', $current_selections ) ? ' selected="selected"' : '' ) ?>>Bistros</option>
            <option value="Black Sea" <?php echo ( !empty( $current_selections ) && in_array( 'Black Sea', $current_selections ) ? ' selected="selected"' : '' ) ?>>Black Sea</option>
            <option value="Brasseries" <?php echo ( !empty( $current_selections ) && in_array( 'Brasseries', $current_selections ) ? ' selected="selected"' : '' ) ?>>Brasseries</option>
            <option value="Brazilian" <?php echo ( !empty( $current_selections ) && in_array( 'Brazilian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Brazilian</option>
            <option value="Breakfast & Brunch" <?php echo ( !empty( $current_selections ) && in_array( 'Breakfast & Brunch', $current_selections ) ? ' selected="selected"' : '' ) ?>>Breakfast & Brunch</option>
            <option value="British" <?php echo ( !empty( $current_selections ) && in_array( 'British', $current_selections ) ? ' selected="selected"' : '' ) ?>>British</option>
            <option value="Buffets" <?php echo ( !empty( $current_selections ) && in_array( 'Buffets', $current_selections ) ? ' selected="selected"' : '' ) ?>>Buffets</option>
            <option value="Bulgarian" <?php echo ( !empty( $current_selections ) && in_array( 'Bulgarian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Bulgarian</option>
            <option value="Burgers" <?php echo ( !empty( $current_selections ) && in_array( 'Burgers', $current_selections ) ? ' selected="selected"' : '' ) ?>>Burgers</option>
            <option value="Burmese" <?php echo ( !empty( $current_selections ) && in_array( 'Burmese', $current_selections ) ? ' selected="selected"' : '' ) ?>>Burmese</option>
            <option value="Cafes" <?php echo ( !empty( $current_selections ) && in_array( 'Cafes', $current_selections ) ? ' selected="selected"' : '' ) ?>>Cafes</option>
            <option value="Cafeteria" <?php echo ( !empty( $current_selections ) && in_array( 'Cafeteria', $current_selections ) ? ' selected="selected"' : '' ) ?>>Cafeteria</option>
            <option value="Cajun/Creole" <?php echo ( !empty( $current_selections ) && in_array( 'Cajun/Creole', $current_selections ) ? ' selected="selected"' : '' ) ?>>Cajun/Creole</option>
            <option value="Cambodian" <?php echo ( !empty( $current_selections ) && in_array( 'Cambodian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Cambodian</option>
            <option value="Canadian" <?php echo ( !empty( $current_selections ) && in_array( 'Canadian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Canadian</option>
            <option value="Canteen" <?php echo ( !empty( $current_selections ) && in_array( 'Canteen', $current_selections ) ? ' selected="selected"' : '' ) ?>>Canteen</option>
            <option value="Caribbean" <?php echo ( !empty( $current_selections ) && in_array( 'Caribbean', $current_selections ) ? ' selected="selected"' : '' ) ?>>Caribbean</option>
            <option value="Catalan" <?php echo ( !empty( $current_selections ) && in_array( 'Catalan', $current_selections ) ? ' selected="selected"' : '' ) ?>>Catalan</option>
            <option value="Cheesesteaks" <?php echo ( !empty( $current_selections ) && in_array( 'Cheesesteaks', $current_selections ) ? ' selected="selected"' : '' ) ?>>Cheesesteaks</option>
            <option value="Chicken Shop" <?php echo ( !empty( $current_selections ) && in_array( 'Chicken Shop', $current_selections ) ? ' selected="selected"' : '' ) ?>>Chicken Shop</option>
            <option value="Chicken Wings" <?php echo ( !empty( $current_selections ) && in_array( 'Chicken Wings', $current_selections ) ? ' selected="selected"' : '' ) ?>>Chicken Wings</option>
            <option value="Chilean" <?php echo ( !empty( $current_selections ) && in_array( 'Chilean', $current_selections ) ? ' selected="selected"' : '' ) ?>>Chilean</option>
            <option value="Chinese" <?php echo ( !empty( $current_selections ) && in_array( 'Chinese', $current_selections ) ? ' selected="selected"' : '' ) ?>>Chinese</option>
            <option value="Comfort Food" <?php echo ( !empty( $current_selections ) && in_array( 'Comfort Food', $current_selections ) ? ' selected="selected"' : '' ) ?>>Comfort Food</option>
            <option value="Corsican" <?php echo ( !empty( $current_selections ) && in_array( 'Corsican', $current_selections ) ? ' selected="selected"' : '' ) ?>>Corsican</option>
            <option value="Creperies" <?php echo ( !empty( $current_selections ) && in_array( 'Creperies', $current_selections ) ? ' selected="selected"' : '' ) ?>>Creperies</option>
            <option value="Cuban" <?php echo ( !empty( $current_selections ) && in_array( 'Cuban', $current_selections ) ? ' selected="selected"' : '' ) ?>>Cuban</option>
            <option value="Curry Sausage" <?php echo ( !empty( $current_selections ) && in_array( 'Curry Sausage', $current_selections ) ? ' selected="selected"' : '' ) ?>>Curry Sausage</option>
            <option value="Cypriot" <?php echo ( !empty( $current_selections ) && in_array( 'Cypriot', $current_selections ) ? ' selected="selected"' : '' ) ?>>Cypriot</option>
            <option value="Czech/Slovakian" <?php echo ( !empty( $current_selections ) && in_array( 'Czech/Slovakian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Czech/Slovakian</option>
            <option value="Danish" <?php echo ( !empty( $current_selections ) && in_array( 'Danish', $current_selections ) ? ' selected="selected"' : '' ) ?>>Danish</option>
            <option value="Delis" <?php echo ( !empty( $current_selections ) && in_array( 'Delis', $current_selections ) ? ' selected="selected"' : '' ) ?>>Delis</option>
            <option value="Diners" <?php echo ( !empty( $current_selections ) && in_array( 'Diners', $current_selections ) ? ' selected="selected"' : '' ) ?>>Diners</option>
            <option value="Dinner Theater" <?php echo ( !empty( $current_selections ) && in_array( 'Dinner Theater', $current_selections ) ? ' selected="selected"' : '' ) ?>>Dinner Theater</option>
            <option value="Dumplings" <?php echo ( !empty( $current_selections ) && in_array( 'Dumplings', $current_selections ) ? ' selected="selected"' : '' ) ?>>Dumplings</option>
            <option value="Eastern European" <?php echo ( !empty( $current_selections ) && in_array( 'Eastern European', $current_selections ) ? ' selected="selected"' : '' ) ?>>Eastern European</option>
            <option value="Ethiopian" <?php echo ( !empty( $current_selections ) && in_array( 'Ethiopian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Ethiopian</option>
            <option value="Fast Food" <?php echo ( !empty( $current_selections ) && in_array( 'Fast Food', $current_selections ) ? ' selected="selected"' : '' ) ?>>Fast Food</option>
            <option value="Filipino" <?php echo ( !empty( $current_selections ) && in_array( 'Filipino', $current_selections ) ? ' selected="selected"' : '' ) ?>>Filipino</option>
            <option value="Fischbroetchen" <?php echo ( !empty( $current_selections ) && in_array( 'Fischbroetchen', $current_selections ) ? ' selected="selected"' : '' ) ?>>Fischbroetchen</option>
            <option value="Fish & Chips" <?php echo ( !empty( $current_selections ) && in_array( 'Fish & Chips', $current_selections ) ? ' selected="selected"' : '' ) ?>>Fish & Chips</option>
            <option value="Flatbread" <?php echo ( !empty( $current_selections ) && in_array( 'Flatbread', $current_selections ) ? ' selected="selected"' : '' ) ?>>Flatbread</option>
            <option value="Fondue" <?php echo ( !empty( $current_selections ) && in_array( 'Fondue', $current_selections ) ? ' selected="selected"' : '' ) ?>>Fondue</option>
            <option value="Food Court" <?php echo ( !empty( $current_selections ) && in_array( 'Food Court', $current_selections ) ? ' selected="selected"' : '' ) ?>>Food Court</option>
            <option value="Food Stands" <?php echo ( !empty( $current_selections ) && in_array( 'Food Stands', $current_selections ) ? ' selected="selected"' : '' ) ?>>Food Stands</option>
            <option value="Freiduria" <?php echo ( !empty( $current_selections ) && in_array( 'Freiduria', $current_selections ) ? ' selected="selected"' : '' ) ?>>Freiduria</option>
            <option value="French" <?php echo ( !empty( $current_selections ) && in_array( 'French', $current_selections ) ? ' selected="selected"' : '' ) ?>>French</option>
            <option value="French Southwest" <?php echo ( !empty( $current_selections ) && in_array( 'French Southwest', $current_selections ) ? ' selected="selected"' : '' ) ?>>French Southwest</option>
            <option value="Galician" <?php echo ( !empty( $current_selections ) && in_array( 'Galician', $current_selections ) ? ' selected="selected"' : '' ) ?>>Galician</option>
            <option value="Game Meat" <?php echo ( !empty( $current_selections ) && in_array( 'Game Meat', $current_selections ) ? ' selected="selected"' : '' ) ?>>Game Meat</option>
            <option value="Gastropubs" <?php echo ( !empty( $current_selections ) && in_array( 'Gastropubs', $current_selections ) ? ' selected="selected"' : '' ) ?>>Gastropubs</option>
            <option value="Georgian" <?php echo ( !empty( $current_selections ) && in_array( 'Georgian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Georgian</option>
            <option value="German" <?php echo ( !empty( $current_selections ) && in_array( 'German', $current_selections ) ? ' selected="selected"' : '' ) ?>>German</option>
            <option value="Giblets" <?php echo ( !empty( $current_selections ) && in_array( 'Giblets', $current_selections ) ? ' selected="selected"' : '' ) ?>>Giblets</option>
            <option value="Gluten-Free" <?php echo ( !empty( $current_selections ) && in_array( 'Gluten-Free', $current_selections ) ? ' selected="selected"' : '' ) ?>>Gluten-Free</option>
            <option value="Greek" <?php echo ( !empty( $current_selections ) && in_array( 'Greek', $current_selections ) ? ' selected="selected"' : '' ) ?>>Greek</option>
            <option value="Guamanian" <?php echo ( !empty( $current_selections ) && in_array( 'Guamanian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Guamanian</option>
            <option value="Halal" <?php echo ( !empty( $current_selections ) && in_array( 'Halal', $current_selections ) ? ' selected="selected"' : '' ) ?>>Halal</option>
            <option value="Hawaiian" <?php echo ( !empty( $current_selections ) && in_array( 'Hawaiian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Hawaiian</option>
            <option value="Heuriger" <?php echo ( !empty( $current_selections ) && in_array( 'Heuriger', $current_selections ) ? ' selected="selected"' : '' ) ?>>Heuriger</option>
            <option value="Himalayan/Nepalese" <?php echo ( !empty( $current_selections ) && in_array( 'Himalayan/Nepalese', $current_selections ) ? ' selected="selected"' : '' ) ?>>Himalayan/Nepalese</option>
            <option value="Honduran" <?php echo ( !empty( $current_selections ) && in_array( 'Honduran', $current_selections ) ? ' selected="selected"' : '' ) ?>>Honduran</option>
            <option value="Hot Dogs" <?php echo ( !empty( $current_selections ) && in_array( 'Hot Dogs', $current_selections ) ? ' selected="selected"' : '' ) ?>>Hot Dogs</option>
            <option value="Hot Pot" <?php echo ( !empty( $current_selections ) && in_array( 'Hot Pot', $current_selections ) ? ' selected="selected"' : '' ) ?>>Hot Pot</option>
            <option value="Hungarian" <?php echo ( !empty( $current_selections ) && in_array( 'Hungarian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Hungarian</option>
            <option value="Iberian" <?php echo ( !empty( $current_selections ) && in_array( 'Iberian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Iberian</option>
            <option value="Indian" <?php echo ( !empty( $current_selections ) && in_array( 'Indian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Indian</option>
            <option value="Indonesian" <?php echo ( !empty( $current_selections ) && in_array( 'Indonesian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Indonesian</option>
            <option value="International" <?php echo ( !empty( $current_selections ) && in_array( 'International', $current_selections ) ? ' selected="selected"' : '' ) ?>>International</option>
            <option value="Irish" <?php echo ( !empty( $current_selections ) && in_array( 'Irish', $current_selections ) ? ' selected="selected"' : '' ) ?>>Irish</option>
            <option value="Island Pub" <?php echo ( !empty( $current_selections ) && in_array( 'Island Pub', $current_selections ) ? ' selected="selected"' : '' ) ?>>Island Pub</option>
            <option value="Israeli" <?php echo ( !empty( $current_selections ) && in_array( 'Israeli', $current_selections ) ? ' selected="selected"' : '' ) ?>>Israeli</option>
            <option value="Italian" <?php echo ( !empty( $current_selections ) && in_array( 'Italian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Italian</option>
            <option value="Japanese" <?php echo ( !empty( $current_selections ) && in_array( 'Japanese', $current_selections ) ? ' selected="selected"' : '' ) ?>>Japanese</option>
            <option value="Jewish" <?php echo ( !empty( $current_selections ) && in_array( 'Jewish', $current_selections ) ? ' selected="selected"' : '' ) ?>>Jewish</option>
            <option value="Kebab" <?php echo ( !empty( $current_selections ) && in_array( 'Kebab', $current_selections ) ? ' selected="selected"' : '' ) ?>>Kebab</option>
            <option value="Kopitiam" <?php echo ( !empty( $current_selections ) && in_array( 'Kopitiam', $current_selections ) ? ' selected="selected"' : '' ) ?>>Kopitiam</option>
            <option value="Korean" <?php echo ( !empty( $current_selections ) && in_array( 'Korean', $current_selections ) ? ' selected="selected"' : '' ) ?>>Korean</option>
            <option value="Kosher" <?php echo ( !empty( $current_selections ) && in_array( 'Kosher', $current_selections ) ? ' selected="selected"' : '' ) ?>>Kosher</option>
            <option value="Kurdish" <?php echo ( !empty( $current_selections ) && in_array( 'Kurdish', $current_selections ) ? ' selected="selected"' : '' ) ?>>Kurdish</option>
            <option value="Laos" <?php echo ( !empty( $current_selections ) && in_array( 'Laos', $current_selections ) ? ' selected="selected"' : '' ) ?>>Laos</option>
            <option value="Laotian" <?php echo ( !empty( $current_selections ) && in_array( 'Laotian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Laotian</option>
            <option value="Latin American" <?php echo ( !empty( $current_selections ) && in_array( 'Latin American', $current_selections ) ? ' selected="selected"' : '' ) ?>>Latin American</option>
            <option value="Live/Raw Food" <?php echo ( !empty( $current_selections ) && in_array( 'Live/Raw Food', $current_selections ) ? ' selected="selected"' : '' ) ?>>Live/Raw Food</option>
            <option value="Lyonnais" <?php echo ( !empty( $current_selections ) && in_array( 'Lyonnais', $current_selections ) ? ' selected="selected"' : '' ) ?>>Lyonnais</option>
            <option value="Malaysian" <?php echo ( !empty( $current_selections ) && in_array( 'Malaysian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Malaysian</option>
            <option value="Meatballs" <?php echo ( !empty( $current_selections ) && in_array( 'Meatballs', $current_selections ) ? ' selected="selected"' : '' ) ?>>Meatballs</option>
            <option value="Mediterranean" <?php echo ( !empty( $current_selections ) && in_array( 'Mediterranean', $current_selections ) ? ' selected="selected"' : '' ) ?>>Mediterranean</option>
            <option value="Mexican" <?php echo ( !empty( $current_selections ) && in_array( 'Mexican', $current_selections ) ? ' selected="selected"' : '' ) ?>>Mexican</option>
            <option value="Middle Eastern" <?php echo ( !empty( $current_selections ) && in_array( 'Middle Eastern', $current_selections ) ? ' selected="selected"' : '' ) ?>>Middle Eastern</option>
            <option value="Mongolian" <?php echo ( !empty( $current_selections ) && in_array( 'Mongolian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Mongolian</option>
            <option value="Moroccan" <?php echo ( !empty( $current_selections ) && in_array( 'Moroccan', $current_selections ) ? ' selected="selected"' : '' ) ?>>Moroccan</option>
            <option value="New Mexican Cuisine" <?php echo ( !empty( $current_selections ) && in_array( 'New Mexican Cuisine', $current_selections ) ? ' selected="selected"' : '' ) ?>>New Mexican Cuisine</option>
            <option value="New Zealand" <?php echo ( !empty( $current_selections ) && in_array( 'New Zealand', $current_selections ) ? ' selected="selected"' : '' ) ?>>New Zealand</option>
            <option value="Nicaraguan" <?php echo ( !empty( $current_selections ) && in_array( 'Nicaraguan', $current_selections ) ? ' selected="selected"' : '' ) ?>>Nicaraguan</option>
            <option value="Night Food" <?php echo ( !empty( $current_selections ) && in_array( 'Night Food', $current_selections ) ? ' selected="selected"' : '' ) ?>>Night Food</option>
            <option value="Nikkei" <?php echo ( !empty( $current_selections ) && in_array( 'Nikkei', $current_selections ) ? ' selected="selected"' : '' ) ?>>Nikkei</option>
            <option value="Noodles" <?php echo ( !empty( $current_selections ) && in_array( 'Noodles', $current_selections ) ? ' selected="selected"' : '' ) ?>>Noodles</option>
            <option value="Norcinerie" <?php echo ( !empty( $current_selections ) && in_array( 'Norcinerie', $current_selections ) ? ' selected="selected"' : '' ) ?>>Norcinerie</option>
            <option value="Open Sandwiches" <?php echo ( !empty( $current_selections ) && in_array( 'Open Sandwiches', $current_selections ) ? ' selected="selected"' : '' ) ?>>Open Sandwiches</option>
            <option value="Oriental" <?php echo ( !empty( $current_selections ) && in_array( 'Oriental', $current_selections ) ? ' selected="selected"' : '' ) ?>>Oriental</option>
            <option value="Pakistani" <?php echo ( !empty( $current_selections ) && in_array( 'Pakistani', $current_selections ) ? ' selected="selected"' : '' ) ?>>Pakistani</option>
            <option value="Pan Asian" <?php echo ( !empty( $current_selections ) && in_array( 'Pan Asian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Pan Asian</option>
            <option value="Parent Cafes" <?php echo ( !empty( $current_selections ) && in_array( 'Parent Cafes', $current_selections ) ? ' selected="selected"' : '' ) ?>>Parent Cafes</option>
            <option value="Persian/Iranian" <?php echo ( !empty( $current_selections ) && in_array( 'Persian/Iranian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Persian/Iranian</option>
            <option value="Peruvian" <?php echo ( !empty( $current_selections ) && in_array( 'Peruvian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Peruvian</option>
            <option value="Pita" <?php echo ( !empty( $current_selections ) && in_array( 'Pita', $current_selections ) ? ' selected="selected"' : '' ) ?>>Pita</option>
            <option value="Pizza" <?php echo ( !empty( $current_selections ) && in_array( 'Pizza', $current_selections ) ? ' selected="selected"' : '' ) ?>>Pizza</option>
            <option value="Polish" <?php echo ( !empty( $current_selections ) && in_array( 'Polish', $current_selections ) ? ' selected="selected"' : '' ) ?>>Polish</option>
            <option value="Polynesian" <?php echo ( !empty( $current_selections ) && in_array( 'Polynesian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Polynesian</option>
            <option value="Portuguese" <?php echo ( !empty( $current_selections ) && in_array( 'Portuguese', $current_selections ) ? ' selected="selected"' : '' ) ?>>Portuguese</option>
            <option value="Potatoes" <?php echo ( !empty( $current_selections ) && in_array( 'Potatoes', $current_selections ) ? ' selected="selected"' : '' ) ?>>Potatoes</option>
            <option value="Poutineries" <?php echo ( !empty( $current_selections ) && in_array( 'Poutineries', $current_selections ) ? ' selected="selected"' : '' ) ?>>Poutineries</option>
            <option value="Pub Food" <?php echo ( !empty( $current_selections ) && in_array( 'Pub Food', $current_selections ) ? ' selected="selected"' : '' ) ?>>Pub Food</option>
            <option value="Rice" <?php echo ( !empty( $current_selections ) && in_array( 'Rice', $current_selections ) ? ' selected="selected"' : '' ) ?>>Rice</option>
            <option value="Romanian" <?php echo ( !empty( $current_selections ) && in_array( 'Romanian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Romanian</option>
            <option value="Rotisserie Chicken" <?php echo ( !empty( $current_selections ) && in_array( 'Rotisserie Chicken', $current_selections ) ? ' selected="selected"' : '' ) ?>>Rotisserie Chicken</option>
            <option value="Russian" <?php echo ( !empty( $current_selections ) && in_array( 'Russian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Russian</option>
            <option value="Salad" <?php echo ( !empty( $current_selections ) && in_array( 'Salad', $current_selections ) ? ' selected="selected"' : '' ) ?>>Salad</option>
            <option value="Sandwiches" <?php echo ( !empty( $current_selections ) && in_array( 'Sandwiches', $current_selections ) ? ' selected="selected"' : '' ) ?>>Sandwiches</option>
            <option value="Scandinavian" <?php echo ( !empty( $current_selections ) && in_array( 'Scandinavian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Scandinavian</option>
            <option value="Schnitzel" <?php echo ( !empty( $current_selections ) && in_array( 'Schnitzel', $current_selections ) ? ' selected="selected"' : '' ) ?>>Schnitzel</option>
            <option value="Scottish" <?php echo ( !empty( $current_selections ) && in_array( 'Scottish', $current_selections ) ? ' selected="selected"' : '' ) ?>>Scottish</option>
            <option value="Seafood" <?php echo ( !empty( $current_selections ) && in_array( 'Seafood', $current_selections ) ? ' selected="selected"' : '' ) ?>>Seafood</option>
            <option value="Serbo Croatian" <?php echo ( !empty( $current_selections ) && in_array( 'Serbo Croatian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Serbo Croatian</option>
            <option value="Signature Cuisine" <?php echo ( !empty( $current_selections ) && in_array( 'Signature Cuisine', $current_selections ) ? ' selected="selected"' : '' ) ?>>Signature Cuisine</option>
            <option value="Singaporean" <?php echo ( !empty( $current_selections ) && in_array( 'Singaporean', $current_selections ) ? ' selected="selected"' : '' ) ?>>Singaporean</option>
            <option value="Slovakian" <?php echo ( !empty( $current_selections ) && in_array( 'Slovakian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Slovakian</option>
            <option value="Soul Food" <?php echo ( !empty( $current_selections ) && in_array( 'Soul Food', $current_selections ) ? ' selected="selected"' : '' ) ?>>Soul Food</option>
            <option value="Soup" <?php echo ( !empty( $current_selections ) && in_array( 'Soup', $current_selections ) ? ' selected="selected"' : '' ) ?>>Soup</option>
            <option value="Southern" <?php echo ( !empty( $current_selections ) && in_array( 'Southern', $current_selections ) ? ' selected="selected"' : '' ) ?>>Southern</option>
            <option value="Spanish" <?php echo ( !empty( $current_selections ) && in_array( 'Spanish', $current_selections ) ? ' selected="selected"' : '' ) ?>>Spanish</option>
            <option value="Sri Lankan" <?php echo ( !empty( $current_selections ) && in_array( 'Sri Lankan', $current_selections ) ? ' selected="selected"' : '' ) ?>>Sri Lankan</option>
            <option value="Steakhouses" <?php echo ( !empty( $current_selections ) && in_array( 'Steakhouses', $current_selections ) ? ' selected="selected"' : '' ) ?>>Steakhouses</option>
            <option value="Supper Clubs" <?php echo ( !empty( $current_selections ) && in_array( 'Supper Clubs', $current_selections ) ? ' selected="selected"' : '' ) ?>>Supper Clubs</option>
            <option value="Sushi Bars" <?php echo ( !empty( $current_selections ) && in_array( 'Sushi Bars', $current_selections ) ? ' selected="selected"' : '' ) ?>>Sushi Bars</option>
            <option value="Swabian" <?php echo ( !empty( $current_selections ) && in_array( 'Swabian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Swabian</option>
            <option value="Swedish" <?php echo ( !empty( $current_selections ) && in_array( 'Swedish', $current_selections ) ? ' selected="selected"' : '' ) ?>>Swedish</option>
            <option value="Swiss Food" <?php echo ( !empty( $current_selections ) && in_array( 'Swiss Food', $current_selections ) ? ' selected="selected"' : '' ) ?>>Swiss Food</option>
            <option value="Syrian" <?php echo ( !empty( $current_selections ) && in_array( 'Syrian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Syrian</option>
            <option value="Tabernas" <?php echo ( !empty( $current_selections ) && in_array( 'Tabernas', $current_selections ) ? ' selected="selected"' : '' ) ?>>Tabernas</option>
            <option value="Taiwanese" <?php echo ( !empty( $current_selections ) && in_array( 'Taiwanese', $current_selections ) ? ' selected="selected"' : '' ) ?>>Taiwanese</option>
            <option value="Tapas Bars" <?php echo ( !empty( $current_selections ) && in_array( 'Tapas Bars', $current_selections ) ? ' selected="selected"' : '' ) ?>>Tapas Bars</option>
            <option value="Tex-Mex" <?php echo ( !empty( $current_selections ) && in_array( 'Tex-Mex', $current_selections ) ? ' selected="selected"' : '' ) ?>>Tex-Mex</option>
            <option value="Thai" <?php echo ( !empty( $current_selections ) && in_array( 'Thai', $current_selections ) ? ' selected="selected"' : '' ) ?>>Thai</option>
            <option value="Trattorie" <?php echo ( !empty( $current_selections ) && in_array( 'Trattorie', $current_selections ) ? ' selected="selected"' : '' ) ?>>Trattorie</option>
            <option value="Turkish" <?php echo ( !empty( $current_selections ) && in_array( 'Turkish', $current_selections ) ? ' selected="selected"' : '' ) ?>>Turkish</option>
            <option value="Ukrainian" <?php echo ( !empty( $current_selections ) && in_array( 'Ukrainian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Ukrainian</option>
            <option value="Uzbek" <?php echo ( !empty( $current_selections ) && in_array( 'Uzbek', $current_selections ) ? ' selected="selected"' : '' ) ?>>Uzbek</option>
            <option value="Vegan" <?php echo ( !empty( $current_selections ) && in_array( 'Vegan', $current_selections ) ? ' selected="selected"' : '' ) ?>>Vegan</option>
            <option value="Vegetarian" <?php echo ( !empty( $current_selections ) && in_array( 'Vegetarian', $current_selections ) ? ' selected="selected"' : '' ) ?>>Vegetarian</option>
            <option value="Vietnamese" <?php echo ( !empty( $current_selections ) && in_array( 'Vietnamese', $current_selections ) ? ' selected="selected"' : '' ) ?>>Vietnamese</option>
            <option value="Waffles" <?php echo ( !empty( $current_selections ) && in_array( 'Waffles', $current_selections ) ? ' selected="selected"' : '' ) ?>>Waffles</option>
            <option value="Wok" <?php echo ( !empty( $current_selections ) && in_array( 'Wok', $current_selections ) ? ' selected="selected"' : '' ) ?>>Wok</option>
            <option value="Wraps" <?php echo ( !empty( $current_selections ) && in_array( 'Wraps', $current_selections ) ? ' selected="selected"' : '' ) ?>>Wraps</option>
            <option value="Yugoslav" <?php echo ( !empty( $current_selections ) && in_array( 'Yugoslav', $current_selections ) ? ' selected="selected"' : '' ) ?>>Yugoslav</option>
      </select>
		<span class="description">This value only applies to restaurants. <em>not required</em>  </span>
    </p>
</div>