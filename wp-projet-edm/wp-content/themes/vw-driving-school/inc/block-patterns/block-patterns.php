<?php
/**
 * VW Driving School: Block Patterns
 *
 * @package VW Driving School
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'vw-driving-school',
		array( 'label' => __( 'VW Driving School', 'vw-driving-school' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'vw-driving-school/banner-section',
		array(
			'title'      => __( 'Banner Section', 'vw-driving-school' ),
			'categories' => array( 'vw-driving-school' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png\",\"id\":8427,\"dimRatio\":40,\"align\":\"full\",\"className\":\"banner-box\"} -->\n<div class=\"wp-block-cover alignfull has-background-dim-40 has-background-dim banner-box\" style=\"background-image:url(" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png)\"><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"align\":\"wide\"} -->\n<div class=\"wp-block-columns alignwide\"><!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:heading {\"textAlign\":\"left\",\"level\":1,\"style\":{\"typography\":{\"fontSize\":45}}} -->\n<h1 class=\"has-text-align-left\" style=\"font-size:45px\">LOREM IPSUM DOLOR SIT AMET</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"className\":\"text-left\",\"style\":{\"typography\":{\"fontSize\":15}}} -->\n<p class=\"text-left\" style=\"font-size:15px\">Lorem Ipsum has been the industrys standard. Lorem Ipsum has been the industrys standard.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"borderRadius\":0} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link no-border-radius\">READ MORE</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"top\",\"width\":\"66.66%\"} -->\n<div class=\"wp-block-column is-vertically-aligned-top\" style=\"flex-basis:66.66%\"></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'vw-driving-school/contact-section',
		array(
			'title'      => __( 'Contact Section', 'vw-driving-school' ),
			'categories' => array( 'vw-driving-school' ),
			'content'    => "<!-- wp:group {\"align\":\"full\",\"className\":\"contact-section\",\"style\":{\"color\":{\"background\":\"#c4b12d\"}}} -->\n<div class=\"wp-block-group alignfull contact-section has-background\" style=\"background-color:#c4b12d\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"align\":\"wide\",\"className\":\"my-0 mx-lg-5 mx-md-1 mx-1 px-md-3\"} -->\n<div class=\"wp-block-columns alignwide my-0 mx-lg-5 mx-md-1 mx-1 px-md-3\"><!-- wp:column {\"width\":\"22.22%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:22.22%\"><!-- wp:paragraph {\"align\":\"left\",\"className\":\"con-phone mt-3 mb-md-3\",\"textColor\":\"white\",\"style\":{\"typography\":{\"fontSize\":15}}} -->\n<p class=\"has-text-align-left con-phone mt-3 mb-md-3 has-white-color has-text-color\" style=\"font-size:15px\">123456</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"33.33%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:33.33%\"><!-- wp:paragraph {\"className\":\"con-email mt-3 mb-md-3\",\"textColor\":\"white\",\"style\":{\"typography\":{\"fontSize\":15}}} -->\n<p class=\"con-email mt-3 mb-md-3 has-white-color has-text-color\" style=\"font-size:15px\">drivingschool@gmail.com</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:social-links {\"align\":\"right\",\"className\":\"is-style-logos-only p-0 mt-2\"} -->\n<ul class=\"wp-block-social-links alignright is-style-logos-only p-0 mt-2\"><!-- wp:social-link {\"url\":\"www.facebook.com\",\"service\":\"facebook\"} /-->\n\n<!-- wp:social-link {\"url\":\"www.instagram.com\",\"service\":\"instagram\"} /-->\n\n<!-- wp:social-link {\"url\":\"www.twitter.com\",\"service\":\"twitter\"} /-->\n\n<!-- wp:social-link {\"url\":\"www.linkedin.com\",\"service\":\"linkedin\"} /-->\n\n<!-- wp:social-link {\"url\":\"www.youtube.com\",\"service\":\"youtube\"} /--></ul>\n<!-- /wp:social-links --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
		)
	);

	register_block_pattern(
		'vw-driving-school/about-section',
		array(
			'title'      => __( 'About Section', 'vw-driving-school' ),
			'categories' => array( 'vw-driving-school' ),
			'content'    => "<!-- wp:cover {\"overlayColor\":\"white\",\"align\":\"wide\",\"className\":\"about-section m-0\"} -->\n<div class=\"wp-block-cover alignwide has-white-background-color has-background-dim about-section m-0\"><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"verticalAlignment\":null,\"align\":\"wide\",\"className\":\"mx-0\"} -->\n<div class=\"wp-block-columns alignwide mx-0\"><!-- wp:column {\"width\":\"55%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:55%\"><!-- wp:heading {\"textAlign\":\"left\",\"style\":{\"color\":{\"text\":\"#040404\"}}} -->\n<h2 class=\"has-text-align-left has-text-color\" style=\"color:#040404\">LOREM IPSUM DOLOR SIT AMET</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"left\",\"fontSize\":\"normal\",\"style\":{\"color\":{\"text\":\"#94989f\"}}} -->\n<p class=\"has-text-align-left has-text-color has-normal-font-size\" style=\"color:#94989f\">Lorem Ipsum has been the industrys standard. Lorem Ipsum has been the industrys standard. Lorem Ipsum has been the industrys standard.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"align\":\"left\",\"fontSize\":\"normal\",\"style\":{\"color\":{\"text\":\"#94989f\"}}} -->\n<p class=\"has-text-align-left has-text-color has-normal-font-size\" style=\"color:#94989f\">Lorem Ipsum has been the industrys standard. Lorem Ipsum has been the industrys standard. Lorem Ipsum has been the industrys standard.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\",\"width\":\"44%\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\" style=\"flex-basis:44%\"><!-- wp:image {\"align\":\"center\",\"id\":8483,\"sizeSlug\":\"large\",\"linkDestination\":\"media\"} -->\n<div class=\"wp-block-image\"><figure class=\"aligncenter size-large\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/about.png\" alt=\"\" class=\"wp-image-8483\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);
}