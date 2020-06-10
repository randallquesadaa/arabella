<?php
/*
Template Name: Contacto
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
                <h3 class="text-white text-center text-lg-left">Acerca de nosotros y como contactarnos</h3>
            </div>
        </div>
    </div>
</section>

<section class="container-fluid contact">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-10 col-12 my-5">
            <h2>Contacto</h2>

            <?php get_template_part('includes/section','content');?>

            <div class="row mt-4 text-center text-lg-left">
                    <div class="col-lg-6 col-6 p-0 d-flex justify-content-center">
                        <a class="d-flex" href="">
                            <i class="fas fa-envelope"></i>
                            <p class="mb-0 ml-2">arabella@gmail.com</p>
                        </a>
                    </div>
                    <div class="col-lg-6 col-6 p-0 d-flex justify-content-center">
                        <a class="d-flex" href="">
                            <i class="fas fa-phone-alt"></i>
                            <p class="mb-0 ml-2">+506 2222 2222</p>
                        </a>
                    </div>
            </div>
    </div>
</section>

<?php get_footer();?>