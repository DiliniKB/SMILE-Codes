var box1,box2,slider,userInput,amountout,tipin,tipout1,tipout2,total,next,button;
window.onload = function () {
    tipin=0;
    userInput=0;
    slider = document.getElementById('tipamount');
   
    tipout1 = document.getElementById('tip-preview');
    tipout2 = document.getElementById('tip-preview2');
    total = document.getElementById('total');
    next = document.getElementById('move');
    box1 = document.getElementById('box1');
    box2 = document.getElementById('box2');
    box3 = document.getElementById('box3');
    button = document.getElementById('continue');
};

function amount(){
    userInput = document.getElementById('amount-input').value;
    console.log(userInput);
    document.getElementById('amount-preview').innerHTML = userInput;
    slider.setAttribute("max", userInput/2); 
}

function checkAnonymous(){
    anonymous = document.getElementById('anonymous').value;
    if (anonymous) {
        anon = 1;
    }
    else{
        anon = 0;
    }
    console.log("changed");
    console.log(anonymous);
}

function tip(x){
    tipin = x;
    tipout1.innerHTML = x;
    tipout2.innerHTML = x;
}

function calculate(){
    var t = parseInt(userInput)+parseInt(tipin);
    total.innerHTML = t;
    return t;
}

function confirmation(){
    if (userInput) {
        var proceed = confirm("Are you sure you want to proceed?");
    }
    else{
        var proceed = alert("Enter a valid amount");
    }
    
    if (proceed) {
        form = document.getElementById('donationAmount');
        if (!form) {
            console.log("No form");
        }
        // console.log(userInput + tipin)
        form.elements[0].value = userInput;
        form.elements[1].value = tipin;   
        form.elements[2].value = anon; 
        form.submit();
    }
}

function Submit1(){
    box1.submit();
}

function Submit2(){
    box2.submit();
}

// function linking(){
//     next.href = next.href + "/" + parseInt(userInput) + "/" + parseInt(tipin);
//     console.log(next.href);
// }



// window.slider.oninput = function() {
//     console.log(slider.value);
//     output.innerHTML = this.value;

// }