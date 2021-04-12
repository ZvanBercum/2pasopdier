function openDropDown(){
    let dropdownEl = document.getElementById('user-dropdown');
    if(dropdownEl.classList.contains('hidden')){
        dropdownEl.classList.remove('hidden');
    }else {
        dropdownEl.classList.add('hidden');
    }
}


function goToUser(id){
    window.location.href="/user/show/"+id;
}

function goToPet(id){
    window.location.href="/pet/show/"+id;
}
