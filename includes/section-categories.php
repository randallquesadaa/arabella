<?php
  $taxonomy     = 'product_cat';
  $orderby      = 'name';  
  $show_count   = 0;      // 1 for yes, 0 for no
  $pad_counts   = 0;      // 1 for yes, 0 for no
  $hierarchical = 1;      // 1 for yes, 0 for no  
  $title        = '';  
  $empty        = 0;
  $array_id = array();
  $array_name = array();
  $longitud     = 0;
  $link= $_SERVER["REQUEST_URI"]; 

  $args = array(
    'taxonomy'     => $taxonomy,
    'orderby'      => $orderby,
    'show_count'   => $show_count,
    'pad_counts'   => $pad_counts,
    'hierarchical' => $hierarchical,
    'title_li'     => $title,
    'hide_empty'   => $empty
);
  if($link == '/shop/'){
    
    $all_categories = get_categories( $args );
    
    foreach ($all_categories as $cat) {
        if($cat->category_parent == 0) {
            $category_id = $cat->term_id;       
            echo '<br /><a id="'.$cat->term_id.'" href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';
            array_push($array_name, $cat->slug);
            array_push($array_id, $cat->term_id);
            
          }       
        
        }
    }
        //Si la longitud es cero que cuente las sub categorias
        if($longitud == 0){
            $all_categories = get_categories( $args );
            foreach ($all_categories as $cat) {
                if($cat->category_parent == 0) {
                    $category_id = $cat->term_id;       
                    array_push($array_name, $cat->slug);
                    array_push($array_id, $cat->term_id);
                }
            }
        } 
        $longitud = count($array_id);
        for($i=0; $i<$longitud; $i++){
        if($link == '/product-category/'.$array_name[$i].'/'){
            $args2 = array(
            'taxonomy'     => $taxonomy,
            'child_of'     => 0,
            'parent'       => $array_id[$i],
            'orderby'      => $orderby,
            'show_count'   => $show_count,
            'pad_counts'   => $pad_counts,
            'hierarchical' => $hierarchical,
            'title_li'     => $title,
            'hide_empty'   => $empty
            );
            $sub_cats = get_categories( $args2 );
            if($sub_cats) {
                foreach($sub_cats as $sub_category) {
                    echo '<br /><a id="'.$sub_category->term_id.'" href="'. get_term_link($sub_category->slug, 'product_cat') .'">'. $sub_category->name .'</a>';
                }   
            }
        }
    }  
?>