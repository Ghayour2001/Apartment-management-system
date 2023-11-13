//validation for add_floor form
jQuery('#uform').validate({
  rules: {
    floor_no: 'required',
    unit_no: 'required',
    status: 'required',
  },
  messages: {
    floor_no: 'Please Select Floor No',
    unit_no: 'Please Enter Unit No',
    status: 'Please Select Status',
  },
  submitHandler: function (form) {
    form.submit()
  },
})
