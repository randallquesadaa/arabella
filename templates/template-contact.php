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

<section class="container-fluid contact">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-10 col-12 my-5">
            <h2>Get In Touch</h2>

            <form>
                <div class="row">
                    <div class="col-lg-6 my-2">
                        <input type="text" class="form-control" placeholder="First name">
                    </div>
                    <div class="col-lg-6 my-2">
                        <input type="text" class="form-control" placeholder="Last name">
                    </div>
                    <div class="col-lg-12 my-2">
                        <input type="text" class="form-control" placeholder="Email">
                    </div>
                    <div class="col-lg-12 my-2">
                        <input type="text" class="form-control" placeholder="Subject">
                    </div>
                    <div class="col-lg-12 my-2">
                        <input type="text" class="form-control " placeholder="Message">
                    </div>
                </div>
                <button class="btn btn-dark bt-2 float-lg-right">Submit</button>
            </form>

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