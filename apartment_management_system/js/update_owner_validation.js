//validation for add_floor form
jQuery('#uoform').validate({
  rules: {
    owner_name: 'required',
    owner_username: 'required',
    email: {
      required: true,
      email: true,
    },
    contact_no: {
      required: true,
      number: true,
      minlength: 11,
      maxlength: 11,
    },
    present_address: 'required',
    cnic: {
      required: true,
      number: true,
      minlength: 13,
      maxlength: 13,
    },
    password: {
      required: true,
      minlength: 4,
    },
    status: 'required',
  },
  messages: {
    owner_name: 'Please Enter Owner Name',
    owner_username: 'Please Enter Owner Username',
    email: {
      required: 'Please Enter Email Address',
      email: 'Please Enter Valid Email Address',
    },
    contact_no: {
      required: 'Please Enter Phone Number',
      number: 'Please enter valid Phone Number',
      minlength: 'Please Enter Min 11 Digit',
      maxlength: 'Please Enter Max 11 Digit',
    },
    present_address: 'Please Enter Present Address',
    cnic: {
      required: 'Please Enter CNIC Number',
      number: 'Please enter valid CNIC Number',
      minlength: 'CNiC Number Must Be 13 Digit',
      maxlength: 'Please Enter Max 13 Digit',
    },
    password: {
      required: 'Please enter your password',
      minlength: 'Password must be 4 char long',
    },
    status: 'Select Owner status',
  },
  submitHandler: function (form) {
    form.submit()
  },
})

jQuery.validator.addMthod('numericonly', function (value, element) {
  return /^[0-9]+$/.test(value)
})
