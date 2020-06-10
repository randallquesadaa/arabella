<?php
/*
Template Name: Contact
*/
?>

<?php get_header();?>

<section>
    <div>
        <?php if ( get_header_image() ) : ?>
            <div class="hero" id="site-header">
            <img alt="" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>">            </div>
        <?php endif; ?>
        <div class="hero-contact container">
            <div class="row">
                <h3 class="text-white text-center text-lg-left">More about us and how to sing</h3>
            </div>
        </div>
    </div>
</section>

<section class="container-fluid aboutUs">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-10 col-12 text-white my-5">
            <h2>About Us</h2>
            <?php get_template_part('includes/section','content');?>
        </div>
    </div>
</section>



<?php get_footer();?>