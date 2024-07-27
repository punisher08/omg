<?php
$id = '';
if ( ! empty( $block['anchor'] ) ):
	$id = 'id="' . $block['anchor'] . '"';
endif;
$class_name = 'request-a-quote-block';
if ( ! empty( $block['className'] ) ):
	$class_name .= ' ' . $block['className'];
endif;
$subheading    = get_field( 'subheading' );
$heading   = get_field( 'heading' );
$text = get_field( 'text' );
$icon_top = get_field( 'icon_top' );
$image = get_field( 'image' );
$icon = get_field( 'icon' );
$form_shortcode = get_field( 'form_shortcode' );

?>

<section <?php echo $id; ?> class="request-a-quote <?php echo esc_attr( $class_name ); ?> pt-xxl pb-xxl" data-block="omg/request-a-quote">
    <div class="container">
        <div class="row">
            <div class="header" data-aos="fade">
                <div class="subheading"><?=(!empty($subheading)) ? $subheading : '';?></div>
                <div class="heading">
                    <h1><?=(!empty($heading)) ? $heading : '';?></h1>
                </div>
                <div class="text">
                    <p><?=(!empty($text)) ? $text : '';?></p>
                </div>
            </div>
            <div class="grid">
                <div class="item" data-aos="fade" data-aos-delay="200">
                    <div class="form">
                        <?php if (!empty($form_shortcode)) : ?>
                            <?php echo do_shortcode($form_shortcode); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="item img-grp">
                    <div class="icon-top" data-aos="fade" data-aos-delay="300">
                        <?php if (!empty($icon_top)) : ?>
                           <img src="<?= $icon_top['url']; ?>" alt="<?= $icon_top['alt']; ?>" data-aos="fade" data-aos-delay="300">
                        <?php endif; ?> 
                    </div>
                    <?php if (!empty($image)) : ?>
                        <img class="main-img" src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" data-aos="fade" data-aos-delay="200">
                    <?php endif; ?> 
                </div>
            </div>
            <div class="icon-bottom">
                <?php if (!empty($icon)) : ?>
                    <img src="<?= $icon['url']; ?>" alt="<?= $icon['alt']; ?>" data-aos="fade" data-aos-delay="300">
                <?php endif; ?> 
            </div>
        </div>
    </div>
</section>