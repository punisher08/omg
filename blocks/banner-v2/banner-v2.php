<?php
$id = '';
if ( ! empty( $block['anchor'] ) ):
	$id = 'id="' . $block['anchor'] . '"';
endif;
$class_name = 'banner-v2-block';
if ( ! empty( $block['className'] ) ):
	$class_name .= ' ' . $block['className'];
endif;
$heading    = get_field( 'heading' );
$text    = get_field( 'text' );
$content    = get_field( 'content' );
$quick_action_section = get_field( 'quick_action_section' );
$button_url = get_field( 'button_url' );
$background_image = get_field( 'background_image' );
$enable_quick_action = get_field( 'enable_quick_action' );
?>
<style>
    .banner-v2{
        background-image: url(<?php echo $background_image['url']; ?>);
    }
</style>
<section <?php echo $id; ?> class="banner-v2 <?php echo esc_attr( $class_name ); ?> pt-xxl pb-xxl" data-block="omg/banner-v2">
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
                <div class="inner-content">
                    <h1><?=(!empty($heading)) ? $heading : ''?></h1>
                    <div class="text">
                        <?=(!empty($text)) ? $text : ''?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
if($enable_quick_action != 1){
    $class_name = "hidden";
}else{
    $class_name = "visible";
}
?>
<section class="<?=$class_name;?>">
    <div class="_quick-action-section">
        <div class="container">
            <div class="row">
                <div class="flex">
                    <div class="_headline"><?=($quick_action_section) ? $quick_action_section['heading'] : ''?></div>
                    <div class="_form">
                        <?php if(!empty($quick_action_section['form_shortcode'])):?>
                            <?php echo do_shortcode($quick_action_section['form_shortcode']);?>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>