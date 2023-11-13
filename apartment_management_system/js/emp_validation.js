//validation for add_floor form
jQuery('#emp').validate({
  rules: {
    emp_name: 'required',
    username: 'required',
    email: {
      required: true,
      email: true,
    },
    pre_address: 'required',
    per_address: 'required',
    designation: 'required',

    contact_no: {
      required: true,
      number: true,
      minlength: 11,
      maxlength: 11,
    },
    nid: {
      required: true,
      number: true,
      minlength: 13,
      maxlength: 13,
    },
    joining_date: 'required',
    password: {
      required: true,
      minlength: 4,
    },
  },
  messages: {
    emp_name: 'Please Enter Employee Name',
    username: 'Please Enter Employee Username',
    email: {
      required: 'Please Enter Email Address',
      email: 'Please Enter Valid Email Address',
    },
    pre_address: 'Please Enter Employee Present address',
    per_address: 'Please Enter Employee permanent address',
    contact_no: {
      required: 'Please Enter Phone Number',
      number: 'Please enter valid Phone Number',
      minlength: 'Please Enter Min 11 Digit',
      maxlength: 'Please Enter Max 11 Digit',
    },
    nid: {
      required: 'Please Enter NID Number',
      number: 'Please enter valid NID Number',
      minlength: 'NID Number Must Be 13 Digit',
      maxlength: 'Please Enter Max 13 Digit',
    },
    joining_date: 'Please Select Joining Date',
    designation: 'Please Select Employee Designation',
    password: {
      required: 'Please enter Employee password',
      minlength: 'Password must be 4 char long',
    },
  },
  submitHandler: function (form) {
    form.submit()
  },
})

jQuery.validator.addMthod('numericonly', function (value, element) {
  return /^[0-9]+$/.test(value)
})
