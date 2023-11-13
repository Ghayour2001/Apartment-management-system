jQuery('#mform').validate({
  rules: {
    title: {
      required: true,
      minlength: 3,
    },
    date: {
      required: true,
    },
    amount: {
      required: true,
      number: true,
      min: 0.01,
    },
    location: {
      required: true,
      minlength: 3,
    },
  },
  messages: {
    title: {
      required: 'Please enter Maintenance Title',
      minlength: 'Maintenance Title should be at least 3 characters long',
    },
    date: 'Please select Maintenance Date',
    amount: {
      required: 'Please enter Maintenance Amount',
      number: 'Please enter a valid number',
      min: 'Please enter a value greater than 0',
    },
    location: {
      required: 'Please enter Maintenance Location',
      minlength: 'Maintenance Location should be at least 3 characters long',
    },
  },
  submitHandler: function (form) {
    form.submit()
  },
})
