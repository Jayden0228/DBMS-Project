<img id="back" src="Images/Back.png" alt="">
<div class="box center">
    <span class="arrow" onclick="displayNone('gotp')">&#8592;</span>
    <img src="Images/Logo.png"alt="Craftoza" class="center logo">
    <img src="Images/VALIDATE.png" alt="Email icon" class="center" style="width:20%;height:20%">
    <p style="font-size: large;">Please Enter The OTP To Verify Your Account</p>
    <p style="font-size: medium; color: rgb(44, 43, 43);">An OPT Has Been Sent To <span id="putemail">(Email)</span></p>
    <form action="" method="post" class="center2" onsubmit="return validateOTP(this)"><br><br>
        <input type="text" id="otp" name="otp" maxlength="6" oninput="this.value=this.value.replace(/[^0-9]/g,'')" class="otpinp" required><br><br>
        <input type="submit" value="VERIFY" class="button2"><br><br>
    </form>
    <p style="font-size: 14px; padding-bottom: 10px;"><span>RESEND OTP</span></p>
    <p style="font-size: 14px; padding-bottom: 40px;"><span onclick="displayNone('gotp');displayBlock('fpwd')">INVALID EMAIL?</span></p>
</div>
<br>