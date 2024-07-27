<?php
$id = '';
if ( ! empty( $block['anchor'] ) ):
	$id = 'id="' . $block['anchor'] . '"';
endif;
$class_name = 'premium-services-block';
if ( ! empty( $block['className'] ) ):
	$class_name .= ' ' . $block['className'];
endif;
$subheading    = get_field( 'subheading' );
$heading    = get_field( 'heading' );
$content = get_field( 'content' );
$image = get_field( 'image' );
$background_image = get_field( 'background_image' );

?>

<section <?php echo $id; ?> class="premium-services <?php echo esc_attr( $class_name ); ?> pt-xxl pb-xxl" data-block="omg/premium-services"  style="background-image:url('<?php echo $background_image['url']; ?>')" data-aos="fade">
    <div class="container">
        <div class="row">
            <div class="grid">
                <div class="item wysiwyg">
                    <div class="header">
                        <div class="subheading" data-aos="fade-down"><?=(!empty($subheading)) ? $subheading : '';?></div>
                        <div class="heading" data-aos="fade-down" data-aos-delay="200">
                            <h1><?=(!empty($heading)) ? $heading : '';?></h1>
                        </div>
                    </div>
                    <div class="body">
                        <div class="text">
                            <p data-aos="fade-down" data-aos-delay="300"><?=(!empty($content)) ? $content : '';?></p>
                        </div>
                    </div>
                </div>
                <div class="item img-grp">
                    <div class="mobile">
                        <img src="/wp-content/uploads/2024/07/Module.png" alt="">
                    </div>
                    <?php if ( $image ): ?>
                        <img class="main-img" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>