<?php
/*
Template Name: Inicio
*/
?>

<?php get_header();?>

    <div class="container-fluid p-0">
        <section>
            <div>
                    <div class="hero" id="site-header">
                        <img class="img-fluid p-0" src="<?php echo wp_get_attachment_url(get_theme_mod('lwp-img-callout-imgHome'))?>">
                    </div>
                <div class="hero-container container d-flex justify-content-lg-start align-items-center justify-content-center">
                    <div>
                        <h3 class="text-white text-center">
                            <?php echo get_theme_mod('lwp-es-home-callout-title')?>
                        </h3>
                        <div class="mt-5 text-center">
                            <a class="py-lg-3 px-lg-5" href="#newProduct">Descubre la seleccion</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="categories container-fluid d-flex justify-content-center bg-white">
                <?php get_template_part('includes/section','content');?>
        </section>

        <section id="newProduct" class="newProduct container">
            <h1 class=" text-center mt-3 mb-3">Nuevos Productos</h1>
            <?php get_template_part('includes/section','newproducts');?>
        </section>
    </div>

<?php get_footer();?>