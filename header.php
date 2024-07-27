<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="stylesheet" href="https://use.typekit.net/ypm1xda.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    <?php wp_head(); ?>
    <?php

$header_fields = get_field('header', 'option');
$menu_location = $header_fields['menu'];
$logo = $header_fields['logo'];
$site_url = get_site_url();

// menu options
$menus = get_field('menus', 'option');

?>

<body <?php body_class(); ?>>
    <header class="desktop-header sticky-header">
        <div class="container">
            <div class="row">
                <div class="flex">
                    <div class="mobile-menu toggle-btn" id="mobile-menu">
                        <div class="logo s">
                            <a href="<?=$site_url;?>">
                                    <?php if($logo['desktop_logo']): ?>
                                        <img src="<?=$logo['desktop_logo']['url'];?>" alt="<?=$logo['alt'];?>">
                                    <?php endif; ?>
                            </a>
                        </div>
                        <div class="toggle-menu-icon">
                            <div class="open-icon open-menu">
                                <img src="/wp-content/uploads/2024/07/menu.svg" alt="">
                            </div>
                            <div class="close-icon toggle-btn hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14"
                                    fill="#000">
                                    <path d="M1 1L14 13" stroke="white" stroke-width="2" stroke-linecap="round">
                                    </path>
                                    <path d="M1 13L14 1" stroke="white" stroke-width="2" stroke-linecap="round">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="brand">
                        <div class="logo">
                            <a href="<?=$site_url;?>">
                                <?php if($logo['desktop_logo']): ?>
                                    <img src="<?=$logo['desktop_logo']['url'];?>" alt="<?=$logo['alt'];?>">
                                <?php endif; ?>
                            </a>
                        </div>
                    </div>
                    <!-- start of menu -->
                    <div class="menu">
                        <nav class="primary-menu desktop" id="menu">
                            <?php
                            $menu_location = 'main-nav';
                            $menu_object = wp_get_nav_menu_object(get_nav_menu_locations()[$menu_location]);
                            $menu_slug = $menu_object->slug;

                            if($menu_slug) {
                                ?>
                                <ul class="parent-menu-lists">
                                    <?php
                                    foreach(wp_get_nav_menu_items( $menu_slug ) as $menu_item) {
                                        $submenu = get_field('submenus', $menu_item);
                                        $submenu_title = get_field('submenu_title', $menu_item);
                                        $submenu_description = get_field('submenu_description', $menu_item);
                                        ?>
                                            <li id='menu-item-<?= $menu_item->ID ?>' class='menu-item flex-group menu-item-<?= $menu_item->ID ?> <?= $submenu ? ' menu-item-has-children': '' ?>'>
                                                <a href='<?= $menu_item->url ?>'><?= $menu_item->title ?></a>
                                                <?php
                                                    if($submenu):
                                                        ?>
                                                        <div class="submenu-container">
                                                            <div class="sub-menu">
                                                                <div class="_menu-header">
                                                                    <div class="title"><?= $submenu_title ?? ''?></div>
                                                                    <div class="_text"><?= $submenu_description ?? '' ?></div>
                                                                </div>
                                                            </div>
                                                            <div class="submenu-groups">
                                                                <?php
                                                                    if( have_rows('submenus', $menu_item) ):
                                                                        while (have_rows('submenus', $menu_item)) : the_row();
                                                                            ?>
                                                                            <div class="columns">
                                                                                <ul class="sub-menu-lists align-start">
                                                                                    <li>
                                                                                    <?php
                                                                                        if(get_sub_field('submenu_item_title')):
                                                                                            ?>
                                                                                            <a class="active-menu">
                                                                                                <?php echo get_sub_field('submenu_item_title') ?>
                                                                                            </a>
                                                                                            <?php
                                                                                        endif;

                                                                                    $submenu_items = wp_get_nav_menu_items(get_sub_field('submenu_item'));

                                                                                    $offset =  get_sub_field('submenu_item_title') ? 5 : 4;
                                                                                    $counter = 0;
                                                                                    ?>
                                                                                    <ul class="sub-menu font-normal <?= count($submenu_items) > $offset ? 'grid-cols-two' : ''; ?>">
                                                                                        <?php
                                                                                            foreach ($submenu_items as $index => $submenu_item):
                                                                                                if ($counter % $offset == 0) {
                                                                                                    echo '<div class="group">';
                                                                                                }
                                                                                                ?>
                                                                                                <li>
                                                                                                    <a href="<?= $submenu_item->url ?>"><?= $submenu_item->title ?></a>
                                                                                                </li>
                                                                                                <?php
                                                                                                $counter++;
                                                                                            
                                                                                                if ($counter % $offset == 0) {
                                                                                                    echo '</div>';
                                                                                                }
                                                                                            endforeach;
                                                                                            
                                                                                            if ($counter % $offset != 0) {
                                                                                                echo '</div>';
                                                                                            }
                                                                                            ?>
                                                                                    </ul>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <?php
                                                                        endwhile;
                                                                    endif;
                                                                ?>
                                                            </div>
                                                        </div>
                                                        
                                                        <?php
                                                    endif;
                                                ?>
                                            </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                                <?php
                            }
                            ?>

                            <div class="mobile-actions actions">
                                <ul>
                                    <li>
                                        <div class="quick-actions-group">
                                            <div class="">
                                                <a href="tel: 1300 609 117" class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21"
                                                        viewBox="0 0 20 21" fill="none">
                                                        <path
                                                            d="M11.7084 5.49984C12.5223 5.65864 13.2704 6.05672 13.8568 6.64312C14.4432 7.22952 14.8412 7.97756 15 8.7915M11.7084 2.1665C13.3994 2.35437 14.9764 3.11165 16.1802 4.31401C17.3841 5.51637 18.1434 7.09235 18.3334 8.78317M8.52253 12.0524C7.52121 11.0511 6.73055 9.91888 6.15056 8.71086C6.10067 8.60695 6.07572 8.555 6.05656 8.48926C5.98846 8.25563 6.03737 7.96875 6.17905 7.77089C6.21892 7.71521 6.26655 7.66758 6.36181 7.57232C6.65315 7.28098 6.79881 7.13531 6.89405 6.98883C7.25322 6.43642 7.25321 5.72427 6.89405 5.17186C6.79881 5.02538 6.65315 4.87971 6.36181 4.58837L6.19942 4.42598C5.75655 3.98311 5.53511 3.76168 5.2973 3.64139C4.82433 3.40217 4.26577 3.40217 3.79281 3.64139C3.55499 3.76168 3.33355 3.98311 2.89069 4.42598L2.75932 4.55735C2.31797 4.9987 2.09729 5.21937 1.92875 5.5194C1.74174 5.85232 1.60727 6.3694 1.60841 6.75125C1.60943 7.09537 1.67618 7.33056 1.80969 7.80093C2.52716 10.3288 3.88089 12.7141 5.87088 14.704C7.86086 16.694 10.2462 18.0478 12.774 18.7652C13.2444 18.8987 13.4795 18.9655 13.8237 18.9665C14.2055 18.9677 14.7226 18.8332 15.0555 18.6462C15.3555 18.4776 15.5762 18.257 16.0176 17.8156L16.1489 17.6842C16.5918 17.2414 16.8132 17.0199 16.9335 16.7821C17.1728 16.3091 17.1728 15.7506 16.9335 15.2776C16.8132 15.0398 16.5918 14.8184 16.1489 14.3755L15.9865 14.2131C15.6952 13.9218 15.5495 13.7761 15.4031 13.6809C14.8506 13.3217 14.1385 13.3217 13.5861 13.6809C13.4396 13.7761 13.2939 13.9218 13.0026 14.2131C12.9073 14.3084 12.8597 14.356 12.804 14.3959C12.6062 14.5375 12.3193 14.5865 12.0857 14.5184C12.0199 14.4992 11.968 14.4743 11.8641 14.4244C10.656 13.8444 9.52384 13.0537 8.52253 12.0524Z"
                                                            stroke="#57534E" stroke-width="1.66667" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                    <span><?=$header_fields['phone']['label'];?></span>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="<?=$header_fields['button']['url'];?>">
                                                    <button class="primary-button">
                                                        <span><?=$header_fields['button']['label'];?></span>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <!-- eo menu -->
                    <div class="desktop-actions actions">
                        <ul>
                            <li>
                                <div class="quick-actions-group">
                                    <div class="icon">
                                        <a href="tel: <?=$header_fields['phone']['label'];?>" class="icon">
                                           <img src="<?=$header_fields['phone']['icon']['url'];?>" alt="">
                                            <span><?=$header_fields['phone']['label'];?></span>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="<?=$header_fields['button']['url'];?>">
                                            <button class="primary-button">
                                                <span><?=$header_fields['button']['label'];?></span>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </header>

    <header class="mobile-header sticky-header">
        <div class="container">
            <div class="row">
                <nav class="mobile s">
                    <div class="brand">
                        <div class="mobile-menu toggle-btn" id="mobile-menu">
                            <div class="logo">
                                <a href="<?=$site_url;?>">
                                    <?php if($logo['mobile_logo']): ?>
                                        <img src="<?=$logo['mobile_logo']['url'];?>" alt="<?=$logo['alt'];?>">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="toggle-menu-icon">
                                <div class="close-icon close-menu">
                                    <img src="/wp-content/uploads/2024/07/menu.svg" alt="">
                                </div>
                                <div class="close-icon toggle-btn hidden">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14"
                                        fill="#000">
                                        <path d="M1 1L14 13" stroke="white" stroke-width="2" stroke-linecap="round">
                                        </path>
                                        <path d="M1 13L14 1" stroke="white" stroke-width="2" stroke-linecap="round">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>