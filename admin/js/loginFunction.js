(() => {
  var loginButton = document.querySelector('#loginButton');

  function login(){
    document.loginButton.submit();
  }

  loginButton.addEventListener('click', login, false);
})();
