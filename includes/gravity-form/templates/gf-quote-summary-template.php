<div class="quote-summary-block">
    <div class="row move-details">
        <div class="move-details-header">
            <h3 class="title">Move Details</h3>
            <span class="modify-icon" onclick="jQuery('gform_target_page_number_8').val('1');  jQuery('gform_8').trigger('submit',[true]); " onkeypress="if( event.keyCode == 13 ){ jQuery('gform_target_page_number_8').val('1');  jQuery('gform_8').trigger('submit',[true]); } "></span>
        </div>
        <div class="pickup-and-delivery">
            <h3>Pickup & Delivery</h3>
            <div class="container">
                <div class="left-section">
                    <div class="dot"></div>
                    <div class="dotted-line-container">
                        <div class="dotted-line"></div>
                    </div>
                    <div class="empty-dot-container">
                        <div class="empty-dot"></div>
                    </div>
                </div>
                <div class="right-section">
                    <?php if ( $data['summary_data']['moving_from'] ) : ?>
                        <div class="address-block">
                            <div class="address"> <?= $data['summary_data']['moving_from'] ?> </div>
                        </div>
                    <?php endif; ?>
                    <div class="property-details">
                        <div class="detail">
                            <?php if ( $data['summary_data']['type_of_property'] ) : ?>
                                <div class="label">Property Type</div>
                                <div class="value-container">
                                    <div class="value"> <?= $data['summary_data']['type_of_property'] ?> </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if ( $data['summary_data']['moving_to'] ) : ?>
                        <div class="address-block">
                            <div class="address"> <?= $data['summary_data']['moving_to'] ?> </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php if ( $data['summary_data']['date_of_move'] ) : ?>
            <div class="date-of-move">
                <h3 class="label">Date of Move</h3>
            <span class="form-answer"> <?= $data['summary_data']['date_of_move'] ?> </span>
        </div>
        <?php endif; ?>
        <?php if ( $data['summary_data']['extra_service_packing'] || $data['summary_data']['extra_service_unpacking'] || $data['summary_data']['extra_service_storage'] || $data['summary_data']['extra_service_site_visit'] || $data['summary_data']['extra_service_cleaning'] ) : ?>
            <div class="extra-services">
                <h3 class="label">Extra Services</h3>
                <div class="extra-service-answer">
                    <?php if ( $data['summary_data']['extra_service_packing'] ) : ?>
                        <span class="form-answer"> <?= $data['summary_data']['extra_service_packing'] ?> </span>
                    <?php endif; ?>
                    <?php if ( $data['summary_data']['extra_service_unpacking'] ) : ?>
                        <span class="form-answer"> <?= $data['summary_data']['extra_service_unpacking'] ?> </span>
                    <?php endif; ?>
                    <?php if ( $data['summary_data']['extra_service_storage'] ) : ?>
                        <span class="form-answer"> <?= $data['summary_data']['extra_service_storage'] ?> </span>
                    <?php endif; ?>
                    <?php if ( $data['summary_data']['extra_service_site_visit'] ) : ?>
                        <span class="form-answer"> <?= $data['summary_data']['extra_service_site_visit'] ?> </span>
                    <?php endif; ?>
                    <?php if ( $data['summary_data']['extra_service_cleaning'] ) : ?>
                        <span class="form-answer"> <?= $data['summary_data']['extra_service_cleaning'] ?> </span>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="line-break"></div>
    <div class="row freight-calculation">
        <div class="freight-calculation-header">
            <h3 class="title">Freight Calculation</h3>
            <span class="modify-icon" onclick="jQuery('gform_target_page_number_8').val('2');  jQuery('gform_8').trigger('submit',[true]); " onkeypress="if( event.keyCode == 13 ){ jQuery('gform_target_page_number_8').val('2');  jQuery('gform_8').trigger('submit',[true]); } "></span>
        </div>
        <?php if ( $data['summary_data']['freight_calculation'] ) : ?>
            <div class="calculation">
                <h3 class="label">Calculation</h3>
                <div class="calculation-answer">
                    <?php if ( $data['summary_data']['freight_calculation'] === 'Number of bedrooms' ) : ?>
                        <span class="form-answer">per bedroom</span>
                    <?php elseif ( $data['summary_data']['freight_calculation'] === 'Inventory Calculator' ) : ?>
                        <span class="form-answer">by inventory</span>
                    <?php endif; ?>

                </div>
            </div>
            <?php if ( $data['summary_data']['freight_calculation'] === 'Number of bedrooms' && $data['summary_data']['amount_of_rooms'] ) : ?>
                <div class="amount-of-rooms">
                    <h3 class="label">Number of bedrooms</h3>
                    <div class="amount-of-rooms-answer">
                        <span class="form-answer"><?= $data['summary_data']['amount_of_rooms'] ?> Bedrooms</span>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ( $data['summary_data']['freight_calculation'] === 'Inventory Calculator' ) : ?>
                <div class="row inventory">
                    asd
                    <?php foreach ($data['inventory_calculator'] as $type => $items) : ?>
                        <?php
                            // Calculate the total count for items
                            $total = 0;

                            foreach ($items as $quantity) {
                                if ($quantity > 0) { // Only add non-zero quantities
                                    $total += $quantity;
                                }
                            }

                            $total_count = $total;
                        ?>

                        <?php if ($total_count > 0) : // Only display if there is a total count ?>
                            <div class="inventory-header">
                                <h3 class="inventory-parent"><?= htmlspecialchars($type) ?></h3>
                                <span class="quantity"><?= htmlspecialchars($total_count) ?></span>
                            </div>

                            <?php foreach ($items as $item_name => $quantity) : ?>
                                <?php if ($quantity > 0) : // Only display items with a non-zero quantity ?>
                                    <div class="inventory-item">
                                        <h4 class="inventory-child"><?= htmlspecialchars($item_name) ?></h4>
                                        <span class="quantity"><?= htmlspecialchars($quantity) ?></span>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="line-break"></div>
    <div class="row your-details">
        <div class="your-details-header">
            <h3 class="title">Your Details</h3>
            <span class="modify-icon" onclick="jQuery('gform_target_page_number_8').val('3');  jQuery('gform_8').trigger('submit',[true]); " onkeypress="if( event.keyCode == 13 ){ jQuery('gform_target_page_number_8').val('3');  jQuery('gform_8').trigger('submit',[true]); } "></span>
        </div>
        <div class="your-details-answer">
            <?php if ( $data['summary_data']['first_name'] || $data['summary_data']['last_name'] ) : ?>
                <div class="name">
                    <h3 class="label">Name</h3>
                    <span class="answer"><?= $data['summary_data']['first_name'] ?> <?= $data['summary_data']['last_name'] ?></span>
                </div>
            <?php endif; ?>
            <?php if ( $data['summary_data']['phone_number'] ): ?>
                <div class="phone">
                    <h3 class="label">Phone</h3>
                    <span class="answer"><?= $data['summary_data']['phone_number'] ?></span>
                </div>
            <?php endif; ?>
            <?php if ( $data['summary_data']['email'] ): ?>
                <div class="email">
                    <h3 class="label">Email</h3>
                    <span class="answer"><?= $data['summary_data']['email'] ?></span>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
