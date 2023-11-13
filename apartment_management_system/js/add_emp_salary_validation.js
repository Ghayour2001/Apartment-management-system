//validation for add_floor form
jQuery('#salaryform').validate({
  rules: {
    employee_name: 'required',
    salary_month: 'required',
    salary_year: 'required',
    salary_per_month: {
      required: true,
      number: true,
    },
    issue_date: 'required',
  },
  messages: {
    employee_name: 'Please Select Employee Name',
    salary_month: 'Please Select Salary Month',
    salary_year: 'Please Select Salary Year',
    salary_per_month: {
      required: 'Please Enter Employee Salary',
      number: 'Please Enter only Decimal Numbers',
    },
    issue_date: 'Please Select Salary Issue Date',
  },
  submitHandler: function (form) {
    form.submit()
  },
})

jQuery.validator.addMthod('numericonly', function (value, element) {
  return /^[0-9]+$/.test(value)
})
