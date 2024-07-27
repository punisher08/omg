<?php
$id = '';
if ( ! empty( $block['anchor'] ) ):
	$id = 'id="' . $block['anchor'] . '"';
endif;
$class_name = 'contact-block';
if ( ! empty( $block['className'] ) ):
	$class_name .= ' ' . $block['className'];
endif;
$column_1    = get_field( 'column_1' );
$column_2    = get_field( 'column_2' );

?>

<section <?php echo $id; ?> class="contact <?php echo esc_attr( $class_name ); ?> pt-xxl pb-xxl" data-block="omg/contact">
    <div class="container">
        <div class="row">
            <div class="grid">
                <div class="item">
                    <div class="header">
                        <div class="heading">
                            <h1><?=(!empty($column_1['heading'])) ? $column_1['heading'] : ''?></h1>
                        </div>
                        <div class="text">
                            <p><?=(!empty($column_1['text'])) ? $column_1['text'] : ''?></p>
                        </div>
                    </div>
                    <div class="body">
                        <?php if(!empty($column_1['lists'])): ?>
                        <ul>
                            <?php foreach($column_1['lists'] as $list): ?>
                            <li>
                                <div class="icon">
                                    <?php if(!empty($list['icon'])): ?>
                                        <img src="<?=$list['icon'];?>" alt="">
                                    <?php endif; ?>
                                    
                                </div>
                                <div class="content">
                                    <div class="title"><?=$list['heading'];?></div>
                                    <div class="description"><?=$list['text'];?></div>
                                    <div class="_inner_content">
                                        <?=$list['url'];?>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="item form">
                    <div class="background-shape" data-aos="fade-down" data-aos-delay="400" data-aos-anchor=".faq"></div>
                    <div class="card-container">
                        <div class="card">
                            <div class="header">
                                <div class="heading">
                                    <h1><?=(!empty($column_2['heading'])) ? $column_2['heading'] : ''?></h1>
                                </div>
                                <div class="text">
                                    <p><?=(!empty($column_2['text'])) ? $column_2['text'] : ''?></p>
                                </div>
                            </div>
                            <?php echo do_shortcode($column_2['form_shortcode']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>