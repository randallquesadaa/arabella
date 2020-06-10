<?php
/*
Template Name: Cart
*/
?>
<?php get_header();?>

<div class="container my-5">

    <div class="row d-flex justify-content-center mb-3">
        <h1><?php the_title();?></h1>
    </div>
    
    <?php get_template_part('includes/section','content');?>
</div>

<?php get_footer();?>