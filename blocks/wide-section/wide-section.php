<?php
$id = '';
if ( ! empty( $block['anchor'] ) ):
	$id = 'id="' . $block['anchor'] . '"';
endif;
$class_name = 'wide-section-block';
if ( ! empty( $block['className'] ) ):
	$class_name .= ' ' . $block['className'];
endif;

$heading    = get_field( 'heading' );
$text    = get_field( 'text' );
$content = get_field( 'content' );
$section_width = get_field( 'section_width' );
?>
<style>
.section-width {
    width: <?=( !empty($section_width)) ? $section_width.'%': '100%'?>;
    margin: 0 auto;
}
</style>
<section <?php echo $id; ?> class="wide-section <?php echo esc_attr( $class_name ); ?> pt-xxl pb-xxl"
    data-block="omg/wide-section">
    <div class="container">
        <div class="row">
            <div class="grid ">
                <div class="header">
                    <div class="heading" data-aos="fade-down" data-aos-delay="200">
                        <h1><?=(!empty($heading)) ? $heading : 'Heading'?></h1>
                    </div>
                    <div class="text">
                        <?=(!empty($text)) ? $text : 'Text'?>
                    </div>
                </div>
                <div class="inner-content section-width">
                    <?=(!empty($content)) ? $content : 'Content'?>
                </div>
            </div>
        </div>
    </div>
</section>