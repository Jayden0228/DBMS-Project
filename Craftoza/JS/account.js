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
    var test = /[0-9]/g;

    if(!fname.value.match(test)) {  
        fname.focus();
        alert("Enter a Valid Name");
        return false;
    }
    if(!mname.value.match(test)) {  
        mname.focus();
        alert("Enter a Valid Name");
        return false;
    }
    if(!lname.value.match(test)) {  
        lname.focus();
        alert("Enter a Valid Name");
        return false;
    }
    if(mnum.value.length!=10){
        thisform.mnum.focus();
        alert("Enter a 10 Digit Number");
        return false;
    }
    if(isNaN(mnum.value)){
        thisform.mnum.focus();
        alert("Enter a Valid Number");
        return false;
    }
    return true
}