<?php
    session_start();
    include "_connectDatabase.php";
    if(isset($_SESSION['HnoUp'])){
        $sql1="SELECT * FROM `address` WHERE `hno` = '{$_SESSION['HnoUp']}' AND `uid`='{$_SESSION['UserID']}'";
        $res1=mysqli_query($db,$sql1);
        $row1=mysqli_fetch_assoc($res1);
    }
?>
<div class='Formbox'>
    <span class='arrow1' onclick='displayNone(`AddFormBox`)'>&#8592;</span>
    <p id='atext'>Enter the Details</p>
    <hr>
    <form class='center2' style='width: 80%;' id="AddressForm">
        <div class="FormRow">
            <div class="FormCol">
                <label for='Hno/fno'>H.No/Flat NO</label>
                <input type='text' name='hfno' id='hfno' value=<?php echo isset($row1)? $row1['hno']: ""?> required>
            </div>
            <div class="FormCol">
                <label for='Wname'>Ward Name</label>
                <input type='text' name='wname' id='wname' value=<?php echo isset($row1)? $row1['wname']: ""?> required>
            </div>
        </div>

        <div class="FormRow" style="display: block;">
            <div class="FormCol">
                <label for='vill/city'>Village/City</label>
                <input type='text' name='villcity' id='villcity' value=<?php echo isset($row1)? $row1['villageCity']: ""?> required>
            </div>
        </div>

        <div class="FormRow">
            <div class="FormCol">
                <label for='Taluka'>Taluka</label>
                <input type='text' name='taluka' id='taluka' value=<?php echo isset($row1)? $row1['taluka']: ""?> required>
            </div>
            <div class="FormCol">
                <label for='state'>State</label>
                <input type='text' name='state' id='state' value=<?php echo isset($row1)? $row1['state']: ""?> required>
            </div>
        </div>
        
        
        <div class="FormRow" style="justify-content: center;">
            <div class="FormCol">
                <label for='pcode'>Pincode</label>
                <input type='number' name='pcode' id='pcode' oninput='this.value=this.value.replace(/[^0-9]/g,``)' value=<?php echo isset($row1)? $row1['pincode']: ""?> required>
            </div>
        </div>

        <div class="FormRow" style="justify-content: center;">
            <?php if(isset($row1)){?>
                <input type='submit' id='updateaddr'  name='updateaddr' value='Update' style='width: 21%;padding: 10px;border: none;border-radius: 20px;'>
            <?php }else{?>
                <input type='submit' id='newaddr' name='newaddr' value='Submit' style='width: 21%;padding: 10px;border: none;border-radius: 20px;'>
            <?php }?>
        </div>
        <br>
    </form>
</div>
<?php
    mysqli_close($db);
?>
    <script src="JS/accountjQuery.js"></script>
