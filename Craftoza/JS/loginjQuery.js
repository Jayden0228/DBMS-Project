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
        $.ajax({
            type: 'POST',
            url: 'loginvalidate.php',
            data: {
                Email: email,
                Password: password,
                Signup: true
            },
            success:function(data){
                if(data=='no')
                {
                    $('#errmsg').css('display','block');
                    $('#errmsg').html('Sign up failed! Try again');
                }
                else{
                    $('#errmsg').css('display','none');
                    // location.reload();
                    $(location).prop('href','profile.php')
                }
            }
        });
    });

    $('#Forgotpassform').on('submit',function(e){
        e.preventDefault();
        var email=$('#email1').val();
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
                else{
                    $('#gotp').css('display','block');
                    $('#fpwd').css('display','none');
                }
                
            }
        });
    });

    $('#OTPform').on('submit',function(e){
        e.preventDefault();
        var otp=$('#getotp').val();
        console.log(otp);
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
                else{
                    $('#errmsg1').css('display','block');
                    $('#errmsg1').html("Enter a valid OTP");
                }
            }
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
                Newpass: true
            },
            success:function(data){
                if(data=='no')
                {
                    $('#errmsg').css('display','block');
                    $('#errmsg').html('Could not update the password');
                }
                else{
                    $('#errmsg').css('display','none');
                    location.reload();
                }
            }
        });
    });
});