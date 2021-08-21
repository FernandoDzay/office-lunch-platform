
$("#register_form").validate({
    rules: {
        username: {
            required: true,
            minlength: 5,
            maxlength: 22
        },
        password: {
            required: true,
            minlength: 4,
            maxlength: 30
        }
    }
});
