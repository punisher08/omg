<?php
$id = '';
if ( ! empty( $block['anchor'] ) ):
	$id = 'id="' . $block['anchor'] . '"';
endif;
$class_name = 'blog-banner-block';
if ( ! empty( $block['className'] ) ):
	$class_name .= ' ' . $block['className'];
endif;
$heading    = get_field( 'heading' );
$content    = get_field( 'content' );
$button_url = get_field( 'button_url' );
?>

<section <?php echo $id; ?> class="blog-banner <?php echo esc_attr( $class_name ); ?> pt-xxl pb-xxl" data-block="omg/blog-banner">
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
                    <h1 class="title"><?=the_title();?></h1>
                </div>
            </div>
        </div>
    </div>
</section>