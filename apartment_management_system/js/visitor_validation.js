jQuery('#visitor').validate({
  rules: {
    visitor_name: {
      required: true,
    },
    address: {
      required: true,
    },
    mobile: {
      required: true,
      number: true,
    },
    entry_date: {
      required: true,
    },
    floor_no: {
      required: true,
    },
    unit_no: {
      required: true,
    },
    in_time: {
      required: true,
    },
    out_time: {
      required: true,
    },
  },
  messages: {
    visitor_name: {
      required: 'Please enter visitor name',
    },
    address: {
      required: 'Please enter address',
    },
    mobile: {
      required: 'Please enter mobile number',
      number: 'Please enter a valid number',
    },
    entry_date: {
      required: 'Please select entry date',
    },
    floor_no: {
      required: 'Please select floor number',
    },
    unit_no: {
      required: 'Please select unit number',
    },
    in_time: {
      required: 'Please select in time',
    },
    out_time: {
      required: 'Please select out time',
    },
  },
  submitHandler: function (form) {
    form.submit()
  },
})
