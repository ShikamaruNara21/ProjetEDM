<?php
//about theme info
add_action( 'admin_menu', 'vw_driving_school_gettingstarted' );
function vw_driving_school_gettingstarted() {    	
	add_theme_page( esc_html__('About VW Driving School', 'vw-driving-school'), esc_html__('About VW Driving School', 'vw-driving-school'), 'edit_theme_options', 'vw_driving_school_guide', 'vw_driving_school_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function vw_driving_school_admin_theme_style() {
   wp_enqueue_style('vw-driving-school-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
   wp_enqueue_script('vw-driving-school-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
   wp_enqueue_style( 'font-awesome-css', esc_url(get_template_directory_uri()).'/assets/css/fontawesome-all.css' );
}
add_action('admin_enqueue_scripts', 'vw_driving_school_admin_theme_style');

//guidline for about theme
function vw_driving_school_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'vw-driving-school' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to VW Driving School Theme', 'vw-driving-school' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-driving-school'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy VW Driving School at 20% Discount','vw-driving-school'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','vw-driving-school'); ?> ( <span><?php esc_html_e('vwpro20','vw-driving-school'); ?></span> ) </h4> 
			<div class="info-link">
				<a href="<?php echo esc_url( VW_DRIVING_SCHOOL_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vw-driving-school' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
			<button class="tablinks" onclick="vw_driving_school_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'vw-driving-school' ); ?></button>
			<button class="tablinks" onclick="vw_driving_school_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'vw-driving-school' ); ?></button>	
			<button class="tablinks" onclick="vw_driving_school_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'vw-driving-school' ); ?></button>	
		  	<button class="tablinks" onclick="vw_driving_school_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'vw-driving-school' ); ?></button>
		  	<button class="tablinks" onclick="vw_driving_school_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'vw-driving-school' ); ?></button>
		</div>

		<!-- Tab content -->
		<?php
			$vw_driving_school_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$vw_driving_school_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Driving_School_Plugin_Activation_Settings::get_instance();
				$vw_driving_school_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-driving-school-recommended-plugins">
				    <div class="vw-driving-school-action-list">
				        <?php if ($vw_driving_school_actions): foreach ($vw_driving_school_actions as $key => $vw_driving_school_actionValue): ?>
				                <div class="vw-driving-school-action" id="<?php echo esc_attr($vw_driving_school_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_driving_school_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_driving_school_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_driving_school_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','vw-driving-school'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($vw_driving_school_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'vw-driving-school' ); ?></h3>
				<hr class="h3hr">
			  	<p><?php esc_html_e('VW Driving School is a dynamic, stunning, feature-full and intuitive WordPress theme for driving schools, driving instructors, parking teacher, car training academy, vehicle license agency, traffic rules classes and other such institutes and classes. It can be used as a blog for driving tips and road safety instructions. The theme can be customized to suit any coaching and training institute. It has responsive layout and multi-browser compatibility. This driving theme can be translated into various other languages with the support for RTL writing. Its code is clean and bug-free so you do not have to worry about any malware threat. It has very well used call to action (CTA) buttons to make customers do what you want them to. You can have your custom layout and choose any colour scheme. It is optimized for SEO to get higher rank in Google search. Use social media icons to market your website. As the theme is built on Bootstrap framework, it caters easy usage with customization available at finger-tips. ','vw-driving-school'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-driving-school' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-driving-school' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_DRIVING_SCHOOL_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-driving-school' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'vw-driving-school'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-driving-school'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-driving-school'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-driving-school'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-driving-school'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_DRIVING_SCHOOL_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-driving-school'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'vw-driving-school'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-driving-school'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_DRIVING_SCHOOL_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-driving-school'); ?></a>
					</div>
			  		<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-driving-school' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-driving-school'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_driving_school_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','vw-driving-school'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-welcome-write-blog"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_driving_school_topbar') ); ?>" target="_blank"><?php esc_html_e('Topbar Section','vw-driving-school'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-editor-table"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_driving_school_about_section') ); ?>" target="_blank"><?php esc_html_e('About Us','vw-driving-school'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widgets','vw-driving-school'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-driving-school'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_driving_school_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-driving-school'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_driving_school_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-driving-school'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_driving_school_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-driving-school'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_driving_school_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-driving-school'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-driving-school'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-driving-school'); ?></p>
	                <ul>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vw-driving-school'); ?></span><?php esc_html_e(' Go to ','vw-driving-school'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vw-driving-school'); ?></b></p>

	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vw-driving-school'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-driving-school'); ?></span><?php esc_html_e(' Go to ','vw-driving-school'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','vw-driving-school'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vw-driving-school'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with this, then follow the','vw-driving-school'); ?> <a class="doc-links" href="https://www.vwthemesdemo.com/docs/free-vw-driving-school/" target="_blank"><?php esc_html_e('Documentation','vw-driving-school'); ?></a></p>
	                </ul>
			  	</div>
			</div>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Driving_School_Plugin_Activation_Settings::get_instance();
			$vw_driving_school_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-driving-school-recommended-plugins">
				    <div class="vw-driving-school-action-list">
				        <?php if ($vw_driving_school_actions): foreach ($vw_driving_school_actions as $key => $vw_driving_school_actionValue): ?>
				                <div class="vw-driving-school-action" id="<?php echo esc_attr($vw_driving_school_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_driving_school_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_driving_school_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_driving_school_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','vw-driving-school'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($vw_driving_school_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'vw-driving-school' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','vw-driving-school'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon >> Click Pattern Tab >> Click on homepage sections >> Publish.','vw-driving-school'); ?></span></b></p>
	              	<div class="vw-driving-school-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','vw-driving-school'); ?></a>
				    </div>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />	
	            </div>		

	            <div class="block-pattern-link-customizer">
	              	<div class="link-customizer-with-block-pattern">
							<h3><?php esc_html_e( 'Link to customizer', 'vw-driving-school' ); ?></h3>
							<hr class="h3hr">
							<div class="first-row">
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-driving-school'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_driving_school_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','vw-driving-school'); ?></a>
									</div>
								</div>
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-driving-school'); ?></a>
									</div>
									
									<div class="row-box2">
										<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_driving_school_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-driving-school'); ?></a>
									</div>
								</div>

								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_driving_school_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-driving-school'); ?></a>
									</div>
									 <div class="row-box2">
										<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_driving_school_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-driving-school'); ?></a>
									</div> 
								</div>
								
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_driving_school_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-driving-school'); ?></a>
									</div>
									 <div class="row-box2">
										<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-driving-school'); ?></a>
									</div> 
								</div>
							</div>
					</div>	
				</div>		
	        </div>
		</div>

		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Driving_School_Plugin_Activation_Settings::get_instance();
			$vw_driving_school_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-driving-school-recommended-plugins">
				    <div class="vw-driving-school-action-list">
				        <?php if ($vw_driving_school_actions): foreach ($vw_driving_school_actions as $key => $vw_driving_school_actionValue): ?>
				                <div class="vw-driving-school-action" id="<?php echo esc_attr($vw_driving_school_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($vw_driving_school_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_driving_school_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_driving_school_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'vw-driving-school' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-driving-school-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','vw-driving-school'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
	              	<div class="link-customizer-with-block-pattern">
							<h3><?php esc_html_e( 'Link to customizer', 'vw-driving-school' ); ?></h3>
							<hr class="h3hr">
							<div class="first-row">
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-driving-school'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_driving_school_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','vw-driving-school'); ?></a>
									</div>
								</div>
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-driving-school'); ?></a>
									</div>
									
									<div class="row-box2">
										<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_driving_school_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-driving-school'); ?></a>
									</div>
								</div>

								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_driving_school_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-driving-school'); ?></a>
									</div>
									 <div class="row-box2">
										<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_driving_school_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-driving-school'); ?></a>
									</div> 
								</div>
								
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_driving_school_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-driving-school'); ?></a>
									</div>
									 <div class="row-box2">
										<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-driving-school'); ?></a>
									</div> 
								</div>
							</div>
					</div>	
				</div>
			<?php } ?>
		</div>

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-driving-school' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('This driving school WordPress theme is a blessing for those who want a clean, modern, sophisticated and feature-rich theme at an affordable price. It is custom made for driving schools, driving class instructors, parking teachers, vehicle driving license agencies and other training institutes. It allows you to choose your own layout from the boxed, full-width and full screen layout options; decide the position of navigation menu and style of header and footer from the countless options provided. Given the user-friendly interface of backend, setting up the website is quite a simple task with this driving school WordPress theme. The theme package includes thoroughly explained documentation so can install, configure and do small changes to your website on your own. Although it is feature-rich and can work with various third party plugins but it loads fast so users will have a great experience for sure.','vw-driving-school'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VW_DRIVING_SCHOOL_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-driving-school'); ?></a>
					<a href="<?php echo esc_url( VW_DRIVING_SCHOOL_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vw-driving-school'); ?></a>
					<a href="<?php echo esc_url( VW_DRIVING_SCHOOL_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-driving-school'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-driving-school' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vw-driving-school'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-driving-school'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-driving-school'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-driving-school'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-driving-school'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-driving-school'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vw-driving-school'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vw-driving-school'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'vw-driving-school'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vw-driving-school'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-driving-school'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-driving-school'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vw-driving-school'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-driving-school'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-driving-school'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-driving-school'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vw-driving-school'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vw-driving-school'); ?></td>
								<td class="table-img"><?php esc_html_e('13', 'vw-driving-school'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'vw-driving-school'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-driving-school'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-driving-school'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-driving-school'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'vw-driving-school'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'vw-driving-school'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'vw-driving-school'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'vw-driving-school'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'vw-driving-school'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'vw-driving-school'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'vw-driving-school'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'vw-driving-school'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'vw-driving-school'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-driving-school'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vw-driving-school'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-driving-school'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-driving-school'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-driving-school'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'vw-driving-school'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'vw-driving-school'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'vw-driving-school'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-driving-school'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-driving-school'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'vw-driving-school'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-driving-school'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'vw-driving-school'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'vw-driving-school'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'vw-driving-school'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'vw-driving-school'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'vw-driving-school'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'vw-driving-school'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_DRIVING_SCHOOL_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-driving-school'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vw-driving-school'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vw-driving-school'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_DRIVING_SCHOOL_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vw-driving-school'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vw-driving-school'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vw-driving-school'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_DRIVING_SCHOOL_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vw-driving-school'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'vw-driving-school'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'vw-driving-school'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_DRIVING_SCHOOL_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'vw-driving-school'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vw-driving-school'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vw-driving-school'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_DRIVING_SCHOOL_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vw-driving-school'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'vw-driving-school'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vw-driving-school'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_DRIVING_SCHOOL_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vw-driving-school'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php } ?>