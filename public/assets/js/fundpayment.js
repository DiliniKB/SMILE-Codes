var box1,box2,slider,userInput,amountout,tipin,tipout1,tipout2,total,next,button;
window.onload = function () {
    tipin=0;
    slider = document.getElementById('tip');
    tipout1 = document.getElementById('tip-preview');
    tipout2 = document.getElementById('tip-preview2');
    total = document.getElementById('total');
    next = document.getElementById('move');
    box1 = document.getElementById('box1');
    box2 = document.getElementById('box2');
    box3 = document.getElementById('box3');
    button = document.getElementById('continue')
};

function amount(){
    userInput = document.getElementById('amount-input').value;
    document.getElementById('amount-preview').innerHTML = userInput;
    slider.setAttribute("max", userInput/2); 
}

function tip(x){
    tipin = x;
    tipout1.innerHTML = x;
    tipout2.innerHTML = x;
}

function calculate(){
    var t = parseInt(userInput)+parseInt(tipin);
    total.innerHTML = t;
}

function confirmation(){
    if (userInput) {
        var proceed = confirm("Are you sure you want to proceed?");
    }
    else{
        var proceed = alert("Enter a valid amount");
    }
    
    if (proceed) {
        var c = box1.children;
        var i;
        for (i = 0; i < c.length; i++) {
            c[i].style.visibility = "hidden";
        }
        box2.style.visibility = "visible";
        button.style.visibility = "hidden"
    }
}

// function linking(){
//     next.href = next.href + "/" + parseInt(userInput) + "/" + parseInt(tipin);
//     console.log(next.href);
// }



// window.slider.oninput = function() {
//     console.log(slider.value);
//     output.innerHTML = this.value;

// }