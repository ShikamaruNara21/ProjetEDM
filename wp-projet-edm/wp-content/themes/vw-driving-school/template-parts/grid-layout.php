<?php
/**
 * The template part for displaying grid post
 *
 * @package VW Driving School
 * @subpackage vw-driving-school
 * @since VW Driving School 1.0
 */
?>
<div class="col-md-4 col-lg-4">
	<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
	    <div class="post-main-box">
	      	<div class="box-image">
	          	<?php 
		            if(has_post_thumbnail() && get_theme_mod( 'vw_driving_school_featured_image_hide_show',true) != '') { 
		              the_post_thumbnail(); 
		            }
	          	?>
	        </div>
	        <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>      
	        <div class="new-text">
	          	<div class="entry-content">
			        <p>
		            	<?php $excerpt = get_the_excerpt(); echo esc_html( vw_driving_school_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_driving_school_excerpt_number','30')))); ?> <?php echo esc_html( get_theme_mod('vw_driving_school_excerpt_suffix','') ); ?>
		          	</p>
	          	</div>
	        </div>
	        <?php if( get_theme_mod('vw_driving_school_button_text','READ MORE') != ''){ ?>
		       	<div class="more-btn">
		          <a href="<?php the_permalink(); ?>" class="btn btn-lg">
		            <span><i class="<?php echo esc_attr(get_theme_mod('vw_driving_school_blog_buton_icon','fas fa-bookmark')); ?>"></i></span><?php echo esc_html(get_theme_mod('vw_driving_school_button_text',__('READ MORE','vw-driving-school')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_driving_school_button_text',__('READ MORE','vw-driving-school')));?></span></a>
		        </div>
		    <?php } ?>
	    </div>
	    <div class="clearfix"></div>
  	</article>
</div>