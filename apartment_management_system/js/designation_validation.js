//validation for add_floor form
jQuery('#dform').validate({
  rules: {
    designation: 'required',
  },
  messages: {
    designation: 'Please Enter Employee Designation',
  },
  submitHandler: function (form) {
    form.submit()
  },
})
