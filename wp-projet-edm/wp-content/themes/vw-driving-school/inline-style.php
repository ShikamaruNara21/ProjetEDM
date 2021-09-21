<?php
	
	/*---------------------------First highlight color-------------------*/

	$vw_driving_school_first_color = get_theme_mod('vw_driving_school_first_color');

	$vw_driving_school_custom_css = '';

	if($vw_driving_school_first_color != false){
		$vw_driving_school_custom_css .='.btn, .search-box input[type="submit"], #sidebar input[type="submit"], input[type="submit"], #footer input[type="submit"], .search-box label:before, .more-btn .btn span, .error-btn .btn span, .more-btn .btn span:after, .error-btn .btn span:after, .more-btn .btn:after, .error-btn .btn:after, #slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, #contact-us, #footer .tagcloud a:hover, #footer-2, .scrollup i, #sidebar .tagcloud a:hover, .pagination span, .pagination a, nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #comments a.comment-reply-link, .toggle-nav i, #sidebar .widget_price_filter .ui-slider .ui-slider-range, #sidebar .widget_price_filter .ui-slider .ui-slider-handle, #sidebar .woocommerce-product-search button, #footer .widget_price_filter .ui-slider .ui-slider-range, #footer .widget_price_filter .ui-slider .ui-slider-handle, #footer .woocommerce-product-search button, #footer a.custom_read_more, #sidebar a.custom_read_more, #footer .custom-social-icons i:hover, #sidebar .custom-social-icons i:hover, .woocommerce nav.woocommerce-pagination ul li a, .nav-previous a, .nav-next a, .wp-block-button .wp-block-button__link:hover, #preloader{';
			$vw_driving_school_custom_css .='background-color: '.esc_attr($vw_driving_school_first_color).';';
		$vw_driving_school_custom_css .='}';
	}
	if($vw_driving_school_first_color != false){
		$vw_driving_school_custom_css .='#comments input[type="submit"].submit{';
			$vw_driving_school_custom_css .='background-color: '.esc_attr($vw_driving_school_first_color).'!important;';
		$vw_driving_school_custom_css .='}';
	}
	if($vw_driving_school_first_color != false){
		$vw_driving_school_custom_css .='a, #topbar i,  #footer li a:hover, .post-main-box:hover h2 a, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .woocommerce-info::before, .woocommerce-message::before, .main-navigation a:hover, .main-navigation ul.sub-menu a:hover, .entry-content a, #sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a, #footer .custom-social-icons i, #sidebar .custom-social-icons i, #sidebar li a:hover, .post-main-box:hover .post-info a, .single-post .post-info:hover a, .logo .site-title a:hover{';
			$vw_driving_school_custom_css .='color: '.esc_attr($vw_driving_school_first_color).';';
		$vw_driving_school_custom_css .='}';
	}
	if($vw_driving_school_first_color != false){
		$vw_driving_school_custom_css .='.btn, form.search-form, span.prev-next, .more-btn .btn, .error-btn .btn, #footer .custom-social-icons i, #sidebar .custom-social-icons i, #footer .custom-social-icons i:hover, #sidebar .custom-social-icons i:hover, .wp-block-button__link{';
			$vw_driving_school_custom_css .='border-color: '.esc_attr($vw_driving_school_first_color).';';
		$vw_driving_school_custom_css .='}';
	}
	if($vw_driving_school_first_color != false){
		$vw_driving_school_custom_css .='#slider .carousel-control-prev-icon:before, #slider .carousel-control-next-icon:after{';
			$vw_driving_school_custom_css .='border-left-color: '.esc_attr($vw_driving_school_first_color).';';
		$vw_driving_school_custom_css .='}';
	}
	if($vw_driving_school_first_color != false){
		$vw_driving_school_custom_css .='.post-info hr, .woocommerce-info, .woocommerce-message, .main-navigation ul ul{';
			$vw_driving_school_custom_css .='border-top-color: '.esc_attr($vw_driving_school_first_color).';';
		$vw_driving_school_custom_css .='}';
	}
	if($vw_driving_school_first_color != false){
		$vw_driving_school_custom_css .='.main-navigation ul ul{';
			$vw_driving_school_custom_css .='border-bottom-color: '.esc_attr($vw_driving_school_first_color).';';
		$vw_driving_school_custom_css .='}';
	}

	/*---------------------------Second highlight color-------------------*/

	$vw_driving_school_second_color = get_theme_mod('vw_driving_school_second_color');

	if($vw_driving_school_second_color != false){
		$vw_driving_school_custom_css .='.btn:after, .conatct-info i, .custom-social-icons i:hover, #footer a.custom_read_more:hover, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .pagination a:hover, .pagination .current, .nav-previous a:hover, .nav-next a:hover{';
			$vw_driving_school_custom_css .='background-color: '.esc_attr($vw_driving_school_second_color).';';
		$vw_driving_school_custom_css .='}';
	}
	if($vw_driving_school_second_color != false){
		$vw_driving_school_custom_css .='.post-main-box .btn, .error-btn .btn, #about .more-btn .btn, .post-main-box h2 a, #sidebar h3, h1, h2, h3, h4, h5, h6, .conatct-info span a:hover{';
			$vw_driving_school_custom_css .='color: '.esc_attr($vw_driving_school_second_color).';';
		$vw_driving_school_custom_css .='}';
	}
	if($vw_driving_school_second_color != false){
		$vw_driving_school_custom_css .='.wp-block-button .wp-block-button__link:hover, .wp-block-button__link{';
			$vw_driving_school_custom_css .='color: '.esc_attr($vw_driving_school_second_color).'!important;';
		$vw_driving_school_custom_css .='}';
	}
	if($vw_driving_school_second_color != false){
		$vw_driving_school_custom_css .='.custom-social-icons i:hover{';
			$vw_driving_school_custom_css .='border-color: '.esc_attr($vw_driving_school_second_color).';';
		$vw_driving_school_custom_css .='}';
	}
	if($vw_driving_school_second_color != false){
		$vw_driving_school_custom_css .='.conatct-info i:after{';
			$vw_driving_school_custom_css .='border-left-color: '.esc_attr($vw_driving_school_second_color).';';
		$vw_driving_school_custom_css .='}';
	}
	if($vw_driving_school_second_color != false){
		$vw_driving_school_custom_css .='nav.woocommerce-MyAccount-navigation ul li{
		box-shadow: 2px 2px 0 0 '.esc_attr($vw_driving_school_second_color).';
		}';
	}

	/*---------------------------Width Layout -------------------*/

	$vw_driving_school_theme_lay = get_theme_mod( 'vw_driving_school_width_option','Full Width');
    if($vw_driving_school_theme_lay == 'Boxed'){
		$vw_driving_school_custom_css .='body{';
			$vw_driving_school_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_driving_school_custom_css .='}';
		$vw_driving_school_custom_css .='.scrollup i{';
			$vw_driving_school_custom_css .='right: 100px;';
		$vw_driving_school_custom_css .='}';
		$vw_driving_school_custom_css .='.scrollup.left i{';
			$vw_driving_school_custom_css .='left: 100px;';
		$vw_driving_school_custom_css .='}';
	}else if($vw_driving_school_theme_lay == 'Wide Width'){
		$vw_driving_school_custom_css .='body{';
			$vw_driving_school_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_driving_school_custom_css .='}';
		$vw_driving_school_custom_css .='.scrollup i{';
			$vw_driving_school_custom_css .='right: 30px;';
		$vw_driving_school_custom_css .='}';
		$vw_driving_school_custom_css .='.scrollup.left i{';
			$vw_driving_school_custom_css .='left: 30px;';
		$vw_driving_school_custom_css .='}';
	}else if($vw_driving_school_theme_lay == 'Full Width'){
		$vw_driving_school_custom_css .='body{';
			$vw_driving_school_custom_css .='max-width: 100%;';
		$vw_driving_school_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$vw_driving_school_theme_lay = get_theme_mod( 'vw_driving_school_slider_opacity_color','0.5');
	if($vw_driving_school_theme_lay == '0'){
		$vw_driving_school_custom_css .='#slider img{';
			$vw_driving_school_custom_css .='opacity:0';
		$vw_driving_school_custom_css .='}';
		}else if($vw_driving_school_theme_lay == '0.1'){
		$vw_driving_school_custom_css .='#slider img{';
			$vw_driving_school_custom_css .='opacity:0.1';
		$vw_driving_school_custom_css .='}';
		}else if($vw_driving_school_theme_lay == '0.2'){
		$vw_driving_school_custom_css .='#slider img{';
			$vw_driving_school_custom_css .='opacity:0.2';
		$vw_driving_school_custom_css .='}';
		}else if($vw_driving_school_theme_lay == '0.3'){
		$vw_driving_school_custom_css .='#slider img{';
			$vw_driving_school_custom_css .='opacity:0.3';
		$vw_driving_school_custom_css .='}';
		}else if($vw_driving_school_theme_lay == '0.4'){
		$vw_driving_school_custom_css .='#slider img{';
			$vw_driving_school_custom_css .='opacity:0.4';
		$vw_driving_school_custom_css .='}';
		}else if($vw_driving_school_theme_lay == '0.5'){
		$vw_driving_school_custom_css .='#slider img{';
			$vw_driving_school_custom_css .='opacity:0.5';
		$vw_driving_school_custom_css .='}';
		}else if($vw_driving_school_theme_lay == '0.6'){
		$vw_driving_school_custom_css .='#slider img{';
			$vw_driving_school_custom_css .='opacity:0.6';
		$vw_driving_school_custom_css .='}';
		}else if($vw_driving_school_theme_lay == '0.7'){
		$vw_driving_school_custom_css .='#slider img{';
			$vw_driving_school_custom_css .='opacity:0.7';
		$vw_driving_school_custom_css .='}';
		}else if($vw_driving_school_theme_lay == '0.8'){
		$vw_driving_school_custom_css .='#slider img{';
			$vw_driving_school_custom_css .='opacity:0.8';
		$vw_driving_school_custom_css .='}';
		}else if($vw_driving_school_theme_lay == '0.9'){
		$vw_driving_school_custom_css .='#slider img{';
			$vw_driving_school_custom_css .='opacity:0.9';
		$vw_driving_school_custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$vw_driving_school_theme_lay = get_theme_mod( 'vw_driving_school_slider_content_option','Left');
    if($vw_driving_school_theme_lay == 'Left'){
		$vw_driving_school_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_driving_school_custom_css .='text-align:left; left:15%; right:45%;';
		$vw_driving_school_custom_css .='}';
	}else if($vw_driving_school_theme_lay == 'Center'){
		$vw_driving_school_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_driving_school_custom_css .='text-align:center; left:20%; right:20%;';
		$vw_driving_school_custom_css .='}';
	}else if($vw_driving_school_theme_lay == 'Right'){
		$vw_driving_school_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_driving_school_custom_css .='text-align:right; left:45%; right:15%;';
		$vw_driving_school_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$vw_driving_school_slider_height = get_theme_mod('vw_driving_school_slider_height');
	if($vw_driving_school_slider_height != false){
		$vw_driving_school_custom_css .='#slider img{';
			$vw_driving_school_custom_css .='height: '.esc_attr($vw_driving_school_slider_height).';';
		$vw_driving_school_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_driving_school_theme_lay = get_theme_mod( 'vw_driving_school_blog_layout_option','Default');
    if($vw_driving_school_theme_lay == 'Default'){
		$vw_driving_school_custom_css .='.post-main-box{';
			$vw_driving_school_custom_css .='';
		$vw_driving_school_custom_css .='}';
	}else if($vw_driving_school_theme_lay == 'Center'){
		$vw_driving_school_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, #our-services p{';
			$vw_driving_school_custom_css .='text-align:center;';
		$vw_driving_school_custom_css .='}';
		$vw_driving_school_custom_css .='.post-info{';
			$vw_driving_school_custom_css .='margin-top:10px;';
		$vw_driving_school_custom_css .='}';
		$vw_driving_school_custom_css .='.post-info hr{';
			$vw_driving_school_custom_css .='margin:10px auto;';
		$vw_driving_school_custom_css .='}';
	}else if($vw_driving_school_theme_lay == 'Left'){
		$vw_driving_school_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, #our-services p{';
			$vw_driving_school_custom_css .='text-align:Left;';
		$vw_driving_school_custom_css .='}';
	}

	/*------------------------------Responsive Media -----------------------*/

	$vw_driving_school_resp_topbar = get_theme_mod( 'vw_driving_school_resp_topbar_hide_show',false);
	if($vw_driving_school_resp_topbar == true && get_theme_mod( 'vw_driving_school_topbar_hide_show', false) == false){
    	$vw_driving_school_custom_css .='#topbar{';
			$vw_driving_school_custom_css .='display:none;';
		$vw_driving_school_custom_css .='} ';
	}
    if($vw_driving_school_resp_topbar == true){
    	$vw_driving_school_custom_css .='@media screen and (max-width:575px) {';
		$vw_driving_school_custom_css .='#topbar{';
			$vw_driving_school_custom_css .='display:block;';
		$vw_driving_school_custom_css .='} }';
	}else if($vw_driving_school_resp_topbar == false){
		$vw_driving_school_custom_css .='@media screen and (max-width:575px) {';
		$vw_driving_school_custom_css .='#topbar{';
			$vw_driving_school_custom_css .='display:none;';
		$vw_driving_school_custom_css .='} }';
	}

	$vw_driving_school_resp_stickyheader = get_theme_mod( 'vw_driving_school_stickyheader_hide_show',false);
	if($vw_driving_school_resp_stickyheader == true && get_theme_mod( 'vw_driving_school_sticky_header',false) != true){
    	$vw_driving_school_custom_css .='.header-fixed{';
			$vw_driving_school_custom_css .='position:static;';
		$vw_driving_school_custom_css .='} ';
	}
    if($vw_driving_school_resp_stickyheader == true){
    	$vw_driving_school_custom_css .='@media screen and (max-width:575px) {';
		$vw_driving_school_custom_css .='.header-fixed{';
			$vw_driving_school_custom_css .='position:fixed;';
		$vw_driving_school_custom_css .='} }';
	}else if($vw_driving_school_resp_stickyheader == false){
		$vw_driving_school_custom_css .='@media screen and (max-width:575px){';
		$vw_driving_school_custom_css .='.header-fixed{';
			$vw_driving_school_custom_css .='position:static;';
		$vw_driving_school_custom_css .='} }';
	}

	$vw_driving_school_resp_slider = get_theme_mod( 'vw_driving_school_resp_slider_hide_show',false);
	if($vw_driving_school_resp_slider == true && get_theme_mod( 'vw_driving_school_slider_hide_show', false) == false){
    	$vw_driving_school_custom_css .='#slider{';
			$vw_driving_school_custom_css .='display:none;';
		$vw_driving_school_custom_css .='} ';
	}
    if($vw_driving_school_resp_slider == true){
    	$vw_driving_school_custom_css .='@media screen and (max-width:575px) {';
		$vw_driving_school_custom_css .='#slider{';
			$vw_driving_school_custom_css .='display:block;';
		$vw_driving_school_custom_css .='} }';
	}else if($vw_driving_school_resp_slider == false){
		$vw_driving_school_custom_css .='@media screen and (max-width:575px) {';
		$vw_driving_school_custom_css .='#slider{';
			$vw_driving_school_custom_css .='display:none;';
		$vw_driving_school_custom_css .='} }';
	}

	$sidebar = get_theme_mod( 'vw_driving_school_sidebar_hide_show',true);
    if($sidebar == true){
    	$vw_driving_school_custom_css .='@media screen and (max-width:575px) {';
		$vw_driving_school_custom_css .='#sidebar{';
			$vw_driving_school_custom_css .='display:block;';
		$vw_driving_school_custom_css .='} }';
	}else if($sidebar == false){
		$vw_driving_school_custom_css .='@media screen and (max-width:575px) {';
		$vw_driving_school_custom_css .='#sidebar{';
			$vw_driving_school_custom_css .='display:none;';
		$vw_driving_school_custom_css .='} }';
	}

	$vw_driving_school_resp_scroll_top = get_theme_mod( 'vw_driving_school_resp_scroll_top_hide_show',true);
	if($vw_driving_school_resp_scroll_top == true && get_theme_mod( 'vw_driving_school_hide_show_scroll',true) != true){
    	$vw_driving_school_custom_css .='.scrollup i{';
			$vw_driving_school_custom_css .='visibility:hidden !important;';
		$vw_driving_school_custom_css .='} ';
	}
    if($vw_driving_school_resp_scroll_top == true){
    	$vw_driving_school_custom_css .='@media screen and (max-width:575px) {';
		$vw_driving_school_custom_css .='.scrollup i{';
			$vw_driving_school_custom_css .='visibility:visible !important;';
		$vw_driving_school_custom_css .='} }';
	}else if($vw_driving_school_resp_scroll_top == false){
		$vw_driving_school_custom_css .='@media screen and (max-width:575px){';
		$vw_driving_school_custom_css .='.scrollup i{';
			$vw_driving_school_custom_css .='visibility:hidden !important;';
		$vw_driving_school_custom_css .='} }';
	}

	/*------------- Top Bar Settings ------------------*/

	$vw_driving_school_topbar_padding_top_bottom = get_theme_mod('vw_driving_school_topbar_padding_top_bottom');
	if($vw_driving_school_topbar_padding_top_bottom != false){
		$vw_driving_school_custom_css .='#topbar{';
			$vw_driving_school_custom_css .='padding-top: '.esc_attr($vw_driving_school_topbar_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_driving_school_topbar_padding_top_bottom).';';
		$vw_driving_school_custom_css .='}';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$vw_driving_school_sticky_header_padding = get_theme_mod('vw_driving_school_sticky_header_padding');
	if($vw_driving_school_sticky_header_padding != false){
		$vw_driving_school_custom_css .='.header-fixed{';
			$vw_driving_school_custom_css .='padding: '.esc_attr($vw_driving_school_sticky_header_padding).';';
		$vw_driving_school_custom_css .='}';
	}

	/*------------- Single Blog Page------------------*/

	$vw_driving_school_single_blog_post_navigation_show_hide = get_theme_mod('vw_driving_school_single_blog_post_navigation_show_hide',true);
	if($vw_driving_school_single_blog_post_navigation_show_hide != true){
		$vw_driving_school_custom_css .='.post-navigation{';
			$vw_driving_school_custom_css .='display: none;';
		$vw_driving_school_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_driving_school_copyright_alingment = get_theme_mod('vw_driving_school_copyright_alingment');
	if($vw_driving_school_copyright_alingment != false){
		$vw_driving_school_custom_css .='.copyright p{';
			$vw_driving_school_custom_css .='text-align: '.esc_attr($vw_driving_school_copyright_alingment).';';
		$vw_driving_school_custom_css .='}';
	}

	$vw_driving_school_copyright_padding_top_bottom = get_theme_mod('vw_driving_school_copyright_padding_top_bottom');
	if($vw_driving_school_copyright_padding_top_bottom != false){
		$vw_driving_school_custom_css .='#footer-2{';
			$vw_driving_school_custom_css .='padding-top: '.esc_attr($vw_driving_school_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_driving_school_copyright_padding_top_bottom).';';
		$vw_driving_school_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$vw_driving_school_scroll_to_top_font_size = get_theme_mod('vw_driving_school_scroll_to_top_font_size');
	if($vw_driving_school_scroll_to_top_font_size != false){
		$vw_driving_school_custom_css .='.scrollup i{';
			$vw_driving_school_custom_css .='font-size: '.esc_attr($vw_driving_school_scroll_to_top_font_size).';';
		$vw_driving_school_custom_css .='}';
	}

	$vw_driving_school_scroll_to_top_padding = get_theme_mod('vw_driving_school_scroll_to_top_padding');
	$vw_driving_school_scroll_to_top_padding = get_theme_mod('vw_driving_school_scroll_to_top_padding');
	if($vw_driving_school_scroll_to_top_padding != false){
		$vw_driving_school_custom_css .='.scrollup i{';
			$vw_driving_school_custom_css .='padding-top: '.esc_attr($vw_driving_school_scroll_to_top_padding).';padding-bottom: '.esc_attr($vw_driving_school_scroll_to_top_padding).';';
		$vw_driving_school_custom_css .='}';
	}

	$vw_driving_school_scroll_to_top_width = get_theme_mod('vw_driving_school_scroll_to_top_width');
	if($vw_driving_school_scroll_to_top_width != false){
		$vw_driving_school_custom_css .='.scrollup i{';
			$vw_driving_school_custom_css .='width: '.esc_attr($vw_driving_school_scroll_to_top_width).';';
		$vw_driving_school_custom_css .='}';
	}

	$vw_driving_school_scroll_to_top_height = get_theme_mod('vw_driving_school_scroll_to_top_height');
	if($vw_driving_school_scroll_to_top_height != false){
		$vw_driving_school_custom_css .='.scrollup i{';
			$vw_driving_school_custom_css .='height: '.esc_attr($vw_driving_school_scroll_to_top_height).';';
		$vw_driving_school_custom_css .='}';
	}

	$vw_driving_school_scroll_to_top_border_radius = get_theme_mod('vw_driving_school_scroll_to_top_border_radius');
	if($vw_driving_school_scroll_to_top_border_radius != false){
		$vw_driving_school_custom_css .='.scrollup i{';
			$vw_driving_school_custom_css .='border-radius: '.esc_attr($vw_driving_school_scroll_to_top_border_radius).'px;';
		$vw_driving_school_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$vw_driving_school_social_icon_font_size = get_theme_mod('vw_driving_school_social_icon_font_size');
	if($vw_driving_school_social_icon_font_size != false){
		$vw_driving_school_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_driving_school_custom_css .='font-size: '.esc_attr($vw_driving_school_social_icon_font_size).';';
		$vw_driving_school_custom_css .='}';
	}

	$vw_driving_school_social_icon_padding = get_theme_mod('vw_driving_school_social_icon_padding');
	if($vw_driving_school_social_icon_padding != false){
		$vw_driving_school_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_driving_school_custom_css .='padding: '.esc_attr($vw_driving_school_social_icon_padding).';';
		$vw_driving_school_custom_css .='}';
	}

	$vw_driving_school_social_icon_width = get_theme_mod('vw_driving_school_social_icon_width');
	if($vw_driving_school_social_icon_width != false){
		$vw_driving_school_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_driving_school_custom_css .='width: '.esc_attr($vw_driving_school_social_icon_width).';';
		$vw_driving_school_custom_css .='}';
	}

	$vw_driving_school_social_icon_height = get_theme_mod('vw_driving_school_social_icon_height');
	if($vw_driving_school_social_icon_height != false){
		$vw_driving_school_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_driving_school_custom_css .='height: '.esc_attr($vw_driving_school_social_icon_height).';';
		$vw_driving_school_custom_css .='}';
	}

	$vw_driving_school_social_icon_border_radius = get_theme_mod('vw_driving_school_social_icon_border_radius');
	if($vw_driving_school_social_icon_border_radius != false){
		$vw_driving_school_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_driving_school_custom_css .='border-radius: '.esc_attr($vw_driving_school_social_icon_border_radius).'px;';
		$vw_driving_school_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$vw_driving_school_products_padding_top_bottom = get_theme_mod('vw_driving_school_products_padding_top_bottom');
	if($vw_driving_school_products_padding_top_bottom != false){
		$vw_driving_school_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_driving_school_custom_css .='padding-top: '.esc_attr($vw_driving_school_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($vw_driving_school_products_padding_top_bottom).'!important;';
		$vw_driving_school_custom_css .='}';
	}

	$vw_driving_school_products_padding_left_right = get_theme_mod('vw_driving_school_products_padding_left_right');
	if($vw_driving_school_products_padding_left_right != false){
		$vw_driving_school_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_driving_school_custom_css .='padding-left: '.esc_attr($vw_driving_school_products_padding_left_right).'!important; padding-right: '.esc_attr($vw_driving_school_products_padding_left_right).'!important;';
		$vw_driving_school_custom_css .='}';
	}

	$vw_driving_school_products_box_shadow = get_theme_mod('vw_driving_school_products_box_shadow');
	if($vw_driving_school_products_box_shadow != false){
		$vw_driving_school_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$vw_driving_school_custom_css .='box-shadow: '.esc_attr($vw_driving_school_products_box_shadow).'px '.esc_attr($vw_driving_school_products_box_shadow).'px '.esc_attr($vw_driving_school_products_box_shadow).'px #ddd;';
		$vw_driving_school_custom_css .='}';
	}

	$vw_driving_school_products_border_radius = get_theme_mod('vw_driving_school_products_border_radius');
	if($vw_driving_school_products_border_radius != false){
		$vw_driving_school_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_driving_school_custom_css .='border-radius: '.esc_attr($vw_driving_school_products_border_radius).'px;';
		$vw_driving_school_custom_css .='}';
	}

	$vw_driving_school_woocommerce_sale_border_radius = get_theme_mod('vw_driving_school_woocommerce_sale_border_radius', 0);
	if($vw_driving_school_woocommerce_sale_border_radius != false){
		$vw_driving_school_custom_css .='.woocommerce span.onsale{';
			$vw_driving_school_custom_css .='border-radius: '.esc_attr($vw_driving_school_woocommerce_sale_border_radius).'px;';
		$vw_driving_school_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	// Site title Font Size
	$vw_driving_school_site_title_font_size = get_theme_mod('vw_driving_school_site_title_font_size');
	if($vw_driving_school_site_title_font_size != false){
		$vw_driving_school_custom_css .='.logo h1 a, .logo p.site-title a{';
			$vw_driving_school_custom_css .='font-size: '.esc_attr($vw_driving_school_site_title_font_size).';';
		$vw_driving_school_custom_css .='}';
	}

	// Site tagline Font Size
	$vw_driving_school_site_tagline_font_size = get_theme_mod('vw_driving_school_site_tagline_font_size');
	if($vw_driving_school_site_tagline_font_size != false){
		$vw_driving_school_custom_css .='.logo p.site-description{';
			$vw_driving_school_custom_css .='font-size: '.esc_attr($vw_driving_school_site_tagline_font_size).';';
		$vw_driving_school_custom_css .='}';
	}

	/*------------------ Preloader Background Color  -------------------*/

	$vw_driving_school_preloader_bg_color = get_theme_mod('vw_driving_school_preloader_bg_color');
	if($vw_driving_school_preloader_bg_color != false){
		$vw_driving_school_custom_css .='#preloader{';
			$vw_driving_school_custom_css .='background-color: '.esc_attr($vw_driving_school_preloader_bg_color).';';
		$vw_driving_school_custom_css .='}';
	}

	$vw_driving_school_preloader_border_color = get_theme_mod('vw_driving_school_preloader_border_color');
	if($vw_driving_school_preloader_border_color != false){
		$vw_driving_school_custom_css .='.loader-line{';
			$vw_driving_school_custom_css .='border-color: '.esc_attr($vw_driving_school_preloader_border_color).'!important;';
		$vw_driving_school_custom_css .='}';
	}