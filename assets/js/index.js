let base_url = "http://localhost/smile-codes/";
let logged_state = false;

let message_box = document.getElementById("message-box");

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

document.addEventListener("DOMContentLoaded", function(event) {

    let login_button = document.getElementById("login");
    let signup_button = document.getElementById("signup");


    function handle_check_login(response){
        if(response.status == 0){
            if(response.error == 0){
                let user = response.message;
                login_button.innerHTML = user.first_name;
                login_button.setAttribute('href', full_url("account/dashboard.html"));

                signup_button.innerHTML = "Logout";
                signup_button.setAttribute('href', "");

                logged_state = true;
            }
        }
    }

    function handle_logout(response){
        if(response.error == 0){
            showMessage("success", "Logging you out...");
            document.location = full_url("index.html");
        }else{
            showMessage("error", response.message);
        }
    }

    getData(full_url("app/ends/auth/check_login.php"),new FormData(),handle_check_login);

    signup_button.addEventListener("click", function(e){
        if(logged_state){
            getData(full_url("app/ends/auth/logout.php"),new FormData(),handle_logout);
        }
    });
});