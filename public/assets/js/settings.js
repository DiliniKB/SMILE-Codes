let f1 = document.getElementById("SForm1");
let f2 = document.getElementById("SForm2");
let f3 = document.getElementById("SForm3");
let f4 = document.getElementById("SForm4");
let f5 = document.getElementById("SForm5");

let op1 = document.getElementById("op1");
let op2 = document.getElementById("op2");
let op3 = document.getElementById("op3");
let op4 = document.getElementById("op4");
let op5 = document.getElementById("op5");

function preview_image(event) {
        var reader = new FileReader();
        reader.onload = function()
        {
            var output = document.getElementById('output_image');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
}


function openForm(x) {
    x.style.display = "flex";
}
function closeForm(x) {
    x.style.display = "none";
}

op1.onclick = function(){
    openForm(f1);
    closeForm(f2);
    closeForm(f3);
    closeForm(f4);
    closeForm(f5);
};
op2.onclick = function(){
    openForm(f2);
    closeForm(f1);
    closeForm(f3);
    closeForm(f4);
    closeForm(f5);
};
op3.onclick = function(){
    openForm(f3);
    closeForm(f1);
    closeForm(f2);
    closeForm(f4);
    closeForm(f5);

};
op4.onclick = function(){
    openForm(f4);
    closeForm(f1);
    closeForm(f2);
    closeForm(f3);
    closeForm(f5);
};
op5.onclick = function(){
    openForm(f5);
    closeForm(f1);
    closeForm(f2);
    closeForm(f3);
    closeForm(f4);

};

window.onclick = function(event) {
    if (event.target == f1 || event.target ==f2 || event.target ==f3 || event.target ==f4 || event.target ==f5) {
        f1.style.display = "none";
        f2.style.display = "none";
        f3.style.display = "none";
        f4.style.display = "none";
        f5.style.display = "none";
    }
}