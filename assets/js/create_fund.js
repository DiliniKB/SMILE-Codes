let base_url = "http://localhost/smile-codes/";

let message_box = document.getElementById("message-box");
let loading = document.querySelectorAll(".loading");

let dash_name = document.getElementById("dash_name");

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
}

function handle_check_login(response){
    if(response.status == 0){
        if(response.error == 0){

            dash_name.innerHTML = response.message.user.first_name;

        }else if(response.error == 1){
            showMessage("error", "Please log in first");
            document.location = full_url("login.html?continue="+window.location.href);
        }
    }
}

getData(full_url("app/ends/auth/check_login.php"),new FormData(),handle_check_login);

document.addEventListener("DOMContentLoaded", function(event) {

    let amount = document.getElementById("amount");
    let keywords = document.getElementById("keywords");
    let town = document.getElementById("town");
    let district = document.getElementById("district");
    let title = document.getElementById("title");
    let fund_type = document.getElementById("fund_type");
    let fund_image = document.getElementById("fund_image");
    let description = document.getElementById("description");
    let account_number = document.getElementById("account-number");
    let bank_name = document.getElementById("bank-name");
    let branch_name = document.getElementById("branch-name");
    let account_holder = document.getElementById("account-holder");

    let enter = document.getElementById("enter");

    let signout_btn = document.getElementById("signout_btn");

    function handle_create_fund(response){
        if(response.error == 0){
            showMessage("success", "New fund created");
            document.location = full_url("account/dashboard.html");
        }else{
            showMessage("error", response.message);
        }
        hide_loading();
    }

    enter.addEventListener("click", function(e){
        show_loading();
        let data = new FormData();
        data.append("amount", amount.value);
        data.append("keywords", keywords.value);
        data.append("town", town.value);
        data.append("district", district.value);
        data.append("title", title.value);
        data.append("description", description.value);
        data.append("account_number", account_number.value);
        data.append("bank_name", bank_name.value);
        data.append("branch_name", branch_name.value);
        data.append("account_holder", account_holder.value);
        data.append("type", fund_type.value);

        if(fund_image.value != ""){
            data.append("image", fund_image.files[0]);
        }else{
            data.append("image", "");
        }

        getData(full_url("app/ends/account/create_fund.php"),data,handle_create_fund);
    });

    function handle_logout(response){
        if(response.error == 0){
            showMessage("success", "Logging you out...");
            document.location = full_url("login.html");
        }else{
            showMessage("error", response.message);
        }
    }

    signout_btn.addEventListener("click", function(e){
        getData(full_url("app/ends/auth/logout.php"),new FormData(),handle_logout);
    });
});