<?php
$id = '';
if ( ! empty( $block['anchor'] ) ):
	$id = 'id="' . $block['anchor'] . '"';
endif;
$class_name = 'quick-action-section-block';
if ( ! empty( $block['className'] ) ):
	$class_name .= ' ' . $block['className'];
endif;
$heading    = get_field( 'heading' );
$text    = get_field( 'text' );
$button_url = get_field( 'button_url' );
$button_text = get_field( 'button_text' );
?>

<section <?php echo $id; ?> class="quick-action-section <?php echo esc_attr( $class_name ); ?> pt-xxl pb-xxl" data-block="omg/quick-action-section">
    <div class="container">
        <div class="row">
            <div class="flex">
                <div class="item">
                    <div class="content">
                        <div class="heading">
                            <h1><?=(!empty($heading)) ? $heading : ''?></h1>
                        </div>
                        <div class="text">
                            <p><?=(!empty($text)) ? $text : ''?></p>
                        </div>
                    </div>
                </div>
                <div class="item cta"> 
                    <a href="<?=$button_url;?>">
                        <button class="secondary-button ">
                            <span><?=(!empty($button_text)) ? $button_text : ''?></span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>