$(function(){
    $('#singleAddForm').validate({
        rules: {
            model: {
                required: true,
                minlength: 1,
                maxlength: 50,
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
});