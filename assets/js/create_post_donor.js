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
            if(response.message.role.type != "Donor"){
                document.location = full_url(response.message.role.type+"/create_post.html");
            }

            dash_name.innerHTML = response.message.role.display_name.split(" ")[0];

        }else if(response.error == 1){
            showMessage("error", "Please log in first");
            document.location = full_url("login.html?continue="+window.location.href);
        }
    }
}

getData(full_url("app/ends/auth/check_login.php"),new FormData(),handle_check_login);

document.addEventListener("DOMContentLoaded", function(event) {

    let keywords = document.getElementById("keywords");
    let town = document.getElementById("town");
    let district = document.getElementById("district");
    let title = document.getElementById("title");
    let post_image = document.getElementById("post_image");
    let visibility = document.getElementById("visibility");
    
    let enter = document.getElementById("enter");

    let signout_btn = document.getElementById("signout_btn");

    function handle_create_post(response){
        if(response.error == 0){
            showMessage("success", "New post created");
            document.location = full_url("donor/dashboard.html");
        }else{
            showMessage("error", response.message);
        }
        hide_loading();
    }

    

    enter.addEventListener("click", function(e){
        show_loading();
        let data = new FormData();
        data.append("keywords", keywords.value);
        data.append("town", town.value);
        data.append("district", district.value);
        data.append("title", title.value);
        data.append("visibility", visibility.value);

        if(post_image.value != ""){
            data.append("image", post_image.files[0]);
        }else{
            data.append("image", "");
        }

        getData(full_url("app/ends/donor/create_post.php"),data,handle_create_post);
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