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

let main_role = "Guest";
let main_role_id = "-1";

document.addEventListener("DOMContentLoaded", function(event) {
    let first_name = document.querySelectorAll(".first-name");
    let last_name = document.querySelectorAll(".last-name");
    let nic = document.querySelectorAll(".nic");
    let email = document.querySelectorAll(".email");

    let role_type = document.querySelectorAll(".role-type");
    let role_display = document.querySelectorAll(".role-display");
    let role_link = document.querySelectorAll(".role-link");

    let logout_button = document.getElementById("logout-btn");

    let donor_collection = document.getElementById("donor-accounts");
    let giftee_collection = document.getElementById("giftee-accounts");
    let admin_collection = document.getElementById("admin-accounts");
    let organization_collection = document.getElementById("organization-accounts");
    let admin_title = document.getElementById("admin-title");

    function handle_check_login(response){
        if(response.status == 0){
            if(response.error == 0){
                let user = response.message.user;
                first_name.forEach(el =>{el.innerHTML = user.first_name});
                last_name.forEach(el =>{el.innerHTML = user.last_name});
                email.forEach(el =>{el.innerHTML = user.email});
                nic.forEach(el =>{el.innerHTML = user.nic});

                let role = response.message.role;
                role_type.forEach(el =>{el.innerHTML = role.type});
                role_display.forEach(el =>{el.innerHTML = role.display_name});
                role_link.forEach(el =>{el.setAttribute("href", role.link)});

                main_role = role.type;
                main_role_id = role.id;
            }else{
                showMessage("error", response.message);
                document.location = full_url("login.html");
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

    function handle_switch(response){
        if(response.error == 0){
            document.location = full_url("account/dashboard.html");
            showMessage("success", "Account is changed");
        }else{
            showMessage("error", response.message);
        }
        hide_loading();
    }

    function generate_button(display, role_type, role_id){
        let li = document.createElement("li");

        let span = document.createElement("span");
        let textnode = document.createTextNode(display+ " | ");
        span.appendChild(textnode);
        li.appendChild(span);

        let button = null;

        if(role_type == main_role.toLocaleLowerCase() && main_role_id == role_id){
            button = document.createTextNode("(selected)");
        }else{
            button = document.createElement("button");
            button.className = "normal-btn";
            button.innerHTML = "use";

            button.addEventListener("click", function(e){
                let send_data = new FormData();
                send_data.append("type", role_type);
                send_data.append("id", role_id);
                getData(full_url("app/ends/account/switch_account.php"), send_data,handle_switch);
            });

        }
        
        li.appendChild(button);

        return li;
    }

    function build_collection(type, element, items){
        if(items.length == 0){
            element.innerHTML = "- no accounts -"
        }

        items.forEach(item => {
            let li_element = generate_button(item.display_name, type, item[type+"_id"]);
            element.appendChild(li_element);
        });
    }

    function handle_get_accounts(response){
        if(response.error == 0){

            let donors = response.message.donors;
            build_collection("donor", donor_collection, donors);

            let giftees = response.message.giftees;
            build_collection("giftee", giftee_collection, giftees);

            let organizations = response.message.organizations;
            build_collection("organization", organization_collection, organizations);

            let admins = response.message.admins;
            build_collection("admin", admin_collection, admins);
            if(admins.length == 0){
                admin_title.style.display = "none";
                admin_collection.style.display = "none";
            }
        }else{
            showMessage("error", response.message);
        }
        hide_loading();
    }

    getData(full_url("app/ends/auth/check_login.php"),new FormData(),handle_check_login);
    getData(full_url("app/ends/account/get_accounts.php"),new FormData(),handle_get_accounts);

    logout_button.addEventListener("click", function(e){
        show_loading();

        getData(full_url("app/ends/auth/logout.php"),new FormData(),handle_logout);

    });
});