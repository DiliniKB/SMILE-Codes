var reportbox;
// window.onload = function (){
//     reportbox = document.getElementById('reportbox');
// }



function viewreportlist(x){
    console.log('hey');
    // reportbox = x.closest("#reportbox");
    reportbox = x.parentNode.parentNode.parentNode.children[1];
    if (reportbox){
        console.log(reportbox.id);
    }
    if(reportbox.style.display=='none'){
        reportbox.style.display='flex';
    }else{
        reportbox.style.display='none';
    }
}