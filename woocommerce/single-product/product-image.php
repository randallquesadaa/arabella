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

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns row bg-light my-5 justify-content-center', 12 );
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
<div class="col-lg-12 d-flex flex-row product_section">
    <div class="col-lg-6 <?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>"
        data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
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
    <div class="col-lg-6">
        <div class="row">
            <!--Tittle-->
            <div class="col-12 mt-5">
                <?php the_title( '<h2 class="product_title entry-title">', '</h2>' ); ?>
            </div>
            <!--Description-->
            <div class="col-12 mt-3 mb-3">
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
                    <div class="col-6">
                        <h5 class="text-left">Color</h4>
                    </div>
                    <div class="col-6">
                        <button type="button" class="btn rounded-circle btn-primary btn-xs float-right mr-2">W</button>
                        <button type="button" class="btn rounded-circle btn-danger btn-xs float-right mr-2"> R</button>
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
                        <h5 class="text-center mt-5 mb-4">SIZE</h4>
                    </div>
                    <div class="col-12 text-center mb-3">
                        <button type="button" class="btn border border-dark btn-xs mr-2">XS</button>
                        <button type="button" class="btn border border-dark btn-xs mr-2">S</button>
                        <button type="button" class="btn border border-dark btn-xs mr-2">L</button>
                        <button type="button" class="btn border border-dark btn-xs mr-2">XL</button>
                    </div>
                </div>
            </div>
            <!--Add to cart-->
            <div class="col-12 align-items-center justify-content-center my-3">
                <div class="row">
                    <div class="col-12 text-center ">
                        <button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>"
                            class="single_add_to_cart_button button alt add_to_cart"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 mt-4 mb-4 text-center">
            <h2>
                RECOMMENDS
            </h2>
        </div>
    </div>
    <!-- <div class="row">
        <div class="card-deck mt-3">
            <?php/* while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
            <div class="card">
            <a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img class="img-fluid" src="'.woocommerce_placeholder_img_src().'" alt="My Image Placeholder" width="65px" height="115px" />'; ?>
            </a>
                <div class="card-body">
                <?php if (the_content( $loop->post->ID ))
                 echo get_the_content($loop->post->ID, 'recomends'); 
                 else echo '<p class="card-text"> '.the_content().'</p>'; ?>

                </div>
            </div>
            <?php /*endwhile;*/ ?>
            <?php/* wp_reset_query();*/ ?>
        </div>
    </div> -->
</div>