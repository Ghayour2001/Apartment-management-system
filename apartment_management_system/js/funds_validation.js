jQuery('#funds_form').validate({
  rules: {
    owner_id: {
      required: true,
    },
    month_id: {
      required: true,
    },
    xyear: {
      required: true,
    },
    f_date: {
      required: true,
    },
    total_amount: {
      required: true,
      number: true,
      min: 0.01,
    },
    purpose: {
      required: true,
      minlength: 3,
    },
  },
  messages: {
    owner_id: {
      required: 'Please select Owner',
    },
    month_id: {
      required: 'Please select Month',
    },
    xyear: {
      required: 'Please select Year',
    },
    f_date: 'Please select Fund Date',
    total_amount: {
      required: 'Please enter Total Amount',
      number: 'Please enter a valid number',
      min: 'Please enter a value greater than 0',
    },
    purpose: {
      required: 'Please enter Purpose',
      minlength: 'Purpose should be at least 3 characters long',
    },
  },
  submitHandler: function (form) {
    form.submit()
  },
})
