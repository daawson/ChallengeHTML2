var doc;
window.onload = function() {
    doc = document.getElementById('drop');
};
function toggleDropDown(){
    doc.className = doc.className !== 'show' ? 'show' : 'hide';
    if(doc.className === 'show'){
        setTimeout(function(){
            doc.style.display = 'block';
        },0);
    }
    else{
        setTimeout(function(){
            doc.style.display = 'none';
        },700);
    }
}