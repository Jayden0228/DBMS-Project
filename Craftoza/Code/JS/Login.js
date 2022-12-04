let i=2;

function displayNone(x) {
    document.getElementById(x).style.display = "none";
}

function displayBlock(x){
    document.getElementById(x).style.display = "block";
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
    displayNone('login')
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
    displayBlock('login');
    displayNone('signup')
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
    displayNone('fpwd');
    displayBlock('gotp');
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
    displayBlock('npwd');
    displayNone('gotp');
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
    displayNone('npwd');
    return true;
}

/* <span id="letter" class="none">Enter a lowercase letter<br></span>
<span id="capital" class="none">Enter a uppercase letter<br></span>
<span id="number" class="none">Enter a number<br></span>
<span id="length" class="none">Minimum 8 characters<br></span> */