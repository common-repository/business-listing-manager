<?php

/**
 * @package bizlistingplugin
 */
/*
Plugin Name: Business Listing Plugin
Plugin URI: https://www.massiveimpressions.com/business-listing-plugin-for-wordpress/
Description: Newly added Emnergency Hours and Instructions in response to the Covid-19 coronavirus pandemic. List local businesses using a custom post type. Creates categories of local businesses and displays category specific options in the single post view of a business listing. Incluides configfuration option for publisher's Google Maps key. 
Version: 2.1.3
Author: Jason Pelish | Massive Impressions
Author URI: https://www.massiveimpressions.com
License: GPLv2 or later
Text Domain: bizlistingplugin
Tested up to: 5.4.2
Requires at least: 4.9
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2018-2020 Massive Impressions Online Marketing
*/


require_once plugin_dir_path(__FILE__) . 'includes/bizlisting-functions.php';
require_once plugin_dir_path(__FILE__) . 'includes/bizlisting-admin-page.php';
require_once plugin_dir_path(__FILE__) . 'includes/bizlisting-shortcode.php';