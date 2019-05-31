$(function(){
    $.validator.addMethod("stringcheck", function (value) {
        return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
            && /[a-z]/.test(value) // has a lowercase letter
            && /\d/.test(value) // has a digit
    }, "Invalid Input"
    );

    $('#singleAddForm').validate({
        rules: {
            model: {
                required: true,
                minlength: 1,
                maxlength: 50,
                stringcheck: true,
            },
            details: {
                required: true,
                minlength: 1,
                maxlength: 255,
            },
            brand: {
                required: true,
                minlength: 1,
                maxlength: 50,
            },
            warranty_start: {
                required: true,
            },
            warranty_end: {
                required: true,
            },
            serial_no: {
                required: true,
                minlength: 1,
                maxlength: 50,
            },
            imei_or_macaddress: {
                required: false,
                maxlength: 50,
            },
            or_no: {
                required: true,
                minlength: 1,
                maxlength: 50,
            },
            supplier: {
                required: true,
                minlength: 1,
                maxlength: 50
            },
        },

        messages: {
            model: {
                required: 'Please fill out this field',
                minlength: 'Please fill out this field',
                maxlength: 'Maximum of 50 characters',
                stringcheck: 'Invalid input',
            },
            details: {
                required: 'Please fill out this field',
                minlength: 'Please fill out this field',
                maxlength: 'Maximum of 50 characters',

            },
            brand: {
                required: 'Please fill out this field',
                minlength: 'Please fill out this field',
                maxlength: 'Maximum of 50 characters',
            },
            type: {
                required: 'Please fill out this field',
                minlength: 'Please fill out this field',
                maxlength: 'Maximum of 50 characters',

            },
            warranty_start: {
                required: 'Please fill out this field',
                minlength: 'Please fill out this field',
                maxlength: 'Maximum of 50 characters',
            },
            warranty_end: {
                required: 'Please fill out this field',
                minlength: 'Please fill out this field',
                maxlength: 'Maximum of 50 characters',
                
            },
            serial_no: {
                required: 'Please fill out this field',
                minlength: 'Please fill out this field',
                maxlength: 'Maximum of 50 characters',
            },
            imei_or_macaddress: {
                maxlength: 'Maximum of 50 characters',
            },
            or_no: {
                required: 'Please fill out this field',
                minlength: 'Please fill out this field',
                maxlength: 'Maximum of 50 characters',
            },
            supplier: {
                required: 'Please fill out this field',
                minlength: 'Please fill out this field',
                maxlength: 'Maximum of 50 characters',
            }
        }
    })

    $('#addSystemUnitForm').validate({
        rules: {
            'unit[mac_address]': {
                // required: true,
                // minlength: 1,
                maxlength: 50,
            },
            'unit[supplier]': {
                required: true,
                minlength: 1,
                maxlength: 50,
            },
            'unit[or_no]': {
                required: true,
                minlength: 1,
                maxlength: 50,
            },
            'unit[warranty_start]': {
                required: true,
                // minlength: 1,
                // maxlength: 50,
            },
            'unit[warranty_end]': {
                required: true,
                // minlength: 1,
                // maxlength: 50,
            },
            'equipment[brand][]': {
                required: true,
                minlength: 1,
                maxlength: 50,
            },
            'equipment[model][]': {
                required: true,
                minlength: 1,
                maxlength: 50,
            },
            'equipment[serial_no][]': {
                required: true,
                minlength: 1,
                maxlength: 50,
            },

        },

        messages: {
            'unit[mac_address]': {
                // required: true,
                // minlength: 1,
                maxlength: 'Maximum of 50 characters',
            },
            'unit[supplier]': {
                required: 'Please fill out this field',
                minlength: 'Please fill out this field',
                maxlength: 'Maximum of 50 characters',
            },
            'unit[or_no]': {
                required: 'Please fill out this field',
                minlength: 'Please fill out this field',
                maxlength: 'Maximum of 50 characters',
            },
            'unit[warranty_start]': {
                required: 'Please fill out this field',
                // minlength: 1,
                // maxlength: 50,
            },
            'unit[warranty_end]': {
                required: 'Please fill out this field',
                // minlength: 1,
                // maxlength: 50,
            },
            'equipment[brand][]': {
                required: 'Please fill out this field',
                minlength: 'Please fill out this field',
                maxlength: 'Maximum of 50 characters',
            },
            'equipment[model][]': {
                required: 'Please fill out this field',
                minlength: 'Please fill out this field',
                maxlength: 'Maximum of 50 characters',
            },
            'equipment[serial_no][]': {
                required: 'Please fill out this field',
                minlength: 'Please fill out this field',
                maxlength: 'Maximum of 50 characters',
            },            
        },
    })    
});