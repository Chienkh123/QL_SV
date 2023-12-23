
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";  
  document.getElementById("main-content").style.marginLeft = "250px";
  document.getElementById("main").style.display="none";
  document.getElementById("main-content").style.transition ="0.5s";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0"; 
  document.getElementById("main").style.display="block"; 
  document.getElementById("main-content").style.marginLeft = "174px";
  document.getElementById("main-content").style. transition ="0.5s";
}