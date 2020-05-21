<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.9.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

<section class="related products">

    <?php
		$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );
		//obtener precio
		$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $related_product );
		if ( $heading ) :
			?>
    <h2 class="text-center">Recommends</h2>
    <div class="col-12 ">
        <?php endif; ?>

        <?php woocommerce_product_loop_start(); ?>

        <?php foreach ( $related_products as $related_product ) : ?>

        <?php
					$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

					//wc_get_template_part( 'content', 'product' );
	?>
            <div class="cards_item">
                <div class="card">
                    <div class="card_image"><?php 
					$thumbnail = apply_filters( 'woocommerce_in_cart_product_thumbnail img_class', $related_product->get_image(), $values, $cart_item_key ); 
					echo $thumbnail; 
			?>
                    </div>
                    <p class="precio"> $<?php echo $related_product->get_price(); ?></p>
                    <div class="card_content">
                        <h2 class="card_title"><?php echo get_the_title();?></h2>
                        <p class="card_text"><?php echo get_the_excerpt() ?></p>
                        <?php echo '<a href="' . esc_url( $link ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">';?>
                        <button class="card_btn">Read More</button>
                        <?php echo '</a>'?>
                    </div>
                </div>
			</div>


        <?php endforeach; ?>

        <?php woocommerce_product_loop_end(); ?>
    </div>
</section>
<?php
endif;


wp_reset_postdata();
?>