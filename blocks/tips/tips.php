<?php
$id = '';
if ( ! empty( $block['anchor'] ) ):
	$id = 'id="' . $block['anchor'] . '"';
endif;
$class_name = 'tips-block';
if ( ! empty( $block['className'] ) ):
	$class_name .= ' ' . $block['className'];
endif;
$subheading    = get_field( 'subheading' );
$heading    = get_field( 'heading' );
$row = get_field( 'row' );
?>

<section <?php echo $id; ?> class="tips <?php echo esc_attr( $class_name ); ?> pt-xxl pb-xxl" data-block="omg/tips">
    <div class="container">
        <div class="row">
            <div class="header">
                <div class="subheading"  data-aos="fade-down"><?=(!empty($subheading)) ? $subheading : ''?></div>
                <div class="heading" data-aos="fade-down" data-aos-delay="200">
                    <h1><?=(!empty($heading)) ? $heading : ''?></h1>
                </div>
            </div>
            <div class="grid" id="tips-accordion">
               <?php if($row['icon_top']) :?>
                <!-- icons -->
                    <div class="icon-top" data-aos="fade-down-right">
                        <img src="<?=$row['icon_top']['url'];?>" alt="<?=$row['icon_top']['alt'];?>">
                    </div>
                <?php endif; ?>
                <?php if($row['icon_mid']) :?>
                    <div class="icon-mid" data-aos="fade-top">
                        <img src="<?=$row['icon_mid']['url'];?>" alt="<?=$row['icon_mid']['alt'];?>">
                    </div>
                <?php endif; ?>
                <?php if($row['icon_bottom']) :?>
                    <div class="icon-bottom" data-aos="fade-top">
                        <!-- <img src="/wp-content/uploads/2024/07/8.png" alt=""> -->
                         <img src="<?=$row['icon_bottom']['url'];?>" alt="<?=$row['icon_bottom']['alt'];?>">
                    </div>
                <!-- eo icons -->
                <?php endif; ?>
                <?php if($row['items']) :?>
                <?php $element_attr =  'item_';?>
                <?php $item_id =  0;?>
                    <?php foreach($row['items'] as $item) :?>
                        <div class="item">
                            <div class="card">
                                <div class="icon">
                                    <!-- <img src="/wp-content/uploads/2024/07/check-done-01.svg" alt=""> -->
                                    <img src="<?=$item['icon']['url'];?>" alt="<?=$item['icon']['alt'];?>">
                                </div>
                                <div class="title">
                                    <span>
                                        <?=(!empty($item)) ? $item['heading'] : ''?>
                                    </span>
                                    <div class="toggle" data-target="<?=$element_attr.$item_id;?>">
                                        <img src="/wp-content/uploads/2024/07/chevron-down-1.svg" alt="">
                                    </div>
                                </div>
                                <div class="content" data-id="<?=$element_attr.$item_id;?>">
                                    <p><?= (!empty($item)) ? $item['content'] : ''?></p>
                                </div>
                            </div>
                        </div>
                        <?php $item_id++;?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="icon-bottom mobile-icon" data-aos="fade-top">
            <img src="<?=$row['icon_bottom']['url'];?>" alt="<?=$row['icon_bottom']['alt'];?>">
        </div>
    </div>
</section>