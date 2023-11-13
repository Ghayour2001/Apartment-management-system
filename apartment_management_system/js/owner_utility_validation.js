jQuery('#owner_utility').validate({
  rules: {
    floor_no: 'required',
    owner_name: 'required',
    issue_date: 'required',
    month: 'required',
    xyear: 'required',
  },
  messages: {
    floor_no: 'Please Select Floor',
    owner_name: 'Please Select Owner Name',
    issue_date: 'Please Enter Issue Date',
    month: 'Please Select Rent Month',
    xyear: 'Please Select Year',
  },
  submitHandler: function (form) {
    form.submit()
  },
})
