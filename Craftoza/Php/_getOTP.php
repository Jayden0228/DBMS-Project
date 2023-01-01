<img id="back" src="Images/Back.png" alt="">
<div class="box center">
    <span class="arrow" onclick="displayNone('gotp')">&#8592;</span>
    <img src="Images/Logo.png"alt="Craftoza" class="center logo">
    <img src="Images/VALIDATE.png" alt="Email icon" class="center" style="width:20%;height:20%">
    <p style="font-size: 17px">Please Enter The OTP To Verify Your Account</p>
    <p style="font-size: medium; color: rgb(44, 43, 43);">An OPT Has Been Sent To <?php if(isset($_SESSION['Email'])) {echo "{$_SESSION['Email']}";}else{echo "entered email";}?></p>
    
    <div class="timer">
        <p>OTP is invaild in <span id="timer"></span><span id="timer2"></span></p>
    </div>
    <script>
        let timerOn = true;
        let timerOn2 = true;

        function timer2(remaining) {
            var m = Math.floor(remaining / 60);
            var s = remaining % 60;

            m = m < 10 ? '0' + m : m;
            s = s < 10 ? '0' + s : s;
            document.getElementById('timer2').innerHTML = m + ':' + s;
            remaining -= 1;

            if (remaining >= 0 && timerOn2) {
                setTimeout(function () {
                    timer2(remaining);
                }, 1000);
                return;
            }

            if (!timerOn2) {
                return;
            }

        }
        function timer(remaining) {
            var m = Math.floor(remaining / 60);
            var s = remaining % 60;

            m = m < 10 ? '0' + m : m;
            s = s < 10 ? '0' + s : s;
            document.getElementById('timer').innerHTML = m + ':' + s;
            remaining -= 1;

            if (remaining >= 0 && timerOn) {
                setTimeout(function () {
                    timer(remaining);
                }, 1000);
                return;
            }

            if (!timerOn) {
                return;
            }

        }
        timer(180);
    </script>    
    
    <form autocomplete="off" class="center2" id="OTPform">
        <!-- <p style="margin:0; margin-bottom:5px;font-size: medium;" id="timerPara">Session will end in <span id="timer">2:00</span>.</p> -->
        <br><br>
        <p id="resendotp">Resending the OTP...</p>
        <p id='errmsg1'></p>
        <input type="number" id="getotp" name="otp"  class="inp otpinp" required>
        <br><br>


        <button type="submit">VERIFY</button>
    </form>

    <form autocomplete="off" class="center2" id="ResendOTP">
        <button type="submit" id="rsend">RESEND OTP</button>
        <div id="load2" class="loader center"></div> 
    </form>

    <p style="font-size: 14px; padding-bottom: 40px;"><span onclick="displayNone('gotp');displayBlock('fpwd')">INVALID EMAIL?</span></p>
</div>
<br>