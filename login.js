function login() {
  console.log("clicked");
  var frmLogin = document.querySelector("#frmLogin");
  var bIsValid = fnbIsFormValid(frmLogin);

  return bIsValid;
}
