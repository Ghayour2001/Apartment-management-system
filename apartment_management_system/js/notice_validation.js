jQuery('#notice_form').validate({
  rules: {
    n_title: {
      required: true,
      minlength: 3,
      maxlength: 50,
    },
    n_description: {
      required: true,
      minlength: 10,
      maxlength: 500,
    },
    n_designation: {
      required: true,
    },
    n_status: {
      required: true,
    },
  },
  messages: {
    n_title: {
      required: 'Please enter a Notice Title',
      minlength: 'Notice Title should be at least 3 characters long',
      maxlength: 'Notice Title should be at most 50 characters long',
    },
    n_description: {
      required: 'Please enter a Notice Description',
      minlength: 'Notice Description should be at least 10 characters long',
      maxlength: 'Notice Description should be at most 500 characters long',
    },
    n_designation: {
      required: 'Select a Notice Designation',
    },
    n_status: {
      required: 'Please select a Notice Status',
    },
  },
  submitHandler: function (form) {
    form.submit()
  },
})
