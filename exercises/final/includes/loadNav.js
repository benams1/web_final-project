$(document).ready(function(){
    var qs=new URLSearchParams(window.location.search), userType=qs.get("user_type");
    if( userType != 'undefined' && userType!=null){
        $.getJSON("data/generalData.json",function(data){
            var pageNav=$('#navbarSupportedContent1'),
                subUl;
            if( pageNav != 'undefined' && pageNav != null ){
                subUl=$('<ul/>');
                subUl.addClass("navbar-nav mr-auto float-right")
                userType=parseInt(userType);
                data.nav[userType].forEach(function (item,index) {
                    aItem=$('<a/>');
                    aItem.addClass("nav-link float-right");
                    aItem.html(item.html);
                    aItem.attr("href", item.href);
                    listItem=$('<li/>').addClass("nav-item").append(aItem);  
                    subUl.append(listItem);
                });
                pageNav.append(subUl);
            }

        });}
    }
);
