(() =>{
  function tabSelect(event){
  var active = document.querySelectorAll(".active");

  for (var i=0; i < active.length; i++){
    active[i].className = active[i].className.replace('active', '');
  }

  event.target.parentElement.className += ' active';
  document.getElementById(event.target.href.split('#')[1]).className += ' active';
}

  var getTab = document.querySelector("#tabGroup");
  getTab.addEventListener('click', tabSelect, false);
})();
