$(document).ready(function(){
    $('#AddressForm').validate({
        wrapper: 'div',
        errorLabelContainer: "#messageBox",
        errorClass: "error fail-alert",
        validClass: "valid success-alert",
        rules: {
            hfno: {
                required: true,
            },
            wname: {
                required: true,
            },
            villcity: {
                required: true,
            },
            taluka: {
                required: true,
            },
            state: {
                required: true,
            },
            pcode: {
                required: true,
                minlength: 6,
            }
        },
        messages: {
            hfno: 'Please enter your H.No/Flat No',
            wname: 'Please enter your Ward Name',
            villcity: 'Please enter your Village/City Name',
            taluka: 'Please enter your Taluka',
            state: 'Please enter your State',
            pcode: {
                required: 'Please enter your Pincode',
                minlength: 'Pincode must be 6 digit long',
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
    
    $('#ProfileForm').validate({
        wrapper: 'div',
        errorLabelContainer: "#messageBox",
        errorClass: "error fail-alert",
        validClass: "valid success-alert",
        rules: {
            fname: {
                required: true,
            },
            lname: {
                required: true,
            },
            mnum: {
                required: true,
                minlength: 10,
            },
            email: {
                required: true,
                email: true,
            },
        },
        messages: {
            fname: 'Please enter your First Name',
            lname: 'Please enter your Last Name',
            email: {
                required: 'Please enter your Email',
                minlength: 'Please enter a valid Email',
            },
            mnum: {
                required: 'Please enter your Mobile Number',
                minlength: 'Mobile Number must be 10 digit long',
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
    
    $('#CreditForm').validate({
        wrapper: 'div',
        errorLabelContainer: "#messageBox",
        errorClass: "error fail-alert",
        validClass: "valid success-alert",
        rules: {
            cardno: {
                required: true,
                minlength: 16,
            },
            cvv: {
                required: true,
                minlength: 3,
            },
            exptdate: {
                required: true,
            },
            clabel: {
                required: true,
            },
        },
        messages: {
            cardno: {
                required: '<br/>Please enter the Card Number',
                minlength: 'Card Number must be 16 digit long',
            },
            cvv: {
                required: 'Please enter the CVV',
                minlength: 'CVV must be 3 digit',
            },
            exptdate: 'Please enter the Exp Date',
            clabel: 'Please enter the Card Label',
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});