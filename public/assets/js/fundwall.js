var filterForm,filterIcon;
var i=0;
window.onload = function() {
    filterForm = document.getElementById('SForm');
    filterIcon = document.getElementById('filterButton');

    if (filterIcon){
        console.log('yes In');
    }
    console.log(i);
    i++;
    filterIcon.addEventListener('click',displayFilter());
}

function displayFilter(){
    console.log(i);
    i++;
    if (filterForm.style.display == 'none') {
        filterForm.style.display = 'block';
    } else {
        filterForm.style.display = 'none';
    }
    if (filterForm){
        console.log(i);
        i++;
        console.log('Yes Out');
    }
    
}





