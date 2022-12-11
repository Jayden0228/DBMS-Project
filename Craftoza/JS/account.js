function validateAddress(thisform){
    
}
function validateCard(thisform){
    let cardno=thisform.cardno;
    let cvv=thisform.cvv;

    if(cardno.value.length!=16){
        thisform.cardno.focus();
        alert("Enter 16 digit card number");
        return false;
    }
    if(cvv.value.length!=3){
        thisform.cvv.focus();
        alert("Enter 3 digit cvv");
        return false;
    }
    return true
}
function validateProfile(thisform){
    let fname=thisform.fname;
    let mname=thisform.mname;
    let lname=thisform.lname;
    let mnum=thisform.mnum;

    if(mnum.value.length!=10){
        thisform.mnum.focus();
        alert("Enter a Valid Number");
        return false;
    }
    return true
}