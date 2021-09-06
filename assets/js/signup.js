let base_url = "http://localhost/smile-codes/";

let message_box = document.getElementById("message-box");
let first_page = document.getElementById("first_page");
let second_page = document.getElementById("second_page");
let loading = document.querySelectorAll(".loading");

let google_token = document.getElementById("google_token");
let facebook_token = document.getElementById("facebook_token");

function full_url(url){
    return base_url + url;
}


function showMessage(type, text){
    message_box.classList = type;
    message_box.style.bottom = "10px";
    message_box.querySelector("span").innerHTML = text;
}

message_box.querySelector("#message-box-close").addEventListener("click", function(e){
    message_box.style.bottom = "-100px";
});

function show_second_page(){
    first_page.style.display = "none";
    second_page.style.display = "block";
    second_page.style.opacity = "1";
    second_page.style.left = "0px";
}

function show_loading(){
    loading.forEach(el =>{
        el.style.display = "block";
    });
}

function hide_loading(){
    loading.forEach(el =>{
        el.style.display = "none";
    });
}

function getData(url,data,handler){
    var xhr = new XMLHttpRequest();
    xhr.open("POST", url);

    xhr.onreadystatechange = function() {
        if (this.readyState == 4){
            if (this.status == 200){
                if(this.response){
                    try{
                        handler(JSON.parse(this.response));
                    }catch(e){
                        showMessage("error", "Server error. please contact us");
                    }
                }else{
                    showMessage("error", "Server error. try refreshing the page");
                }
                
            }else if(this.status >= 400){
                showMessage("error", "Client error. try refreshing the page");
            }else{
                showMessage("error", "something went wrong. please contact us");
            }
            hide_loading();
        }
    };
    xhr.send(data);
}

function handle_check_login(response){
    if(response.status == 0){
        if(response.error == 0){
            showMessage("success", "Already logged in. redirecting...");
            document.location = full_url("home.html");
        }
    }
}

getData(full_url("app/ends/auth/check_login.php"),new FormData(),handle_check_login);

document.addEventListener("DOMContentLoaded", function(event) {

    let signup_next = document.getElementById("signup_next");
    let signup_done = document.getElementById("signup_done");

    let first_name = document.getElementById("fname");
    let last_name = document.getElementById("lname");
    let email = document.getElementById("email");
    let password = document.getElementById("password");
    let password_confirm = document.getElementById("password_confirm");

    let nic = document.getElementById("NIC");
    let dob = document.getElementById("dob");
    let tp_num = document.getElementById("telephone-num");

    function name_check(first_name, last_name){
        if(first_name == "" || last_name == ""){
            showMessage("error", "names can not be empty");
            return false;
        }
        return true;
    }

    function password_check(password, password_confirm){
        if(password.length < 8){
            showMessage("error", "password length should be greater than 8");
            return false;
        }
        if(password != password_confirm){
            showMessage("error", "passwords should be matched");
            return false;
        }
        return true;
    }

    function email_check(email){
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (!re.test(String(email).toLowerCase())){
            showMessage("error", "email is not valid");
            return false;
        }
        return true;
    }

    function nic_check(nic, birth){
        let nic_string = nic.toLowerCase();
        let dob = new Date(birth);
        let flag = true;

        switch(nic_string.length){
            case 10:
                if(nic_string.substr(0,2) != String(dob.getFullYear()).substr(2,2)){
                    flag = false;
                }
                let re1 = /^\d{9}[x|v]$/;
                if(!re1.test(nic_string)){
                    flag = false;
                }
                break;
            case 12:
                if(nic_string.substr(0,4) != String(dob.getFullYear()).substr(0,4)){
                    flag = false;
                }
                let re2 = /^\d{12}$/;
                if(!re2.test(nic_string)){
                    flag = false;
                }
                break;
            default:
                flag= false;
                break;
        }

        if(!flag){
            showMessage("error", "NIC number is not valid");
        }

        return flag;
    }

    function dob_check(birth){
        let today = new Date();
        let dob = new Date(birth);
        
        let age = today.getFullYear() - dob.getFullYear();
        var m = today.getMonth() - dob.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
            age--;
        }

        if(age <=18 ){
            showMessage("error", "minimum age requirment is 19");
            return false;
        }
        return true;
    }

    function tp_check(tp){
        let re3 = /^0\d{9}$/;

        if (!re3.test(tp)){
            showMessage("error", "telephone number is not valid");
            return false;
        }
        return true;
    }

    function handle_check_email(response){
        if(response.error == 0){
            show_second_page();
        }else{
            showMessage("error", response.message);
        }
        hide_loading();
    }

    function handle_signup(response){
        if(response.error == 0){
            showMessage("success", "Signing you up....");
            document.location = full_url("home.html");
        }else{
            showMessage("error", response.message);
        }
        hide_loading();
    }

    signup_next.addEventListener("click", function(e){
        show_loading();
        if(name_check(first_name.value, last_name.value) && email_check(email.value) && password_check(password.value, password_confirm.value)){
            let data = new FormData();
            data.append("email", email.value);
            getData(full_url("app/ends/auth/check_email.php?method=email"),data,handle_check_email);
        }else{
            hide_loading();
        }
    });

    signup_done.addEventListener("click", function(e){
        show_loading();
        if(nic_check(nic.value,dob.value) && tp_check(tp_num.value) && dob_check(dob.value)){
            let data = new FormData();
            data.append("first_name", first_name.value);
            data.append("last_name", last_name.value);
            data.append("email", email.value);
            data.append("password", password.value);
            data.append("nic", nic.value);
            data.append("tp_num", tp_num.value);
            data.append("dob", dob.value);
            data.append("google_token", google_token.value);
            data.append("facebook_token", facebook_token.value);

            getData(full_url("app/ends/auth/signup.php"),data,handle_signup);
        }else{
            hide_loading();
        }
    });
});

//Social logins

function handle_social_login(response){
    if(response.error == 0){
        show_second_page();
    }else{
        showMessage("error", response.message);
    }
    hide_loading();
}

function send_facebook(token){
    show_loading();
    let data = new FormData();
    data.append("facebook_token", token);
    facebook_token.value = token;
    getData(full_url("app/ends/auth/check_email.php?method=facebook"),data,handle_social_login);
}

function send_google(token){
    show_loading();
    let data = new FormData();
    data.append("google_token", token);
    google_token.value = token;
    getData(full_url("app/ends/auth/check_email.php?method=google"),data,handle_social_login);
}

function handleCredentialResponse(response) {
    send_google(response.credential);
}

function statusChangeCallback(response) {
    if (response.status === 'connected') {
        send_facebook(response.authResponse.accessToken); 
    } else {                               
        showMessage("error", "Signing up failed");;
    }
}

function checkLoginState() {            
    FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
    });
}
        