function fvSignup(oBtn) {
  console.log("clicked");
  var frmSignup = document.querySelector("#frmSignup");
  var bIsValid = fnbIsFormValid(frmSignup);
  return bIsValid;
}
