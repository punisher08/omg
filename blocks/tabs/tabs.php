<?php
$id = '';
if ( ! empty( $block['anchor'] ) ):
	$id = 'id="' . $block['anchor'] . '"';
endif;
$class_name = 'tabs-block';
if ( ! empty( $block['className'] ) ):
	$class_name .= ' ' . $block['className'];
endif;
$tabs    = get_field( 'tabs' );

$tabs_title = array();
foreach($tabs as $tab){
    $tabs_title[] = $tab['title'];
}
?>
<section <?php echo $id; ?> class="tabs <?php echo esc_attr( $class_name ); ?> pt-xxl pb-xxl" data-block="omg/tabs">
    <div class="container">
        <div class="row custom-tabs">
            <div class="tabs-header hidden">
                <div class="flex">
                    <?php foreach($tabs_title as $key => $title):?> 
                        <?php $active = ($key == 0) ? 'active' : '';?>
                        <div data-tab="tab-content-<?=$key;?>" class="item <?=$active;?>" data-aos="fade-down">
                            <p><?=$title;?></p>
                        </div>
                    <?php endforeach;?>
                    <!-- <div data-tab="tab-1" class="item active" data-aos="fade-down">Home Removalists</div>
                    <div data-tab="tab-2" class="item" data-aos="fade-down" data-aos-delay="200">Home Removalists</div>
                    <div data-tab="tab-3" class="item "data-aos="fade-down" data-aos-delay="300">Home Removalists</div>
                    <div data-tab="tab-4" class="item" data-aos="fade-down" data-aos-delay="400">Home Removalists</div>
                    <div data-tab="tab-5" class="item" data-aos="fade-down" data-aos-delay="500">Home Removalists</div> -->
                </div>
            </div>
            <div class="tabs-content" data-aos="fade" data-aos-anchor=".tabs">
                <?php foreach($tabs as $key => $tab):?>
                    <?php $active = ($key == 0) ? 'active' : '';?>
                    <div class="tab <?=$active;?>"  data-tab="tab-content-<?=$key;?>">
                        <div class="grid">
                            <div class="item">
                                <div class="header">
                                    <div class="subheading"><?=$tab['subheading'];?></div>
                                    <div class="heading">
                                        <h1><?=$tab['title'];?></h1>
                                    </div>
                                </div>
                                <div class="content text">
                                    <p><?=$tab['content'];?></p>
                                </div>
                            </div>
                            <div class="item img-grp">
                                <div class="wysywig_content">
                                    <?php $image = $tab['image']['url']; ?>
                                    <img src="<?=$image;?>" alt="">
                                </div>
                                <div class="icon-bottom">
                                    <img src="/wp-content/uploads/2024/07/1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
               
            </div>
        </div>
    </div>
</section>