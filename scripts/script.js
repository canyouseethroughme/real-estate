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

// ===================
// ===================

// UPLOAD PROPERTY

// function uploadProperty() {
//   fetch("agent/api-upload-property.php", {
//     method: "POST",
//     body: new FormData(document.getElementById("frmProperty"))
//   });
// }

function setEditListeners() {
  const $buttonList = $(".edit-property-btn");

  if ($buttonList) {
    $buttonList.click(function() {
      const propertyId = $(this).attr("data-target");
      const $parentDiv = $("#" + propertyId);
      const $priceInput = $parentDiv.children(
        'input[data-type="propertyPrice"]'
      );
      const $bedsInput = $parentDiv.children('input[data-type="propertyBeds"]');
      const $bathroomsInput = $parentDiv.children(
        'input[data-type="propertyBth"]'
      );
      const $sqmInput = $parentDiv.children('input[data-type="propertySqm"]');
      const $imageInput = $parentDiv.children('input[type="file"]');
      const $image = $parentDiv.children("img");

      var newPropertyPrice = $priceInput.val();
      var newPropertyBeds = $bedsInput.val();
      var newPropertyBth = $bathroomsInput.val();
      var newPropertySqm = $sqmInput.val();

      var newPropertyImage;
      if ($imageInput[0] && $imageInput[0].files) {
        newPropertyImage = $imageInput[0].files[0];
      }

      const data = new FormData();
      data.set("id", propertyId);
      data.set("price", newPropertyPrice);
      data.set("bedrooms", newPropertyBeds);
      data.set("bathrooms", newPropertyBth);
      data.set("sqm", newPropertySqm);
      if (newPropertyImage) {
        data.set("image", newPropertyImage);
      }

      $.ajax({
        url: "agent/api-update-property.php",
        method: "POST",
        processData: false,
        contentType: false,
        data
      })
        .done(function(res) {
          console.log("====================================");
          console.log("res:", res);
          console.log("====================================");
          const { imageUrl } = JSON.parse(res);
          $image.attr("src", imageUrl);
          $imageInput.val("");
        })
        .fail(err => {
          console.log("====================================");
          console.log("error:", err.responseText);
          console.log("====================================");
        });
    });
  }
}
setEditListeners();

function setDeleteListeners() {
  const $buttonList = $(".delete-property-btn");

  if ($buttonList) {
    $buttonList.click(function() {
      const propertyId = $(this).attr("data-target");

      $.ajax({
        url: "agent/api-delete-property.php",
        method: "POST",
        data: { id: propertyId }
      })
        .done(function(res) {
          console.log("====================================");
          console.log("res:", res);
          console.log("====================================");
          const $parentDiv = $("#" + propertyId);
          $parentDiv.remove();
        })
        .fail(err => {
          console.log("====================================");
          console.log("error:", err.responseText);
          console.log("====================================");
        });
    });
  }
}
setDeleteListeners();

$("#btnAddProperty").click(function() {
  if (!login()) return;

  var newPropertyPrice = $("#priceInput").val();
  var newPropertyBeds = $("#bedsInput").val();
  var newPropertyBth = $("#bthInput").val();
  var newPropertySqm = $("#sqmInput").val();
  var newPropertyImage = $("#imageInput")[0].files[0];

  const data = new FormData();
  data.set("price", newPropertyPrice);
  data.set("bedrooms", newPropertyBeds);
  data.set("bathrooms", newPropertyBth);
  data.set("sqm", newPropertySqm);
  data.set("image", newPropertyImage);

  $.ajax({
    url: "agent/api-upload-property.php",
    method: "POST",
    processData: false,
    contentType: false,
    data
  })
    .done(function(res) {
      const { id, price, beds, bath, sqm, imageUrl } = JSON.parse(res);

      var divNewProperty = `
        <div id="${id}" class="newProperty">
          <img src="${imageUrl}">
          <input name="image" type="file">
          <input data-type="propertyPrice" type="text" value="${price}">
          <input data-type="propertyBeds" type="text" value="${beds}">
          <input data-type="propertyBth" type="text" value="${bath}">
          <input data-type="propertySqm" type="text" value="${sqm}">
          <button type="button" class="edit-property-btn" data-target="${id}">Edit</button>
          <button type="button" class="delete-property-btn" data-target="${id}">Delete</button>
        </div>`;

      $("#properties").html(divNewProperty + $("#properties").html());
      setEditListeners();
      setDeleteListeners();
    })
    .fail(err => {
      console.log("====================================");
      console.log("error:", err.responseText);
      console.log("====================================");
    });
});

// SEARCH

// function checkSearch() {
//   if ($("#txtSearch").val().length < 2) {
//     $("#txtSearch").addClass("error");
//   }
// }
// const txtSearch = document.querySelector("#txtSearch");
// const divResults = document.querySelector("#results");
// txtSearch.addEventListener("input", function() {
//   if ($("#txtSearch").val().length == 0) {
//     $("#txtSearch").removeClass("error");
//     $("#results").hide();
//     return;
//   }
//   if ($("#txtSearch").val() < 2) {
//     $("#txtSearch").addClass("error");
//     return;
//   }

//   $.ajax({
//     url: "user/api-search.php",
//     data: $("#frmSearch").serialize(),
//     dataType: "JSON"
//   }).done(function(matches) {
//     $("#results").empty();

//     $(matches).each(function(index, zip) {
//       zip = zip.replace(/</g, "&lt;");
//       zip = zip.replace(/>/g, "&lt;");
//       let divZip = `<div><a href="homes.php">${zip}</a></div>`;
//       $("#results").append(divZip);
//     });
//   });
//   if (txtSearch.value.length == 0) {
//     divResults.style.display = "none";
//   } else {
//     divResults.style.display = "grid";
//   }
// });

// ===================
// ===================
