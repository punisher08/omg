<?php
$id = '';
if ( ! empty( $block['anchor'] ) ):
	$id = 'id="' . $block['anchor'] . '"';
endif;
$class_name = 'post-archive-block';
if ( ! empty( $block['className'] ) ):
	$class_name .= ' ' . $block['className'];
endif;
$heading    = get_field( 'heading' );
$content    = get_field( 'content' );
$button_url = get_field( 'button_url' );

// limit categories to 5
$categories = get_categories(array(
    'orderby' => 'name',
    'order' => 'ASC',
    'number' => 4
));

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; 
$blogs = new Blog();
// Get filtered posts
$current_cat = 0;
$filter = isset($_GET['filter']) ? sanitize_text_field($_GET['filter']) : 'mostrecent'; 
$filter_args['cat'] = $current_cat;
$query = $blogs->add_filter($filter_args,$paged);
$current_url = esc_url( get_permalink() );
if(isset($_GET['id'])){
    $current_cat = $_GET['id'];
    $filter_args['cat'] = $current_cat;
    $current_url = esc_url( get_permalink() );
    $query = $blogs->add_filter($filter_args,$paged);
}

if(isset($_POST['filter-post'])){
    $filter = $_POST['filter-post'];
    $current_url = esc_url( get_permalink() );
    $filter_args['cat'] = $current_cat;
    $query = $blogs->add_filter($filter_args,$paged,$filter);
}
?>
<?php $counter = 0;?>
<?php ($current_cat == 0) ? $active = 'active' : $active = '';?>
<section <?php echo $id; ?> class="post-archive <?php echo esc_attr( $class_name ); ?> pt-xxl pb-xxl"
    data-block="omg/post-archive">
    <div class="container">
        <div class="row">
            <!-- category -->
            <div class="header">
                <div class="grid">
                    <div class="archive-categories">
                        <div class="flex">
                            <div class="item" id="0">
                                <a href="<?= $current_url;?>" class="<?=$active;?>">
                                   View All
                                </a>
                            </div>
                            
                            <?php foreach($categories as $category):?>
                            <?php ($counter == 0) ? $active = 'active' : $active = '';?>
                            <?php ($current_cat == $category->term_id) ? $active = 'active' : $active = '';?>

                            <form action="" method="post" class="hidden">
                                <input type="hidden" name="cat" class="item" value="<?=$category->term_id;?>"
                                    id="cat-<?=$category->term_id;?>">
                                <button class="item cat-btn <?=$active;?>" name="submit"
                                    type="submit"><?=$category->name;?></button>
                            </form>
                            <div class="item " id="cat-<?=$category->term_id;?>"data-id="<?=$category->term_id;?>">
                                <a href="<?=$current_url;?>?id=<?=$category->term_id;?>" class="<?=$active;?>">
                                    <?=$category->name;?>
                                </a>
                            </div>
                            <?php $counter++;?>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <div class="filter-options">
                        <form action="" method="post" id="filter-form">
                            <select name="filter-post" id="filter-post">
                                <option value="mostrecent" <?php echo ($filter == 'last24hours') ? 'selected' : ''; ?>>Most Recent</option>
                                <option value="last7days" <?php echo ($filter == 'last7days') ? 'selected' : ''; ?>>Last 7 days</option>
                                <option value="lastmonth" <?php echo ($filter == 'lastmonth') ? 'selected' : ''; ?>>Last Month</option>

                                
                            </select>
                            <noscript><input type="submit" value="Submit"></noscript>
                        </form>
                    </div>
                </div>
            </div>
            <!-- eo category -->
            <div class="grid posts blog-posts">
                <?php if ($query->have_posts()): ?>
                <?php while ($query->have_posts()): $query->the_post(); ?>
                <?php
            $image = get_the_post_thumbnail_url(get_the_ID());
            $link = get_permalink();
            ?>
                <div class="item">
                    <div class="card">
                        <div class="featured-image">
                            <?php if (!empty($image)): ?>
                            <a href="<?=$link;?>">
                                <img src="<?=$image;?>" alt="">
                            </a>
                            <?php endif; ?>
                        </div>
                        <div class="_inner">
                            <div class="post-cat">
                                <?php
                            $tags = get_the_tags();
                            if ($tags) {
                                $tag_link = get_tag_link($tags[0]->term_id);
                            }
                            ?>
                                <?php if (!empty($tags)): ?>
                                <a href="<?=$tag_link;?>"><?=$tags[0]->name;?></a>
                                <?php endif; ?>
                            </div>
                            <div class="post-title">
                                <h2><?php the_title(); ?></h2>
                            </div>
                            <div class="post-content">
                                <?=wp_trim_words(get_the_content(), 20);?>
                            </div>
                            <div class="read-more item-group">
                                <a href="<?=$link;?>" class="btn btn-primary">Read More</a>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                        fill="none">
                                        <path
                                            d="M4.1665 10.0001H15.8332M15.8332 10.0001L9.99984 4.16675M15.8332 10.0001L9.99984 15.8334"
                                            stroke="#FDCB08" stroke-width="1.66667" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <!-- eo _inner -->
                    </div>
                </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
            <!-- pagination -->
            <div class="post-pagination">
                <?php
                    echo paginate_links(array(
                        'total' => $query->max_num_pages,
                        'prev_text' =>'<span class="prev-icon"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M15.8332 9.99996H4.1665M4.1665 9.99996L9.99984 15.8333M4.1665 9.99996L9.99984 4.16663" stroke="#475467" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg> <span class="label">Previous</span> </span>',
                        'next_text' => '<span class="next-icon"><span class="label">Previous</span> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M4.16675 9.99996H15.8334M15.8334 9.99996L10.0001 4.16663M15.8334 9.99996L10.0001 15.8333" stroke="#475467" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/></svg></span>',
                        'current' => $paged 
                    ));
                ?>
            </div>
            <!-- eo pagination -->
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let items = document.querySelectorAll('.blog-posts .item');
    var filterSelect = document.getElementById('filter-post');
    var form = document.getElementById('filter-form');

    filterSelect.addEventListener('change', function() {
        form.submit(); // Submit the form when the select option changes
    });
})
</script>