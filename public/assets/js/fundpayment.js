var box1,box2,slider,userInput,amountout,tipin,tipout1,tipout2,total,next,button;
window.onload = function () {
    tipin=0;
    userInput=0;
    anon=1;
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

// Called when user completed the payment. It can be a successful payment or failure
payhere.onCompleted = function onCompleted(orderId) {
    console.log("Payment completed OrderID:" + orderId);
    form.submit();
    //Note: validate the payment and show success or failure page to the customer
};

// Called when user closes the payment without completing
payhere.onDismissed = function onDismissed() {
    //Note: Prompt user to pay again or show an error page
    console.log("Payment dismissed");
};

// Called when error happens when initializing payment such as invalid parameters
payhere.onError = function onError(error) {
    // Note: show an error page
    console.log("Error:"  + error);
};

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
        form = document.getElementById('donationAmount');
        if (!form) {
            console.log("No form");
        }
        // console.log(userInput + tipin)
        form.elements[0].value = userInput;
        form.elements[1].value = tipin;   
        form.elements[2].value = anon; 
    }
    else{
        var proceed = alert("Enter a valid amount");
    }
    
    if (proceed) {
        var payment = {
            "sandbox": true,
                "merchant_id": "1219964",    // Replace your Merchant ID
                "return_url": "http://google.com",     // Important
                "cancel_url": "http://127.0.0.1//SMILE/SMILE-git/SMILE-Codes/public",     // Important
                "notify_url": "",
                "order_id": "ItemNo12345",
                "items": "",
                "amount": parseInt(userInput)+parseInt(tipin),
                "currency": "LKR",
                "first_name": "Saman",
                "last_name": "Perera",
                "email": "",
                "phone": "",
                "address": "",
                "city": "",
                "country": "Sri Lanka",
                "delivery_address": "",
                "delivery_city": "",
                "delivery_country": "",
                "custom_1": "",
                "custom_2": ""
        };
        console.log(payment);
        payhere.startPayment(payment);
        
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