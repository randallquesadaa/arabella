<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;
global $post;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns row bg-light my-5 justify-content-center', 6 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	)
);
/**
 * se incluye la descripción
 */
$heading = apply_filters( 'woocommerce_product_description_heading', __( 'Description', 'woocommerce' ) );
?>
<div class="container d-flex flex-lg-row product_section align-content-center">
    <div class="row">
        <div class="col-lg-6 col-12 d-flex  <?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>"
            data-columns="<?php echo esc_attr( $columns ); ?>"
            style="opacity: 0; transition: opacity .25s ease-in-out;">
            <figure class="woocommerce-product-gallery__wrapper col-12">
                <?php
			if ( $product->get_image_id() ) {
                $html = wc_get_gallery_image_html( $post_thumbnail_id, true );
			} else {
				$html  = '<div class="woocommerce-product-gallery__image--placeholder ">';
				$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
				$html .= '</div>';
			}
			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
           
            do_action( 'woocommerce_product_thumbnails' );
			?>
            </figure>
        </div>
        <div class="col-lg-6 col-12">
            <div class="row">
                <!--Tittle-->
                <div class="col-12 mt-lg-5">
                    <?php the_title( '<h2 class="product_title entry-title">', '</h2>' ); ?>
                </div>
                <!--Description-->
                <div class="col-12 mt-lg-3 mt-1 mb-3">
                    <p><?php the_content();?>
                    </p>
                </div>
                <!--Line-->
                <div class="col-12 my-2">
                    <hr>
                </div>
                <!--Precio-->
                <div class="col-12  align-items-center justify-content-center">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="text-left">Price</h4>
                        </div>
                        <div class="col-6">
                            <p
                                class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>">
                                <?php echo $product->get_price_html(); ?></p>
                        </div>
                    </div>
                </div>
                <!--Line-->
                <div class="col-12 my-2">
                    <hr>
                </div>
                <!--Color-->
                <div class="col-12  align-items-center justify-content-center">
                    <div class="row">
                        <div class="col-12 col-lg-4 mb-4 mb-lg-0">
                            <h5 class="text-lg-left text-center">Color</h4>
                        </div>
                        <div class="col-12 col-lg-8 d-flex justify-content-around">
                            <?php
                        $color = array();
                        array_push($color = get_field( 'color' ));
                        $count_color= count($color);
                        // Create a comma-separated list from selected values.
                        for($i = 0; $i < $count_color; $i++): ?>
                            <button type="button" class="btn border border-dark btn-xs mb-2"><?php echo $color[$i]?></button>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
                <!--Linea-->
                <div class="col-12 my-2">
                    <hr>
                </div>

                <!--SIZE-->
                <div class="col-12 align-items-center justify-content-center">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="text-center mt-1 mt-lg-5 mb-4">Available sizes</h4>
                        </div>
                        <div class="col-12 text-center mb-3">
                            <?php
                        $sizes = array();
                        array_push($sizes = get_field( 'sizes' ));
                        $count_sizes= count($sizes);
                        // Create a comma-separated list from selected values.
                        for($i = 0; $i < $count_sizes; $i++): ?>
                            <button type="button"
                                class="btn border border-dark btn-xs mr-2"><?php echo $sizes[$i]?></button>
                            <?php endfor; ?>


                        </div>
                    </div>
                </div>
            </div>
            <!--Add to cart-->
            <div class="col-12 align-items-center justify-content-center my-3">
                <div class="row">
                    <div class="col-12 text-center ">
                       <div class="woocommerce-variation-add-to-cart variations_button">
                            <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

                            <button type="submit" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

                            <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

                            <input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
                            <input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
                            <input type="hidden" name="variation_id" class="variation_id" value="0" />
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>