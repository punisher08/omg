<?php
$id = '';
if ( ! empty( $block['anchor'] ) ):
	$id = 'id="' . $block['anchor'] . '"';
endif;
$class_name = 'steps-block';
if ( ! empty( $block['className'] ) ):
	$class_name .= ' ' . $block['className'];
endif;
$subheading    = get_field( 'subheading' );
$heading    = get_field( 'heading' );
$text    = get_field( 'text' );
$steps = get_field( 'steps' );
?>
<section <?php echo $id; ?> class="steps <?php echo esc_attr( $class_name ); ?> pt-xxl pb-xxl" data-block="omg/steps">
    <div class="container">
        <div class="row">
            <div class="header">
                <div class="subheading" data-aos="fade-down"><?=$subheading;?></div>
                <div class="heading" data-aos="fade-down">
                    <h1><?=$heading;?></h1>
                </div>
                <div class="text" data-aos="fade-down">
                    <p><?=$text;?></p>
                </div>
            </div>
            <div class="step-lists" id="steps-accordion">
                <?php if(!empty($steps)):?>
                <?php foreach($steps as $key => $step):?>
                <div class="grid">
                    <div class="item" data-aos="fade-right">
                        <div class="card">
                            <div class="title">
                                <h1 class="underline"><?=$step['title'];?>
                                    <span>
                                        <img src="/wp-content/uploads/2024/07/Hand-drawn-underlines.svg" alt="">
                                    </span>
                                </h1>
                                <div class="toggle" data-target="<?=$element_attr.$item_id;?>">
                                    <img src="/wp-content/uploads/2024/07/chevron-down-1.svg" alt="">
                                </div>

                            </div>
                            <div class="content">
                                <?=$step['content'];?>
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