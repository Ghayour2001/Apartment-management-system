jQuery('#complaintForm').validate({
  rules: {
    c_title: {
      required: true,
      maxlength: 255,
    },
    c_date: 'required',
    c_description: {
      required: true,
      maxlength: 1000,
    },
  },
  messages: {
    c_title: {
      required: 'Please enter complaint title',
      maxlength: 'Complaint title cannot be more than 255 characters',
    },
    c_date: 'Please select complaint date',
    c_description: {
      required: 'Please enter complaint description',
      maxlength: 'Complaint description cannot be more than 1000 characters',
    },
  },
  submitHandler: function (form) {
    form.submit()
  },
})
