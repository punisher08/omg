jQuery(document).ready(function($) {
    $('.gfield_repeater_wrapper .gform_page_footer, .gfield_repeater_wrapper .gfield_repeater_buttons').remove();

    // Create tabs container with empty lists for tab titles and content
    var $inventoryTabs = $('<div class="inventory-tabs">' +
        '<ul class="tab-titles"></ul>' +
        '<div class="tab-content"></div>' +
    '</div>');

    // Insert the new div before the '.gfield_repeater_container'
    $('.gfield_repeater_container').before($inventoryTabs);

    // Iterate over each '.gfield_repeater_item' to create tabs
    $('.gfield_repeater_wrapper .gfield_repeater_item, .gfield_repeater_wrapper .gform_page').each(function(index) {
        var $item = $(this);
        var tabTitle = $item.find('.gsection_title').text() || 'Tab ' + (index + 1); // Default title if none is found
        var tabId = 'tab-' + index;

        // Create tab title and append to the tab-titles list
        var $tabTitle = $('<li class="tab-title"></li>').text(tabTitle).attr('data-tab', tabId);
        $inventoryTabs.find('.tab-titles').append($tabTitle);

        // Create tab content and append to the tab-content section
        var $tabContent = $('<div class="tab-pane"></div>').attr('id', tabId);
        $tabContent.append($item.contents()); // Use .contents() to preserve the inner HTML structure
        $inventoryTabs.find('.tab-content').append($tabContent);
    });

    // Set the first tab as active
    $('.tab-title:first').addClass('active');
    $('.tab-pane:first').addClass('active');

    // Function to update tab titles with the total value of a specific input
    function updateTabTitles() {
        $('.tab-pane').each(function() {
            var $tabPane = $(this);
            var tabId = $tabPane.attr('id');
            var totalValue = 0;

            // Find the specific input field and sum its values
            $tabPane.find('input[type="number"]').each(function() {
                var value = parseFloat($(this).val()) || 0;
                totalValue += value;
            });

            var $tabTitle = $('.tab-title[data-tab="' + tabId + '"]');
            var currentTitle = $tabTitle.text().split(' (')[0]; // Remove old total if any

            // Update title with total value only if it's greater than 0
            if (totalValue > 0) {
                $tabTitle.text(currentTitle + ' (' + totalValue + ')'); // Update title with total value
            } else {
                $tabTitle.text(currentTitle); // Remove total value from title if 0
            }
        });
    }

    // Initial call to update tab titles
    updateTabTitles();

    // Tab click event
    $('.tab-title').click(function() {
        var tabId = $(this).data('tab');

        // Remove active class from all tab titles and panes
        $('.tab-title').removeClass('active');
        $('.tab-pane').removeClass('active');

        // Add active class to the clicked tab and its corresponding pane
        $(this).addClass('active');
        $('#' + tabId).addClass('active');
    });

    // Function to create and insert span elements next to each input field
    $('.ginput_container_number').each(function() {
        var $container = $(this);
        var $input = $container.find('input');
        var value = parseFloat($input.val()) || 0;

        // Create the span elements
        var $decrementSpan = $('<span class="decrement" style="cursor: pointer; margin-right: 5px; display: none;">-</span>');
        var $incrementSpan = $('<span class="increment" style="cursor: pointer; margin-left: 5px;">+</span>');

        // Insert the spans into the container
        $container.prepend($decrementSpan).append($incrementSpan);

        // Show or hide the decrement span based on the input value
        if (value > 0) {
            $decrementSpan.show();
        }
    });

    // Remove first and last .gfield_repeater_cell in each tab-pane
    $('.tab-pane').each(function() {
        var $tabPane = $(this);

        // Check if there are any .gfield_repeater_cell elements
        var $gfieldRepeaterCells = $tabPane.find('.gfield_repeater_cell');

        if ($gfieldRepeaterCells.length > 0) {
            // Remove the first .gfield_repeater_cell
            $gfieldRepeaterCells.first().remove();

            // Re-find the .gfield_repeater_cell elements after removal
            $gfieldRepeaterCells = $tabPane.find('.gfield_repeater_cell');

            // Remove the last .gfield_repeater_cell
            $gfieldRepeaterCells.last().remove();
        }
    });

    $('.gfield_repeater_wrapper .top_label').remove();

    function updateInventory() {
        // Clear previous inventory content
        $('.row.inventory').empty();

        // Iterate over each tab title
        $('.tab-title').each(function() {
            var tabId = $(this).data('tab');
            var tabTitle = $(this).text().split(' (')[0];
            var sectionTotal = 0;

            // Find the tab pane
            var $tabPane = $('#' + tabId);
            var inventoryHtml = `
                <div class="inventory">
                    <div class="inventory-header">
                        <h3 class="inventory-parent">${tabTitle}</h3>
                        <span class="quantity">0</span> <!-- Placeholder for total value -->
                    </div>`;

            // Initialize a variable to track the total quantity for this inventory section
            var hasItems = false;

            $tabPane.find('.gfield_repeater_cell').each(function() {
                var $cell = $(this);
                var itemLabel = $cell.find('label').text();
                var itemValue = parseFloat($cell.find('input').val()) || 0;

                if (itemValue > 0) {
                    hasItems = true;
                    sectionTotal += itemValue; // Update the total for the section

                    inventoryHtml += `
                        <div class="inventory-item">
                            <h4 class="inventory-child">${itemLabel}</h4>
                            <span class="quantity">${itemValue}</span>
                        </div>`;
                }
            });

            // Only append the inventory HTML if there are items with a quantity greater than 0
            if (hasItems) {
                // Update the total quantity for the inventory header
                inventoryHtml = inventoryHtml.replace('0', sectionTotal);
                inventoryHtml += '</div>';
                $('.row.inventory').append(inventoryHtml);
            }
        });
    }

    // Initial call to update inventory
    updateInventory();

    // Function to handle quantity changes (increment or decrement)
    function handleQuantityChange($input, increment) {
        var value = parseFloat($input.val()) || 0;
        value = increment ? value + 1 : (value > 0 ? value - 1 : 0);
        $input.val(value > 0 ? value : '').trigger('input');

        // Show or hide the decrement span based on the new value
        $input.siblings('.decrement').toggle(value > 0);

        updateTabTitles(); // Update tab titles whenever the value changes
    }

    // Event listener for changes in input fields to update inventory
    $(document).on('input', 'input[type="number"]', function() {
        updateInventory();
    });

    // Event listener for increment controls
    $(document).on('click', '.increment', function() {
        var $input = $(this).siblings('input');
        handleQuantityChange($input, true);
    });

    // Event listener for decrement controls
    $(document).on('click', '.decrement', function() {
        var $input = $(this).siblings('input');
        handleQuantityChange($input, false);
    });

    // Event listener to reset inventory when radio button is clicked
    $(document).on('change', 'input[name="input_32"]', function() {
        // Reset values of all number inputs to empty
        $('input[type="number"]').val('').trigger('input');

        // Hide all decrement spans
        $('.decrement').hide();

        // Update tab titles and inventory
        updateTabTitles();
        updateInventory();
    });
});
