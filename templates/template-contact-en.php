<?php
/*
Template Name: Contact
*/
?>

<?php get_header();?>

<section>
    <div>
        <div class="hero" id="site-header">
            <img src="<?php echo wp_get_attachment_url(get_theme_mod('lwp-img-callout-imgContact'))?>">
        </div>
        <div class="hero-contact container">
            <div class="row">
                <h3 class="text-white text-center text-lg-left">
                    <?php echo get_theme_mod('lwp-en-contact-callout-title')?>
                </h3>
            </div>
        </div>
    </div>
</section>

<section class="container contact">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-10 col-12 my-5 info-contact">
            <h2>Contact</h2>

            <?php get_template_part('includes/section','content');?>

            <div class="row mt-4 text-center text-lg-left">
                    <div class="col-lg-6 col-6 p-0 d-flex justify-content-center">
                        <a class="d-flex" href="<?php echo get_theme_mod('lwp-en-home-callout-email')?>">
                            <i class="fas fa-envelope"></i>
                            <p class="mb-0 ml-2">
                                <?php echo get_theme_mod('lwp-en-home-callout-email')?>
                            </p>
                        </a>
                    </div>
                    <div class="col-lg-6 col-6 p-0 d-flex justify-content-center">
                        <a class="d-flex" href="mailto:<?php echo get_theme_mod('lwp-en-contact-callout-number')?>">
                            <i class="fas fa-phone-alt"></i>
                            <p class="mb-0 ml-2">
                                <?php echo get_theme_mod('lwp-en-contact-callout-number')?>
                            </p>
                        </a>
                    </div>
            </div>
    </div>
</section>


<?php get_footer();?>