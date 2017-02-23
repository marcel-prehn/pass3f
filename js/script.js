function toggle_button() {
  if($('#bt-toggle-password').text() == "Show") {
    $("#details-password").prop("type", "text");
    $('#bt-toggle-password').html("Hide");
  }
  else {
    document.getElementById("details-password").type = "password";
    $("#details-password").prop("type", "password");
    $('#bt-toggle-password').html("Show");
  }
}

function selectGroup(index) {
  document.getElementById('groups').value = index;
}