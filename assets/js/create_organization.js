let base_url = "http://localhost/smile-codes/";

let message_box = document.getElementById("message-box");
let loading = document.querySelectorAll(".loading");

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

document.addEventListener("DOMContentLoaded", function(event) {
    let first_name = document.querySelectorAll(".first-name");
    //let last_name = document.querySelectorAll(".last-name");
    //let nic = document.querySelectorAll(".nic");
    //let email = document.querySelectorAll(".email");

    let role_type = document.querySelectorAll(".role-type");
    let role_display = document.querySelectorAll(".role-display");
    let role_link = document.querySelectorAll(".role-link");

    let text_first_name = document.getElementById("text_display_first");
    let text_last_name = document.getElementById("text_display_second");
    let text_details = document.getElementById("registration-data");

    let logout_button = document.getElementById("logout-btn");
    let create_button = document.getElementById("donor-create-btn");

    function handle_check_login(response){
        if(response.status == 0){
            if(response.error == 0){
                let user = response.message.user;
                first_name.forEach(el =>{el.innerHTML = user.first_name});
                //last_name.forEach(el =>{el.innerHTML = user.last_name});
                //email.forEach(el =>{el.innerHTML = user.email});
                //nic.forEach(el =>{el.innerHTML = user.nic});

                let role = response.message.role;
                role_type.forEach(el =>{el.innerHTML = role.type});
                role_display.forEach(el =>{el.innerHTML = role.display_name});
                role_link.forEach(el =>{el.setAttribute("href", role.link)});
            }else{
                showMessage("error", response.message);
                document.location = full_url("login.html?continue="+window.location.href);
            }
        }else{
            showMessage("error", response.message);
        }
        hide_loading();
    }

    function handle_logout(response){
        if(response.error == 0){
            showMessage("success", "Logging you out...");
            document.location = full_url("login.html");
        }else{
            showMessage("error", response.message);
        }
        hide_loading();
    }

    function handle_creation(response){
        if(response.error == 0){
            showMessage("success", "New account is created");
            document.location = full_url("account/dashboard.html");
        }else{
            showMessage("error", response.message);
        }
        hide_loading();
    }

    getData(full_url("app/ends/auth/check_login.php"),new FormData(),handle_check_login);

    logout_button.addEventListener("click", function(e){
        show_loading();

        getData(full_url("app/ends/auth/logout.php"),new FormData(),handle_logout);

    });

    function name_check(first, last){
        if(first == "" || last == ""){
            showMessage("error", "names can not be empty");
            return false;
        }

        return true;
    }

    create_button.addEventListener("click", function(e){
        show_loading();
        if(name_check(text_first_name.value, text_last_name.value)){
            let data = new FormData();
            data.append("first_name", text_first_name.value);
            data.append("last_name", text_last_name.value);
            data.append("register_data", text_details.value);
            getData(full_url("app/ends/account/create_account.php?type=organization"),data,handle_creation);
        }else{
            hide_loading();
        }
    });
});