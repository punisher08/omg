jQuery(document).ready(function ($) {
    if ($('#gform_page_8_1').css('display') === 'block') {
        $('.move-details').attr('style', 'display: flex !important');
    } else if ($('#gform_page_8_2').css('display') === 'block') {
        $('.move-details').attr('style', 'display: flex !important');
        $('.freight-calculation').attr('style', 'display: flex !important');
    } else if ($('#gform_page_8_3').css('display') === 'block') {
        $('.move-details').attr('style', 'display: flex !important');
        $('.freight-calculation').attr('style', 'display: flex !important');
        $('.your-details').attr('style', 'display: block !important');
    }

    var movingFromValue = $('#input_8_7');
    var movingToValue = $('#input_8_8');
    var propertyTypeValue = $('#input_8_9');
    var dateOfMoveValue = $('#input_8_10');
    var extraServicesPackingValue = $('#choice_8_12_1');
    var extraServicesUnpackingValue = $('#choice_8_12_2');
    var extraServicesStorageValue = $('#choice_8_12_3');
    var extraServicesSiteVisitValue = $('#choice_8_12_4');
    var extraServicesCleaningValue = $('#choice_8_12_5');
    var amountOfRoomsValue = $('#input_8_18');
    var firstNameValue = $('#input_8_26_3');
    var lastNameValue = $('#input_8_26_6');
    var emailValue = $('#input_8_27');
    var phoneNumberValue = $('#input_8_31');

    function updateMovingFrom() {
        $('#moving-from').text(movingFromValue.val());

        if (movingFromValue.val() === '' && movingToValue.val() === '') {
            $('.pickup-and-delivery').hide();
        } else {
            $('.pickup-and-delivery').show();
        }
    }

    function updateMovingTo() {
        $('#moving-to').text(movingToValue.val());

        if (movingFromValue.val() === '' && movingToValue.val() === '') {
            $('.pickup-and-delivery').hide();
        } else {
            $('.pickup-and-delivery').show();
        }
    }

    function updatePropertyType() {
        if (propertyTypeValue.val() === '') {
            $('.detail.property-type').hide();
        } else {
            $('.detail.property-type').show();
            $('#property-type').text(propertyTypeValue.val());
        }
    }

    function updateDateOfMove() {
        if (dateOfMoveValue.val() === '') {
            $('.date-of-move.line-break').hide();
            $('.date-of-move').hide();
        } else {
            $('.date-of-move.line-break').show();
            $('.date-of-move').show();
            $('#date-of-move').text(dateOfMoveValue.val());
        }
    }

    function updateFreightCalculation() {
        var freightCalculationValue = $('#input_8_32 input:checked');

        if (freightCalculationValue.val() === 'Number of bedrooms') {
            $('#by-rooms').show();
            $('#by-inventory').hide();
            $('.calculation').show();
            $('.row.inventory').empty().hide();
        } else if (freightCalculationValue.val() === 'Inventory Calculator') {
            $('#by-rooms').hide();
            $('#by-inventory').show();
            $('.calculation').show();
            $('.row.inventory').show();
        } else {
            $('.calculation').hide();
        }
    }

    function updateExtraServicesPacking() {
        if (
            !extraServicesPackingValue.is(':checked') &&
            !extraServicesUnpackingValue.is(':checked') &&
            !extraServicesStorageValue.is(':checked') &&
            !extraServicesSiteVisitValue.is(':checked') &&
            !extraServicesCleaningValue.is(':checked')
        ) {
            $('.extra-services.line-break').hide();
            $('.extra-services').hide();
        } else {
            $('.extra-services.line-break').show();
            $('.extra-services').show();
        }

        if (extraServicesPackingValue.is(':checked')) {
            $('#packing').show();
        } else {
            $('#packing').hide();
        }
    }

    function updateExtraServicesUnpacking() {
        if (
            !extraServicesPackingValue.is(':checked') &&
            !extraServicesUnpackingValue.is(':checked') &&
            !extraServicesStorageValue.is(':checked') &&
            !extraServicesSiteVisitValue.is(':checked') &&
            !extraServicesCleaningValue.is(':checked')
        ) {
            $('.extra-services.line-break').hide();
            $('.extra-services').hide();
        } else {
            $('.extra-services.line-break').show();
            $('.extra-services').show();
        }

        if (extraServicesUnpackingValue.is(':checked')) {
            $('#unpacking').show();
        } else {
            $('#unpacking').hide();
        }
    }

    function updateExtraServicesStorage() {
        if (
            !extraServicesPackingValue.is(':checked') &&
            !extraServicesUnpackingValue.is(':checked') &&
            !extraServicesStorageValue.is(':checked') &&
            !extraServicesSiteVisitValue.is(':checked') &&
            !extraServicesCleaningValue.is(':checked')
        ) {
            $('.extra-services.line-break').hide();
            $('.extra-services').hide();
        } else {
            $('.extra-services.line-break').show();
            $('.extra-services').show();
        }

        if (extraServicesStorageValue.is(':checked')) {
            $('#storage').show();
        } else {
            $('#storage').hide();
        }
    }

    function updateExtraServicesSiteVisit() {
        if (
            !extraServicesPackingValue.is(':checked') &&
            !extraServicesUnpackingValue.is(':checked') &&
            !extraServicesStorageValue.is(':checked') &&
            !extraServicesSiteVisitValue.is(':checked') &&
            !extraServicesCleaningValue.is(':checked')
        ) {
            $('.extra-services.line-break').hide();
            $('.extra-services').hide();
        } else {
            $('.extra-services.line-break').show();
            $('.extra-services').show();
        }

        if (extraServicesSiteVisitValue.is(':checked')) {
            $('#site_visit').show();
        } else {
            $('#site_visit').hide();
        }
    }

    function updateExtraServicesCleaning() {
        if (
            !extraServicesPackingValue.is(':checked') &&
            !extraServicesUnpackingValue.is(':checked') &&
            !extraServicesStorageValue.is(':checked') &&
            !extraServicesSiteVisitValue.is(':checked') &&
            !extraServicesCleaningValue.is(':checked')
        ) {
            $('.extra-services.line-break').hide();
            $('.extra-services').hide();
        } else {
            $('.extra-services.line-break').show();
            $('.extra-services').show();
        }

        if (extraServicesCleaningValue.is(':checked')) {
            $('#cleaning').show();
        } else {
            $('#cleaning').hide();
        }
    }

    function updateAmountOfRooms() {
        if (amountOfRoomsValue.val() === '') {
            $('.amount-of-rooms').hide();
        } else {
            $('.amount-of-rooms').show();
            $('#rooms').text(amountOfRoomsValue.val() + ' Bedrooms');
        }
    }

    function updateFirstNameValue() {
        $('#first-name').text(firstNameValue.val());

        if (firstNameValue.val() === '' && lastNameValue.val() === '') {
            $('.name').hide();
        } else {
            $('.name').show();
        }
    }

    function updateLastNameValue() {
        $('#last-name').text(lastNameValue.val());

        if (firstNameValue.val() === '' && lastNameValue.val() === '') {
            $('.name').hide();
        } else {
            $('.name').show();
        }
    }

    function updateEmailValue() {
        if (emailValue.val() === '') {
            $('.email').hide();
        } else {
            $('.email').show();
            $('#email').text(emailValue.val());
        }
    }

    function updatePhoneNumberValue() {
        if (phoneNumberValue.val() === '') {
            $('.phone').hide();
        } else {
            $('.phone').show();
            $('#phone').text(phoneNumberValue.val());
        }
    }

    function updateRequiredFields() {
        var $firstNameLabel = $('label[for="input_8_26_3"]');
        var $secondNameLabel = $('label[for="input_8_26_6"]');

        var $firstNameSpan = $('<span class="gfield_required gfield_required_asterisk" style="font-size: 16px;">&nbsp;*</span>');
        var $secondNameSpan = $('<span class="gfield_required gfield_required_asterisk" style="font-size: 16px;">&nbsp;*</span>');

        $firstNameLabel.append($firstNameSpan);
        $secondNameLabel.append($secondNameSpan);
    }

    updateMovingFrom();
    updateMovingTo();
    updatePropertyType();
    updateDateOfMove();
    updateFreightCalculation();
    updateExtraServicesPacking();
    updateExtraServicesUnpacking();
    updateExtraServicesStorage();
    updateExtraServicesSiteVisit();
    updateExtraServicesCleaning();
    updateAmountOfRooms();
    updateFirstNameValue();
    updateLastNameValue();
    updateEmailValue();
    updatePhoneNumberValue();
    updateRequiredFields();

    movingFromValue.on('blur input', updateMovingFrom);
    movingToValue.on('blur input', updateMovingTo);
    propertyTypeValue.on('change', updatePropertyType);
    dateOfMoveValue.on('change', updateDateOfMove);
    extraServicesPackingValue.on('change click', updateExtraServicesPacking);
    extraServicesUnpackingValue.on('change click', updateExtraServicesUnpacking);
    extraServicesStorageValue.on('change click', updateExtraServicesStorage);
    extraServicesSiteVisitValue.on('change click', updateExtraServicesSiteVisit);
    extraServicesCleaningValue.on('change click', updateExtraServicesCleaning);
    $('#input_8_32').on('change', updateFreightCalculation);
    amountOfRoomsValue.on('change', updateAmountOfRooms);
    firstNameValue.on('blur input', updateFirstNameValue);
    lastNameValue.on('blur input', updateLastNameValue);
    emailValue.on('blur input', updateEmailValue);
    phoneNumberValue.on('blur input', updatePhoneNumberValue);
});
