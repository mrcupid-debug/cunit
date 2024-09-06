<?php
// Template Name: Class Attire
get_header(); 
?>
<!-- Page Title -->
<section class="Class-Attire page_background_title" style="background-image: url('<?php echo esc_url( get_field( 'header_section_image', 'options' ) ); ?>');"> 
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page_title text-white">     
                    <?php echo get_field( 'page_title' ); ?>
                </div>
                <div class="regular text-center text-white">         
                    <?php echo get_field( 'page_sub_title' ); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="section_image_top">
    <img src="<?php echo esc_url( get_field( 'section_image', 'options' ) ); ?>" alt="">
</div>
<!-- Content Here -->

<section class="ca_section section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ca_header_title pb-5">
                    <div class="sub_title pb-3">
                        <?php echo get_field( 'what_to_expect' ); ?>
                    </div>
                    <div class="regular text-black">
                        <?php echo get_field( 'what_to_expect_sub_title' ); ?>
                    </div>
                </div>
            <?php if ( have_rows( 'accordion' ) ) : ?>
                    <?php $first = true; ?>
                    <?php while ( have_rows( 'accordion' ) ) : the_row(); ?>
                    <div class="accordion <?php if ($first) echo 'active'; ?>">
                        <div class="accordion_wrapper">
                            <div class="accordion_title description">
                                <?php echo get_sub_field( 'accordion_title' ); ?>
                            </div>
                            <div class="accordion_icon">
                                <div class="dropdown_icon <?php if ($first) echo 'active'; ?>">          
                                    <?php echo get_sub_field( 'icon' ); ?>
                                </div>
                            </div>
                        </div>
                        <div class="accordion_content regular ca_content" style="<?php if ($first) { echo 'display: block;'; $first = false; } else { echo 'display: none;'; } ?>">
                            <?php echo get_sub_field( 'accordion_text' ); ?>                     
                        </div>
                    </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>



<!-- Content Ends -->
<?php if ( have_rows('flexible-content', 'options') ) : ?>
    <?php while ( have_rows('flexible-content', 'options') ) : the_row(); ?>

        <?php if ( get_row_layout() == 'services' ): ?>    

            <?php get_template_part('section/services'); ?>

        <?php endif; ?>  

        <?php if ( get_row_layout() == 'call_to_action' ): ?>    

            <?php get_template_part('section/cta'); ?>
            
        <?php endif; ?>  

    <?php endwhile; ?>
<?php endif; ?>
<?php
get_footer(); 
?>  