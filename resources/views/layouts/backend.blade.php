<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MultiShop - Online Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href=" {{asset('assets/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href=" {{asset('assets/lib/animate/animate.min.css')}} " rel="stylesheet">
    <link href=" {{asset('assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

 
</head>

<body>

@yield('index')

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src=" {{asset('assets/lib/easing/easing.min.js')}} "></script>
    <script src=" {{asset('assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src=" {{asset('assets/mail/contact.js')}}"></script>
    <script src=" {{asset('assets/js/main.js')}}"></script>

    <!-- Contact Javascript File -->
    {{-- <script src=" {{asset('assets/mail/jqBootstrapValidation.min.js')}}"></script> --}}
   
    
  
<!-- First jQuery -->

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!-- Add Bootstrap bundle -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<!-- Add jqBootstrapValidation from CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqBootstrapValidation/1.3.7/jqBootstrapValidation.min.js"></script>
<!-- Then the validate plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>


{{-- Ajax --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}


<script>
$(document).ready(function() {
    $("#checkout-form").validate({
        rules: {
            firstname: {
                required: true,
                minlength: 2
            },
            lastname: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            mobileno: {
                required: true,
                minlength: 10
            },
            address_line_one: {
                required: true,
                minlength: 5
            },
            address_line_two: {
                minlength: 5
            },
            country_name: {
                required: true
            },
            city_name: {
                required: true,
                minlength: 2
            },
            state_name: {
                required: true,
                minlength: 2
            },
            size_code: {
                required: true,
                minlength: 5
            },
            payment: {
                required: true
            }
        },
        messages: {
            firstname: {
                required: "Please enter your first name",
                minlength: "First name must be at least 2 characters long"
            },
            lastname: {
                required: "Please enter your last name",
                minlength: "Last name must be at least 2 characters long"
            },
            email: {
                required: "Please enter your email address",
                email: "Please enter a valid email address"
            },
            mobileno: {
                required: "Please enter your mobile number",
                minlength: "Mobile number must be at least 10 digits long"
            },
            address_line_one: {
                required: "Please enter your address",
                minlength: "Address must be at least 5 characters long"
            },
            country_name: {
                required: "Please select your country"
            },
            city_name: {
                required: "Please enter your city",
                minlength: "City name must be at least 2 characters long"
            },
            state_name: {
                required: "Please enter your state",
                minlength: "State name must be at least 2 characters long"
            },
            size_code: {
                required: "Please enter your ZIP code",
                minlength: "ZIP code must be at least 5 characters long"
            },
            payment: {
                required: "Please select a payment method"
            }
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
        submitHandler: function(form) {
            // You can add additional checks here before form submission
            form.submit();
        }
    });

    // Additional validation for shipping address when checkbox is checked
    $("#shipto").change(function() {
        if ($(this).is(":checked")) {
            // Add validation rules for shipping address fields
            $("#shipping-address input").each(function() {
                $(this).rules("add", {
                    required: true,
                    minlength: $(this).attr("name").includes("name") ? 2 : 5
                });
            });
        } else {
            // Remove validation rules when unchecked
            $("#shipping-address input").each(function() {
                $(this).rules("remove");
            });
        }
    });
});
</script>
    
 

@stack('scripts')


</body>

</html>