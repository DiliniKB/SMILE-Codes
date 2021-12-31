

function hide() {
    var x = document.getElementById("More");
    var y = document.getElementById("")
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function addNewComment(event){
    event.preventDefault();
    var newcomment = document.getElementById("newComment").value;
    var xhr = new XMLHttpRequest();
    xhr.open("POST","../assets/PHP/comment.php",true);
    xhr.setRequestHeader("Content-Type","application/json;charset=UTF-8");
    xhr.onreadystatechange = function () {
        if (xhr.readyState != 4 || xhr.status != 200) return;

        // On Success of creating a new Comment
        console.log("Success: " + xhr.responseText);
        commentForm.reset();
    };
    xhr.send(JSON.stringify(newcomment));
}

function view_user_account(x){
    if (x){
        window.location.href = ROOT + "account/" + x;
    } 
}

function showProgress(filled,amount){
    var width = (filled/amount)*100;
    root = document.documentElement;
    console.log(width);
    root.style.setProperty('--end-width', width + "%"); 
}


// document.addEventListener("DOMContentLoaded", function(event) {
//     //$('#commentForm').on('submit', function(event){
//     document.getElementById("commentForm").addEventListener("submit",function(){
//         event.preventDefault();
//         //var form_data = $(this).sterialize();
//         var newcomment = {

//         }
//         console.log("Hey you!");

//         var xmlhttp = new XMLHttpRequest();

//         xmlhttp.onreadystatechange = function(){
//             if (xmlhttp.readyState == XMLHttpRequest.DONE)//4
//             {
//                 if (xmlhttp.status == 200){
                    
//                 }
//             }
//         }

//         // $.ajax({
//         //     url:"../assets/PHP/comment.php",
//         //     method:"POST",
//         //     data: form_data,
//         //     dataType:"JSON",
//         //     success: function(data){
//         //         if (data.error != '') 
//         //         {
//         //             $('#commentForm')[0].reset();
//         //             $('#newcomment').html(data.error);
//         //         }
//         //     }
//         // })
//     });

// });

