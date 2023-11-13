//validation for add_floor form
jQuery('#tenantform').validate({
  rules: {
    tenant_name: 'required',
    username: 'required',
    email: {
      required: true,
      email: true,
    },
    address: 'required',
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
    floor_no: 'required',
    year: 'required',
    month: 'required',
    rent_per_month: 'required',
    advance_rent: 'required',
    unit_no: 'required',
    issue_date: 'required',
    password: {
      required: true,
      minlength: 4,
    },
    image: 'required',
    status: 'required',
  },
  messages: {
    tenant_name: 'Please Enter Tenant Name',
    username: 'Please Enter Tenant Username',
    email: {
      required: 'Please Enter Email Address',
      email: 'Please Enter Valid Email Address',
    },
    address: 'Please Enter Address',
    contact_no: {
      required: 'Please Enter Phone Number',
      number: 'Please enter valid Phone Number',
      minlength: 'Please Enter Min 11 Digit',
      maxlength: 'Please Enter Max 11 Digit',
    },
    nid: {
      required: 'Please Enter CNIC Number',
      number: 'Please enter valid CNIC Number',
      minlength: 'CNiC Number Must Be 13 Digit',
      maxlength: 'Please Enter Max 13 Digit',
    },
    floor_no: 'Please Select Floor',
    year: 'Please Select Year',
    month: 'Please Select Month',
    rent_per_month: 'Please Enter Rent Per Month',
    advance_rent: 'Please Enter Advance Rent',
    unit_no: 'Please Select Unit No',
    issue_date: 'Please Select Date',
    password: {
      required: 'Please enter your password',
      minlength: 'Password must be 4 char long',
    },
    image: 'Select Image',
    status: 'Select Tenant status',
  },
  submitHandler: function (form) {
    form.submit()
  },
})

jQuery.validator.addMthod('numericonly', function (value, element) {
  return /^[0-9]+$/.test(value)
})
