let base_url = "http://localhost/smile-codes/";

let message_box = document.getElementById("message-box");
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
};

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

    let enter_button = document.getElementById("enter");

    let email = document.getElementById("email");
    let password = document.getElementById("password");

    function email_check(email){
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (!re.test(String(email).toLowerCase())){
            showMessage("error", "email is not valid");
            return false;
        }
        return true;
    }

    function password_check(password){
        if(password.length < 8){
            showMessage("error", "password length should be greater than 8");
            return false;
        }
        return true;
    }

    function handle_login(response){
        if(response.error == 0){
            showMessage("success", "Logging you in...");
            document.location = full_url("home.html");
        }else{
            showMessage("error", response.message);
        }
        hide_loading();
    }

    enter_button.addEventListener("click", function(e){
        show_loading();
        if(email_check(email.value) && password_check(password.value)){
            let data = new FormData();
            data.append("email", email.value);
            data.append("password", password.value);
            getData(full_url("app/ends/auth/login.php?method=email"),data,handle_login);
        }else{
            hide_loading();
        }
    });
});

//Social logins

function handle_social_login(response){
    if(response.error == 0){
        showMessage("success", "Logging you in...");
        document.location = full_url("home.html");
    }else{
        showMessage("error", response.message);
    }
    hide_loading();
}

function send_facebook(token){
    show_loading();
    let data = new FormData();
    data.append("facebook_token", token);
    getData(full_url("app/ends/auth/login.php?method=facebook"),data,handle_social_login);
}

function send_google(token){
    show_loading();
    let data = new FormData();
    data.append("google_token", token);
    getData(full_url("app/ends/auth/login.php?method=google"),data,handle_social_login);
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