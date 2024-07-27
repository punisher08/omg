<?php

use OMG\Theme\Utility;

get_header(); ?>
<?php
$current_cat = get_queried_object();
$current_cat_id = $current_cat->term_id;
$current_cat_name = $current_cat->name;

$post_type = get_post_type();
$taxonomy = ($post_type == 'post') ? 'category' : 'service_category';

$args = array(
  'post_type' => 'any',
  'numberposts' => -1,
  'tax_query' => array(
      array(
          'taxonomy' => $taxonomy,
          'field' => 'term_id',
          'terms' => $current_cat_id,
      ),
  ),
);

$posts = get_posts($args);

?>
<section class="archive-banner post-<?=$current_cat->term_id;?>" style="background-image:url('/wp-content/uploads/2024/07/Interstate-Removalists-Sydney-Brisbane-melbourne.jpg.webp');">
    <div class="container">
        <div class="row">
            <div class="grid">
                <div class="breadcrumbs">
                    <?php
                        if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb('
                        <p id="breadcrumbs"> ','</p>
                        ');
                        }
                    ?>
                </div>

                <div class="heading">
                    <h1 class="title"><?=$current_cat_name;?></h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="archive-content">
    <div class="container">
        <div class="row">
            <div class="grid archive-cards">
              <?php if(!empty($posts)):?>
                <?php foreach($posts as $post):?>
                <div class="item">
                    <div class="card">
                        <div class="card-header">
                          <?php $image = get_the_post_thumbnail_url($post->ID);?>
                          <img src="<?=$image;?>"alt="">
                        </div>
                        <div class="card-body">
                            <div class="title"><?=wp_trim_words(get_the_title($post->ID), 5);?></div>
                            <div class="text"><?=wp_trim_words(get_the_content($post->ID), 20);?></div>
                            <div class="more-btn">
                                <a href="<?=get_the_permalink( $post->ID );?>">
                                    Learn more
                                    <span class="arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M4.16699 9.99996H15.8337M15.8337 9.99996L10.0003 4.16663M15.8337 9.99996L10.0003 15.8333"
                                                stroke="#FDCB08" stroke-width="1.66667" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
              <?php endif;?>
            </div>
        </div>
    </div>
</section>
<div class="pagination">
    <?php echo Utility::generate_pagination_links(); ?>
</div>
<?php
get_footer();