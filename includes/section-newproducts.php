<?php
    $args = array(
    'post_type' => 'product',
    'stock' => 1,
    'posts_per_page' => 6,
    'orderby' =>'date',
    'order' => 'DESC' );
    $loop = new WP_Query( $args );
?>
    <div class="row">
        <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
        <div class="col-lg-4 col-6 d-flex justify-content-lg-center my-lg-3 p-0">
        <a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
        <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img class="img-fluid" src="'.woocommerce_placeholder_img_src().'" alt="My Image Placeholder" width="65px" height="115px" />'; ?>
        </a>
        </div>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
    </div>
    