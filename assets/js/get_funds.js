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
    let post_container = document.getElementById("post_container");
    let login = document.getElementById("login");
    let signup = document.getElementById("signup");
    
    function generate_post(fund){
        let template = `
            <div class=fpost>
                <img src= "../uploads/images/${fund.image || 'fund_placeholder.png'}" class="photo">
                <div>
                    <div class="town">${fund.town},</div>
                    <div class="district">${fund.district}</div>
                </div>
                <div class="title">${fund.title}</div>
                <progress value="${fund.filled}" max="${fund.amount}"></progress>
                <div class="RaisedOf">Rs ${fund.filled} raised of Rs ${fund.amount}</div>
            </div>
        `;

        return template;
    }

    function handle_check_login(response){
        if(response.status == 0){
            if(response.error == 0){
                login.innerHTML = response.message.role.display_name.split(" ")[0];
            }else{
                showMessage("error", "Please log in first");
                document.location = full_url("login.html?continue="+window.location.href);
            }
        }else{
            showMessage("error", response.message);
        }
        hide_loading();
    }

    function handle_get_funds(response){
        if(response.status == 0){
            if(response.error == 0){
                let funds = response.message;
                funds.forEach(fund =>{
                    post_container.innerHTML += generate_post(fund);
                });
            }else{
                showMessage("error", response.message);
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
    }

    signup.addEventListener("click", function(e){
        getData(full_url("app/ends/auth/logout.php"),new FormData(),handle_logout);
    });


    getData(full_url("app/ends/auth/check_login.php"),new FormData(),handle_check_login);
    getData(full_url("app/ends/donor/get_funds.php"),new FormData(),handle_get_funds);
});