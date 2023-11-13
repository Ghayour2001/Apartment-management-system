jQuery('#admin_form').validate({
    rules: {
        name: 'required',
        email: {
            required: true,
            email: true,
        },
        password: {
            required: true,
            minlength: 4,
        },
        username: {
            required: true,
            minlength: 4,
            maxlength: 12,
        },
        contact_no: {
            required: true,
            minlength: 11,
            maxlength: 11,
        },
    },
    messages: {
        name: 'Required',
        email: 'Must be a valid email address',
        password: 'Password must be 4 char long',
        username: 'Must be between 4 and 12 characters long',
        contact_no: 'Must be 11 digit',
    },
    submitHandler: function(form) {
        form.submit()
    },
})