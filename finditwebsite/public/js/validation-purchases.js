$('#singleAddForm').validate({
        rules: {
            
            model: {
                required: true,
                maxlength: 50,
                // stringcheck: true,
            },
            details: {
                required: true,
                maxlength: 255,
            },
            brand: {
                required: true,
                maxlength: 50,
            },
            imei_or_macaddress: {
                required: false,
                maxlength: 50,
            },
            purchase_no: {
                required: true,
                maxlength: 50,
            },
            supplier: {
                required: true,
                maxlength: 50
            },
        },

        messages: {
            model: {
                required: 'Please fill out this field',
                maxlength: 'Maximum of 50 characters',
                stringcheck: 'Invalid input',
            },
            details: {
                required: 'Please fill out this field',
                maxlength: 'Maximum of 50 characters',

            },
            brand: {
                required: 'Please fill out this field',
                maxlength: 'Maximum of 50 characters',
            },

            purchase_no: {
                required: 'Please fill out this field',
                maxlength: 'Maximum of 50 characters',
            },
            supplier: {
                required: 'Please fill out this field',
                maxlength: 'Maximum of 50 characters',
            }
        }
    })