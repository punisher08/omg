<?php
$id = '';
if ( ! empty( $block['anchor'] ) ):
	$id = 'id="' . $block['anchor'] . '"';
endif;
$class_name = 'about-block';
if ( ! empty( $block['className'] ) ):
	$class_name .= ' ' . $block['className'];
endif;
$heading    = get_field( 'heading' );
$content    = get_field( 'content' );
$button_url = get_field( 'button_url' );
?>

<section <?php echo $id; ?> class="<?php echo esc_attr( $class_name ); ?> pt-xxl pb-xxl" data-block="omg/about">
    <div class="container">
		<?php if ( $heading !== '' ): ?>
            <h2 class="about-block__title"><?php the_field( 'heading' ); ?></h2>
		<?php endif; ?>
		<?php if ( $content !== '' ): ?>
            <div class="about-block__content">
				<?php the_field( 'content' ); ?>
            </div>
		<?php endif; ?>
		<?php if ( $button_url !== '' ): ?>
            <div class="btn-holder">
                <a href="<?php the_field( 'button_url' ); ?>" class="btn"><?php the_field( 'button_text' ); ?></a>
            </div>
		<?php endif; ?>
    </div>
</section>