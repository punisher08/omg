<?php
$id = '';
if ( ! empty( $block['anchor'] ) ):
	$id = 'id="' . $block['anchor'] . '"';
endif;
$class_name = 'banner-block';
if ( ! empty( $block['className'] ) ):
	$class_name .= ' ' . $block['className'];
endif;
$heading    = get_field( 'heading' );
$text    = get_field( 'text' );
$banner_image = get_field( 'banner_image' );
$cta = get_field( 'cta' );

$enable_cta_section = get_field( 'enable_cta_section' );
$quick_action_section = get_field( 'quick_action_section' );

$mobile_button = get_field('mobile_button');
?>

<section <?php echo $id; ?> class="banner <?php echo esc_attr( $class_name ); ?> pt-xxl pb-xxl" data-block="omg/banner">
    <div class="container">
        <div class="row">
            <div class="flex">
                <div class="item">
                    <div class="inner-content">
                        <div class="headline" data-aos="fade-down">
                            <h1><?=(!empty($heading)) ? $heading : '';?></h1>
                        </div>
                        <div class="_text" data-aos="fade-down" data-aos-delay="250" data-aos-anchor=".headline">
                            <?=(!empty($text)) ? $text : '';?>
                        </div>
                        <div class="btn-cta">
                            <a class="mobile-btn" href="<?=$mobile_button['url'];?>">
                                <button class="primary-button"><?=$mobile_button['label'];?></button>
                            </a>
                        </div>
                        <div class="_cta" data-aos="fade-left" data-aos-delay="500" data-aos-anchor=".headline">
                            <div>
                                <a href="<?=$cta['google_review_link'];?>" target="_blank">
                                    <button>
                                    <h1>Google Ranking</h1> 
                                        <div class="btn-content">
                                            <div class="google-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="37" height="37" viewBox="0 0 41 41">
                                                    <path fill="#4285F4" d="M37.7822 21.276C37.7822 19.9739 37.6654 18.7219 37.4483 17.52H20.1543V24.6313H30.0366C29.6026 26.9182 28.3005 28.8546 26.3474 30.1567V34.7807H32.3069C35.779 31.5756 37.7822 26.8682 37.7822 21.276Z"/>
                                            
                                                    <path fill="#34A853" d="M20.1543 39.2211C25.1122 39.2211 29.2688 37.5852 32.3069 34.7807L26.3475 30.1568C24.7116 31.2585 22.6249 31.9262 20.1543 31.9262C15.3801 31.9262 11.3237 28.7045 9.87139 24.3643H3.76172V29.1051C6.78317 35.0979 12.9763 39.2211 20.1543 39.2211Z"/>
                                                    <path fill="#FBBC05" d="M9.87145 24.3475C9.5042 23.2457 9.28719 22.0772 9.28719 20.8586C9.28719 19.64 9.5042 18.4715 9.87145 17.3697V12.6289H3.76178C2.5098 15.0995 1.79199 17.8872 1.79199 20.8586C1.79199 23.83 2.5098 26.6177 3.76178 29.0883L8.51931 25.3824L9.87145 24.3475Z"/>
                                                    <path fill="#EA4335" d="M20.1543 9.80791C22.8586 9.80791 25.2624 10.7427 27.1821 12.5456L32.4405 7.28726C29.2521 4.31588 25.1122 2.49634 20.1543 2.49634C12.9763 2.49634 6.78317 6.61953 3.76172 12.629L9.87139 17.3699C11.3237 13.0297 15.3801 9.80791 20.1543 9.80791Z"/>
                                                </svg>
                                            </div>
                                        
                                            <div class="text">
                                                <h1>5.0</h1>
                                            </div>
                                            <div class="rate-star">
                                                <?php for($i=0; $i < $cta['star_rating']; $i++):?>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 19 19">
                                                        <path fill="#FDCB08" d="M9.33 1.54c.24-.47.92-.47 1.15 0l1.93 3.87c.1.19.28.32.48.36l4.28.63c.52.08.73.71.35 1.09L14.43 10.52c-.15.15-.22.36-.18.56l.72 4.27c.09.52-.38.91-.85.69l-3.83-2c-.19-.1-.42-.1-.61 0l-3.83 2c-.47.22-1-.17-.91-.69l.72-4.27c.04-.2-.03-.41-.18-.56L2.29 7.49c-.38-.38-.17-1.01.35-1.09l4.28-.63c.2-.03.38-.17.48-.36L9.33 1.54z"/>
                                                    </svg>
                                                <?php endfor;?>
                                            </div>

                                        </div>
                                        <div class="see-all">
                                            <h1>
                                                See all our reviews
                                            </h1>
                                        </div>
                                    </button>
                                </a>
                            </div>
                            <div class="arr-text" data-aos="fade-left" data-aos-delay="750" data-aos-anchor=".headline">
                                <div class="arrow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" viewBox="0 0 150 150">
                                        <path fill="#FDCB08" d="M38.855 63.501V63.5h-.001z"/>
                                        <path fill="#FDCB08" d="M37.364 64.241c.443-.22.935-.465 1.491-.741.099-.482-.433-.436-1.026-.201-3.283 1.3-5.861 2.277-7.821 3.02-3.497 1.326-5.026 1.905-5.085 2.24-.016.096.206.323.555.265.789-.133 1.065-.165 1.331-.235.433-.114.84-.33 3.392-1.25 3.408-1.228 4.177-1.611 7.164-3.098z"/>
                                        <path fill="#FDCB08" d="M18.83 81.558c11.268 9.941 24.261 17.107 37.962 21.937 3.157 1.088 3.726-2.101 1.37-3.554-6.351-3.964-12.345-8.28-18.103-12.876 34.454 8.683 66.847 3.606 93.356-9.083 3.185-1.575.634-6.087-2.451-5.068-25.315 8.167-54.811 9.884-85.266 2.891 4.879-2.069 10.03-4.464 11.589-9.27.685-2.11-.739-4.65-3.17-5.075-4.54-.822-8.322.86-12.221 2.594-1.153.513-2.316 1.03-3.512 1.488-1.755.66-3.51 1.335-5.269 2.012-4.726 1.819-9.485 3.651-14.366 5.228-3.068.943-3.369 5.719.081 8.772z"/>
                                        <path fill="#FDCB08" d="M115.564 75.054c-1.251.233-2.358.441-3.356.629-6.736 1.268-8.469 1.594-15.891 2.112-2.926.204-4.568.356-5.601.452-.928.085-1.364.125-1.799.117-.386-.007-.772-.052-1.499-.137-.336-.04-.745-.088-1.261-.145-.722-.08-1.034-.654-.948-.835.303-.628 3.646-.917 11.29-1.58 4.289-.372 9.931-.861 17.15-1.592 1.305-.132 2.38.075 1.914.975z"/>
                                    </svg>
                                </div>
                                <div class="just-hear">
                                 
                                    <h4><?=($cta['headline']);?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="img-content" data-aos="fade-up-left" data-aos-anchor=".headline" data-aos-delay="350">
                        <div class="banner-background-shape"></div>
                        <div class="">
                            <?php if(!empty($banner_image)):?>
                                <img src="<?=($banner_image);?>" alt="banner_image">
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if($enable_cta_section == "1"):?>
    <section>
    <div class="_quick-action-section">
        <div class="container">
            <div class="row">
                <div class="flex" data-aos="fade-up" data-aos-anchor=".headline" data-aos-delay="500">
                    <div class="_headline"><?=($quick_action_section) ? $quick_action_section['headling'] : '';?></div>
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
<?php endif;?>

