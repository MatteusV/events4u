var header = document.getElementById ('header');
var navigation_header = document.getElementById ('navigation_header');
//Especificar o container: 
var content = document.getElementById ('container');
var showSidebar = false;


function toggleSideBar()
{
    showSidebar = !showSidebar;
    if(showSidebar) {
        navigation_header.style.marginLeft = '0vh';
        navigation_header.style.animationName = 'showSidebar';
        content.style.filter = 'blur(2px)';
    }
    else {
        navigation_header.style.marginLeft = '-100vh';
        navigation_header.style.animationName = '';
        content.style.filter = '';
    }
}

 function closeSidebar() {
    if(showSidebar) {
        toggleSideBar();
    }
}

window.addEventListener('risize', function(event) {
    if(window.innerWidth > 800 && showSidebar) {
        toggleSideBar();
    }
});
