function password_show_hide() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function clearAddPost() {
  var confirmation = confirm("Are you sure you want to clear the input fields?");
  var titleError = document.getElementById("title-error");
  var contentError = document.getElementById("content-error");
  if (confirmation == true) {
    document.getElementById("title").value = "";
    document.getElementById("content").value = "";
    titleError.innerHTML = "";
    contentError.innerHTML = "";
    title.classList.remove("error");
    content.classList.remove("error");
  }
}

document.querySelector('#add-post').addEventListener('submit', function (event) {
  var title = document.getElementById("title");
  var content = document.getElementById("content");
  var titlecheck = document.getElementById("title").value;
  var contentcheck = document.getElementById("content").value;
  var titleError = document.getElementById("title-error");
  var contentError = document.getElementById("content-error");
  if (titlecheck == "" && contentcheck == "") {
    title.classList.add("error");
    content.classList.add("error");
    titleError.innerHTML = "Please enter a title";
    contentError.innerHTML = "Please enter some content";
    event.preventDefault();
  } else if (titlecheck == "") {
    title.classList.add("error");
    content.classList.remove("error");
    titleError.innerHTML = "Please enter a title";
    event.preventDefault();
  }
  else if (contentcheck == "") {
    content.classList.add("error");
    title.classList.remove("error");
    contentError.innerHTML = "Please enter some content";
    event.preventDefault();
  } else {
    titleError.innerHTML = "";
    contentError.innerHTML = "";
    title.classList.remove("error");
    content.classList.remove("error");
  }
});


function showEditForm(commentId) {
  var forms = document.querySelectorAll('[id^="edit-form-"]');
  for (var i = 0; i < forms.length; i++) {
    forms[i].style.display = 'none';
  }
  var form = document.getElementById('edit-form-' + commentId);
  form.style.display = 'block';
}