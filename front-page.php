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
                        <h3 class="text-white text-center">WHAT'S NEW</h3>
                        <div class="mt-5 text-center">
                            <a class="py-lg-3 px-lg-5" href="#newProduct">Discover the selection</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-fluid mt-5 d-flex justify-content-center">
                <?php get_template_part('includes/section','content');?>

            

        </section>

        <section id="newProduct" class="newProduct container">
            <h1 class=" text-center my-5">New Products</h1>
            <?php get_template_part('includes/section','newproducts');?>
        </section>
    </div>

<?php get_footer();?>