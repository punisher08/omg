<?php

$footer_fields = get_field('footer', 'option');
$column_1 = $footer_fields['column_1'];
$column_2 = $footer_fields['column_2'];
$column_3 = $footer_fields['column_3'];
$column_4 = $footer_fields['column_4'];
$copyright = $footer_fields['copyright'];

?>
<footer>
    <div class="container">
        <div class="row">
            <div class="grid grid-cols-4">
                <div class="item">
                    <div class="brand">
                        <a href="<?php echo home_url(); ?>">
                            <?php if(!empty($column_1['logo'])): ?>
                                <img src="<?php echo $column_1['logo']['url']; ?>" alt="">
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="company-information">
                        <?php if(!empty($column_1['contact_details'])): ?>
                        <ul class="_details" >
                            <?php foreach($column_1['contact_details'] as $contact): ?>
                            <li>
                                <div class="group">
                                    <div class="icon">
                                        <?php if(!empty($contact['icon'])): ?>
                                            <img src="<?php echo $contact['icon']; ?>" alt="">
                                        <?php endif; ?>
                                
                                    </div>
                                    <div>
                                        <a href="<?=$contact['link'];?>">
                                            <?=$contact['label'];?>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="item">
                    <div class="menu-collection">
                        <div class="title"><?=$column_2['label'];?></div>
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => $column_2['select_menu'],
                                'menu_class' => 'footer-menu',
                                'container' => '',
                            )
                        );
                        ?>
                    </div>
                </div>
                <div class="item">
                    <div class="menu-collection">
                    <div class="title"><?=$column_3['label'];?></div>
                    <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => $column_3['select_menu'],
                                'menu_class' => 'footer-menu',
                                'container' => '',
                            )
                        );
                        ?>
                    </div>
                </div>
                <div class="item last-child">
                    <div class="menu-collection">
                    <div class="title"><?=$column_4['label'];?></div>
                    <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => $column_4['select_menu'],
                                'menu_class' => 'footer-menu',
                                'container' => '',
                            )
                        );
                        ?>
                    </div>
                </div>
            </div>
            <!-- copyright -->
             <div class="copyright">
                <div class="grid">
                    <div class="item soc-med">
                        <?php if(!empty($copyright['social_media'])): ?>
                        <ul>
                            <?php foreach($copyright['social_media'] as $social): ?>
                            <li>
                                <a href="<?=$social['url'];?>" target="_blank">
                                    <?php if(!empty($social['icon'])): ?>
                                    <img src="<?php echo $social['icon']['url']; ?>" alt="">
                                    <?php endif; ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                    <div class="item text">
                        <p><?=$copyright['copyright_text'];?></p>
                    </div>
                </div>
             </div>
        </div>
    </div>
</footer>
<script>
    (function (n,r,l,d) {
        try {
            var h=r.head||r.getElementsByTagName("head")[0],s=r.createElement("script");
            s.id = "podium-widget"
            s.defer = true;
            s.async = true;
            s.setAttribute('data-organization-api-token', d)
            s.setAttribute("src",l);
            h.appendChild(s);
        } catch (e) {}
    })(window,document,"https://connect.podium.com/widget.js", '47ae5d94-a0f9-4300-9da3-670f4d02cad8');
</script>
<?php wp_footer(); ?>
</body>
</html>
