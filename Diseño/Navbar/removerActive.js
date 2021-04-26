const ubicacion = location.href;
const menuItem = document.querySelectorAll(".items");
const menuLength = menuItem.length;
for (let i = 0; i < menuLength; i++) {
    
    if(menuItem[i].href === ubicacion){
        menuItem[i].parentNode.classList.add("active");      
    }
    
}