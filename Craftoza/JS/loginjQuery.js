$(document).ready(function(){
    
    $('#Loginform').on('submit',function(e){
        e.preventDefault();
        var email=$('#email').val();
        var password=$('#psw').val();
        $.ajax({
            type: 'POST',
            url: 'index.php',
            data: {
                Email: email,
                Password: password,
                Login: true
            },
            success:function(data){
                // $('#errmsg').css('display','block');
                // $('#errmsg').html(data);
                location.reload();
            }
        });
    });

    $('#Forgotpassform').on('submit',function(e){
        e.preventDefault();
        var email=$('#email1').val();
        $.ajax({
            type: 'POST',
            url: 'index.php',
            data: {
                Email: email,
                forgotpwd: true
            },
            success:function(data){
                $('#errmsg').css('display','block');
                $('#errmsg').html(data);
                // location.reload();
            }
        });
        $('#gotp').css('display','block');
        $('#fpwd').css('display','none');
    });

    $('#OTPform').on('submit',function(e){
        e.preventDefault();
        var otp=$('#otp').val();
        $.ajax({
            type: 'POST',
            url: 'index.php',
            data: {
                otp: otp,
                OTP: true
            },
            success:function(data){
                $('#errmsg1').css('display','block');
                $('#errmsg1').html(data);
                // location.reload();
            }
        });
        console.log("otp test");
        $('#npwd').show();
        $('#gotp').hide();
        // $('#npwd').css('display','block');
        // $('#gotp').css('display','none');
        console.log("otp test2");
    });
});