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
// ===================

// DELETE PROFILE

function deleteProfile(oBtn) {
  $(oBtn)
    .parent()
    .remove();

  $.ajax({
    url: "user/api-delete-profile.php"
  }).done(function() {
    window.location = "signup.php";
  });
}

// ===================
// ===================

// DISABLE CHECKBOX FOR LOGIN --- USER OR AGENT
$("#isUser").change(function() {
  if ($(this).is(":checked")) {
    $("#isAgent").attr("disabled", true);
  }
});

$("#isAgent").change(function() {
  if ($(this).is(":checked")) {
    $("#isUser").attr("disabled", true);
  }
});
