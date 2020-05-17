<?php
  $taxonomy     = 'product_cat';
  $orderby      = 'name';  
  $show_count   = 0;      // 1 for yes, 0 for no
  $pad_counts   = 0;      // 1 for yes, 0 for no
  $hierarchical = 1;      // 1 for yes, 0 for no  
  $title        = '';  
  $empty        = 0;

  $args = array(
         'taxonomy'     => $taxonomy,
         'orderby'      => $orderby,
         'show_count'   => $show_count,
         'pad_counts'   => $pad_counts,
         'hierarchical' => $hierarchical,
         'title_li'     => $title,
         'hide_empty'   => $empty
  );
 $all_categories = get_categories( $args );
 foreach ($all_categories as $cat) {
    if($cat->category_parent == 0) {
        $category_id = $cat->term_id;       
        echo '<br /><a id="'.$cat->term_id.'" href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';
    }       
}

$host= $_SERVER["HTTP_HOST"];
$link= $_SERVER["REQUEST_URI"];
$url="http://" . $host . $link;
echo $url;

/*if($url == "http://localhost/arabella/categoria-producto/accesorios/")
    {
        $taxonomy     = 'product_cat';
    $orderby      = 'name';  
    $show_count   = 0;      // 1 for yes, 0 for no
    $pad_counts   = 0;      // 1 for yes, 0 for no
    $hierarchical = 1;      // 1 for yes, 0 for no  
    $title        = '';  
    $empty        = 0;
      
    $args = array(
            'taxonomy'     => $taxonomy,
            'child_of'     => 0,
            'parent'       => 26,
            'orderby'      => $orderby,
            'show_count'   => $show_count,
            'pad_counts'   => $pad_counts,
            'hierarchical' => $hierarchical,
            'title_li'     => $title,
            'hide_empty'   => $empty
    );
    $sub_cats = get_categories( $args );
    if($sub_cats) {
        foreach($sub_cats as $sub_category) {
            echo '<br /><a id="'.$sub_category->term_id.'" onClick="'.$sub_category->name.'" href="'. get_term_link($sub_category->slug, 'product_cat') .'">'. $sub_category->name .'</a>';
        }   
    }
    }*/
?>