<div class='Formbox'>
    <span class='arrow1' onclick='displayNone(`AddFormBox`)'>&#8592;</span>
    <p id='atext'>Enter the Details</p>
    <hr>
    <form action='' method='post' class='center2' style='width: 80%;' id="AddressForm">
        <div class="FormRow">
            <div class="FormCol">
                <label for='Hno/fno'>H.No/Flat NO</label>
                <input type='text' name='hfno' id='hfno' required>
            </div>
            <div class="FormCol">
                <label for='Wname'>Ward Name</label>
                <input type='text' name='wname' id='wname' required>
            </div>
        </div>

        <div class="FormRow" style="display: block;">
            <div class="FormCol">
                <label for='vill/city'>Village/City</label>
                <input type='text' name='villcity' id='villcity' required>
            </div>
        </div>

        <div class="FormRow">
            <div class="FormCol">
                <label for='Taluka'>Taluka</label>
                <input type='text' name='taluka' id='taluka' required>
            </div>
            <div class="FormCol">
                <label for='state'>State</label>
                <input type='text' name='state' id='State' required>
            </div>
        </div>
        
        
        <div class="FormRow" style="justify-content: center;">
            <div class="FormCol">
                <label for='pcode'>Pincode</label>
                <input type='number' name='pcode' id='pcode' oninput='this.value=this.value.replace(/[^0-9]/g,``)' required>
            </div>
        </div>

        <div class="FormRow" style="justify-content: center;">
            <input type='submit' name='newaddr' value='Submit' style='width: 21%;padding: 10px;border: none;border-radius: 20px;'>
        </div>
        <br>
    </form>
</div>