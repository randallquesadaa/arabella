<?php
/*
Template Name: Home
*/
?>

<?php get_header();?>

    <div class="container-fluid p-0">
        <section>
            <div>
                <?php if ( get_header_image() ) : ?>
                    <div class="hero" id="site-header">
                        <img class="img-fluid p-0" src="<?php header_image(); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                    </div>
                <?php endif; ?>
                <div class="hero-container container d-flex justify-content-lg-start align-items-center justify-content-center">
                    <div>
                        <h3 class="text-white text-center"><?php echo get_theme_mod('lwp-home-callout-headline')?></h3>
                        <div class="mt-5 text-center">
                            <a class="py-lg-3 px-lg-5" href="#newProduct">Discover the selection</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="categories container-fluid d-flex justify-content-center">
                <?php get_template_part('includes/section','content');?>
        </section>

        <section id="newProduct" class="newProduct container">
            <h1 class=" text-center mt-3 mb-3">New Products</h1>
            <?php get_template_part('includes/section','newproducts');?>
        </section>
    </div>

<?php get_footer();?>