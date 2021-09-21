<?php
/**
 * The template part for topbar
 *
 * @package VW Driving School 
 * @subpackage vw_driving_school
 * @since VW Driving School 1.0
 */
?>
<?php if( get_theme_mod( 'vw_driving_school_topbar_hide_show', false) != '' || get_theme_mod( 'vw_driving_school_resp_topbar_hide_show', false) != '') { ?>
	<div id="topbar">
		<div class="container">
			<div class="row">	        	
		    	<div class="col-lg-5 col-md-6">
		    		<?php if(get_theme_mod('vw_driving_school_discount_text') != ''){ ?>
		    			<div class="discount-text">
		    				<i class="<?php echo esc_attr(get_theme_mod('vw_driving_school_discount_icon','fas fa-road')); ?>"></i><span><?php echo esc_html(get_theme_mod('vw_driving_school_discount_text',''));?></span>
		    			</div>
		    		<?php }?>
		    	</div>
		    	<div class="col-lg-3 col-md-6">
		    		<?php if( get_theme_mod( 'vw_driving_school_booking_link') != '' || get_theme_mod( 'vw_driving_school_booking_text' )!= '' ) { ?>
		            <a href="<?php echo esc_url( get_theme_mod('vw_driving_school_booking_link','')); ?>" class="btn btn-lg red">
		            	<span><i class="<?php echo esc_attr(get_theme_mod('vw_driving_school_book_class_button_icon','fas fa-bookmark')); ?>"></i></span><?php echo esc_html( get_theme_mod('vw_driving_school_booking_text','')); ?>
		        	<span class="screen-reader-text"><?php esc_html_e( 'BOOK A CLASS','vw-driving-school' );?></span></a>
		        	<?php }?>
		    	</div>
		    	<?php if( get_theme_mod('vw_driving_school_search_hide_show',true) != ''){ ?>
			    	<div class="col-lg-4 col-md-12">
			    		<div class="search-box">
			           		<?php get_search_form(); ?>
			           	</div>
			    	</div>
			    <?php } ?>
	        </div>
		</div>
	</div>
<?php } ?>