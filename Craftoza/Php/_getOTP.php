<img id="back" src="Images/Back.png" alt="">
<div class="box center">
    <span class="arrow" onclick="displayNone('gotp')">&#8592;</span>
    <img src="Images/Logo.png"alt="Craftoza" class="center logo">
    <img src="Images/VALIDATE.png" alt="Email icon" class="center" style="width:20%;height:20%">
    <p style="font-size: 17px">Please Enter The OTP To Verify Your Account</p>
    <p style="font-size: medium; color: rgb(44, 43, 43);">An OPT Has Been Sent To <?php if(isset($_SESSION['Email'])) {echo "{$_SESSION['Email']}";}else{echo "entered email";}?></p>
    

    <form autocomplete="off" class="center2" id="OTPform">
        <br><br>
        <p id="resendotp">OTP has been resended</p>
        <p id='errmsg1'></p>
        <input type="number" id="getotp" name="otp"  class="inp otpinp" required>
        <br><br>


        <button type="submit">VERIFY</button>
    </form>

    <form autocomplete="off" class="center2" id="ResendOTP">
        <button type="submit" id="rsend">RESEND OTP</button>
    </form>

    <p style="font-size: 14px; padding-bottom: 40px;"><span onclick="displayNone('gotp');displayBlock('fpwd')">INVALID EMAIL?</span></p>
</div>
<br>