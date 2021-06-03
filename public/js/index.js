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

function filter(el) {
    let href = new URL(window.location);
    let extraEl = null;
    let extraVal = null;
    let elId = el.id;
    let elValue = el.value;
    if (el.id === 'minage') {
        extraEl = document.getElementById('maxage');
        extraVal = extraEl.value;
    } else if (el.id === 'maxage') {
        extraEl = document.getElementById('minage');
        extraVal = extraEl.value;
    } else if(el.id === 'female' || el.id === 'male' || el.id === 'gender'){
        elId = 'gender';
        elValue = '';
        if(document.getElementById('female').checked){
            elValue+=('-female');
        }
        if(document.getElementById('male').checked){
            elValue+=('-male');
        }
        if(document.getElementById('gender').checked){
            elValue+=('-anders');
        }
    }
    href.searchParams.set(elId, elValue);
    if (extraEl) href.searchParams.set(extraEl.id, extraVal);
    window.location.replace(href);
}

function openContainer(){
    let filterForm = document.getElementById('filterForm');
    if(filterForm.classList.contains('hidden')){
        filterForm.classList.remove('hidden');
    }else{
        filterForm.classList.add('hidden');
    }
}

(function(){
    if(window.location.pathname  ==  '/user/edit' ||
    window.location.pathname == '/pet/edit'){
        setTimeout(function(){
            let t = document.getElementById('profile').getAttribute('data-profile');
            CKEDITOR.instances['profile'].setData(t);
        }, 200);

    }
})();
