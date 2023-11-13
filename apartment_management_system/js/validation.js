jQuery('#frm').validate({
  rules: {
    username: 'required',
    password: {
      required: true,
      minlength: 4,
    },
    designation: 'required',
  },
  messages: {
    username: 'Please enter Username',
    password: {
      required: 'Please enter your password',
      minlength: 'Password must be 4 char long',
    },
    designation: 'Please select correct designation',
  },
  submitHandler: function (form) {
    form.submit()
  },
})
