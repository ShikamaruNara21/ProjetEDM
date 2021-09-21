<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package VW Driving School
 */

get_header(); ?>

<main id="maincontent" role="main" class="content-vw">
	<div class="container">
		<div class="page-content">
	    	<h1><?php echo esc_html(get_theme_mod('vw_driving_school_404_page_title',__('404 Not Found','vw-driving-school')));?></h1>	
			<p class="text-404"><?php echo esc_html(get_theme_mod('vw_driving_school_404_page_content',__('Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.','vw-driving-school')));?></p>
			<?php if( get_theme_mod('vw_driving_school_404_page_button_text','RETURN TO THE HOME PAGE') != ''){ ?>
				<div class="error-btn">
		            <a href="<?php echo esc_url(home_url()); ?>" class="btn btn-lg">
		            	<span><i class="<?php echo esc_attr(get_theme_mod('vw_driving_school_404_page_button_icon','fas fa-bookmark')); ?>"></i></span><?php echo esc_html(get_theme_mod('vw_driving_school_404_page_button_text',__('RETURN TO THE HOME PAGE','vw-driving-school')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_driving_school_404_page_button_text',__('RETURN TO THE HOME PAGE','vw-driving-school')));?></span></a>
				</div>
			<?php } ?>
		</div>
		<div class="clearfix"></div>
	</div>
</main>

<?php get_footer(); ?>