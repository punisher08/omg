<?php
/**
 * Use for Post template
 */
global $post;
$class_name = "post-".$post->ID;
// get post featured image url
$featured_image = get_the_post_thumbnail_url($post->ID, 'full');
//get categories of the post type
$taxonomy = ($post->post_type == 'post') ? 'category' : 'service_category';

$categories = get_categories(array(
    'post_type' => $post->post_type,
    'taxonomy' => $taxonomy,
    'orderby' => 'name',
    'order' => 'ASC',
    'number' => 4
));

$anchors = get_field('anchors',$post->ID);


?>
<style>
  .<?=$class_name;?>{
    background-image: url('<?=$featured_image;?>'); 
  }
</style>
<div class="blog">
    <section class="single-blog-banner post-<?=$post->ID;?>">
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
                        <h1 class="title"><?=$post->post_title;?></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="post-data post-<?=$post->ID;?>-content">
        <div class="container">
            <div class="row">
                <div class="grid">
                    <div class="item">
                        <div class="_tags _categories">
                            <?php if(!empty($anchors)):?>
                            <ul>
                                <?php foreach($anchors as $anchor):?>
                                    <li>
                                        <a href="#<?=$anchor['target_id'];?>">
                                            <?=$anchor['label'];?>
                                        </a>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="item _inner_content">
                        <div class="content">
                            <div class="post-content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>