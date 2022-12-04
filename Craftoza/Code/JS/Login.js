let i=2;

function displayNone() {
    document.getElementById('login').style.display = "none";
}

function login(){
    document.getElementById('login').style.display = "block";
    document.getElementById('login').innerHTML=`<img id="back" src="Images/Back.png" alt=""><div class="box center"><span class="arrow" onclick="displayNone()">&#8592;</span><img src="Images/Logo.png" alt="Craftoza" class="center logo"><p class="head bolder">LOGIN</p><form action="" method="post" class="center2" onsubmit="return validateLogin(this)"><label for="Email">Email</label><br><input type="email" name="Email" value="" class="inp" required><br><br><label for="Password">Password</label><br><input type="password" id="psw" name="Password"   class="inp" required><br><br><input type="submit" value="LOGIN" class="button2"><p style="font-size: 14px; padding-left: 75px;"><span onclick="forgotpwd()">Forgot Password?</span></p><br><br></form><p style="font-size: 14px; padding-bottom: 40px;">Need an Account? <span style="font-size: 14px;"onclick="sign()">SIGN UP</span></p></div>`
}
function sign(){
    document.getElementById('login').innerHTML=`<img id="back" src="Images/Back.png" alt=""><div class="box center"><span class="arrow" onclick="displayNone()">&#8592;</span><img src="Images/Logo.png"alt="Craftoza" class="center logo"><p class="head bolder">SIGNUP</p><form action="" method="post" class="center2" onsubmit="return validateSignup(this)"><label for="Email">Email</label><br><input type="email" name="Email" value="" class="inp" requried><br><br><label for="Password" class="bolder">Password</label><br><input type="password" id="ipwd" name="Password"  value="" class="inp" requried><br><br><label for="ConfirmPassword"class="bolder">Confirm Password</label><br><input type="password" name="CPassword" value="" class="inp" requried><br><br><input type="submit" value="SIGNUP" class="button2" ><br><br></form><p style="font-size: 14px; padding-bottom: 40px;">Already have an Account? <span style="font-size: 14px; display: inline-block;" onclick="login()">LOG IN</span></p></div>`
}
function forgotpwd(){
    document.getElementById('login').innerHTML=`<img id="back" src="Images/Back.png" alt=""><div class="box center" style="top:23vh;"><span class="arrow" onclick="displayNone()">&#8592;</span><img src="Images/Logo.png" alt="Craftoza" class="center logo"><p class="head bolder" style="font-size: x-large;">FORGOT PASSWORD?</p><form action="" method="post" class="center2" onsubmit="return validateFgtpwd(this)"><br><label for="Email">Email</label><br><input type="email" id="email" name="Email" class="inp" required><br><br><input type="submit" value="GET OTP" class="button2"><br><br></form><p style="font-size: 14px; padding-bottom: 40px; padding-left: 75px;"><span onclick="login()">Back to Log In?</span></p></div>`
}
function gotp(){
    document.getElementById('login').innerHTML=`<img id="back" src="Images/Back.png" alt=""><div class="box center"><span class="arrow" onclick="displayNone()">&#8592;</span><img src="Images/Logo.png"alt="Craftoza" class="center logo"><img src="Images/VALIDATE.png" alt="Email icon" class="center" style="width:20%;height:20%"><p style="font-size: large;">Please Enter The OTP To Verify Your Account</p><p style="font-size: medium; color: rgb(44, 43, 43);">An OPT Has Been Sent To <span id="putemail">(Email)</span></p><form action="" method="post" class="center2" onsubmit="return validateOTP(this)"><br><br><input type="text" id="otp" name="otp" maxlength="6" oninput="this.value=this.value.replace(/[^0-9]/g,'')" class="otpinp" required><br><br><input type="submit" value="VERIFY" class="button2"><br><br></form><p style="font-size: 14px; padding-bottom: 10px;"><span>RESEND OTP</span></p><p style="font-size: 14px; padding-bottom: 40px;"><span onclick="forgotpwd()">INVALID EMAIL?</span></p></div><br>`
}
function npwd(){
    document.getElementById('login').innerHTML=`<img id="back" src="Images/Back.png" alt=""><div class="box center" style="top:22vh;"><span class="arrow" onclick="displayNone()">&#8592;</span><img src="Images/Logo.png" alt="Craftoza" class="center logo"><p class="head bolder">NEW PASSWORD</p><form action="" method="post" class="center2" onsubmit="return validateNewPswd(this)"><label for="Password" class="bolder">New Password</label><br><input type="password" name="Password" value="" class="inp"><br><br><label for="CPassword" class="bolder">Confirm Password</label><br><input type="password" name="CPassword" value="" class="inp"><br><br><input type="submit" value="SUBMIT" class="button2"><br><br><br><br></form></div>`
}

function validateLogin(thisform)
{
    if(!(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(thisform.Email.value)))
    {
        thisform.Email.focus();
        alert("Enter a Valid Email");
        return false;
    }
    if(thisform.Password.value.length < 8) {
        thisform.Password.focus();
        thisform.Password.title="Minimum 8 characters";
        return false;
    }
    document.getElementById('login').style.display = "none";
    return true;
}

function validateSignup(thisform)
{
    if(!(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(thisform.Email.value)))
    {
        thisform.Email.focus();
        alert("Enter a Valid Email");
        return false;
    }
    var test = /[a-z]/g;
    if(!thisform.Password.value.match(test)) {  
        thisform.Password.focus();
        thisform.Password.title="Enter a lowercase character";
        return false;
    }
    
    var test = /[A-Z]/g;
    if(!thisform.Password.value.match(test)) {  
        thisform.Password.focus();
        thisform.Password.title="Enter a uppercase character";
        return false;
    }

    var test = /[0-9]/g;
    if(!thisform.Password.value.match(test)) {  
        thisform.Password.focus();
        thisform.Password.title="Enter a number";
        return false;
    }

    if(thisform.Password.value.length < 8) {
        thisform.Password.focus();
        thisform.Password.title="Minimum 8 characters";
        return false;
    }
    if(thisform.Password.value!=thisform.CPassword.value)
    {
        thisform.CPassword.focus();
        // thisform.CPassword.title="";
        alert("Confirm Password Mismatch");
        return false;
    }
    login()
    return true;
}


function validateFgtpwd(thisform)
{
    if(!(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(thisform.Email.value)))
    {
        thisform.Email.focus();
        alert("Enter a Valid Email");
        return false;
    }
    gotp();
    return true;
}
function validateOTP(thisform)
{
    if(thisform.otp.value.length!=6)
    {
        thisform.otp.focus();
        alert("Enter 6 Digit OTP");
        return false;
    }
    // if(thisform.otp.value!=otp)
    // {
    //     thisform.otp.focus();
    //     alert("Invalid OTP");
    //     return false;
    // }
    npwd();
    return true;
}


function validateNewPswd(thisform)
{
    var test = /[a-z]/g;
    if(!thisform.Password.value.match(test)) {  
        thisform.Password.focus();
        thisform.Password.title="Enter a lowercase character";
        return false;
    }
    
    var test = /[A-Z]/g;
    if(!thisform.Password.value.match(test)) {  
        thisform.Password.focus();
        thisform.Password.title="Enter a uppercase character";
        return false;
    }

    var test = /[0-9]/g;
    if(!thisform.Password.value.match(test)) {  
        thisform.Password.focus();
        thisform.Password.title="Enter a number";
        return false;
    }

    if(thisform.Password.value.length < 8) {
        thisform.Password.focus();
        thisform.Password.title="Minimum 8 characters";
        return false;
    }
    if(thisform.Password.value!=thisform.CPassword.value)
    {
        thisform.CPassword.focus();
        // thisform.CPassword.title="";
        alert("Confirm Password Mismatch");
        return false;
    }
    document.getElementById('login').style.display = "none";
    return true;
}

/* <span id="letter" class="none">Enter a lowercase letter<br></span>
<span id="capital" class="none">Enter a uppercase letter<br></span>
<span id="number" class="none">Enter a number<br></span>
<span id="length" class="none">Minimum 8 characters<br></span> */