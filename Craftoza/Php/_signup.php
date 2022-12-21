<img id="back" src="Images/Back.png" alt="">
<div class="box center">
    <span class="arrow" onclick="displayNone('signup')">&#8592;</span>
    <img src="Images/Logo.png"alt="Craftoza" class="center logo">
    <p class="head bolder">SIGNUP</p>

    <!-- onsubmit="return validateSignup(this)" -->
    <form autocomplete="off" class="center2" id="Signupform">
        <p id='errmsg4'></p>

        <label for="Email">Email</label><br>
        <input type="email" id="semail" name="Email" value="" class="inp" requried><br>
        <label for="Password" class="bolder">Password</label><br>
        <input type="password" id="spwd" name="Password"  value="" class="inp" requried><br>
        <label for="ConfirmPassword"class="bolder">Confirm Password</label><br>
        <input type="password" id="cspwd" name="CPassword" value="" class="inp" requried>
        <br>
        <input type="checkbox" required><span style="font-size:12px">I've read and accept the terms and conditions <a href="T&C.html">Terms&Conditions</a></span><br><br>
        <!-- <input type="submit" value="SIGNUP" class="button2" > -->
        <button type="submit">SIGNUP</button>

        <br><br>
    </form>
        <p style="font-size: 14px; padding-bottom: 40px;">Already have an Account? <span style="font-size: 14px; display: inline-block;" onclick="displayNone('signup');displayBlock('login')">LOG IN</span></p>
</div>