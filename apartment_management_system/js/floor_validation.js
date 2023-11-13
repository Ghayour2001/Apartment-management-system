//validation for add_floor form
jQuery('#fform').validate({
  rules: {
    floor_no: 'required',
  },
  messages: {
    floor_no: 'Please Enter Floor No',
  },
  submitHandler: function (form) {
    form.submit()
  },
})
