// UPDATE USER
$("#btnEditUser").click(function() {
  const nameInput = $('input[data-update="name"]');
  const lastNameInput = $('input[data-update="lastName"]');
  const emailInput = $('input[data-update="email"]');
  const passwordInput = $('input[data-update="password"]');

  if (!nameInput || !lastNameInput || !emailInput || !passwordInput)
    throw new Error("input not found");

  const userData = {
    id: USER_ID,
    name: nameInput.val(),
    lastName: lastNameInput.val(),
    email: emailInput.val(),
    password: passwordInput.val()
  };

  $.ajax({
    url: "user/api-update-user.php",
    method: "POST",
    data: userData
  })
    .done(function(res) {
      console.log("user has been updated:", res);
      window.location = "profile.php";
    })
    .fail(err => {
      console.error("err:", err);
    });
});
// ===================

// DELETE USER
