<img id="back" src="Images/Back.png" alt="">
<div class="box center">
    <span class="arrow" onclick="displayNone('gotp')">&#8592;</span>
    <img src="Images/Logo.png"alt="Craftoza" class="center logo">
    <img src="Images/VALIDATE.png" alt="Email icon" class="center" style="width:20%;height:20%">
    <p style="font-size: large;">Please Enter The OTP To Verify Your Account</p>
    <p style="font-size: medium; color: rgb(44, 43, 43);">An OPT Has Been Sent To <?php if(isset($_SESSION['Email'])) {echo "{$_SESSION['Email']}";}else{echo "entered email";}?></p>
    

    <!-- onsubmit="return validateOTP(this)" -->
    <form autocomplete="off" class="center2" id="OTPform">
        <br><br>
        <p id='errmsg1'></p>
        <input type="number" id="getotp" name="otp"  class="otpinp" required><br><br>
        <!-- oninput="this.value=this.value.replace(/[^0-9]/g,'')" -->
        <input type="submit" value="VERIFY" class="button2"><br><br>
    </form>
    <p style="font-size: 14px; padding-bottom: 10px;"><button name="resend" type="submit"><span>RESEND OTP</span></button></p>
    <p style="font-size: 14px; padding-bottom: 40px;"><span onclick="displayNone('gotp');displayBlock('fpwd')">INVALID EMAIL?</span></p>
</div>
<br>