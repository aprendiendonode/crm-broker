// Wait for the DOM to be ready

$(function () {

    jQuery.validator.addMethod("phoneNo", function (value, element) {
      return iti.isValidNumber();

    }, "Enter a valid number");

    $("form[name='lead-create']").validate({

        // Specify validation rules

        rules: {

      


            phone: {

                required: true,

                phoneNo: true

            },

       
       
     


        },

        // Specify validation error messages

        messages: {

  

        },

        // Make sure the form is submitted to the destination defined

        // in the "action" attribute of the form when valid

        submitHandler: function (form) {

            form.submit();

        }

    });

});

