<?php
	/*
	 * ADMIN AREA 
	 * ========================================================== */

	/* Kill the WordPress update nag */
	if (!current_user_can('edit_users')) {
		add_action('init', create_function('$a', "remove_action('init', 'wp_version_check');"), 2);
		add_filter('pre_option_update_core', create_function('$a', "return null;"));
	}
	
	// admin link for all settings
	function devart_all_settings_link() {
		add_options_page(__('All Settings'), __('All Settings'), 'administrator', 'options.php');
	}
	add_action('admin_menu', 'devart_all_settings_link');

	/*
	 * ADMIN BAR 
	 * ========================================================== */
	
 	/* Enable the WordPress Admin Bar for admins only */
	if ( !current_user_can( 'manage_options' ) ) {
		//remove_action( 'init', '_gbhive1_admin_bar_init' );
	}

 	/* Display the WordPress Admin Bar in the Admin Area only */
	if ( is_admin() ) {
		remove_action( 'init', '_gbhive1_admin_bar_init' );
	}

	/* Change Admin Bar Icon */
	function devart_change_admin_logo() {
		echo '
		<style type="text/css">
		#wp-admin-bar-wp-logo > .ab-item .ab-icon { 
			background-image: url(' . get_bloginfo('stylesheet_directory') . '/images/site/admin_logo.png) !important;
			background-position: 0 0;
			}
		#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
			background-position: 0 0;
			}	
		</style>
		';
	}
	add_action('admin_head', 'devart_change_admin_logo');

	/* Remove WP Admin Bar Items */
	function devart_remove_admin_bar_items() {
		
		global $wp_admin_bar;
		
		$wp_admin_bar->remove_menu('wp-logo');
		$wp_admin_bar->remove_menu('about');
		$wp_admin_bar->remove_menu('wporg');
		$wp_admin_bar->remove_menu('documentation');
		$wp_admin_bar->remove_menu('support-forums');
		$wp_admin_bar->remove_menu('feedback');
		//$wp_admin_bar->remove_menu('view-site');
		//$wp_admin_bar->remove_menu('updates');
		//$wp_admin_bar->remove_menu('my-account');
		//$wp_admin_bar->remove_menu('site-name');
		//$wp_admin_bar->remove_menu('my-sites');
		//$wp_admin_bar->remove_menu('get-shortlink');
		//$wp_admin_bar->remove_menu('edit');
		$wp_admin_bar->remove_menu('new-content');
		$wp_admin_bar->remove_menu('comments');
		//$wp_admin_bar->remove_menu('search');
		//$wp_admin_bar->remove_menu('my-account-with-avatar');
		//$wp_admin_bar->remove_menu('edit-profile');
		//$wp_admin_bar->remove_menu('logout');
		
	}
	add_action( 'wp_before_admin_bar_render', 'devart_remove_admin_bar_items' );

	/* Hide WP Dashboard Help Nav */
	function devart_hide_help() {
		echo '<style type="text/css">
				#contextual-help-link-wrap { display: none !important; }
			  </style>';
	}
	add_action('admin_head', 'devart_hide_help');

	/* Append New Item to Admin Bar */
	function devart_append_admin_bar_item() {
		
		global $wp_admin_bar;
		
		$wp_admin_bar->add_menu(array(
			'id' => 'wp-admin-bar-new-item',
			'title' => __('<site_title>'),
			'href' => '<site_uri>',
			'meta'  => array( target => '_blank' )
		));
		
	}
	add_action('wp_before_admin_bar_render', 'devart_append_admin_bar_item');
	
	/*
	 * ADMIN MENU 
	 * ========================================================== */

	/* Remove WP Admin Menu Items */
	function devart_remove_admin_menu_items() {
		 //remove_menu_page('index.php'); // Dashboard
		 //remove_menu_page('edit.php'); // Posts
		 //remove_menu_page('upload.php'); // Media
		 //remove_menu_page('link-manager.php'); // Links
		 //remove_menu_page('edit.php?post_type=page'); // Pages
		 //remove_menu_page('edit-comments.php'); // Comments
		 //remove_menu_page('themes.php'); // Appearance
		 //remove_menu_page('plugins.php'); // Plugins
		 //remove_menu_page('users.php'); // Users
		 //remove_menu_page('tools.php'); // Tools
		 //remove_menu_page('options-general.php'); // Settings
	}
	add_action( 'admin_menu', 'devart_remove_admin_menu_items' );

	/* Remove Appearence > Editor Menu */
	function devart_remove_editor_menu() {
	  remove_action('admin_menu', '_add_themes_utility_last', 101);
	}
	add_action('_admin_menu', 'devart_remove_editor_menu', 1);

	/* Hide Plugin Update Indicator  */
	function devart_hide_plugin_update_indicator(){
		//global $menu,$submenu;
		//$menu[65][0] = 'Plugins';
		//$submenu['index.php'][10][0] = 'Updates';
	}
	add_action('admin_menu', 'devart_hide_plugin_update_indicator');

	/*
	 * DASHBOARD FOOTER 
	 * ========================================================== */

	/* Change footer-left Text */
	function devart_change_footer_left() {
	  echo 'Developed by <a href="<developer_site_uri>" target="_blank"><developer_name></a> 2013';
	}
	add_filter('admin_footer_text', 'devart_change_footer_left');

	/* Change footer-right Text */
	function devart_change_footer_right() {
	  //return 'Powered by <a href="http://www.wordpress.org/" target="_blank">WordPress ' . get_bloginfo( 'version' ) . '</a>';
	  return 'Powered by <a href="http://www.wordpress.org/" target="_blank">WordPress</a>';
	}
	add_filter( 'update_footer', 'devart_change_footer_right', 9999 );

	/*
	 * DASHBOARD HOME
	 * ========================================================== */

	/* Disable browser upgrade notification/warning */
	function devart_disable_browser_upgrade_warning() {
	   // remove_meta_box( 'dashboard_browser_nag', 'dashboard', 'normal' );
	}
	add_action( 'wp_dashboard_setup', 'devart_disable_browser_upgrade_warning');

	/* Hide Update Nag in Dashboard Home */
	function devart_hide_update_nag() {
		//remove_action( 'admin_notices', 'update_nag', 3 );
	}
	add_action('admin_menu','devart_hide_update_nag');

	/* Remove Dashboadr Widgets */
	function devart_remove_dashboard_widgets() {
		//remove_meta_box('dashboard_right_now', 'dashboard', 'normal');   // right now
		remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); // recent comments
		remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');  // incoming links
		remove_meta_box('dashboard_plugins', 'dashboard', 'normal');   // plugins
		
		remove_meta_box('dashboard_quick_press', 'dashboard', 'normal');  // quick press
		remove_meta_box('dashboard_recent_drafts', 'dashboard', 'normal');  // recent drafts
		remove_meta_box('dashboard_primary', 'dashboard', 'normal');   // wordpress blog
		remove_meta_box('dashboard_secondary', 'dashboard', 'normal');   // other wordpress news
	}
	add_action('admin_init', 'devart_remove_dashboard_widgets');

	/* Append Developer Note Widget to Dashboard Home */
	function devart_append_developer_widget() {
		// Entering the text between the quotes
		echo "
		<ul>
			<li>Release Date: September 2012</li>
		</ul>";
	}
	function devart_append_dashboard_widgets() {
		wp_add_dashboard_widget('wp_dashboard_widget', 'SHIFT Note', 'devart_append_developer_widget');
	}
	//add_action('wp_dashboard_setup', 'devart_append_dashboard_widgets' );


	/*
	 * WORDPRESS DEFAULT SETTINGS
	 * ========================================================== */

	/* Change WordPress default FROM email address */
	function devart_set_new_mail_from($old) {
	 return '<admin_email>';
	}
	function devart_set_new_mail_from_name($old) {
	 return '<admin_name>';
	}
	add_filter('wp_mail_from', 'devart_set_new_mail_from');
	add_filter('wp_mail_from_name', 'devart_set_new_mail_from_name');

	/*
	 * WORDPRESS LOGIN PAGE
	 * ========================================================== */

	/* WordPress admin and login page logo */
	function devart_login_logo() {
		echo '<style type="text/css">
			h1 a { background-image:url('. get_bloginfo('template_url') . '/images/site/login_logo.png) !important;}
		</style>';
	}
	add_action('login_head', 'devart_login_logo');

	/* Use your own external URL logo link */
	function devart_url_login(){
		return ""; // your URL here
	}
	add_filter('login_headerurl', 'devart_url_login');
	
/* End of file: */