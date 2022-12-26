$(document).ready(function(){
    
    $('#Loginform').on('submit',function(e){
        e.preventDefault();
        var email=$('#email').val();
        var password=$('#psw').val();
        $.ajax({
            type: 'POST',
            url: 'loginvalidate.php',
            data: {
                Email: email,
                Password: password,
                Login: true
            },
            success:function(data){
                if(data=='no')
                {
                    $('#errmsg').css('display','block');
                    $('#errmsg').html('** Incorrect Email Or Password **');
                }
                else{
                    $('#errmsg').css('display','none');
                    location.reload();
                }
            }
        });
    });
    
    $('#Signupform').on('submit',function(e){
        e.preventDefault();
        var email=$('#semail').val();
        var password=$('#spwd').val();
        var cpassword=$('#cspwd').val();
        $.ajax({
            type: 'POST',
            url: 'loginvalidate.php',
            data: {
                Email: email,
                Password: password,
                CPassword: cpassword,
                Signup: true
            },
            success:function(data){
                if(data=='perr')
                {
                    $('#errmsg4').css('display','block');
                    $('#errmsg4').html('Password not matching');
                }
                else if(data=='no')
                {
                    $('#errmsg4').css('display','block');
                    $('#errmsg4').html('Sign up failed! Try again');
                }
                else if(data=='yes'){
                    $('#errmsg4').css('display','none');
                    $(location).prop('href','profile.php')
                }
            }
        });
    });

    $('#Forgotpassform').on('submit',function(e){
        e.preventDefault();
        var email=$('#email1').val();
        $('#errmsg1').hide();
        $('#otpclick').hide();
        $('#load').show();
        $.ajax({
            type: 'POST',
            url: 'loginvalidate.php',
            data: {
                Email: email,
                forgotpwd: true
            },
            success:function(data){
                if(data=='no'){
                    $('#errmsg2').css('display','block');
                    $('#errmsg2').html("Not signed up");
                }
                else if(data=='yes'){
                    $('#gotp').css('display','block');
                    $('#fpwd').css('display','none');
                    // $('#timer').text("3:00");
                    // countdown();
                }
                $('#otpclick').show();
                $('#load').hide();
            }
        });
    });

    $('#OTPform').on('submit',function(e){
        e.preventDefault();
        var otp=$('#getotp').val();
        $.ajax({
            type: 'POST',
            url: 'loginvalidate.php',
            data: {
                Otp: otp,
                OTP: true
            },
            success:function(data){
                if(data=='yes'){
                    $('#npwd').show();
                    $('#gotp').hide();
                }
                else if(data=='no'){
                    $('#errmsg1').css('display','block');
                    $('#errmsg1').html("Enter a valid OTP");
                }
                else{
                    $('#errmsg1').css('display','block');
                    $('#errmsg1').html("OTP Expired");
                }
            }
        });
    });

    $('#ResendOTP').on('submit',function(e){
        e.preventDefault();
        $('#rsend').hide(setTimeout(function(){
            $('#rsend').show();
            $('#resendotp').hide();
        }, 30000));
        $('#resendotp').show();
        $('#errmsg1').hide();
        $.ajax({
            type: 'POST',
            url: 'loginvalidate.php',
            data: {
                ResendOtp: true
            },
            // success:function(){
            //     $('#timer').text("3:00");
            //     countdown();
            // }
        });
    });

    $('#Changepwdform').on('submit',function(e){
        e.preventDefault();
        var password=$('#Password').val();
        var cpassword=$('#CPassword').val();
        $.ajax({
            type: 'POST',
            url: 'loginvalidate.php',
            data: {
                Password: password,
                CPassword: cpassword,
                Newpass: true
            },
            success:function(data){
                if(data=='perr')
                {
                    $('#errmsg3').css('display','block');
                    $('#errmsg3').html('Password not matching');
                }
                else if(data=='no')
                {
                    $('#errmsg3').css('display','block');
                    $('#errmsg3').html('Could not update the password');
                }
                else if(data=='yes'){
                    $('#errmsg3').css('display','none');
                    location.reload();
                }
            }
        });
    });


    // var interval;
    // function countdown() {
    //     clearInterval(interval);
    //     setInterval( function() {
    //         var timer = $('#timer').html();
    //         timer = timer.split(':');
    //         var minutes = timer[0];
    //         var seconds = timer[1];
    //         seconds -= 1;
    //         if (minutes < 0) return;
    //         else if (seconds < 0 && minutes != 0) {
    //             minutes -= 1;
    //             seconds = 59;
    //         }
    //         else if (seconds < 10 && length.seconds != 2) seconds = '0' + seconds;
            
    //         $('#timer').html(minutes + ':' + seconds);
            
    //         if (minutes == 0 && seconds == 0) clearInterval(interval);
    //     }, 1300);
    // }

    $('#Loginform').validate({
        wrapper: 'div',
        errorLabelContainer: "#messageBox",
        errorClass: "error fail-alert",
        validClass: "valid success-alert",
        rules: {
            Email: {
                required: true,
                email: true,
            },
            Password: {
                required: true,
                minlength: 8,
            }
        },
        messages: {
            Email: 'Enter a valid email',
            Password: {
                minlength: 'Password must be at least 8 characters long'
            }
        }  
    });

    $('#Signupform').validate({
        wrapper: 'div',
        errorLabelContainer: "#messageBox",
        errorClass: "error fail-alert",
        validClass: "valid success-alert",
        rules: {
            Email: {
                required: true,
                email: true,
            },
            Password: {
                required: true,
                minlength: 8,
            },
            CPassword: {
                required: true,
                minlength: 8,
                // equalTo: '[name="Password"]'
            }
        },
        messages: {
            Email: 'Enter a valid email',
            Password: {
                minlength: 'Password must be at least 8 characters long'
            },
            CPassword: {
                minlength: 'Password must be at least 8 characters long',
                // equalTo: 'Password not matching'
            }
        }  
    });

    $('#Forgotpassform').validate({
        wrapper: 'div',
        errorLabelContainer: "#messageBox",
        errorClass: "error fail-alert",
        validClass: "valid success-alert",
    });
    
    $('#OTPform').validate({
        wrapper: 'div',
        errorLabelContainer: "#messageBox",
        errorClass: "error fail-alert",
        validClass: "valid success-alert",
        rules: {
            otp: {
                required: true,
                range: [100000, 999999]
            }
        },
        messages: {
            otp: {
                range: 'OTP must be 6 digit long'
            }
        }  
    });
    
    $('#Changepwdform').validate({
        wrapper: 'div',
        errorLabelContainer: "#messageBox",
        errorClass: "error fail-alert",
        validClass: "valid success-alert",
        rules: {
            NPassword: {
                required: true,
                minlength: 8,
            },
            CPassword: {
                required: true,
                minlength: 8,
                equalTo: '[name="NPassword"]'
            }
        },
        messages: {
            NPassword: {
                minlength: 'Password must be at least 8 characters long'
            },
            CPassword: {
                minlength: 'Password must be at least 8 characters long',
                equalTo: 'Password not matching'
            }
        }
    });
});