(function(){
    var dropDown=document.getElementById('selectType');
    for (i=18;i<81;++i){
        dropDown.innerHTML+='<option value="'+i.toString()+'">'+i.toString()+'</option>';
    }
})()