function hide() {
    var x = document.getElementById("More");
    var y = document.getElementById("Seemore")
    if (x.style.display === "none") {
        x.style.display = "block";
        y.innerHTML = "See Less";
    } else {
        x.style.display = "none";
        y.innerHTML = "See More";
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
